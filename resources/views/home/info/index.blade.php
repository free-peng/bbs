@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left', ['id'=>$id,'meOrHe'=>$meOrHe])
        <div class="col-sm-7">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($topics as $topic)
                        <li class="list-group-item">
                            <div class="media">
                                <img class="mr-3" src="{{ optional($topic->user)->avatar }}" alt="Generic placeholder image">
                                <div class="media-body">
                                    <span class="" style="float:right; margin-top:10px;font-size:14px;"><a href="{{ route('home.info.destroy', ['id'=>$topic->id]) }}">删除</a></span>
                                    <span style="float:right; margin-top:10px;font-size:14px;"><a href="{{ route('home.info.edit', ['id'=>$topic->id]) }}">编辑</a>&nbsp;&nbsp;</span>
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