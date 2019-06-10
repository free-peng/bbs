@extends('layouts.app')
@section('content')
    <div class="row">
        @include('layouts.info_left', ['id'=>$id,'meOrHe'=>$meOrHe])
        <div class="col-sm-7">
            <div class="card">
                <ul class="list-group list-group-flush">
                    @foreach($likes as $like)
                        <li class="list-group-item">
                            <div class="media">
                                <img class="mr-3" src="{{ optional($like->user)->avatar }}" alt="Generic placeholder image">
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