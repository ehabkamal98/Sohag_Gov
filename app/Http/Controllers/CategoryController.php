<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $categories=Category::with('posts')->orderBy('order','asc')->get();
        return view('dashboard.category')->with('categories',$categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $last_category=Category::all()->max('order');
        $category=new Category();
        $category->name=$request->name;
        if($last_category){
            $category->order=$last_category+1;
        }
        else{
            $category->order=1;
        }
        $category->save();
        return back()->with('message','تمت اضافة القسم بنجاح');
    }


    public function edit(Request $request, $id)
    {
        $category=Category::findOrFail($id);
        if($category->order!=$request->order){
            $category_another=Category::where('order',$request->order)->first();
            $category_another->order=$category->order;
            $category_another->save();
            $category->order=$request->order;
        }
        $category->name=$request->name;
        $category->save();
        return back()->with('message','تم تعديل القسم بنجاح');
    }



    public function destroy($id)
    {
        $category=Category::findOrFail($id);
        $category->delete();
        return back()->with('message','تم حذف القسم بنجاح');
    }
}
