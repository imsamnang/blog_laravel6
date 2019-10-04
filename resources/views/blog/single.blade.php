@extends('layouts.main')
<?php $titleTag = htmlspecialchars($post->title);?>
@section('pagetitle','| '.$post->title)

@section('css')
  <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
@endsection

@section('content')
  @include('layouts.partials._messages')
  <div class="col-md-8 col-md-offset-2">
    @if ($post->image)        
      <img src="{{asset('uploads/images/'.$post->image)}}" width="800" height="400" alt="{{$post->title}}">
    @endif
    <h1>{!! $post->title !!}</h1>
    <p class="lead">{!! $post->body !!}</p>
    <hr>
    <p>Post In: {{$post->category->name}}</p>
  </div>
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <h3 class="comment-title"><span class="glyphicon glyphicon-comment"></span>{{ $post->comments->count() }} Comments</h3>
      @foreach ($post->comments as $comment)
        <div class="comment">
          <div class="author-info">
            <img src="{{ "https://www.gravatar.com/avatar/". md5(strtolower(trim($comment->email)))."?s=50&d=wavatar" }}" class="author-image">
            <div class="author-name">
              <h4>{{ $comment->name }}</h4>
              <p class="author-time">{{ date('F nS, Y - g:iA',strtotime($comment->created_at)) }}</p>
            </div>
          </div>
          <div class="comment-content">
            {{ $comment->comment }}
          </div>
        </div>
      @endforeach
    </div>
  </div>
  <div class="row">    
    <div id="comment-form" class="col-md-8 col-md-offset-2">
      {!! Form::open(['route'=>['comments.store',$post->id],'method'=>'POST']) !!}
        <div class="row">
          <div class="col-md-6">
            {!! Form::label('name', "Name:") !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
          </div>
          <div class="col-md-6">
            {!! Form::label('email', "Email:")!!}
            {!! Form::email('email', null, ['class'=>'form-control']) !!}
          </div>
          <div class="col-md-12">
            {!! Form::label('comment', "Comment:") !!}
            {!! Form::textarea('comment', null, ['class'=>'form-control','rows'=>'4']) !!}
          </div>
          <div class="col-md-12">
            {!! Form::submit('Post Comment', ['class'=>'form-control btn btn-success btn-sm btn-block btn-h1-spacing']) !!}
          </div>
        </div>
      {!! Form::close() !!}
    </div>
  </div>
@endsection

@section('js')
    
@endsection