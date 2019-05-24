@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    节点导航
                </div>
                <ul class="list-group list-group-flush">
                    @foreach($nodeGroups as $group)
                    <li class="list-group-item">
                       <div class="row">
                           <div class="col-sm-2">
                               <b>{{ $group->name }}</b>
                           </div>
                           <div class="col-sm-10">
                               @foreach($group->nodes as $node)
                               <a class="node" href="">{{ $node->name }}</a>
                               @endforeach
                           </div>
                       </div>
                    </li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
