@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>用户管理</span>
                </span>
                <span  class="btn btn-primary btn-sm" style="float:right;">
                     <a href="{{ route('backend.user.create') }}" style="color: #ffffff;">添加用户</a>
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
                    <th scope="col">名称</th>
                    <th scope="col">邮箱</th>
                    <th scope="col">性别</th>
                    <th scope="col">个人网站</th>
                    <th scope="col">微博</th>
                    <th scope="col">GitHub</th>
                    <th scope="col">管理员</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->sex }}</td>
                        <td>{{ $user->website }}</td>
                        <td>{{ $user->weibo }}</td>
                        <td>{{ $user->github }}</td>
                        <td>{{ $user->is_admin }}</td>
                        <td>{{ $user->create_at }}</td>
                        <td>
                            <a href="{{ route('backend.user.edit', ['id'=>$user->id]) }}">编辑</a>
                            <a class="user-delete" href="javascript:void(0)" data-href="{{ route('backend.user.destroy', ['id' => $user->id]) }}">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>

@endsection

@section("script")
    <script>
        $(function() {
            $(".user-delete").click(function() {
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
