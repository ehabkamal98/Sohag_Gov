@extends('dashboard.dashboard')
@section('title')
    الاعلانات
@endsection
@section('content')
    <div class="row m-5">
        <h2 class="text-center col-md-12"> <i class="fa fa-ad "> </i> الاعلانات  </h2>
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
        <div class="row mb-5">
            @foreach($ads as $ad)
            <div class="col-12 card m-2 mb-5">
                <div class="card-header row">
                    <div class="text-center">{{$ad->name}}</div>
                </div>
                <div class="card-body row">
                    <div class="col-md-6 col-12 login-form">
                        <form  method="POST" action="{{ route('control_ad') }}" enctype="multipart/form-data">
                            @csrf
                            <div class="row m-3">
                                <label for="switch" class="col-md-4 col-4 form-check-label">تفعيل الاعلان</label>
                                <div class="col-md-8 col-8 form-switch">
                                    <input type="checkbox" class="form-check-input" name="switch" @if($ad->active) checked @endif>
                                </div>
                            </div>
                            <div class="row m-3">
                                <label class="form-label col-md-4 col-4" for="photo">الصورة <span class="fa fa-image text-danger"> *</span></label>
                                <div class="col-md-8 col-8 ">
                                    <input type="file" class="form-control" id="photo" name="photo" @if($ad->photo=='default.jpg')required @endif />
                                    <span class="text-danger">يجب ان يكون مقاس الصورة 25سم * 20سم</span>
                                </div>
                            </div>
                            <div class="row m-3">
                                <label for="title" class="col-md-4 col-4">العنوان </label>
                                <div class="col-md-8 col-8 ">
                                    <input type="text" class="form-control" placeholder="عنوان الاعلان" value="{{$ad->title}}" name="title">
                                </div>
                            </div>
                            <div class="row m-3">
                                <label for="title" class="col-md-4 col-4">الرابط </label>
                                <div class="col-md-8 col-8 ">
                                    <input type="text" class="form-control" placeholder="رابط الاعلان" value="{{$ad->link}}" name="link">
                                </div>
                            </div>
                            <div class="row m-4">
                                <label for="content" class="col-md-4 col-4">تفاصيل</label>
                                <div class="col-md-8 col-8 ">
                                    <textarea  class="form-control" name="content"> {{$ad->content}} </textarea>
                                </div>
                            </div>
                            <input type="hidden" value="{{$ad->id}}" name="id">
                            <button type="submit" class="p-2 m-2">تسجيل الاعلان</button>
                        </form>
                    </div>
                    <div class="col-md-6 col-12 mt-5" style="width: 510px;height: 400px">
                        <section class="card widget widget_featured_reports">
                            <div class="single-featured-reports">
                                <div class="featured-reports-image text-center m-2">
                                    <img src="{{asset('assets/img/ads/'.$ad->photo)}}" width="400" height="510" alt="{{$ad->link}}">
                                </div>
                            </div>
                        </section>
                    </div>
                </div>

            </div>
                @endforeach
        </div>
    </div>


@endsection
