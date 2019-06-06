@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>
                <a href="{{ route('link.index') }}">友情链接</a>
                </span>&nbsp; / &nbsp;
                <span>添加友情链接</span>
            </li>
        </ul>
    </div>
    <div class="card" style="margin-top: 5px;">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <form action="{{ route("backend.link.store") }}" method="post">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">网站名称</label>
                            <input type="text" name="name"  class="form-control  @error('name') is-invalid @enderror"  id="name" placeholder="输入导航" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control  @error('url') is-invalid @enderror" id="url" placeholder="输入URI格式"value="{{ old('url') }}">
                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sequence">排序</label>
                            <input name="sequence" type="text" class="form-control @error('sequence') is-invalid @enderror" id="sequence" placeholder="" value="{{ old('sequence') }}">
                            @error('sequence')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>

                        <label>是否显示</label>
                        <select class="custom-select" name="status">
                            <option value="1">显示</option>
                            <option value="0">隐藏</option>
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