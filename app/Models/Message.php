<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'messages';
    protected $fields = ['id', 'sender', 'sender_email', 'receiver', 'receiver_email', 'message', 'message_state', 'type', 'status'];
    protected $fillable = ['sender', 'sender_email', 'receiver', 'receiver_email', 'message', 'message_state', 'type', 'status'];
}