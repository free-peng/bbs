<div class="card" style="margin-top: 15px;">
    <div class="card-header">
        友情链接
    </div>
    <ul class="list-group list-group-flush">
        @foreach($links as $link)
            <li class="list-group-item">
                <a href="{{ $link->url }}">{{ $link->name }}</a>
            </li>
        @endforeach
    </ul>
</div>