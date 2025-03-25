@extends('layout.app')

@section('title','show')

@section('content')
<div class="col-12">
  <h1 class="p-3 border text-center my-3">post details</h1>
</div>

<div class="col-12 mb-4"> <!-- Added mb-4 for spacing -->
  <div class="card">
    <div class="card-header">
      {{ $post->user->name }} {{ $post->created_at->format('y-m-d') }}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">
        {{$post->description}}</p>
      <a href="{{ url('/') }}" class="btn btn-primary">Show less</a>
    </div>
  </div>
</div>
@endsection
