@extends('layouts.app')
@section('content')
<div class="row">
    <div class="col-sm-9">
        <div class="card" >
            <div class="card-body">
                <div class="setting-border">
                    <h5 class="card-title">发布的文章</h5>
                </div>
                <div class="row">
                    <div class="col-sm-1"></div>
                    <div class="col-sm-11" style="margin-top: 20px;">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                <div class="media">
                                    <img class="mr-3" src="http://cdn.guanggoo.com//static/avatar/37/m_default.png" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <span class="badge badge-light" style="float:right; margin-top:10px;font-size:14px;">9</span>
                                        <h6 class="mt-0"><a href="">河南某高中只让高三的两个重点班用空调582</a></h6>
                                        {{--@foreach($topic->group as $group)--}}
                                        <span class="post-cate"><a href="">节点</a></span>
                                        {{--@endforeach--}}
                                        <span class="post-cate"><a href="">发布话题作者</a></span>
                                        <span class="post-cate">发布时间</span>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layouts/info')
</div>
@endsection