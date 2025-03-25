@extends('layout.app')

@section('title', 'home')

@section('content')

    <div class="col-12">
        <h1 class="p-3  text-center my-3">Add New Posts</h1>
        <form action="{{ route('post-store') }}" method="POST" class="form border b-3">
            @csrf
            @if(session()->get('success') !=null)
            <div class="alert alert-success">{{session()->get('success')}}</div>
            @endif
            <div class="mb-3">
                <label class="label"> post title</label>
                <input type="text" class="form-control" name="title" value="{{ old('title') }}">
            </div>
            @error('title')
            <div class="alert alert-danger sm"> {{$message}}</div>
            @enderror
            <div class="mb-3">
                <label class="label"> post description </label>
            </div>
            <textarea name="description" class="form-control" rows="7" >{{ old('description') }}</textarea>

            <div class="mb-3">
                <div class="label">writer</div>
                <select name="user_id" class="form-control">
                    <option value="1">mostafa</option>
                    <option value="2">ahmed</option>

                </select>
            </div>
            @error('user_id')
            <div class="alert alert-danger sm"> {{$message}}</div>
            @enderror
            <div class="mb-3" >
                <input type="submit" class="form-control bg-primary"  value="add new user">
            </div>
        </form>
    </div>
@endsection
