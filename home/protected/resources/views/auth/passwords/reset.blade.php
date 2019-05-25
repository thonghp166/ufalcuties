@extends('layouts.app')

@section('content')

<div class="content">
    <div class="resetbox">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Đặt lại mật khẩu mới cho tài khoản của bạn</h2>
                    <form method="POST" action="{{ route('password.request') }}" class="resetpassword">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">

                        <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-4 control-label title">Địa chỉ email</label>
                            <div class="col-8">
                                <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus placeholder="Nhập email của bạn vào đây">

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </fieldset>

                        <fieldset class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-4 control-label title">Mật khẩu mới</label>

                            <div class="col-8">
                                <input id="password" type="password" class="form-control" name="password" required placeholder="Nhập mật khẩu mới">

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </fieldset>
                        
                        <fieldset class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-4 control-label title">Nhập lại mật khẩu</label>
                            <div class="col-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required placeholder="Nhập lại mật khẩu vào đây">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </fieldset>

                        <button type="submit" class="btn btn-primary resetpasswordbutton"><i class="fas fa-paper-plane"></i> Đổi mật khẩu</button>
                    </form>
                    @if (session('status'))
                        <div class="alert alert-success" style="margin-top: 30px;">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
                <div class="col-2"></div>
                <div class="col-4 detail">
                    <div class="row">
                        <div class="col-3">
                            <div class="text-right">
                                <i class="fas fa-user-friends icon"></i>                 
                            </div>
                        </div>
                        <div class="col-9">
                            <p>Sau khi bấm đổi mật khẩu, thông tin đặt lại mật khẩu mới sẽ được thực thi</p>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-6">
                <div class="float-left">
                    Copyright © 2019 Sharon Team. All rights reserved.        
                </div>
            </div>
            <div class="col-6">
                <div class="float-right">
                    <img src="{{URL::asset('images/vietnam.png')}}" alt="" class="img-fluid flag">
                    <p class="vietnam">Việt Nam</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="top">
  <i class="fas fa-arrow-circle-up"></i>
</div>

@endsection
