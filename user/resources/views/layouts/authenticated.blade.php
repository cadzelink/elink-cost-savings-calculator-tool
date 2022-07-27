@extends('layouts.app')

@section('content')
<nav class="navbar navbar-expand-lg bg-light navbar-light shadow">
    <div class="container">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Books</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Products</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              {{auth()->user()->getFullName()}}
            </a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li><a class="dropdown-item" href="#">Change Password</a></li>
              <li>
                <form action="" method="post">
                    @csrf
                    <button type="submit" class="dropdown-item">Logout</button>
                </form>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
    @yield('pages')
@endsection
