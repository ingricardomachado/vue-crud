<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = ['keep', 'category_id']; 

    //*** Relations ***
    public function category(){
   
        return $this->belongsTo('App\Category');
    }
}
