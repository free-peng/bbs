@extends('layouts.backend')
@section('content')
    <div class="card" style="margin-top: 5px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <span>导航管理</span>
                </span>
                <span  class="btn btn-primary btn-sm" style="float:right;">
                     <a href="{{ url('backend/nav/create') }}" style="color: #ffffff;">添加导航</a>
                </span>
            </li>
            <li class="list-group-item">
                <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" name="name" type="search" placeholder="请输入导航名称" aria-label="Search">
                    <button class="btn btn-outline-success my-1 my-sm-0" type="submit">搜索</button>
                </form>
            </li>
        </ul>
    </div>
    <div class="card" style="margin-top: 5px;">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">序号</th>
                    <th scope="col">导航名称</th>
                    <th scope="col">URL</th>
                    <th scope="col">排序</th>
                    <th scope="col">状态</th>
                    <th scope="col">创建时间</th>
                    <th scope="col">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($navItems as $nav)
                    <tr>
                        <td>1</td>
                        <td>{{ $nav->name }}</td>
                        <td>{{ $nav->url }}</td>
                        <td>{{ $nav->sequence }}</td>
                        <td></td>
                        <td>{{ $nav->created_at }}</td>
                        <td>
                            <a href="">编辑</a>
                            <a href="{{ route('backend.nav.destroy', ['id' => $nav->id]) }}">删除</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        {{ $navItems->links() }}
    </div>
@endsection
