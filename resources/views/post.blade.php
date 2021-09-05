@extends('app')

@section('title')
    {{$post->title}}
@endsection

@section('content')

<!-- Start Page Banner -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2 class="fa fa-file-alt">{{$post->title}}</h2>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية</a></li>
                <li> <a href="{{route('category_page',$category->id)}}">{{$category->name}}</a></li>
            </ul>
        </div>
    </div>
</div>
<!-- End Page Banner -->

<!-- Start Default News Area -->
<section class="default-news-area ptb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="single-culture-news">
                            <div class="culture-news-image">
                                    <img class="rounded mx-auto d-block" src="{{asset('assets/img/posts/'.$post->photo)}}" alt="{{$post->title}}" style="max-height: 500px;max-width: 730px">
                            </div>
                            <div class="culture-news-content">
                                <span>{{$post->updated_at}}</span>
                                <h3>
                                    {!!$post->content !!}
                                </h3>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <aside class="widget-area">
                    <section class="widget widget_featured_reports">
                        <div class="single-featured-reports">
                            <div class="featured-reports-image">
                                @if(isset($ads[6]))
                                <a href="{{$ads[6]->link}}">
                                    <img src="{{asset('assets/img/ads/'.$ads[6]->photo)}}" class="rounded mx-auto d-block" style="max-width: 330px;max-height: 264px" alt="{{$ads[6]->title}}">
                                </a>
                                @else
                                    <a>
                                        <img src="{{asset('assets/img/ads/default.jpg')}}" style="max-width: 377px;max-height: 302px">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </section>
                    <section class="widget widget_featured_reports">
                        <div class="single-featured-reports">
                            <div class="featured-reports-image">
                                @if(isset($ads[7]))
                                <a href="{{$ads[7]->link}}">
                                    <img src="{{asset('assets/img/ads/'.$ads[7]->photo)}}" class="rounded mx-auto d-block" style="max-width: 330px;max-height: 264px" alt="{{$ads[7]->title}}">
                                </a>
                                @else
                                    <a>
                                        <img src="{{asset('assets/img/ads/default.jpg')}}" style="max-width: 377px;max-height: 302px">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </section>

                    <section class="widget widget_popular_posts_thumb">
                        <h3 class="widget-title">اخر المقالات <i class="fa fa-newspaper"></i></h3>
                        @if(count($all_post)>0)
                            @foreach($all_post as $post)
                                <article class="item ">
                                    <a href="{{route('post_page',['category_id'=>$post->category_id,'post_id'=>$post->id])}}" class="thumb">
                                        <img class="fullimage cover bg1" src="{{asset('assets/img/posts/'.$post->photo)}}" role="img">
                                    </a>
                                    <span class="text_color">{{$post->category->name}}</span>
                                    <div class="info">
                                        <h4 class="title usmall"><a href="{{route('post_page',['category_id'=>$post->category_id,'post_id'=>$post->id])}}">{{$post->title}}</a></h4>
                                        <span>{{$post->updated_at}}</span>
                                    </div>
                                </article>
                            @endforeach
                        @endif
                    </section>

                    <section class="widget widget_featured_reports">
                        <div class="single-featured-reports">
                            <div class="featured-reports-image">
                                @if(isset($ads[8]))
                                <a href="{{$ads[8]->link}}">
                                    <img src="{{asset('assets/img/ads/'.$ads[8]->photo)}}" class="rounded mx-auto d-block" style="max-width: 330px;max-height: 264px" alt="{{$ads[8]->title}}">
                                </a>
                                @else
                                    <a>
                                        <img src="{{asset('assets/img/ads/default.jpg')}}" style="max-width: 377px;max-height: 302px">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </section>

                </aside>
            </div>
        </div>
    </div>
</section>
<!-- End Default News Area -->

@endsection
