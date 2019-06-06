@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>链接管理</span>
                </span>
                <span  class="btn btn-primary btn-sm" style="float:right;">
                     <a href="{{ url('backend/link/create') }}" style="color: #ffffff;">添加友情链接</a>
                </span>
            </li>
            <li class="list-group-item">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="name" type="search" placeholder="请输入名称" aria-label="Search">
                    <button class="btn btn-outline-success my-1 my-sm-0" type="submit">搜索</button>
                </form>
            </li>
        </ul>
    </div>
    @include('layouts/delete')
    <div class="card" style="margin-top: 5px;">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">网站名称</th>
                    <th scope="col">URL</th>
                    <th scope="col">排序</th>
                    <th scope="col">状态</th>
                    <th scope="col">创建人</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($links as $link)
                    <tr>
                        <td>{{ $link->name }}</td>
                        <td>{{ $link->url }}</td>
                        <td>{{ $link->sequence }}</td>
                        <td>{{ $link->status }}</td>
                        <td>{{ optional($link->user)->name }}</td>
                        <td>{{ $link->created_at }}</td>
                        <td>
                            <a href="{{ route('backend.link.edit', ['id'=>$link->id]) }}">编辑</a>
                            <a class="link-delete" href="javascript:void(0)" data-href="{{ route('backend.link.destroy', ['id'=>$link->id]) }}">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection

@section("script")
    <script>
        $(function() {
            $(".link-delete").click(function() {
                $.ajax({
                    url: $(this).attr("data-href"),
                    type: "delete",
                    dataType: "json",
                    success: function (data) {
                        if (data.status == true) {
                            $('.delete-div').css('display','block');
                            window.location.reload();
                        }
                    },
                    error: function() {
                        console.log('error')
                    }
                });
            });
        });
    </script>
@endsection
