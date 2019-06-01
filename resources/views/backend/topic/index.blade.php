@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>话题管理</span>
                </span>
                <span  class="btn btn-primary btn-sm" style="float:right;">
                     <a href="{{ route('backend.topic.create') }}" style="color: #ffffff;">添加节点</a>
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
                    <th scope="col">序号</th>
                    <th scope="col">标题</th>
                    <th scope="col">节点</th>
                    <th scope="col">作者</th>
                    <th scope="col">阅读数</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($topics as $topic)
                    <tr>
                        <td>{{ 1 }}</td>
                        <td><a href="">{{ $topic->title }}</a></td>
                        <td>{{ optional($topic->nodes)->name}}</td>
                        <td>{{ optional($topic->user)->name }}</td>
                        <td>{{ $topic->pv }}</td>
                        <td>{{ $topic->create_at }}</td>
                        <td>
                            <a class="topic-delete" data-href="{{ route('backend.topic.destroy', ['id'=>$topic->id]) }}" href="javascript:void(0)">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $topics->links() }}
        </div>
    </div>

@endsection
@section("script")
    <script>
        $(function() {
            $(".topic-delete").click(function() {
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
