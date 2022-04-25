<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;//User::classを使えるようにしている

class Post extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
//belongsToメソッドを使用して、Authモデルと【1対多】の逆向きのリレーションを定義



}
