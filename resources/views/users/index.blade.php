@extends('layouts.app')

@section('content')
    <div class="card container-fluid col-md-8">
        <div class="card-header">
            用户列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue"> 全选
                                </label>
                            </div>
                        </th>
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>操作</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td scope="row">
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    <input class="form-check-input" type="checkbox" name="" id="" value="checkedValue">
                                </label>
                            </div>
                        </td>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="btn-group">
                                <form action="{{route('users.show',['id'=>$user->id])}}" method="get">
                                    <button type="submit" class="btn btn-sm btn-outline-success">查看</button>
                                </form>
                                @can('update', $user)
                                    <form action="{{route('users.edit',$user)}}" method="get">
                                        <button type="submit" class="btn btn-sm btn-outline-info">编辑</button>
                                    </form>
                                @endcan
                                @can('delete',$user )
                                    <form action="{{route('users.destroy',$user)}}" method="post">
                                        @csrf @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">删除</button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="container-fluid text-muted">
            {{$users->links()}}
        </div>
    </div>
   
@endsection
