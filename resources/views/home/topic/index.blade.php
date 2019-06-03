@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card" >
                <div class="card-header">
                    <h5>{{$topic->title}}</h5>
                    <span class="post-cate"><a href="">{{ optional($topic->nodes)->name }}</a></span>
                    <span class="post-cate"><a href="">{{ optional($topic->user)->name }}</a></span>
                    <span class="post-cate">发表于&nbsp; {{ $topic->careate_at }} </span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        {{ $topic->content }}
                    </li>
                </ul>
            </div>
            <div class="card" style="margin-top: 10px;">
                <div class="card-header">
                    <span>共收到xx条回复</span>
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($reviews as $review)
                    <li class="list-group-item">
                        <div class="media">
                            <img class="mr-3" src="http://cdn.guanggoo.com//static/avatar/37/m_default.png" alt="Generic placeholder image">
                            <div class="media-body">
                                <span class="mt-0"><a href=""><span class="setting-description">{{ $review->user->name }}</span></a>&nbsp;
                                    <span class="setting-description">{{ $review->create_at }}</span>
                                </span>
                                <span class="post-cate setting-description" style="float:right;">赞</span>
                                <p>{{ $review->content }}</p>
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
        <div class="col-sm-3" style="margin-top: 15px;">
            <div class="card" >
                <div class="card-body">
                    信息栏
                </div>
            </div>
        </div>
    </div>
@endsection