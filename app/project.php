<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    protected $fillable = ['name', 'description', 'user_id','startDate','endDate'   ];
    protected $dates = ['startDate','endDate'];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function remarks(){
        return $this->hasMany('App\remark');
    }
}