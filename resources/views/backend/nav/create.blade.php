@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>
                <a href="{{ url('backend/nav') }}">导航管理</a>
                </span>&nbsp; / &nbsp;
                <span>创建导航</span>
            </li>
        </ul>
    </div>
    <div class="card" style="margin-top: 5px;">
        <div class="card-body">
           <div class="row">
               <div class="col-sm-8">
                   <form action="{{ route("backend.nav.store") }}" method="post">
                       {{csrf_field()}}
                       <div class="form-group">
                           <label for="name">导航名称</label>
                           <input type="text" name="name" class="form-control" id="name" placeholder="输入导航" value="{{ old('name') }}">
                       </div>
                       <div class="form-group">
                           <label for="formGroupExampleInput2">URL</label>
                           <input type="text" name="url" class="form-control" id="formGroupExampleInput2" placeholder="输入URI格式"value="{{ old('url') }}">
                       </div>
                       <div class="form-group">
                           <label for="formGroupExampleInput2">排序</label>
                           <input name="sequence" type="text" class="form-control" id="formGroupExampleInput2" placeholder="" value="{{ old('sequence') }}">
                       </div>
                       <select class="custom-select">
                           <option selected>--请选择--</option>
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