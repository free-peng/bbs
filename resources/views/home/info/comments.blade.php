@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left')
        <div class="col-sm-7">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($comments as $comment)
                        <li class="list-group-item">
                            <div class="media">

                                <div class="media-body">
                                    <span class="post-cate" style="background:#eff6ff; ">回复了  <a href="{{ route('home.info.index',['id'=>optional($comment->topic->user)->id]) }}">
                                            {{ optional($comment->topic->user)->name }}</a> 创建的话题
                                        <a href="{{ route('home.topic.index',['id'=>optional($comment->topic)->id])}}">{{ optional($comment->topic)->title }}</a></span>
                                    <div style="margin-top: 5px;">{{ $comment->content }}</div>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $comments->links() }}
            </div>
        </div>

        @include('layouts.info_right')

    </div>
@endsection