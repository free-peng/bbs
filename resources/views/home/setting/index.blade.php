@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card" >
                <div class="card-body">
                    <div class="setting-border">
                        <h5 class="card-title">用户信息设置</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-11" style="margin-top: 20px;">
                            <form action="{{ route('home.setting.update') }}" method="post">
                                @csrf
                                <div class="form-group row">
                                    <strong for="inputEmail3" class="col-sm-2 col-form-label">用户名</strong>
                                    <div class="col-sm-9">
                                        <input type="text" readonly  class="form-control" id="inputEmail3" placeholder="" value="{{ $user->name }}">
                                        <span class="setting-description">用户名由字母开头，只能含有字母、数字或者下划线</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">E-mail</strong>
                                    <div class="col-sm-9">
                                        <input type="text" readonly  class="form-control" id="inputPassword3" placeholder="" value="{{ $user->email }}">
                                        <span class="setting-description">你的E-mail，便于登录和找回密码</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">微博</strong>
                                    <div class="col-sm-9">
                                        <input type="text" name="weibo" class="form-control" id="inputPassword3" placeholder="" value="{{ $user->weibo }}">
                                        <span class="setting-description">你的微博，便于其他人更好的认识你</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">GitHub</strong>
                                    <div class="col-sm-9">
                                        <input type="text" name="github" class="form-control" id="inputPassword3" placeholder="" value="{{ $user->github }}">
                                        <span class="setting-description">你的GitHu</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">公司</strong>
                                    <div class="col-sm-9">
                                        <input type="text" name="company" class="form-control" id="inputPassword3" placeholder="" value="{{ $user->company }}">
                                        <span class="setting-description">你的公司，有助于后续你在社区的交友</span>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">性别</strong>
                                    <div class="col-sm-9" style="margin-top: 10px;">
                                        <label><input type="radio" name="sex" value="1">男生</label>
                                        <label><input type="radio" name="sex" value="0">女生</label>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-primary">保存修改</button>
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