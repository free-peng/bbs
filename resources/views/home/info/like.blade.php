@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left')
        <div class="col-sm-7">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($likes as $like)
                        <li class="list-group-item">
                            <div class="media">
                                <img class="mr-3" src="{{ optional($like->user)->avatar }}" alt="失败" height="50" width="50">
                                <div class="media-body">
                                    <h6 class="mt-0"><a href="{{ route('home.topic.index',['id'=>optional($like->topic)->id])}}">{{ optional($like->topic)->title }}</a></h6>
                                    <span class="post-cate">{{ optional($like->user)->name }}在 {{ $like->created_at }} 赞了话题</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $likes->links() }}
            </div>
        </div>
        @include('layouts.info_right')
    </div>
@endsection