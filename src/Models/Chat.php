<?php

namespace msuhels\newtestplugin\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chat extends Model
{
    use HasFactory ;

    protected $fillable = [
        'sender_id','reciever_id'
        
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    

}