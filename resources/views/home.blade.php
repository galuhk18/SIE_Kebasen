@extends('template.base_home')
@section('title')
<title>{{ env('APP_NAME') }}</title>
@endsection
@section('content')
<div class="jumbotron jumbotron-full">
    <div class="container text-center box-hello">
      <h1 class="display-4">Selamat Datang!</h1>
      <p class="lead">{{ env('APP_NAME') }}</p>
    </div>
  </div>
@endsection
