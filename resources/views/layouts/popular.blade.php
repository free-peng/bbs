<div class="card" style="margin-top:15px;">
    <div class="card-header">
        热门话题
    </div>
    <ul class="list-group list-group-flush">
        @foreach($popularTopics as $popular)
            <li class="list-group-item">
                <div class="media">
                    <img class="mr-3" src="http://cdn.guanggoo.com//static/avatar/37/m_default.png" width="20" height="20">
                    <div class="media-body">
                        <a href="{{ route('home.topic.index',['id'=>$popular->id]) }}">{{ $popular->title }}</a>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>