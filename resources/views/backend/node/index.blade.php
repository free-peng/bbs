@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>节点管理</span>
                </span>
                <span  class="btn btn-primary btn-sm" style="float:right;">
                     <a href="{{ route('backend.node.create') }}" style="color: #ffffff;">添加节点</a>
                </span>
            </li>
            <li class="list-group-item">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="name" type="search" placeholder="请输入节点名称" aria-label="Search">
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
                    <th scope="col">节点名称</th>
                    <th scope="col">节点分组</th>
                    <th scope="col">节点别名</th>
                    <th scope="col">排序</th>
                    <th scope="col">状态</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>

                @foreach($nodes as $node)
                    <tr>
                        <td>{{ $node->name }}</td>
                        <td>{{ $node->group->name }}</td>
                        <td>{{ $node->alias }}</td>
                        <td>{{ $node->sequence }}</td>
                        <td>{{ $node->status }}</td>
                        <td>{{ $node->created_at }}</td>
                        <td>
                            <a href="{{ route('backend.node.edit', ['id'=>$node->id]) }}">编辑</a>
                            <a class="node-delete" data-href="{{ route('backend.node.destroy', ['id'=>$node->id]) }}" href="javascript:void(0)">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $nodes->links() }}
        </div>

    </div>
@endsection
@section("script")
    <script>
        $(function() {
            $(".node-delete").click(function() {
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
