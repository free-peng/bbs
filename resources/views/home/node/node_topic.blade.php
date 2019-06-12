@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-9">
                </div>
                <div class="container" style=" margin-top:15px;">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            @foreach($nodeTopics as $topic)
                                <li class="list-group-item">
                                    <div class="media">
                                        <img class="mr-3" src="{{ optional($topic->user)->avatar }}" alt="加载失败">
                                        <div class="media-body">
                                            <span class="badge badge-light" style="float:right; margin-top:10px;font-size:14px;">{{ $topic->pv }}</span>
                                            <h6 class="mt-0"><a href="">{{ $topic->title }}</a></h6>
                                            <span class="post-cate"><a href="">{{ optional($topic->nodes)->name }}</a></span>
                                            <span class="post-cate"><a href="">{{ optional($topic->user)->name }}</a></span>
                                            <span class="post-cate"><a href=""></a>{{ $topic->created_at }}</span>
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
