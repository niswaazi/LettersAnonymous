<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{

    protected $fillable = [
        'receiver_name',
        'message_text',
        'pin_code',
        'is_flagged',
        'sender_ip',
    ];
}
