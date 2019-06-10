<div class="col-sm-2">
    <div class="card">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>{{ $meOrHe }}的创作</b></li>
            <li class="list-group-item"><a href="{{ route('home.info.index',['id'=>$id]) }}">{{ $meOrHe }}的话题</a></li>
        </ul>
    </div>
    <div class="card" style="margin-top:15px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>{{ $meOrHe }}的互动</b></li>
            <li class="list-group-item"><a href="{{ route('home.info.comments',['id'=>$id]) }}">{{ $meOrHe }}的回复</a></li>
            <li class="list-group-item"><a href="">{{ $meOrHe }}的收藏</a></li>
            <li class="list-group-item"><a href="{{ route('home.info.like',['id'=>$id]) }}">{{ $meOrHe }}的点赞</a></li>
        </ul>
    </div>

    <div class="card" style="margin-top:15px;">
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><b>{{ $meOrHe }}的关系</b></li>
            <li class="list-group-item"><a href="">{{ $meOrHe }}的关注</a></li>
            <li class="list-group-item"><a href="">{{ $meOrHe }}的粉丝</a></li>
        </ul>
    </div>
</div>