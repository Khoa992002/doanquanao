<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    protected $fillable = [
       
        'user_message',
        'bot_reply',
    ];
 
    /**
     * Định nghĩa mối quan hệ với User (nếu cần).
     */
   
}
