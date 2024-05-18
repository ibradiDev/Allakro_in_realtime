<?php

namespace App\View\Components\Mail;

use App\Models\Message;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class ReplyTo extends Component
{
    public $message;
    /**
     * Create a new component instance.
     */
    public function __construct(Message $message)
    {
        $this->message = $message;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.mail.reply-to', ['mail' => $this->message]);
    }
}