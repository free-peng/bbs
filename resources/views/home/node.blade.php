@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-sm-9">
            <div class="card">
                <div class="card-header">
                    节点导航
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                       <div class="row">
                           <div class="col-sm-2"><h5>Code</h5></div>
                           <div class="col-sm-10">
                               <a class="node" href="">PHP</a>
                           </div>
                       </div>
                    </li>
                </ul>
            </div>
        </div>
        <div class="col-sm-3"></div>
    </div>
@endsection
