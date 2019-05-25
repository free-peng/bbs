@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="row">
                <div class="col-sm-9">
                    <ul class="nav">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">默认排序</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">最新话题</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">精华主题</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">兴趣节点</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">关注的人</a>
                        </li>
                    </ul>
                </div>
                <div class="col-sm-2">
                    <button type="button" class="btn btn-primary" style="float: right;">发布新主题</button>
                </div>

                <div class="container" style=" margin-top:15px;">
                    <div class="card">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">
                                    <a class="home-index" href="">你问我答</a>
                                    <a class="home-index" href="">同城活动</a>
                                    <a class="home-index" href="">找工作</a>
                                    <a class="home-index" href="">IT技术</a>
                                    <a class="home-index" href="">金融财经</a>
                                    <a class="home-index" href="">创业创客</a>
                                    <a class="home-index" href="">城市建设</a>
                                    <a class="home-index" href="">社区新人必读</a>
                            </li>
                            @foreach($topics as $topic)
                            <li class="list-group-item">
                                <div class="media">
                                    <img class="mr-3" src="http://cdn.guanggoo.com//static/avatar/37/m_default.png" alt="Generic placeholder image">
                                    <div class="media-body">
                                        <span class="badge badge-light" style="float:right; margin-top:10px;font-size:14px;">9</span>
                                        <h6 class="mt-0"><a href="">{{ $topic->title }}</a></h6>
                                        {{--@foreach($topic->group as $group)--}}
                                        <span class="post-cate"><a href="">{{ $topic->group->name }}</a></span>
                                        {{--@endforeach--}}
                                        <span class="post-cate"><a href="">发布话题作者</a></span>
                                        <span class="post-cate"><a href="">{{ $topic->create_at }}</a></span>
                                    </div>
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

        </div>
        <div class="col-sm-3" style="background: green">
            后面广告位
        </div>
    </div>
@endsection
