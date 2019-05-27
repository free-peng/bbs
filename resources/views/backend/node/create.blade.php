@extends('layouts.backend')
@section('content')
<div class="card" style="margin-top: 5px;">
    <ul class="list-group list-group-flush">
        <li class="list-group-item">
                <span>
                <a href="{{ route('node.index') }}">节点管理</a>
                </span>&nbsp; / &nbsp;
            <span>创建节点</span>
        </li>
    </ul>
</div>
<div class="card" style="margin-top: 5px;">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-8">
                <form action="{{ route("backend.node.store") }}" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">节点名称</label>
                    <input type="text" name="name"  class="form-control  @error('name') is-invalid @enderror"  id="name" placeholder="输入节点名称" value="{{ old('name') }}">
                    @error('name')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="alias">节点别名</label>
                    <input type="text" name="alias"  class="form-control  @error('alias') is-invalid @enderror"  id="name" placeholder="输入节点别名" value="{{ old('name') }}">
                    @error('alias')
                    <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sequence">排序</label>
                    <input type="text" name="sequence"  class="form-control  @error('sequence') is-invalid @enderror"  id="name" placeholder="输入节点别名" value="{{ old('name') }}">
                    @error('sequence')
                    <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="sequence">选择组别</label>
                    <select class="custom-select" name="group_id">
                        <option selected>--请选择--</option>
                        @foreach($groups as $group)
                        <option value="{{ $group->id }}">{{ $group->name }}</option>
                        @endforeach
                    </select>
                </div>
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