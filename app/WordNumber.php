<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WordNumber extends Model
{
    protected $guarded = ['id'];

    public function villages()
    {
        return $this->hasMany(Village::class, 'word_number_id', 'id');
    }
}
