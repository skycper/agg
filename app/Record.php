<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Record extends Model
{
    protected $fillable = ['content', 'pet_id'];

    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }
}
