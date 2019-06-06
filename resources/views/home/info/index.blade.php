@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card" >
                <div class="card-body">
                    <div class="setting-border">
                        <h5 class="card-title">发布的文章</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-12" style="margin-top: 20px;">
                            <ul class="list-group list-group-flush">
                                @foreach($topics as $topic)
                                <li class="list-group-item">
                                    <div class="media">
                                        <img class="mr-3" src="http://cdn.guanggoo.com//static/avatar/37/m_default.png" alt="Generic placeholder image">
                                        <div class="media-body">
                                            <span class="" style="float:right; margin-top:10px;font-size:14px;"><a href="{{ route('home.info.destroy', ['id'=>$topic->id]) }}">删除</a></span>
                                            <span style="float:right; margin-top:10px;font-size:14px;"><a href="{{ route('home.info.edit', ['id'=>$topic->id]) }}">编辑</a>&nbsp;&nbsp;</span>
                                            <h6 class="mt-0"><a href="{{ route('home.topic.index', ['id'=>$topic->id]) }}">{{ $topic->title }}</a></h6>
                                            {{--@foreach($topic->group as $group)--}}
                                            <span class="post-cate"><a href="">{{ optional($topic->nodes)->name }}</a></span>
                                            {{--@endforeach--}}
                                            <span class="post-cate"><a href="">{{ optional($topic->user)->name }}</a></span>
                                            <span class="post-cate">{{ $topic->created_at }}</span>
                                        </div>
                                    </div>
                                </li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts/info')
    </div>
@endsection