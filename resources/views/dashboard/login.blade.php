@extends('dashboard.dashboard')
@section('title')
    تسجيل الدخول
    @endsection
@section('content')
    <!-- Start Login Area -->
    <section class="login-area ptb-50">
        <div class="container">
            <div class="login-form">
                <h2>تسجيل الدخول - لوحة التحكم</h2>
                @if($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show text-center font-weight-bold " role="alert">
                        {{$errors->first()}}
                    </div>
                @endif
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="اسم المستخدم" required>
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="كلمة المرور " required>
                    </div>

                    <button type="submit">تسجيل الدخول</button>
                </form>
            </div>
        </div>
    </section>
    <!-- End Login Area -->
    @endsection
