<div class="col-sm-3">
    <div class="card">
        <div class="card-body">
            <img class="mr-3" src="{{ $user->avatar }}" alt="加载失败" width=100% height=100%>
            <div class="info-div">
                <span class="info-span">话题</span>
                <span class="info-span">粉丝</span>
                <span class="info-span">喜欢</span>
                <span class="info-span">{{ optional($user->topic)->count() }}</span>
                <span class="info-span">{{ optional($user->attention)->count() }}</span>
                <span class="info-span">{{ optional($user->collection)->count() }}</span>

            </div>
            @if ($meOrHe == '他')
                <div class="info-div">.
                    @if ($isAttention == 0)
                    <a href="{{ route('home.info.attention',['id'=>$id]) }}" type="button" class=" btn-light btn-block">关注</a>
                    @else
                    <a href="{{ route('home.info.deleteAttention',['id'=>$id]) }}" type="button" class=" btn-light btn-block">取消关注</a>
                    @endif
                </div>
            @endif
        </div>
    </div>
</div>

