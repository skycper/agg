<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Pet extends Model
{
    //

    protected $fillable = ['name', 'user_id', 'birthday', 'category', 'avatar'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }
}
