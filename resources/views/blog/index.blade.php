@extends('layouts.main')

@section('pagetitle','Homepage')

@section('css')
    
@endsection

@section('content')  
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <h1>Blog</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        @foreach ($posts as $post)
          <div class="post">
            <h3>{{$post->title}}</h3>
            <h5>Published: {{date('M j, Y',strtotime($post->created_at))}}</h5>
            <p>{{ substr(strip_tags($post->body),0,50) }}{{ strlen(strip_tags($post->body))>50?'...':'' }}</p>
            <a href="{{url('blog/'.$post->slug)}}" class="btn btn-primary btn-sm">Read More</a>
          </div>
          <br>
        @endforeach
        <hr>                          
      </div>
    </div>
    <div class="row">
      <div class="col-md-12">
        <div class="text-center">
          {{$posts->links()}}
        </div>        
      </div>
    </div>
  </div>
@endsection

@section('js')
    
@endsection