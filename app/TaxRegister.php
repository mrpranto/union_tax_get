<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxRegister extends Model
{
    protected $guarded = ['id'];

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }
}
