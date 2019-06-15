@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left')
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    @foreach($followers as $follower)
                        <div class="info-attention-span">
                            <a href="{{ route('home.info.index', ['id'=>$follower->attentionUser->id]) }}">
                                <span><img src="{{ optional($follower->attentionUser)->avatar }}" width="65" height="65"></span>
                            </a>
                            <div style="font-size: 13px;">
                                <a href="{{ route('home.info.index', ['id'=>$follower->attentionUser->id]) }}">
                                    {{ optional($follower->attentionUser)->name }}
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        @include('layouts.info_right')

    </div>
@endsection