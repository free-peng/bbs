@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-9">

            {{--创建新评论区域--}}
            <div class="card" style="margin-top:10px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">创建新的话题</li>
                    <li class="list-group-item">
                        <form action="" method="">
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" id="inputPassword3" placeholder="标题">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label for="sequence">选择节点</label>
                                    <select class="custom-select" name="nodes">
                                        <option>--请选择--</option>
                                        @foreach($nodeGroups as $group)
                                        <option disabled="disabled">{{ $group->name }}</option>
                                            @foreach($group->nodes as $node)
                                                <option value="{{ $node->id }}">&nbsp;--{{ $node->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                                <textarea rows="10" name="content" id="create-content"  cols="106" class="form-control"></textarea>

                            <button type="button" class="btn btn-info">发表话题</button>
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
@section("script")
<script>
    bkLib.onDomLoaded(function() {
        new nicEditor({iconsPath : 'static/js/nicEditorIcons.gif'}).panelInstance('create-content');
    });
</script>
@endsection