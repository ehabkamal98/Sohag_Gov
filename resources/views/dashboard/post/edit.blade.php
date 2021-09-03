@extends('dashboard.dashboard')
@section('title')
    تعديل مقال
@endsection
@section('content')

    <div class="row m-5" >
        <h2 class="text-center col-md-12 col-12"> <i class="fa fa-file-alt "> </i> تعديل مقال  </h2>
    </div>

    <div class="row m-2 p-1">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show text-center font-weight-bold " role="alert" style="width: 100%">
                {{session('success')}} <i class="fa fa-check-circle"></i>
            </div>
        @endif
        @if(session('failed'))
            <div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold " role="alert" style="width: 100%">
                {{session('failed')}} <i class="fa fa-times-circle"></i>
            </div>
        @endif
            <div class="col-md-12 form-control mb-5">
                <form action="{{route('update_post',$post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                    <div class="row m-5" >
                        <div class="col-md-6 col-12 m-2 row">
                            <div class="col-md-6 col-12" >
                                <div class="form-group">
                                    <label  data-error="wrong" data-success="right" ><i class="fas fa-folder prefix grey-text"></i>    القسم </label>
                                    <select name="category" required>
                                        <option selected disabled >اختار القسم ..  </option>
                                        @if(!empty($cats))
                                            @foreach($cats as $cat)
                                                <option value="{{$cat->id}}" @if($post->category_id==$cat->id) selected @endif>{{$cat->name}}</option>
                                            @endforeach
                                        @else
                                            <option selected disabled>لا توجد اقسام </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12" >
                                <div class="form-group">
                                    <label  data-error="wrong" data-success="right" ><i class="fas fa-file prefix grey-text"></i>   عنوان المقال </label>
                                    <input type="text" name="title" class="form-control" value="{{ $post->title}}" required >
                                </div>
                            </div>
                            <div class="col-md-6 col-12" >
                                <div class="form-group">
                                    <label  data-error="wrong" data-success="right" ><i class="fa fa-image prefix grey-text"></i>   صورة المقال </label>
                                    <input type="file" class="form-control" name="photo" value="{{ old('image')}}">
                                </div>
                            </div>
                            <div class="col-md-6 col-12" >
                                <div class="form-group">
                                    <label  data-error="wrong" data-success="right" ><i class="fas fa-calendar-day prefix grey-text"></i>   اصدار المجلة </label>
                                    <select name="magazine" required>
                                        <option disabled selected>اختار الاصدار ..  </option>
                                        @if(!empty($magazines))
                                            @foreach($magazines as $magazine)
                                                <option @if($post->magazine_date==$magazine->date) selected @endif value="{{$magazine->date}}">{{$magazine->title}}  &#x2B05; {{$magazine->date}}</option>
                                            @endforeach
                                        @else
                                            <option disabled selected>لا توجد اصدارات </option>
                                        @endif
                                    </select>
                                </div>
                            </div>
                         </div>
                        <div class="col-md-4 col-12 m-2 rounded mx-auto d-block">
                            <img class="rounded mx-auto d-block" src="{{asset('assets/img/posts/'.$post->photo)}}" style="width:230px;height: 200px;">
                        </div>
                        <div class=" col-md-12 col-12 m-1 mt-5">
                            <div class="form-group" >
                                <div class="text-editor-content">
                                    <textarea name="description" id="description" required> {{$post->content}}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-success p-2"> حفظ <i class="fas fa-save ml-1"></i></button>
                    </div>
                </form>
            </div>
@endsection

