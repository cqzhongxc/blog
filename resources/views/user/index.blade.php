@extends('layouts.default')
@section('content')
    <div class="card">
        <div class="card-header">
            用户列表
        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                <tr>
                    <th width="80px">编号</th>
                    <th>昵称</th>
                    <th width="200px">操作</th>
                </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                    <tr>
                        <td scope="row">{{$user['id']}}</td>
                        <td>{{$user['name']}}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                @can('delete', $user)
                                    <form action="{{route('user.destroy', $user)}}" method="post">
                                        @csrf @method('DELETE')
                                        <button type="submit" class="btn btn-danger">删除</button>
                                    </form>
                                @endcan
                                @can('update', $user)
                                    <a href="{{route('user.edit', $user)}}" class="btn btn-info">编辑</a>
                                @endcan
                                <a href="{{route('user.show', $user)}}" class="btn btn-primary">查看</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            {{$users->links()}}
        </div>
    </div>

@endsection
