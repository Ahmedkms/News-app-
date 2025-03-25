@extends('layout.app')

@section('title','home')

@section('content')
<div class="col-12">
  <h1 class="p-3 border text-center my-3">All Posts</h1>
</div>

@foreach($posts as $post) 
<div class="col-12 mb-4"> <!-- Added mb-4 for spacing -->
  <div class="card">
    <div class="card-header">
      {{ $post->user->name }} {{ $post->created_at->format('y-m-d') }}
    </div>
    <div class="card-body">
      <h5 class="card-title">{{$post->title}}</h5>
      <p class="card-text">
        {{Str::limit($post->description,50)}}</p>
      <a href="{{ url('posts/'. $post->id) }}" class="btn btn-primary">Show more</a>
    </div>
  </div>
</div>

@endforeach
<div>
  {{ $posts->links() }}
</div>

@endsection
