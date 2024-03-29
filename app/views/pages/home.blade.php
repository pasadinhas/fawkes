@extends('layouts.default')

@section('content')
<div class="jumbotron">
    <div class="container">
        <h1>
        @if (Auth::user())
            Hello, {{ Auth::user()->name }}!
        @else
            Hello, World!
        @endif
        </h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" role="button">Login with Fénix</a></p>
    </div>
</div>
@stop