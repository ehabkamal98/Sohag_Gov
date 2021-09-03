<div class="navbar-area">
    <div class="main-responsive-nav">
        <div class="container">
            <div class="main-responsive-menu">
                <div class="logo">
                    <a href="{{route('dashboard')}}">
                        <img src="{{asset('assets/img/logo.png')}}">
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="main-navbar">
        <div class="container">
            <nav class="navbar navbar-expand-md navbar-light">
                <a class="navbar-brand p-2" style="width: 25%;" href="{{route('dashboard')}}">
                    <img src="{{asset('assets/img/logo.png')}}" >
                </a>
                <div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
                    <ul class="navbar-nav mt-2">
                        <li class="nav-item">
                            <a href="{{route('dashboard')}}" class="nav-link @if(Request::is('dashboard')) active @endif">
                                لوحة التحكم
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('category')}}" class="nav-link @if(Request::is('dashboard/category')) active @endif">
                                الاقسام
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('post')}}" class="nav-link @if(Request::is('dashboard/post')||Request::is('dashboard/post/*')) active @endif">
                                المقالات
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('magazine')}}" class="nav-link @if(Request::is('dashboard/magazine')) active @endif">
                                المجلة
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('ads')}}" class="nav-link @if(Request::is('dashboard/ads')) active @endif">
                                الاعلانات
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="{{route('email')}}" class="nav-link @if(Request::is('dashboard/email')) active @endif">
                                بريد الزوار
                            </a>
                        </li>

                    </ul>
                    @if(Auth()->check())
                    <div class="others-options d-flex align-items-center">
                        <div class="option-item">
                            <a style="color: black" class="m-2" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                                <i class="fa fa-power-off " title="تسجيل الخروج">  </i>
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                        </div>
                    </div>
                        @endif
                </div>
            </nav>
        </div>
    </div>

    @if(Auth()->check())
    <div class="others-option-for-responsive">
        <div class="container">
            <div class="dot-menu">
                <a style="color: black" class="m-2" href="" onclick="event.preventDefault(); document.getElementById('logout-form').submit(); ">
                    <i class="fa fa-power-off " title="تسجيل الخروج">  </i>
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>

            </div>
        </div>
    </div>
        @endif
</div>
