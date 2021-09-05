<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a class="navbar-brand p-2" style="width: 25%;" href="{{route('magazine_page')}}" >
                        <img src="{{asset('assets/img/logo.png')}}">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand p-2" style="width: 25%;" href="{{route('magazine_page')}}">
                    <img src="{{asset('assets/img/logo.png')}}">
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav mt-2">
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link @if(Request::is('/')) active @endif">
                                الرئيسية
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('magazine_page')}}" class="nav-link @if(Request::is('zahra/magazine')) active @endif">
                                المجلة
                            </a>
                        </li>
                        @if($categories_nav->count()>4)
                            @for($i=0;$i<4;$i++)
                                <li class="nav-item">
                                    <a href="{{route('category_page',$categories_nav[$i]->id)}}" class="nav-link @if(Request::is('category/'.$categories_nav[$i]->id)) active @endif">
                                        {{$categories_nav[$i]->name}}
                                    </a>
                                </li>
                            @endfor
                                <li class="nav-item">
                                    <a href="#" class="nav-link">
                                        اخري
                                        <i class='bx bx-chevron-down'></i>
                                    </a>
                                    <ul class="dropdown-menu">
                                        @for($i=5;$i<$categories_nav->count();$i++)
                                        <li class="nav-item">
                                            <a href="{{route('category_page',$categories_nav[$i]->id)}}" class="nav-link @if(Request::is('category/'.$categories_nav[$i]->id)) active @endif">
                                                {{$categories_nav[$i]->name}}
                                            </a>
                                        </li>
                                        @endfor
                                    </ul>
                                </li>
                        @else
                            @foreach($categories_nav as $cat)
                                <li class="nav-item">
                                    <a href="{{route('category_page',$cat->id)}}" class="nav-link @if(Request::is('category/'.$cat->id)) active @endif">
                                        {{$cat->name}}
                                    </a>
                                </li>
                            @endforeach
                        @endif
                    </ul>

                    <div class="others-options d-flex align-items-center w-25">
                        <div class="option-item">
                            <form class="search-box" role="form" method="GET" action="{{route('search')}}" >
                                <input type="search" name="search" class="form-control" placeholder="بحث .." required>
                                <button type="submit"><i class='bx bx-search'></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <div class="others-option-for-responsive ">
        <div class="container">
            <div class="dot-menu">
                <div class="inner">
                    <i class="fa fa-search"></i>
                </div>
            </div>

            <div class="container">
                <div class="option-inner">
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <form class="search-box" role="form" method="GET" action="{{route('search')}}" >
                                <input type="search" name="search" class="form-control" placeholder="بحث .." required>
                                <button type="submit"><i class='bx bx-search'></i></button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
