@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>
                <a href="{{ url('backend/nav') }}">导航管理</a>
                </span>&nbsp; / &nbsp;
                <span>编辑导航</span>
            </li>
        </ul>
    </div>
    <div class="card" style="margin-top: 5px;">
        <div class="card-body">
            <div class="row">
                <div class="col-sm-8">
                    <form action="{{ route("backend.nav.update", ['id'=>$id]) }}" method="post">
                        {{csrf_field()}}
                        @foreach($nav as $value)
                        <input type="hidden" name="_method" value="put">
                        <div class="form-group">
                            <label for="name">导航名称</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $value->name }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="url">URL</label>
                            <input type="text" name="url" class="form-control @error('url') is-invalid @enderror" id="url" value="{{ $value->url }}">
                            @error('url')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="sequence">排序</label>
                            <input name="sequence" type="text" class="form-control @error('sequence') is-invalid @enderror" id="sequence" value="{{ $value->sequence }}">
                            @error('sequence')
                            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <select class="custom-select">
                            <option selected>--请选择--</option>
                            <option value="1">显示</option>
                            <option value="0">隐藏</option>
                        </select>
                        @endforeach
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