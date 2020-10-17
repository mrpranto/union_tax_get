<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class TaxAmount extends Model
{
    protected $guarded = [];

    public static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        if(!App::runningInConsole())
        {
            static::creating(function ($model){

                $model->fill([

                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]);

            });

            static::updating(function ($model){

                $model->fill([

                    'updated_at' => Carbon::now(),

                ]);

            });
        }
    }
}