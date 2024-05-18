<?php

namespace App\Http\Controllers;

use App\Mail\AllakroEmail;
use App\Models\Message;
use Exception;
use Illuminate\Database\Console\Migrations\RollbackCommand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

use Mockery\Matcher\Type;
use PDOException;
use Symfony\Component\ErrorHandler\Debug;

use function PHPSTORM_META\type;

class MessageController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('store');
    }

    public function index()
    {
        $messages = Message::where('type', 'entrant')
            // ->where('message_state', 'non lu')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        $sendedMessages = Message::where('type', 'sortant')
            ->where('status', 1)
            ->orderBy('created_at', 'DESC')
            ->get();

        $deletedMessages = Message::where('status', 0)
            ->orderBy('created_at', 'DESC')
            ->get();

        return view('messages.index', compact('messages', 'sendedMessages', 'deletedMessages'));
    }

    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
        // Mail envoyé par un Utilisateur
        if ($request->input('user')) {

            $message = new Message($request->all());
            $message->fill([
                'type' => 'entrant',
                'receiver' => 'Allakro',
            ]);

            try {
                $message->save();
                return redirect()->back()->with('MailSuccess', 'Votre message a bien été envoyé');

            } catch (PDOException $e) {
                return redirect()->back()->with('MailError', 'Désolé, une erreur est survenue' . $e->getMessage());
            }

            // Mail envoyé par un Administrateur
        } elseif ($request->input('admin')) {

            $req_msg = Message::find($request->req_msg_id);
            $req_msg->message_state = 'repondu';

            $message = new Message($request->all());
            $message->fill([
                'sender' => 'Allakro',
                'sender_email' => Auth::user()->email,
                'type' => 'sortant',
            ]);

            try {
                // Créer un instance de AllakroEmail
                $email = new AllakroEmail(
                    $request->input('receiver'),
                    $request->input('request_message'),
                    $request->input('message')
                );

                $message->save();
                Mail::to($request->input('receiver_email') ?? $request->input('receiver'))->send($email);
                $req_msg->save();

                return redirect()->route('messagerie.index')->with('Success', 'Votre mail a bien été envoyé');

            } catch (PDOException $e) {
                return redirect()->back()->with('Error', 'Désolé, une erreur est survenue' . $e);
            }

            /* if (!Mail::to(Auth::user()->email)->send($email))
                return redirect()->back()->with('Error', 'Désolé, une erreur est survenue');
            else {
                $message->save();
                return redirect()->back()->with('Success', 'Votre mail a bien été envoyé');
            } */
        }



    }
    public function update(Request $request, $ms_id)
    {
        try {
            $message = Message::find($ms_id);

            $request->message_state
                ? $message->message_state = $request->message_state
                : $message->status = $request->status;

            if (!$message->save())
                return redirect()->back()->with('Error', 'Oups! Nous avons rencontré un problème');
            else {

                if (!$request->message_state)
                    return redirect()->back()->with('EmailDeleted', "Le message a bien  été supprimé.");
                return redirect()->back()->with('EmailViewed', 'Email Viewed');
            }

        } catch (\Throwable $th) {
            //throw $th;
        }

    }

    public function reply(int $ms_id)
    {
        $mail = Message::where('id', $ms_id)->first();

        if (!$mail)
            return redirect()->back()->with('ReplyError', 'Une erreur est survenu. Veillez réessayer.');
        return view('messages.reply', compact('mail'));
    }

}