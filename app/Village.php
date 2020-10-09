<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    protected $guarded = ['id'];

    public function wordNumber()
    {
        return $this->belongsTo(WordNumber::class);
    }
}
