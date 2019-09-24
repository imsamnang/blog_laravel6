@extends('layouts.main')

@section('pagetitle','| '.$post->title)

@section('css')
<link rel="stylesheet" href="{{asset('/css/styles.css')}}">
@endsection

@section('content')
  @include('layouts.partials._messages')
    <div class="col-md-8 col-md-offset-2">
      <h1>{!! $post->title !!}</h1>
      <p class="lead">{!! $post->body !!}</p>
      <hr>
      <p>Post In: {{$post->category->name}}</p>
    </div>
@endsection

@section('js')
    
@endsection