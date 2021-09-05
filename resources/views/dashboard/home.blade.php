@extends('dashboard.dashboard')
@section('title')
    الرئيسية
@endsection
@section('content')
    <div class="row m-5 mb-0">
        <h2 class="text-center col-md-12"> <i class="fa fa-cogs "> </i> لوحة التحكم  </h2>
    </div>
    <div class="row m-5 justify-content-center mt-0">
        <div class="card mb-3 col-md-4 col-12 m-5 text-center" style="background-color: #01579B">
            <a href="{{route('category')}}" class="text-white">
            <div class="card-header text-white row"> <i class="fa fa-file"></i></div>
            <div class="card-body">
                <h5 class="card-title text-white">الاقسام</h5>
                <p class="card-text text-white">{{$category}}</p>
                <div class="card-footer bg-transparent">
                        المزيد <i class="fas fa-arrow-circle-left"></i>
                </div>
            </div>
        </a>
    </div>
        <div class="card mb-3 col-md-4 col-12 m-5 text-center" style="background-color: #0277BD">
            <a href="{{route('post')}}" class="text-white">
            <div class="card-header text-white row"> <i class="fa fa-file-alt"></i></div>
            <div class="card-body ">
                <h5 class="card-title text-white">المقالات</h5>
                <p class="card-text text-white">{{$post}}</p>
                <div class="card-footer bg-transparent">
                        المزيد <i class="fas fa-arrow-circle-left"></i>
                </div>
            </div>
            </a>
        </div>
        <div class="card mb-3 col-md-3 col-12 m-3 text-center" style="background-color:#BF360C">
            <a href="{{route('magazine')}}" class="text-white">
            <div class="card-header text-white row"> <i class="fa fa-file-pdf"></i></div>
            <div class="card-body">
                <h5 class="card-title text-white">المجلة</h5>
                <p class="card-text text-white">{{$magazine}}</p>
                <div class="card-footer bg-transparent">
                        المزيد <i class="fas fa-arrow-circle-left"></i>
                </div>
            </div>
            </a>
        </div>
        <div class="card mb-3 col-md-3 col-12 m-3 text-center" style="background-color: #FF6F00">
            <a href="{{route('ads')}}" class="text-white">
            <div class="card-header text-white row"> <i class="fa fa-ad"></i></div>
            <div class="card-body">
                <h5 class="card-title text-white">الاعلانات</h5>
                <p class="card-text text-white">{{$ads}}</p>
                <div class="card-footer bg-transparent">
                        المزيد <i class="fas fa-arrow-circle-left"></i>
                </div>
            </div>
            </a>
        </div>
        <div class="card mb-3 col-md-3 col-12 m-3 text-center text-white" style="background-color: #B71C1C">
            <a href="{{route('email')}}" class="text-white">
            <div class="card-header row"> <i class="fa fa-at"></i></div>
            <div class="card-body">
                <h5 class="card-title text-white">بريد الزوار</h5>
                <p class="card-text text-white">{{$email}}</p>
                <div class="card-footer bg-transparent">
                        المزيد <i class="fas fa-arrow-circle-left"></i>
                </div>
            </div>
            </a>
        </div>
    </div>

    @endsection
