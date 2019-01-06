@extends('layouts.app')

@section('content')
    <div class="container-fluid col-md-8">
        <form action="{{route('password.send')}}" method="post">
            @csrf
            <div class="form-group">
              <label for="">验证邮箱</label>
              <input type="email" class="form-control" name="email" aria-describedby="emailHelpId" placeholder="">
            </div>
            <button type="submit" class="btn btn-primary">发送</button>
        </form>
        
    </div>
@endsection