@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left')
        <div class="col-sm-7">
            <div class="card">
                <div class="card-body">
                    @foreach($followings as $following)
                    <div class="info-attention-span">
                        <a href="{{ route('home.info.index', ['id'=>$following->attentionUser->id]) }}">
                            <span><img src="{{ optional($following->attentionUser)->avatar }}" width="50" height="50"></span>
                        </a>
                         <div style="font-size: 13px;">
                             <a href="{{ route('home.info.index', ['id'=>$following->attentionUser->id]) }}">
                                 {{ optional($following->attentionUser)->name }}
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