@extends('dashboard.dashboard')
@section('title')
    اضافة مقال
@endsection
@section('content')

    <div class="row m-5">
        <h2 class="text-center col-md-12 col-12"> <i class="fa fa-file-alt "> </i> اضافة مقال  </h2>
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
            <form action="{{route('add_post')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="col-md-12 col-12 row m-1 mb-3" >
                <div class=" col-md-3 col-12 mt-3" >
                    <div class="form-group">
                        <label  data-error="wrong" data-success="right"  ><i class="fas fa-folder prefix grey-text"></i>    القسم </label>
                        <select name="category" required style="overflow-y: scroll">
                            <option selected disabled>اختار القسم ..  </option>
                            @if(!empty($cats))
                                @foreach($cats as $cat)
                                    <option value="{{$cat->id}}">{{$cat->name}}</option>
                                @endforeach
                            @else
                                <option selected disabled>لا توجد اقسام </option>
                            @endif
                        </select>
                    </div>
                </div>
                <div class=" col-md-3 col-12 mt-3">
                    <div class="form-group">
                        <label  data-error="wrong" data-success="right" ><i class="fas fa-file prefix grey-text"></i>   عنوان المقال </label>
                        <input type="text" name="title" class="form-control" value="{{ old('title')}}" required >
                    </div>
                </div>
                <div class=" col-md-3 col-12 mt-3" >
                    <div class="form-group">
                        <label  data-error="wrong" data-success="right" ><i class="fa fa-image prefix grey-text"></i>   صورة المقال </label>
                        <input type="file" class="form-control" name="photo" value="{{ old('photo')}}" required>
                    </div>
                </div>
                <div class=" col-md-3 col-12 mt-3" >
                    <div class="form-group">
                        <label  data-error="wrong" data-success="right" ><i class="fas fa-calendar-day prefix grey-text"></i>   اصدار المجلة </label>
                        <select name="magazine" required>
                            <option selected disabled>اختار الاصدار ..  </option>
                            @if(!empty($magazines))
                                @foreach($magazines as $magazine)
                                    <option value="{{$magazine->date}}">{{$magazine->title}} &#x2B05; {{$magazine->date}}</option>
                                @endforeach
                            @else
                                <option value="0">لا توجد اصدارات </option>
                            @endif
                        </select>
                    </div>
                </div>
                </div>
                <div class=" col-md-12 col-12 m-1">
                    <div class="form-group" >
                        <div class="text-editor-content">
                            <textarea name="description" id="description" required> </textarea>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-center mt-5">
                    <button class="btn btn-success p-2"> اضافة <i class="fas fa-plus-circle ml-1"></i></button>
                </div>
            </form>

        </div>
    </div>


@endsection
