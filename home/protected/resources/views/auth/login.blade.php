<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link rel="stylesheet" href="{{URL::asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/login.css')}}">
    <link rel="stylesheet" href="{{URL::asset('css/all.css')}}">
</head>
<body>

    <div class="background">
        <img src="{{URL::asset('images/webv1.jpg')}}" alt="" class="img-fluid backgroundimage">
        <div class="layer"></div>
        <div class="logo">
            <a href="">u-Faculties</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-3"></div>
                <div class="col-6">
                    <div class="loginbox">
                        <img src="{{URL::asset('images/logo-outline.png')}}" alt="" class="img-fluid logoimage">
                        <p class="title">Đăng nhập u-Faculties</p>
                        <form class="loginform" method="POST" action="{{ route('login') }}">
                            {{ csrf_field() }}
                            <fieldset class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                                <input placeholder="Nhập username" id="username" type="username" name="username" value="{{ old('username') }}" required autofocus>
                                @if ($errors->has('username'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset>
                                <div class="line" style="width: 100%; height: 2px; background: #3498db; margin: 0.5px 0px;"></div>
                            </fieldset>
                            <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                <input placeholder="Nhập mật khẩu" id="password" type="password"name="password" required>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </fieldset>
                            <fieldset>
                                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Duy trì đăng nhập
                            </fieldset>
                            <fieldset>
                                <div class="submit">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-arrow-alt-circle-right"></i>
                                </button>
                            </div>    
                            </fieldset>
                            
                            <fieldset>
                                <div class="line" style="width: 60%; height: 0.5px; background: white; margin-top: 10px; margin-bottom: 5px; display: block; margin: auto;"></div>
                            </fieldset>
                            <fieldset>
                                <a href="{{ route('password.request') }}" class="forgotpassword">Bạn đã quên mật khẩu ?</a>
                            </fieldset>
                        </form>
                    </div>      
                </div>
                <div class="col-3"></div>
            </div>
        </div>
        <div class="copyright">
            Copyright © 2019 Sharon Team. Giữ toàn quyền.
        </div>
    </div>
    
    <script type="text/javascript" src="{{URL::asset('js/jquery-3.3.1.slim.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/popper.min.js')}}"></script>
    <script type="text/javascript" src="{{URL::asset('js/bootstrap.min.js')}}"></script>
</body>
</html>

