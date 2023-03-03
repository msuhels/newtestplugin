<?php

namespace msuhels\newtestplugin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessages extends Model
{
    use HasFactory ;

    protected $fillable = [
        'chat_id','sender_id','message'
        
    ];

}