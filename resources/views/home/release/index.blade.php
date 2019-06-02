@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card" style="margin-top:10px;">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>创建新的话题</strong></li>
                    <li class="list-group-item">
                        <form action="{{ route('home.release.save') }}" method="post">
                            {{csrf_field()}}
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>话题标题</label>
                                    <input type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="inputPassword3" placeholder="输入标题" value="{{ old('title') }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <label>选择节点</label>
                                    <select class="custom-select" name="node_id" class="form-control @error('node_id') is-invalid @enderror">
                                        <option>--请选择--</option>
                                        @foreach($nodeGroups as $group)
                                        <option disabled="disabled">{{ $group->name }}</option>
                                            @foreach($group->nodes as $node)
                                                <option value="{{ $node->id }}">&nbsp;--{{ $node->name }}</option>
                                            @endforeach
                                        @endforeach
                                    </select>
                                    @error('node_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-12">
                                    <textarea rows="10" name="content" id="create-content"  cols="106" class="form-control"></textarea>
                                    @error('content')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <button type="submit" class="btn btn-info">发表话题</button>
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