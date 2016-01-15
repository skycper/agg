<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Pet extends Model
{
    //

    protected $fillable = ['name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}