<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use App\Models\Category;
use App\Models\Magazine;
use App\Models\Post;
use Illuminate\Http\Request;

class MagazineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category=Category::all();
        $magazines=Magazine::orderBy('date','desc')->get();
        foreach ($magazines as $key=>$magazine){
            $posts=Post::where('magazine_date',$magazine->date)->count();
            array_add($magazines[$key],'posts',$posts);
            array_add($magazines[$key],'date_arabic',$this->date_to_arabic($magazine->date));
        }
        return view('dashboard.magazine.index',['magazines'=>$magazines,'category'=>$category->count()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $magazine=new Magazine();
        $magazine->title=$request->title;
        $magazine->date=$request->date;
        $magazine->save();
        return back()->with('success','تمت انشاء الاصدار بنجاح');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $magazine=Magazine::findOrFail($request->id);
        $categories=Category::all();
        $posts=Post::where('magazine_date',$magazine->date)->get();
        if($posts->count()<$categories->count()){
            return back()->with('failed','لم يتم اكتمال مقالات جميع الاقسام');
        }
        else{
            foreach ($posts as $post)
            {
                $post->active=1;
                $post->save();
            }
            $magazine->active=1;
            $magazine->save();
            return back()->with('success','تم اصدار المجلة بنجاح');
        }

    }

    public function un_store(Request $request)
    {
        $magazine=Magazine::findOrFail($request->id);
        $posts=Post::where('magazine_date',$magazine->date)->get();
        foreach ($posts as $post)
        {
            $post->active=0;
            $post->save();
        }
        $magazine->active=0;
        $magazine->save();
        return back()->with('success','تم الغاء اصدار المجلة بنجاح');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Request $request)
    {
        $date=$this->date_to_arabic($request->date);
        $magazine=Magazine::where('date',$request->date)->first();
        $posts=Post::where('magazine_date','=',$request->date)->orderby('category_id', 'ASC')->get();
        return view('dashboard.magazine.show',['posts'=>$posts,'magazine'=>$magazine,'date'=>$date]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function edit(Magazine $magazine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Magazine $magazine)
    {
        //
    }

    public function uncreate(Request $request)
    {
        $magazine=Magazine::findOrFail($request->id);
        $posts=Post::where('magazine_date',$magazine->date)->get();
        foreach ($posts as $post)
        {
            $post->active=0;
            $post->save();
        }
        $magazine->active=0;
        $magazine->save();
        return back()->with('success','تم الغاء اصدار المجلة');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Magazine  $magazine
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $magazine=Magazine::findOrFail($id);
        $posts=Post::where('magazine_date',$magazine->date)->get();
        foreach ($posts as $post)
        {
            $post->active=0;
            $post->magazine_date=NULL;
            $post->save();
        }
        $magazine->delete();
        return back()->with('success','تم حذف الاصدار بنجاح ');
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
