@extends('layout.app')

@section('title', 'home')

@section('content')


    <div class="col-12">
        <h1 class="p-3  text-center my-3">Edit Post</h1>
        <form action="{{ url('post-update/' .$post->id) }}" method="Post" class="form border b-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="label"> post title</label>
                <input type="text" class="form-control" name="title" value="{{ $post->title }}">
            </div>
            @error('title')
            <div class="alert alert-danger "> {{$message}}</div>
            @enderror
            <div class="mb-3">
                <label class="label"> post description </label>
            </div>
            <textarea name="description" class="form-control" rows="7" id="">{{ $post->description }}</textarea>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <div class="label">writer</div>
                <select name="user_id" class="form-control">

                    <option value="{{ $user->id }}">
                        {{ $user->name }}
                    </option>


                </select>
            </div>
            @error('user_id')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <input type="submit" class="form-control bg-primary" value="update post">
            </div>
        </form>
    </div>
@endsection
