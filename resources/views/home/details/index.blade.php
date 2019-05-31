@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card" >
                <div class="card-header">
                    <h5>武汉小康家庭，回武汉还是去上海？</h5>
                    <span class="post-cate"><a href="">节点</a></span>
                    <span class="post-cate"><a href="">发布作者</a></span>
                    <span class="post-cate">发表于&nbsp; 发布时间 </span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域
                        话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域
                        话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域
                        话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域
                        话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域
                        话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域
                        话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域
                        话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域话题摆放区域
                    </li>
                </ul>
            </div>
            <div class="card" style="margin-top: 10px;">
                <div class="card-header">
                    <span>共收到xx条回复</span>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="media">
                            <img class="mr-3" src="http://cdn.guanggoo.com//static/avatar/37/m_default.png" alt="Generic placeholder image">
                            <div class="media-body">
                                <span class="mt-0"><a href=""><span class="setting-description">评论人</span></a>&nbsp;<span class="setting-description">评论时间</span></span>
                                <span class="post-cate setting-description" style="float:right;">赞</span>
                                <p>评论内容，评论内容，评论内容，评论内容，评论内容，
                                    评论内容，评论内容，评论内容，评论内容
                                    ，评论内容，评论内容，评论内容，评论内容，评论内容，
                                    评论内容，评论内容，评论内容，评论内容，评论内容，评论内容，
                                    评论内容，评论内容，评论内容，评论内容，
                                    评论内容，评论内容，评论内容，评论内容，评论内容，评论内容，
                                    评论内容，评论内容，评论内容，评论内容，
                                </p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>

            {{--创建新评论区域--}}
            <div class="card" style="margin-top:10px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">创建新的回复</li>
                    <li class="list-group-item">
                        <form action="" method="">
                            <textarea rows="10" cols="106"></textarea>
                            <button type="button" class="btn btn-info">立即回复</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
        <!--右侧信息栏-->
        <div class="col-sm-3" style="margin-top: 15px;">
            <div class="card" >
                <div class="card-body">
                    信息栏
                </div>
            </div>
        </div>
    </div>
@endsection