@extends('layout.app')

@section('title', 'Posts')

@section('content')
    <div class="col-12">
        <a href="{{ route('users.create') }}" class="btn btn-primary my-3"> Add New user</a>
        <h1 class="p-3 border text-center my-3">All users</h1>

        <!-- Table -->
        @if(session()->get('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>name</th>
                    <th>email</th>
                    <th>type</th>
                    <th>Posts</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{!! $user->type() !!}</td>
                    <td>
                        <a href="{{ route('users.edit',$user->id) }}" class="btn btn-info">Edit</a>
                    </td>
                    <td>
                        <a href="{{ route('user.posts',$user->id) }}" class="btn btn-primary">posts</a>
                    </td>
                    <td>
                        <form action="{{ route('users.destroy',$user->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
            {{ $users->links() }}
        </div>

    </div>
@endsection
