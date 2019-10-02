@extends('layouts.master')

@section('pagetitle',"| Delete Comment  ")
    
@push('css')
  <link rel="stylesheet" href="{{asset('/css/styles.css')}}">    
@endpush

@section('content')
  <div class="row">

  </div>
  <div class="col-md-8 col-md-offset-2">
    <h1>Delete Comment</h1>
    <p>
      <strong>Name:</strong>{{$comment->name}}<br/>
      <strong>Email:</strong>{{$comment->email}}<br/>
      <strong>Comment:</strong>{{$comment->comment}}<br/>
    </p>
    {!! Form::open(['route'=>['comments.destroy',$comment->id],'method'=>'DELETE']) !!}
      {!! Form::submit('YES, DELETE THIS COMMENT', ['class'=>'btn btn-danger btn-block']) !!}
    {!! Form::close() !!}
  </div>
@endsection

@push('js')
    
@endpush