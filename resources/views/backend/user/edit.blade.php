@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>
                <a href="{{ route('user.index') }}">用户管理</a>
                </span>&nbsp; / &nbsp;
                <span>添加用户</span>
            </li>
        </ul>
    </div>
    <div class="card" style="margin-top: 5px;">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <form action="{{ route("backend.user.update", ['id'=>$user->id]) }}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="name">用户名称</label>
                            <input readonly type="text" name="name"  class="form-control  @error('name') is-invalid @enderror"  id="name" placeholder="输入用户名" value="{{ $user->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="email">邮箱</label>
                            <input readonly type="text" name="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="请输入邮箱地址"value="{{ $user->email }}">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="website">个人网站</label>
                            <input name="website" type="text" class="form-control @error('website') is-invalid @enderror" id="website" placeholder="此项可以不填写" value="{{ $user->website }}">
                            @error('website')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="weibo">微博</label>
                            <input name="weibo" type="text" class="form-control @error('weibo') is-invalid @enderror" id="weibo" placeholder="此项可以不填写" value="{{ $user->weibo }}">
                            @error('weibo')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="github">GitHub</label>
                            <input name="github" type="text" class="form-control @error('github') is-invalid @enderror" id="github" placeholder="此项可以不填写" value="{{ $user->github }}">
                            @error('github')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <label for="sequence">性别</label>
                        <select class="custom-select" name="sex">
                            <option value="1">男</option>
                            <option value="0">女</option>
                        </select>
                        <label for="sequence">是否为管理员</label>
                        <select class="custom-select" name="is_admin">
                            <option value="0">否</option>
                            <option value="1">是</option>
                        </select>
                        <div style="margin-top: 10px;">
                            <button type="submit" class="btn btn-success">保存</button>
                            <button type="reset" class="btn btn-warning">重置</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>

@endsection