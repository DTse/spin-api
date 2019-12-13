<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Builder\SearchBuilder;

class Entries extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'entries';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'availability','location','sqMeters','price'
    ];

    public function type(){
        return $this->belongsToMany('App\Type');
    }

    public function availability(){
        return $this->hasOne('App\Availability', 'id', 'availability');
    }

    public function locations(){
        return $this->hasOne('App\Locations', 'id', 'location');
    }

    public function newEloquentBuilder($builder)
    {
        return new SearchBuilder($builder);
    }

    public function scopeGetEntries($query, $availability=null, $type=null, $location=null, $sqMeters=null, $price=null){
        return $query->latest()
                     ->apiSearch($availability, $type, $location, $sqMeters, $price);
    }

}
