<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Task extends Model
{
    protected $fillable = [
    	'title',
    	'body',
    	'uid',
        'status',
    	'published_at',

    ];

    public function scopePublished($query){
    	$query->where('published_at', '<=' , Carbon::now());
    }

    public function scopeUnpublished($query){
    	$query->where('published_at', '>' , Carbon::now());
    }



    
    public function usertasks(){
        return $this->hasMany('App\Usertasks','task_id');
    }
}
