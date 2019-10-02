@extends('layouts.master')

@section('pagetitle',"| $comment->name")
    
@push('css')
  <link rel="stylesheet" href="{{asset('/css/styles.css')}}">    
@endpush

@section('content')
  <h1 class="col-md-8 col-md-offset-2">Edit Comment</h1>
  {!! Form::model($comment,['route'=>['comments.update',$comment->id],'method'=>'PUT'],['method'=>'POST ']) !!}
    <div class="row">
      <div class="col-md-8 col-md-offset-2">
        {!! Form::label('name', "Name:") !!}
        {!! Form::text('name', null, ['class'=>'form-control','disabled'=>'disabled']) !!}

        {!! Form::label('email', "Email:")!!}
        {!! Form::email('email', null, ['class'=>'form-control','disabled'=>'disabled']) !!}
      </div>
      <div class="col-md-8 col-md-offset-2">
        {!! Form::label('comment', "Comment:") !!}
        {!! Form::textarea('comment', null, ['class'=>'form-control','rows'=>'4']) !!}
      </div>
      <div class="col-md-8 col-md-offset-2">
        {!! Form::submit('Post Comment', ['class'=>'form-control btn btn-success btn-sm btn-block btn-h1-spacing']) !!}
      </div>
    </div>
  {!! Form::close() !!}
@endsection

@push('js')
    
@endpush