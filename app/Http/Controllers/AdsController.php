<?php

namespace App\Http\Controllers;

use App\Models\Ads;
use Illuminate\Http\Request;

class AdsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads=Ads::all();
        return view('dashboard.ads')->with('ads',$ads);
    }

    public function control(Request $request){
        $ads=Ads::findOrFail($request->id);
        if($request->switch=='on'){
            if(!$request->file('photo')){
                return back()->with('failed','برجاء اختيار صورة الاعلان');
            }
            $ads->title=$request->title;
            $ads->content=$request->content;
            $ads->link=$request->link;
            $ads->active=1;
            $photo_extension = $request->file('photo')->getClientOriginalExtension();
            $photo = $ads->id . '.' . $photo_extension;
            $path="assets/img/ads";
            $request->file('photo')->move(public_path($path), $photo);
            $ads->photo = $photo;
            $ads->save();
            return back()->with('success','تمت تفعيل الاعلان بنجاح');

        }
        else{
            $ads->title=NULL;
            $ads->content=NULL;
            $ads->link=NULL;
            $ads->active=0;
            $ads->photo="default.jpg";
            $ads->save();
            return back()->with('success','تمت الغاء تفعيل الاعلان بنجاح');
        }

    }
}
