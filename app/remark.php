<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class remark extends Model
{
    protected $fillable = ['body',  'user_id','project_id'   ];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function project(){
        return $this->belongsTo('App/project');
    }
}
