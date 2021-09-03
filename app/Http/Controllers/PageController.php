<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Magazine;
use App\Models\Post;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home(){
        $categories_nav=Category::orderBy('order','asc')->get();
        $last_post=Post::with('category')->where('category_id','1')->where('active',1)->orderBy('id','desc')->take(1)->first();
        $categories=Category::with('posts')->get();
        $all_post=Post::with('category')->where('active',1)->orderBy('id','desc')->take(4)->get();
        foreach ($categories as $key => $category) {
            foreach ($category->posts as $key_post=>$post) {
                for($i=0;$i<$all_post->count();$i++){
                    if($post->id==$all_post[$i]->id){
                        unset($categories[$key]->posts[$key_post]);
                    }
                }
            }
        }
        foreach ($all_post as $key=>$post){
            if($post==$last_post){
                unset($all_post[$key]);
            }
        }
        $ads=Ads::all();
        $magazines=Magazine::where('active',1)->orderBy('date','desc')->get();
        foreach ($magazines as $key=>$magazine){
            array_add($magazines[$key],'date_arabic',$this->date_to_arabic($magazine->date));
        }
        return view('home',['categories_nav'=>$categories_nav,'categories'=>$categories,'last_post'=>$last_post,'all_post'=>$all_post,'ads'=>$ads,'magazines'=>$magazines]);
    }

    public function category($id){
        $categories_nav=Category::orderBy('order','asc')->get();
        $category=Category::where('id',$id)->first();
        $posts=$category->posts()->paginate(9);
        $all_post=Post::with('category')->where('active',1)->where('category_id','<>',$id)->orderBy('id','desc')->take(4)->get();
        $ads=Ads::all();
        //dd($posts->links()->elements[0]);
        return view('category',['category'=>$category,'posts'=>$posts,'all_post'=>$all_post,'categories_nav'=>$categories_nav,'ads'=>$ads]);
    }

    public function post($category_id,$post_id){
        $categories_nav=Category::orderBy('order','asc')->get();
        $category=Category::where('id',$category_id)->with('posts')->first();
        $post=Post::findOrFail($post_id);
        $all_post=Post::with('category')->where('active',1)->where('id','<>',$post_id)->orderBy('id','desc')->take(4)->get();
        $ads=Ads::all();
        return view('post',['categories_nav'=>$categories_nav,'category'=>$category,'post'=>$post,'all_post'=>$all_post,'ads'=>$ads]);

    }
    public function magazine(){
        $categories_nav=Category::orderBy('order','asc')->get();
        $magazines=Magazine::where('active',1)->orderBy('date','desc')->paginate(12);
        foreach ($magazines as $key=>$magazine){
            array_add($magazines[$key],'date_arabic',$this->date_to_arabic($magazine->date));
        }
        return view('magazine',['magazines'=>$magazines,'categories_nav'=>$categories_nav]);
    }

    public function search(Request $request){
        $categories_nav=Category::orderBy('order','asc')->get();
        $posts=Post::where('title','like','%'.$request->search.'%')->with('category')->paginate(8);
        $all_post=Post::with('category')->where('active',1)->orderBy('id','desc')->take(4)->get();
        $ads=Ads::all();
        return view('search',['search'=>$request->search,'posts'=>$posts,'all_post'=>$all_post,'categories_nav'=>$categories_nav,'ads'=>$ads]);
    }
    public function date_to_arabic($date){
        $numbers=['0'=>'٠','1'=>'١','2'=>'٢','3'=>'٣','4'=>'٤','5'=>'٥','6'=>'٦','7'=>'٧','8'=>'٨','9'=>'٩'];
        $months = [ "Jan" => "يناير", "Feb" => "فبراير", "Mar" => "مارس", "Apr" => "أبريل", "May" => "مايو", "Jun" => "يونيو", "Jul" => "يوليو", "Aug" => "أغسطس", "Sep" => "سبتمبر", "Oct" => "أكتوبر", "Nov" => "نوفمبر", "Dec" => "ديسمبر" ];
        $day = date("d", strtotime($date));
        $day_arabic='';
        for($i=0;$i<strlen((string)$day);$i++){
            $day_arabic.=$numbers[$day[$i]];
        }

        $month = date("M", strtotime($date));
        $month = $months[$month];

        $year = date("Y", strtotime($date));
        $year_arabic='';
        for($i=0;$i<strlen((string)$year);$i++){
            $year_arabic.=$numbers[$year[$i]];
        }

        return ($day_arabic.' '.$month.' '.$year_arabic);
    }

}
