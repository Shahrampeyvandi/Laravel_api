<?php

namespace App;
use App\User;
use App\Reply;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function replies() {
        return $this->hasMany(Reply::class);
    }

    public function getPathAttribute() {
        return asset("api/question/$this->id");
    }
}
