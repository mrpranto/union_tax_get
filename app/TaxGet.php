<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TaxGet extends Model
{
    protected $guarded = ['id'];

    public function taxRegister()
    {
        return $this->belongsTo(TaxRegister::class);
    }
}
