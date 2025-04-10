<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="{{ url('/') }}">News app</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ url('/') }}">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ url('posts') }}">Posts</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{ route('users.index') }}">users</a>
          </li>
          {{-- <li class="nav-item">
            <a class="nav-link" href="{{ url('posts') }}">tags</a>
          </li> --}}
       
        </ul>
        <form action="{{ route('search') }}" method="GET" class="d-flex" role="search">
          {{-- @csrf --}}
          <input class="form-control me-2" type="search" name="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success"  type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>