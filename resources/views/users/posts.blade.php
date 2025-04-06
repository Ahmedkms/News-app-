@extends('layout.app')

@section('title', 'Posts')

@section('content')
    <div class="col-12">
        <a href="{{ route('Post-create') }}" class="btn btn-primary my-3"> Add New Post</a>
        <h1 class="p-3 border text-center my-3">All Posts</h1>

        <!-- Table -->
        @if(session()->get('success'))
            <div class="alert alert-success">{{session()->get('success')}}</div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Writer</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach($user->posts as $post)
                <tr>
                    <td>{{$post->id}}</td>
                    <td>{{$post->title}}</td>
                    <td>{{Str::limit($post->description,50)}}</td>
                    <td>{{$post->user->name}}</td>
                    <td>
                        <a href="{{ route('edit-post',$post->id) }}" class="btn btn-info">Edit</a>
                    </td>
                    <td>
                        <form action="{{ url('post/'.$post->id) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
