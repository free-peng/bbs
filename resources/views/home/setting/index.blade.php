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
                            <form>
                                <div class="form-group row">
                                    <strong for="inputEmail3" class="col-sm-2 col-form-label">用户名</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputEmail3" placeholder="">
                                        <span class="setting-description">用户名由字母开头，只能含有字母、数字或者下划线</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">E-mail</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                        <span class="setting-description">你的E-mail，便于登录和找回密码</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">昵称</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                        <span class="setting-description">你的昵称，便于其他人更好的认识你</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">个性签名</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                        <span class="setting-description">你的签名，将展示在你的个人资料页面</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">城市</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                        <span class="setting-description">你的城市，有助于后续你在社区的交友</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">个人网站</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                        <span class="setting-description">你就读的院校，让你的朋友了解你更多一点</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">公司</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                        <span class="setting-description">你所在的公司，让你的朋友了解你更多一点</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">豆瓣用户名</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                        <span class="setting-description">你的豆瓣用户名，用以在你的个人页面展示你正在读的书。</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">个人简介</strong>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="inputPassword3" placeholder="">
                                        <span class="setting-description">可以稍微详细的介绍自己。</span>
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