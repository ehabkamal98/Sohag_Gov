@extends('app')

@section('title')
    الصفحة الرئيسية
@endsection

@section('content')

    <!-- Start Main News Area -->
    <section class="main-news-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="single-main-news">
                        @if($last_post)
                            <div style="height: 600px">
                        <a href="{{route('post_page',['category_id'=>$last_post->category_id,'post_id'=>$last_post->id])}}">
                            <img class="rounded mx-auto d-block" src="{{asset('assets/img/posts/'.$last_post->photo)}}" alt="{{$last_post->title}}" style="max-height: 600px;max-width: 730px;" >
                        </a>
                        <div class="news-content">
                            <div class="tag">{{$last_post->category->name}}</div>
                            <h3>
                                <a href="{{route('post_page',['category_id'=>$last_post->category_id,'post_id'=>$last_post->id])}}">{{$last_post->title}}</a>
                            </h3>
                            <span> {{$last_post->updated_at}}</span>
                        </div>
                            </div>
                        @else
                           <img class="rounded mx-auto d-block"  src="{{asset('assets/img/web.png')}}" style="max-height: 600px;max-width: 730px;">
                        @endif
                    </div>
                </div>
                <div class="col-lg-4">
                    <section class="widget widget_featured_reports mb-1">
                        <div class="single-featured-reports">
                            <div class="featured-reports-image col-md-12 col-12">
                                @if(isset($ads[0]))
                                <a href="{{$ads[0]->link}}">
                                    <img src="{{asset('assets/img/ads/'.$ads[0]->photo)}}" class="rounded mx-auto d-block" style="width: 330px;height: 264px" alt="{{$ads[0]->title}}">
                                </a>
                                @else
                                    <a>
                                        <img src="{{asset('assets/img/ads/default.jpg')}}" style="width: 330px;height: 264px">
                                    </a>
                                @endif
                            </div>
                        </div>
                    </section>
                    <section class="widget widget_featured_reports">
                        <div class="single-featured-reports">
                            <div class="featured-reports-image">
                                @if(isset($ads[1]))
                                <a href="{{$ads[1]->link}}">
                                    <img src="{{asset('assets/img/ads/'.$ads[1]->photo)}}" class="rounded mx-auto d-block" style="width: 330px;height: 264px" alt="{{$ads[1]->title}}">
                                </a>
                                @else
                                    <a>
                                        <img src="{{asset('assets/img/ads/default.jpg')}}" style="width: 330px;height: 264px" >
                                    </a>
                                @endif

                            </div>
                        </div>
                    </section>

                </div>
            </div>
        </div>
    </section>
    <!-- End Main News Area -->

    <!-- Start Default News Area -->
    <section class="default-news-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <div class="most-popular-news">
                        <div class="section-title">
                            <h2>اخر اعداد المجلة <i class="fa fa-book-open"></i></h2>
                        </div>
                        <div class="row">
                            @if(count($magazines)>0)
                            @foreach($magazines as $magazine)
                                <div class="col-md-6 col-12 p-5" >
                                    <a href="{{route('magazine_view',$magazine->date)}}" target="_blank">
                                    <div class="card mb-3 border border-info bg-light">
                                        <h5 class="card-body text-center mt-5" style="margin-bottom: -50px"> {{$magazine->date_arabic}}</h5>
                                        <div class="ribbon ribbon-top-right m-2"><span>{{$magazine->title}} <i class="fa fa-check-circle"></i></span></div>
                                        <img class="rounded mx-auto d-block" style="height: 250px;width: 200px;" src="{{asset('assets/img/web.png')}}" />
                                    </div>
                                    </a>
                                </div>
                            @endforeach
                                @else
                                <h2 class="m-5 text-primary p-5 mt-0"> لم يتم اصدار العدد حتي الان <i class="fas fa-spinner"></i></h2>
                            @endif
                        </div>
                    </div>



                    <div class="row">
                        @if(count($categories)>0)
                        @foreach($categories as $category)
                        <div class="col-lg-6">
                            <div class="section-title">
                                <h2 class="fa fa-folder"> {{$category->name}}</h2>
                            </div>
                            @if (count($category->posts) > 0)
                                <span class="d-none">{{$i=0}}</span>
                                @foreach($category->posts as $post)
                                    @if($i++>1)
                                        @break
                                    @endif
                                <div class="single-sports-news">
                                <div class="row align-items-center">
                                    <div class="col-lg-4 col-sm-4">
                                        <div class="sports-news-image">
                                            <a href="{{route('post_page',['category_id'=>$category->id,'post_id'=>$post->id])}}">
                                                <img src="{{asset('assets/img/posts/'.$post->photo)}}">
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-lg-8 col-sm-8">
                                        <div class="sports-news-content">
                                            <h3>
                                                <a href="{{route('post_page',['category_id'=>$category->id,'post_id'=>$post->id])}}">{{$post->title}}</a>
                                            </h3>
                                            <p>{{$post->updated_at}}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                            @endif
                        </div>
                            @endforeach
                            @endif
                    </div>


                </div>

                <div class="col-lg-4">
                    <aside class="widget-area">
                        <section class="widget widget_featured_reports">
                            <div class="single-featured-reports">
                                <div class="featured-reports-image">
                                    @if(isset($ads[2]))
                                    <a href="{{$ads[2]->link}}">
                                        <img src="{{asset('assets/img/ads/'.$ads[2]->photo)}}" class="rounded mx-auto d-block" style="width: 330px;height: 264px" alt="{{$ads[2]->title}}">
                                    </a>
                                    @else
                                        <a>
                                            <img src="{{asset('assets/img/ads/default.jpg')}}" style="width: 377px;height: 302px">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </section>


                        <section class="widget widget_latest_news_thumb">
                            <h3 class="widget-title">اخر المقالات <i class="fa fa-newspaper"></i></h3>
                            @if(count($all_post)>0)
                                @foreach($all_post as $post)
                                    <article class="item">
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
                                    @if(isset($ads[3]))
                                    <a href="{{$ads[3]->link}}">
                                        <img src="{{asset('assets/img/ads/'.$ads[3]->photo)}}" class="rounded mx-auto d-block" style="width: 330px;height: 264px" alt="{{$ads[3]->title}}">
                                    </a>
                                    @else
                                        <a>
                                            <img src="{{asset('assets/img/ads/default.jpg')}}" style="width: 377px;height: 302px">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </section>
                        <section class="widget widget_featured_reports">
                            <div class="single-featured-reports">
                                <div class="featured-reports-image">
                                    @if(isset($ads[4]))
                                    <a href="{{$ads[4]->link}}">
                                        <img src="{{asset('assets/img/ads/'.$ads[4]->photo)}}" class="rounded mx-auto d-block" style="width: 330px;height: 264px" alt="{{$ads[4]->title}}">
                                    </a>
                                    @else
                                        <a>
                                            <img src="{{asset('assets/img/ads/default.jpg')}}" style="width: 377px;height: 302px">
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </section>
                        <section class="widget widget_featured_reports">
                            <div class="single-featured-reports">
                                <div class="featured-reports-image">
                                    @if(isset($ads[5]))
                                    <a href="{{$ads[5]->link}}">
                                        <img src="{{asset('assets/img/ads/'.$ads[5]->photo)}}" class="rounded mx-auto d-block" style="width: 330px;height: 264px" alt="{{$ads[5]->title}}">
                                    </a>
                                    @else
                                        <a>
                                            <img src="{{asset('assets/img/ads/default.jpg')}}" style="width: 330px;height: 302px">
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

