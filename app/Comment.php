<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;
use App\User;

class Comment extends Model
{

    protected $fillable = [
        'text'
    ];

    public function post()
    {
        return $this->belongsTo(Message::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
