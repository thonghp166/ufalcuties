@extends('layouts.app')

@section('content')

<div class="content">
    <div class="resetbox">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <h2>Bạn gặp trở ngại khi đăng nhập ?</h2>
                    <p class="resettitle">Nhập email của bạn để bắt đầu</p>
                    <form method="POST" action="{{ route('password.email') }}">
                        {{ csrf_field() }}
                        <fieldset class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="Nhập email của bạn vào đây">
                            @if ($errors->has('email'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </fieldset>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-paper-plane"></i> Gửi email lấy lại mật khẩu</button>
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
                            <p>Sau khi bấm gửi, thông tin đặt lại mật khẩu sẽ được chuyển vào hòm thư email của bạn, vào email để lấy thông tin này</p>  
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