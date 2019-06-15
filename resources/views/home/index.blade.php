@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-9">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="{{ route('home') }}">默认排序</a>
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
                                @foreach($nodes as $node)
                                    <a class="home-index" href="{{ route('home.node.node_topic',['node_id'=>$node->id]) }}">{{ $node->name }}</a>
                                @endforeach
                            </li>
                            @foreach($topics as $topic)
                            <li class="list-group-item">
                                <div class="media">
                                    <a href="{{ route('home.info.index',['id'=>optional($topic->user)->id]) }}">
                                        <img class="mr-3" src="{{ optional($topic->user)->avatar }}" alt="失败" width="50" height="50">
                                    </a>
                                    <div class="media-body">
                                        <span class="badge badge-light" style="float:right; margin-top:10px;font-size:14px;">{{ $topic->pv }}</span>
                                        <h6 class="mt-0"><a href="{{route('home.topic.index', ['id'=>$topic->id])}}">{{ $topic->title }}</a></h6>
                                        <span class="post-cate"><a href="{{ route('home.node.node_topic',['node_id'=>optional($topic->nodes)->id]) }}">{{ optional($topic->nodes)->name }}</a></span>
                                        <span class="post-cate"><a href="{{ route('home.info.index',['id'=>optional($topic->user)->id]) }}">{{ optional($topic->user)->name }}</a></span>
                                        <span class="post-cate">{{ $topic->created_at }}</span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                        {{ $topics->links() }}
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
