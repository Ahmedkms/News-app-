@extends('layout.app')

@section('title', 'create user')

@section('content')
    <div class="col-12">
        <h1 class="my-3 text-center">update User</h1>
    </div>

    <div class="col-6 mx-auto">
        @if (session()->get('success'))
            <div class="alert alert-success">{{ session()->get('success') }}</div>
        @endif
        <form action="{{ route('users.update',$user->id) }}" method="POST" class="form border p-3">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ $user->name }}" class="form-control">
            </div>
            @error('name')
                <div class="alert alert-danger sm"> {{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" id="email" class="form-control">
            </div>
            @error('email')
                <div class="alert alert-danger sm"> {{ $message }}</div>
            @enderror

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            @error('password')
                <div class="alert alert-danger sm"> {{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="password">confirm Password</label>
                <input type="password" name="password_confirmation" id="password" class="form-control">
            </div>
            @error('password_confirmation')
                <div class="alert alert-danger sm"> {{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="">Type</label>
                <select name="type" id="" class="form-control">
                    <option value="admin" {{ $user->type == 'admin' ?'selected' : '' }}>Admin</option>
                    <option value="writer" {{ $user->type == 'writer' ?'selected' : '' }}>Writer</option>
                </select>
            </div>

            <div class="mb-3">
                <input type="submit" value="save" class="form-control bg-success text-white">
            </div>

        </form>
    </div>

@endsection
