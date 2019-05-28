@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card" >
                <div class="card-body">
                    <div class="setting-border">
                        <h5 class="card-title">用户头像设置</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-1"></div>
                        <div class="col-sm-11" style="margin-top: 20px;">
                            <form>
                                <div class="form-group row">
                                    <strong for="inputEmail3" class="col-sm-2 col-form-label">头像</strong>
                                    <div class="col-sm-9">
                                        <img src="http://cdn.guanggoo.com//static/avatar/86/m_default.png">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <strong for="inputPassword3" class="col-sm-2 col-form-label">上传</strong>
                                    <div class="col-sm-9">
                                        <input type="file" name=""><br>
                                        </p><span class="setting-description">请选择要上传的头像文件</span>
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