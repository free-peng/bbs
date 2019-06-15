@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left')
        <div class="col-sm-7">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($topics as $topic)
                        <li class="list-group-item">
                            <div class="media">
                                <img class="mr-3" src="{{ optional($topic->user)->avatar }}" alt="Generic placeholder image">
                                <div class="media-body">
                                    @if(request('id') == \Illuminate\Support\Facades\Auth::user()->id)
                                    <span class="" style="float:right; margin-top:10px;font-size:14px;"><a href="{{ route('home.info.destroy', ['id'=>$topic->id]) }}">删除</a></span>
                                    <span style="float:right; margin-top:10px;font-size:14px;"><a href="{{ route('home.info.edit', ['id'=>$topic->id]) }}">编辑</a>&nbsp;&nbsp;</span>
                                    @endif
                                    <h6 class="mt-0"><a href="{{ route('home.topic.index', ['id'=>$topic->id]) }}">{{ $topic->title }}</a></h6>
                                    <span class="post-cate"><a href="">{{ optional($topic->nodes)->name }}</a></span>
                                    <span class="post-cate"><a href="">{{ optional($topic->user)->name }}</a></span>
                                    <span class="post-cate">{{ $topic->created_at }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $topics->links() }}
            </div>
        </div>
        @include('layouts.info_right')
    </div>
@endsection