{{-- @extends('layouts.main') --}}
@extends('layouts.master')

@section('pagetitle','Post Show')

@push('css')
  <link rel="stylesheet" href="{{asset('/css/styles.css')}}">
@endpush

@section('content')
  @include('layouts.partials._messages')
    <div class="col-md-8">
      <h1>{!! $post->title !!}</h1>
      <p class="lead">{!! $post->body !!}</p>
      <hr>
      <div class="tags">
        @foreach ($post->tags as $tag)
          <span class="label label-default">{{$tag->name}}</span>
        @endforeach
      </div>
      <div id="backend-comments" style="margin-top: 50px;">
        <h3>Comments <small>{{$post->comments->count()}} total</small></h3>
      </div>
      <table class="table">
        <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Comment</th>
            <th>Action</th>
          </tr>
          <tbody>
            @foreach ($post->comments as $comment)
              <tr>
                <td>{{$comment->name}}</td>
                <td>{{$comment->email}}</td>
                <td>{{$comment->comment}}</td>
                <td>
                  <a href="{{route('comments.edit',$comment->id)}}" class="btn btn-xs btn-success"><span class="glyphicon glyphicon-pencil"></span></a> 
                  <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-xs btn-danger"><span class="glyphicon glyphicon-trash"></span></a> 
                </td>
              </tr>
            @endforeach
          </tbody>
        </thead>
      </table>
    </div>
    <div class="col-md-4">
      <div class="well">
        <dl class="dl-horizontal">
          <label>Url:</label>
          <p><a href="{{route('blog.single',$post->slug)}}">{{url('blog/'.$post->slug)}}</a></p>
        </dl>
        <dl class="dl-horizontal">
          <label>Category:</label>
        <p>{{$post->category->name}}</p>
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

@push('js')
    
@endpush