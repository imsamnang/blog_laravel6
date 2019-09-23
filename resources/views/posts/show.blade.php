@extends('layouts.main')

@section('pagetitle','Post Show')

@section('css')
<link rel="stylesheet" href="{{asset('/css/styles.css')}}">
@endsection

@section('content')
  @include('layouts.partials._messages')
    <div class="col-md-8">
      <h1>{!! $post->title !!}</h1>
      <p class="lead">{!! $post->body !!}</p>
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{route('blog.single',$post->slug)}}">{{url('blog/'.$post->slug)}}</a></p>
        </dl>        
        <dl class="dl-horizontal">
          <label>Created At:</label>
          <p>{{ date('M j, Y H:i',strtotime($post->created_at)) }}</p>
        </dl>
        <dl class="dl-horizontal">
          <label>Last Updated:</label>
          <p>{{ date('M j, Y H:i',strtotime($post->updated_at)) }}</p>
        </dl>
        <hr>
        <div class="row">
          <div class="col-md-6">
            <a href="{{ route('posts.edit',$post->id) }}" class="btn btn-primary btn-block btn-sm">Edit</a>
          </div>
          <div class="col-md-6">
            {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}            
              {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-block btn-sm']) !!}
            {!! Form::close() !!}
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
          <a href="{{route('posts.index')}}" class="btn btn-warning btn-sm btn-block btn-h1-spacing">See All Posts</a>
          </div>
        </div>
      </div>
    </div>
@endsection

@section('js')
    
@endsection