@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-9">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="">默认排序</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home').'?tab=latest' }}">最新话题</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home').'?tab=elite' }}">精华主题</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home.interest') }}">兴趣节点</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('home',['tab'=>'following']) }}">关注的人</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <a href="{{ route('home.release.index') }}" class="btn btn-primary" style="float: right; color:#FFFFFF">发布新主题</a>
                </div>

                <div class="container" style=" margin-top:15px;">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                @foreach($nodeGroups as $group)
                                    @foreach($group->nodes as $node)
                                        <a class="home-index" href="{{ route('home.node.node_topic', ['node_id'=>$node->id]) }}">{{ $node->name }}</a>
                                    @endforeach
                                @endforeach
                            </li>
                            @foreach($nodeGroups as $group)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-sm-2">
                                            <b>{{ $group->name }}</b>
                                        </div>
                                        <div class="col-sm-10">
                                            @foreach($group->nodes as $node)
                                                <a class="node" href="{{ route('home.node.node_topic',['node_id'=>$node->id]) }}">{{ $node->name }}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-3">
            @include('layouts/links')
            @include('layouts/popular')
        </div>
    </div>
@endsection
