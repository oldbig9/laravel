@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            {{-- <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                </div>
            </div> --}}
            @auth
            <div class="card">
                <div class="card-header">
                    发表博客
                </div>
                <div class="card-body">
                    <form action="{{route('blogs.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" class="form-control" name="title" aria-describedby="helpId" placeholder="标题" value="{{old('title')}}">
                          {{-- <small id="helpId" class="form-text text-muted">Help text</small> --}}
                        </div>
                        <div class="form-group">
                            <label for=""></label>
                            <input type="text" name="content" class="form-control" placeholder="内容" aria-describedby="helpId" value="{{old('content')}}">
                          {{-- <small id="helpId" class="text-muted">Help text</small> --}}
                        </div>
                        <div class="form-group">
                          <label for=""></label>
                          <input type="text"
                            class="form-control" name="category_id" aria-describedby="helpId" placeholder="" value="1" >
                          <small id="helpId" class="form-text text-muted">category_id</small>
                        </div>
                        <button type="submit" class="btn btn-primary">发布</button>
                    </form>
                </div>
                {{-- <div class="card-footer text-muted">
                    
                </div> --}}
            </div>
            @endauth
            @foreach ($blogs as $blog)
            <div class="card mt-3">
                <div class="card-header">
                    {{$blog->title}}
                </div>
                <div class="card-body">
                    <p class="card-text">{{$blog->content}}</p>
                </div>
                <div class="card-footer text-muted">
                    <span>{{$blog->user->name}}</span>
                    <span>{{$blog->created_at}}</span>
                </div>
            </div>
            @endforeach
            {{$blogs->links()}}
        </div>
    </div>
</div>
@endsection
