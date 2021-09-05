<?php

namespace App\Http\Controllers;

use App\Models\Email;
use Illuminate\Http\Request;

class EmailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emails=Email::all();
        return view('dashboard.email')->with('emails',$emails);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $email=new Email();
        $email->email=$request->email;
        $email->save();
        return back();
    }

    public function destroy($id)
    {
        $email=Email::findOrFail($id);
        $email->delete();
        return back()->with('message','تم حذف البريد الالكتروني بنجاح');
    }
}
