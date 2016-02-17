<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usertasks extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'task_id','status',
    ];


    // An task is owned by a user.
    public function user(){
        return $this->belongsTo('App\User');
    }
    // An task is owned by a user.
    public function task(){
        return $this->belongsTo('App\Task');
    }
    

    
}
