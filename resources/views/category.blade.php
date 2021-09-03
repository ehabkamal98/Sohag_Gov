@extends('app')

@section('title')
    {{$category->name}}
@endsection

@section('content')

<!-- Start Page Banner -->
<div class="page-title-area">
    <div class="container">
        <div class="page-title-content">
            <h2>{{$category->name}}</h2>
            <ul>
                <li> <a href="{{route('home')}}">الرئيسية</a></li>
                <li>{{$category->name}}</li>
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
                    @if (count($category->posts) > 0)
                    <div class="col-lg-12 col-md-12">
                        <div class="single-culture-news">
                            <div class="culture-news-image">
                                <a href="{{route('post_page',['category_id'=>$category->id,'post_id'=>$category->posts[0]->id])}}">
                                    <img src="{{asset('assets/img/posts/'.$category->posts[0]->photo)}}" alt="image">
                                </a>
                            </div>
                            <div class="culture-news-content">
                                <h3>
                                    <a href="{{route('post_page',['category_id'=>$category->id,'post_id'=>$category->posts[0]->id])}}">{{$category->posts[0]->title}}</a>
                                </h3>
                                <p> {{$category->posts[0]->created_at}}</p>
                            </div>
                        </div>
                    </div>
                        @else
                        <img src="{{asset('assets/img/culture-news/culture-news-1.jpg')}}" alt="image">
                    @endif
                </div>

                <div class="row">
                    @if (count($posts) > 0)
                        @foreach($posts as $key=>$post)
                        @if($key==0&&$posts->currentPage()==1)
                            @continue
                        @endif
                    <div class="col-lg-6">
                        <div class="culture-news-post">
                            <div class="row align-items-center">
                                <div class="col-lg-4 col-sm-4">
                                    <div class="culture-news-image">
                                        <a href="{{route('post_page',['category_id'=>$post->category_id,'post_id'=>$post->id])}}">
                                            <img src="{{asset('assets/img/posts/'.$post->photo)}}" alt="image">
                                        </a>
                                    </div>
                                </div>

                                <div class="col-lg-8 col-sm-8">
                                    <div class="culture-news-content">
                                        <h3>
                                            <a href="{{route('post_page',['category_id'=>$post->category_id,'post_id'=>$post->id])}}">{{$post->title}}</a>
                                        </h3>
                                        <p>{{$post->created_at}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                            @if($posts->lastPage()>1)
                            <div class="pagination-area text-center">
                                @if(!$posts->firstItem())
                                    <a href="{{$posts->previousPageUrl()}}" class="prev page-numbers">
                                        <i class='bx bx-chevron-right'></i>
                                    </a>
                                    @else
                                    <a class="prev page-numbers">
                                        <i class='bx bx-chevron-right'></i>
                                    </a>
                                @endif
                                @for($i=1;$i<=$posts->lastPage();$i++)
                                    @if($posts->currentPage()==$i)
                                        <span class="page-numbers current" aria-current="page">{{$i}}</span>
                                    @else
                                        <a href="{{$posts->links()->elements[0][$i]}}" class="page-numbers">{{$i}}</a>
                                    @endif
                                @endfor
                                    @if(!$posts->lastItem())
                                        <a href="{{$posts->nextPageUrl()}}" class="next page-numbers">
                                            <i class='bx bx-chevron-left'></i>
                                        </a>>
                                    @else
                                        <a class="next page-numbers">
                                            <i class='bx bx-chevron-left'></i>
                                        </a>
                                    @endif
                            </div>
                            @endif
                    @endif
                </div>

            </div>

            <div class="col-lg-4">
                <aside class="widget-area">
                    <section class="widget widget_featured_reports">
                        <div class="single-featured-reports">
                            <div class="featured-reports-image">
                                @if(isset($ads[6]))
                                <a href="{{$ads[6]->link}}">
                                    <img src="{{asset('assets/img/ads/'.$ads[6]->photo)}}" width="510" height="400" alt="{{$ads[6]->title}}">
                                </a>
                                @else
                                    <a>
                                        <img src="{{asset('assets/img/ads/default.jpg')}}" width="510" height="400">
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
                                    <img src="{{asset('assets/img/ads/'.$ads[7]->photo)}}" width="510" height="400" alt="{{$ads[7]->title}}">
                                </a>
                                @else
                                    <a>
                                        <img src="{{asset('assets/img/ads/default.jpg')}}" width="510" height="400">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </section>

                    <section class="widget widget_latest_news_thumb">
                        <h3 class="widget-title">اخر المقالات</h3>
                        @if(count($all_post)>0)
                        @foreach($all_post as $post)
                        <article class="item ">
                            <a href="{{route('post_page',['category_id'=>$post->category_id,'post_id'=>$post->id])}}" class="thumb">
                                <img class="fullimage cover bg1" src="{{asset('assets/img/posts/'.$post->photo)}}" role="img">
                            </a>
                            <span class="text_color">{{$post->category->name}}</span>
                            <div class="info">
                                <h4 class="title usmall"><a href="{{route('post_page',['category_id'=>$post->category_id,'post_id'=>$post->id])}}">{{$post->title}}</a></h4>
                                <span>{{$post->created_at}}</span>
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
                                    <img src="{{asset('assets/img/ads/'.$ads[8]->photo)}}" width="510" height="400" alt="{{$ads[8]->title}}">
                                </a>
                                @else
                                    <a>
                                        <img src="{{asset('assets/img/ads/default.jpg')}}" width="510" height="400">
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
