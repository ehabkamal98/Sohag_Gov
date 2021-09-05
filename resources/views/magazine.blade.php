@extends('app')

@section('title')
    اصدارت المجلة
@endsection

@section('content')

<!-- Start Page Banner -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2 class="fa fa-book-open "> اصدارت المجلة </h2>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية</a></li>
                <li>اصدارت المجلة</li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start Default News Area -->
<section class="default-news-area ptb-50">
    <div class="container">
        <div class="row">
            @if(count($magazines)>0)
            @foreach($magazines as $magazine)
                <div class="col-md-4 col-12 p-5" >
                    <a href="{{route('magazine_view',$magazine->date)}}" target="_blank">
                        <div class="card border border-info mb-3 bg-light">
                            <div class="ribbon ribbon-top-right m-2"><span>{{$magazine->title}} <i class="fa fa-check-circle"></i></span></div>
                            <h5 class="card-body text-center mt-5" style="margin-bottom: -50px"> {{$magazine->date_arabic}}</h5>
                            <img class="rounded mx-auto d-block" style="height: 250px;width: 300px;" src="{{asset('assets/img/web.png')}}" />
                            <div class="card-footer text-center">
                                <a href="{{route('show_magazine',$magazine->date)}}" target="_blank" class="btn btn-primary float-right">
                                    <i class="fa fa-search"></i> عرض
                                </a>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
                @if($magazines->lastPage()>1)
                    <div class="pagination-area text-center">
                        @if(!$magazines->firstItem())
                            <a href="{{$magazines->previousPageUrl()}}" class="prev page-numbers">
                                <i class='bx bx-chevron-right'></i>
                            </a>
                        @else
                            <a class="prev page-numbers">
                                <i class='bx bx-chevron-right'></i>
                            </a>
                        @endif
                        @for($i=1;$i<=$magazines->lastPage();$i++)
                            @if($magazines->currentPage()==$i)
                                <span class="page-numbers current" aria-current="page">{{$i}}</span>
                            @else
                                <a href="{{$magazines->links()->elements[0][$i]}}" class="page-numbers">{{$i}}</a>
                            @endif
                        @endfor
                        @if(!$magazines->lastItem())
                            <a href="{{$magazines->nextPageUrl()}}" class="next page-numbers">
                                <i class='bx bx-chevron-left'></i>
                            </a>>
                        @else
                            <a class="next page-numbers">
                                <i class='bx bx-chevron-left'></i>
                            </a>
                        @endif
                    </div>
                @endif
            @else
            <h2 class="m-5 p-5">لم يتم اصدار المجلة  <i class="fas fa-spinner"></i></h2>
            @endif
        </div>
    </div>
</section>
<!-- End Default News Area -->

@endsection
