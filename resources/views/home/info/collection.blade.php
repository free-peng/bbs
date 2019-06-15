@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left')
        <div class="col-sm-7">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($collections as $collection)
                        <li class="list-group-item">
                            <div class="media">
                                <img class="mr-3" src="{{ optional($collection->user)->avatar }}" alt="失败">
                                <div class="media-body">
                                    <h6 class="mt-0"><a href="{{ route('home.topic.index', ['id'=>optional($collection->topic)->id]) }}">{{ optional($collection->topic)->title }}</a></h6>
                                    <span class="post-cate"><a href="">{{ optional($collection->topic->nodes)->name }}</a></span>
                                    <span class="post-cate"><a href="">{{ optional($collection->user)->name }}</a></span>
                                    <span class="post-cate">{{ optional($collection->topic)->created_at }}</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
                {{ $collections->links() }}
            </div>
        </div>

        @include('layouts.info_right')

    </div>
@endsection