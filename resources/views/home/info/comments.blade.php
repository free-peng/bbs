@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left', ['id'=>$id,'meOrHe'=>$meOrHe])
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
                            <a href="" type="button" class=" btn-light btn-block">关注</a>
                        </div>
                    @endif
                </div>
            </div>
        </div>

    </div>
@endsection