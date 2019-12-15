<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Logs extends Model
{
    protected $table = 'logs';

    protected $fillable = [
        'action',
        'availability',
        'type',
        'locations',
        'sqMeters',
        'price'
    ];
}
