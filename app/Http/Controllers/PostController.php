<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Magazine;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::with('category')->orderBy('id','desc')->get();
        return view('dashboard.post.index')->with('posts',$posts);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats=Category::all();
        $magazines=Magazine::where('active',0)->orderBy('date','desc')->get();
        return view('dashboard.post.add',['cats'=>$cats,'magazines'=>$magazines]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->category) {
            if($request->magazine) {
                if($request->description) {
                    $another_posts = Post::where('magazine_date', $request->magazine)->get();
                    $check = $another_posts->whereIn('category_id', $request->category);
                    if (!$check->count()) {
                        $post = new Post();
                        $post->title = $request->title;
                        $post->category_id = $request->category;
                        $post->content = $request->description;
                        $post->magazine_date = $request->magazine;

                        $post->save();

                        if ($photo = $request->photo) {
                            $name = $post->id . '.' . $photo->extension();
                            $photo->move('assets/img/posts/', $name);
                            $post->photo = $name;
                            $post->save();
                        }

                        return redirect(route('post'))->with('success', 'تم اضافة المقال بنجاح');
                    } else {
                        return back()->with('failed', 'مقال هذا القسم مضاف بالفعل في هذا العدد')->withInput();
                    }
                }
                else{
                    return back()->with('failed', 'برجاء التأكد من محتوي المقال')->withInput();
                }
            }
            else{
                return back()->with('failed', 'برجاء اختيار الاصدار')->withInput();
            }
        }
        return back()->with('failed', 'برجاء اختيار القسم')->withInput();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post=Post::find($id);
        $magazines=Magazine::where('active',0)->orWhere('date',$post->magazine_date)->orderBy('date','desc')->get();
        $cats=Category::get();
        return view('dashboard.post.edit',['magazines'=>$magazines,'post'=>$post,'cats'=>$cats]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        if ($request->category) {
            if($request->magazine) {
                if($request->description) {
                    $another_posts = Post::where('magazine_date', $request->magazine)->get();
                    $check = $another_posts->whereIn('category_id', $request->category);
                    if (!$check->count() || $check->first()->id == $id) {
                        $post = Post::find($id);
                        $post->title = $request->title;
                        $post->category_id = $request->category;
                        $post->content = $request->description;
                        $post->magazine_date = $request->magazine;
                        $post->save();

                        if ($image = $request->photo) {
                            $name = $id . '.' . $image->extension();
                            $image->move('assets/img/posts/', $name);
                            $post->photo = $name;
                            $post->save();
                        }

                        return redirect(route('post'))->with('success', 'تم تعديل المقال بنجاح');
                    } else {
                        return back()->with('failed', 'مقال هذا القسم مضاف بالفعل في هذا العدد')->withInput();
                    }
                }
                else{
                    return back()->with('failed', 'برجاء التأكد من محتوي المقال')->withInput();
                }
            }
            else{
                return back()->with('failed', 'برجاء التأكد من الاصدار')->withInput();
            }
        }
        return back()->with('failed', 'برجاء التأكد من القسم')->withInput();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        return back()->with('message','تم حذف المقال بنجاح');
    }
}
