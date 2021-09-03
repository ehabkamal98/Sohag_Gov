@extends('dashboard.dashboard')
@section('title')
    تغيير كلمة المرور
    @endsection
@section('content')
    <!-- Start Login Area -->
    <section class="login-area ptb-50">
        <div class="container">
            <div class="login-form">
                <h2>تغيير كلمة المرور - لوحة التحكم</h2>
                <form method="POST" action="{{ route('change_password') }}">
                    @csrf
                    <div class="form-group">
                        <input type="password" name="old_password" class="form-control" placeholder="كلمة المرور القديمة " required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="new_password" class="form-control" placeholder="كلمة المرور الجديدة " required>
                    </div>
                    <div class="form-group">
                        <input type="password" name="repeat_new_password" class="form-control" placeholder="كلمة المرور الجديدة " required>
                    </div>
                    <button type="submit">تسجيل الدخول</button>
                </form>
            </div>
        </div>
    </section>
    <!-- End Login Area -->
    @endsection
