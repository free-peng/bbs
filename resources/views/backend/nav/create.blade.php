@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>
                <strong>导航管理</strong>
                </span>&nbsp; / &nbsp;
                <span><a href="{{ url('backend/nav') }}">创建导航</a></span>
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
                           <input type="text" name="name" class="form-control" id="name" placeholder="输入导航">
                       </div>
                       <div class="form-group">
                           <label for="formGroupExampleInput2">URL</label>
                           <input type="text" name="url" class="form-control" id="formGroupExampleInput2" placeholder="输入URI格式">
                       </div>
                       <div class="form-group">
                           <label for="formGroupExampleInput2">排序</label>
                           <input name="sequence" type="text" class="form-control" id="formGroupExampleInput2" placeholder="">
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