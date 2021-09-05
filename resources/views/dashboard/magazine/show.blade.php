<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <title> {{$magazine->title}} - {{$magazine->date}} </title>
    <meta name="description" content="">
    <meta name="HandheldFriendly" content="True">
    <meta name="MobileOptimized" content="320">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui,maximum-scale=2">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimal-ui,maximum-scale=1">
    <meta http-equiv="cleartype" content="on">
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.rtl.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome-free/css/all.min.css')}}">

    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{asset('magazine/img/touch/apple-touch-icon-144x144-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{asset('magazine/img/touch/apple-touch-icon-114x114-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{asset('magazine/img/touch/apple-touch-icon-72x72-precomposed.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('magazine/img/touch/apple-touch-icon-57x57-precomposed.png')}}">
    <link rel="shortcut icon" sizes="196x196" href="{{asset('magazine/img/touch/touch-icon-196x196.png')}}">
    <link rel="shortcut icon" href="{{asset('magazine/img/touch/apple-touch-icon.png')}}">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="{{asset('img/touch/apple-touch-icon-144x144-precomposed.png')}}">
    <meta name="msapplication-TileColor" content="#222222">

    <link rel="stylesheet" href="{{asset('magazine/css/normalize.css')}}">
    <link rel="stylesheet" href="{{asset('magazine/wow_book/wow_book.css')}}" type="text/css" />
    <link rel="stylesheet" href="{{asset('magazine/css/main.css')}}">
    <link rel="icon" type="image/png" href="{{asset('assets/img/favicon.png')}}">

    <script src="{{asset('magazine/js/vendor/modernizr-2.7.1.min.js')}}"></script>
</head>
<body>
<!-- Add your site or application content here -->
<div class='book_container'>
    <div id='book' >
        <div class='cover' style="direction: rtl;border: solid 2px #EF5050;background-color: #E0E0E0">
            <img src="{{asset('assets/img/web.png')}}" style="margin-top: -150px;margin-bottom: -100px" width="100%" height="100%" />
            <h1 class="custom-ribbon text-center">{{$magazine->title}}  {{$date}}</h1>
        </div>
        @foreach($posts as $key=>$post)
        <div style="direction: rtl;border: solid 2px #EF5050;background-color: #F5F5F5" >
            <div class="row">
                <div class="col-md-3 col-3 new-ribbon text-center" style="margin-top: -10px;margin-right: -20px;width: 35%">
                    <span style="font-size: 30px;margin-right: 0px;margin-left: 20px;font-weight: bold">
                          {{$post->category->name}}
                    </span>
                </div>
                <div class="col-md-8 col-8" style="width: 65%">
                    <h1 class="custom-ribbon text-center">{{$post->title}}</h1>
                 </div>
            </div>
            <img class="rounded mx-auto d-block border border-5 border-dark mt-3" style="width: 350px;height: 300px" src="{{asset('assets/img/posts/'.$post->photo)}}">
            <div class="scroll_div mt-3 border-top border-1">
                <div class="m-5 mt-0">
                    {!! $post->content !!}
                </div>
            </div>
        </div>
        @endforeach
        @if(count($posts)%2==0)
        <div class='cover' style="direction: rtl;border: solid 2px #EF5050;background-color: #E0E0E0">
            <img src="{{asset('assets/img/web.png')}}" width="100%" height="100%" />
        </div>
            @endif
    </div> <!-- book -->
</div>

<!-- if you don't need support for IE8 use jquery 2.1 -->
<!-- <script src="js/vendor/jquery-2.1.0.min.js"></script> -->
<script src="{{asset('magazine/js/vendor/jquery-1.11.2.min.js')}}"></script>

<script src="{{asset('magazine/js/helper.js')}}"></script>
<script src="{{asset('magazine/wow_book/wow_book.min.js')}}"></script>
<!-- <script src="js/main.js"></script> -->
<script>
    $(document).ready(function(){
        var bookOptions = {
            height   : 920
            ,width    : 1500
            ,radius:20
            ,maxHeight : 920
            ,rtl: true
            ,centeredWhenClosed : true
            ,hardcovers : true
            ,numberedPages : [1,-2]
            ,toolbar : "lastLeft, left, right, lastRight, zoomin, zoomout, slideshow, flipsound, fullscreen, thumbnails"
            ,thumbnailsPosition : 'bottom'
            ,responsiveHandleWidth : 50

            ,container: window
            ,containerPadding: "15px"
            ,toolbarPosition: "top" // default "bottom"

        };

        $('#book').wowBook( bookOptions ); // create the book

        var book=$.wowBook("#book"); // get book object instance

        $("#cover").click(function(){
            book.advance();
        });
    });
</script>

</body>
</html>
