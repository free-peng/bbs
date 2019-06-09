
@extends('layouts.app')
@section('content')

    <div class="row">
        <div class="col-sm-9">
            <div class="card" >
                <div class="card-header">
                    <h5>{{$topic->title}}</h5>
                    <span class="post-cate"><a href="">{{ optional($topic->nodes)->name }}</a></span>
                    <span class="post-cate"><a href="">{{ optional($topic->user)->name }}</a></span>
                    <span class="post-cate">发表于&nbsp; {{ $topic->created_at }} </span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        {{ $topic->content }}
                    </li>
                    <li class="list-group-item">
                        <span style="float:right;">
                            <span>{{ $topic->pv }}&nbsp;次点击</span>
                            @if($like === 0 || $link = false)
                            <span><a href="{{ route('home.topic.like', ['id' => $topic->id]) }}">点赞</a>&nbsp;{{ optional($topic->like)->count() }}</span>
                            @else
                                <span><a href="javaScript:void(0)">已点赞</a>&nbsp;{{ optional($topic->like)->count() }}</span>
                            @endif
                        </span>
                    </li>
                </ul>
            </div>
            <div class="card" style="margin-top: 10px;">
                <div class="card-header">
                    <span>共收到{{ optional($topic->comments)->count() }}条回复</span>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($topic->comments as $comment)
                    <li class="list-group-item">
                        <div class="media">
                            <img class="mr-3" src="{{ $comment->user->avatar }}" alt="加载失败">
                            <div class="media-body">
                                <span class="mt-0"><a href=""><span class="setting-description">{{ $comment->user->name }}</span></a>&nbsp;
                                    <span class="setting-description">{{ $comment->created_at }}</span>
                                </span>
                                <span class="post-cate setting-description" style="float:right;">
                                    <a href="{{ route('home.topic.reviewsLike',['id'=>$comment->id]) }}">赞</a> {{ $comment->likes }}
                                </span>
                                <p>{{ $comment->content }}</p>
                            </div>
                        </div>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{--创建新评论区域--}}
            <div class="card" style="margin-top:10px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">创建新的回复</li>
                    <li class="list-group-item">
                        <form action="{{ route('home.topic.reviewSave') }}" method="post">
                            {{csrf_field()}}
                            <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                            <textarea name="content" rows="10" cols="106"></textarea>
                            <button type="submit" class="btn btn-info">立即回复</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!--右侧信息栏-->
        <div class="col-sm-3">
            @include('layouts/links')

            @include('layouts/popular')
        </div>
    </div>
@endsection