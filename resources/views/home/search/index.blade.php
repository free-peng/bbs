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
                            @foreach($searchItems as $search)
                            <li class="list-group-item">
                                <div class="media">
                                    <a href="{{ route('home.info.index',['id'=>optional($search->user)->id]) }}">
                                        <img class="mr-3" src="{{ optional($search->user)->avatar }}" alt="失败">
                                    </a>
                                    <div class="media-body">
                                        <span class="badge badge-light" style="float:right; margin-top:10px;font-size:14px;">{{ $search->pv }}</span>
                                        <h6 class="mt-0"><a href="">{{ $search->title }}</a></h6>
                                        <span class="post-cate"><a href="{{ route('home.node.node_topic',['node_id'=>optional($search->nodes)->id]) }}">{{ optional($search->nodes)->name }}</a></span>
                                        <span class="post-cate"><a href="{{ route('home.info.index',['id'=>optional($search->user)->id]) }}">{{ optional($search->user)->name }}</a></span>
                                        <span class="post-cate"><a href=""></a>{{ $search->created_at }}</span>
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
