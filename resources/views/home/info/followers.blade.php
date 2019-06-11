@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left', ['id'=>$id,'meOrHe'=>$meOrHe])
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

        <div class="col-sm-3">
            <div class="card">
                <div class="card-body">
                    <img class="mr-3" src="" alt="加载失败" width=100% height=100%>
                    <div class="info-div">
                        <span class="info-span">话题</span>
                        <span class="info-span">粉丝</span>
                        <span class="info-span">喜欢</span>
                        <span class="info-span">15820</span>
                        <span class="info-span">8520</span>
                        <span class="info-span">96250</span>

                    </div>
                    @if (\Illuminate\Support\Facades\Request::has('id'))
                        <div class="info-div">.
                            <a href="{{ route('home.info.attention',['id'=>$id]) }}" type="button" class=" btn-light btn-block">关注</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection