@extends('layouts.app')

@section('content')

  <section class="jumbotron text-center">
    <div class="container">
      <h1 class="jumbotron-heading">Laravel example</h1>
      <p class="lead text-muted">Something short and leading about the collection below—its contents, the creator, etc. Make it short and sweet, but not too short so folks don’t simply skip over it entirely.</p>

      @if (!Auth::guest())
      <p>
        <a class="btn btn-primary my-2" href="{{ route('register') }}">Register</a>
        <a class="btn btn-secondary my-2" href="{{ route('login') }}">Login</a>
      </p>
      @endif
    </div>
  </section>

@endsection