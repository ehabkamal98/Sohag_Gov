<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Category extends Model
{
    use HasFactory;
    protected $dates = ['created_at'];
    protected $fillable = [
        'name','order'
    ];

    public function posts(){
        if(Auth()->check()&&Request()->path()=="/dashboard/*"){
            return $this->hasMany(Post::class)->orderBy('id','desc');
        }
        return $this->hasMany(Post::class)->where('active',1)->orderBy('id','desc');
    }


}
