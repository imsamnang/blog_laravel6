@extends('layouts.main')

@section('pagetitle','Homepage')

@section('css')
    
@endsection

@section('content')  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="jumbotron">
          <h1>Welcome to by Blog!</h1>
          <p class="lead">Thank for visiting my blog</p>
          <p>This is a simple hero unit, a simple jumbotron-style component for calling extra attention to featured content or information.</p>
          <p><a class="btn btn-primary btn-lg" href="#" role="button">Popular Post</a></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8">
        @foreach ($posts as $post)
          <div class="post">
            <h3>{{$post->title}}</h3>
          <p>{!!substr($post->body,0,300)!!}{{strlen($post->body)>300?'...':''}}</p>
          <a href="{{route('posts.show',$post->id)}}" class="btn btn-primary btn-sm">Read More</a>
          </div>
        @endforeach
        <hr>                          
      </div>
      <div class="col-md-4">
        The Sidebar
      </div>
    </div>
    <div class="text-center">
      {{-- {{$posts->links()}} --}}
    </div>
  </div>
@endsection

@section('js')
    
@endsection