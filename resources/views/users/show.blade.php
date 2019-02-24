@extends('layouts.app')

@section('content')
<div class="container-fluid col-md-8">
    <div class="card">
        {{-- <img class="card-img-top" data-src="holder.js/100x180/?text=Image cap" alt="Card image cap"> --}}
        <div class="card-body">
            <h4 class="card-title text-center">用户信息</h4>
            {{-- <p class="card-text">Text</p> --}}
        </div>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">
                <div class="col-md-4">用户名:</div>
                <div class="col-md-8">{{$user->name}}</div>
            </li>
            <li class="list-group-item">
                <div class="col-md-4">邮箱:</div>
                <div class="col-md-8">{{$user->email}}</div>
                
            </li>
            <li class="list-group-item">
                <div class="col-md-4">创建时间:</div>
                <div class="col-md-8">{{$user->created_at}}</div>

            </li>
        </ul>
    </div>
</div>
@endsection