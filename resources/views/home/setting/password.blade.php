@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card" >
                <div class="card-body">
                    <div class="setting-border">
                        <h5 class="card-title">用户密码设置</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-11" style="margin-top: 20px;">
                            <form action="{{ route('home.setting.password-update') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">新密码</strong>
                                    <div class="col-sm-9">
                                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="inputPassword3" placeholder="">
                                        <span class="setting-description">密码不少于8个字符</span>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                         </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">确认密码</strong>
                                    <div class="col-sm-9">
                                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="inputPassword3" placeholder="">
                                        <span class="setting-description">密码不少于8个字符</span>
                                        @error('password_confirmation')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">保存修改</button>
                                        <a href="{{ route('home.setting.index') }}" class="btn btn-light">返回设置页</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts/setting')
    </div>
@endsection