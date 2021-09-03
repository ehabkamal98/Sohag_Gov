<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Email;
use App\Models\Magazine;
use App\Models\Post;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $category=Category::all()->count();
        $post=Post::all()->count();
        $magazine=Magazine::all()->count();
        $ads=Ads::where('active','1')->get()->count();
        $email=Email::all()->count();
        return view('dashboard.home',[
            'category'=>$category,
            'post'=>$post,
            'magazine'=>$magazine,
            'ads'=>$ads,
            'email'=>$email
        ]);
    }
}
