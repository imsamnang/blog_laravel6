@extends('layouts.main')

@section('pagetitle','Create New Post')

@section('css')
  <link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
@endsection

@section('content')
  @include('layouts.partials._messages')
  <div class="col-md-8">
    {!! Form::model($post,['route' => ['posts.update',$post->id],'method'=>'PUT','data-parsley-validate'=>'']) !!}
      <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control','data-parsley-required'=>'','maxlength'=>'100']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control','data-parsley-required'=>'','maxlength'=>'500']) !!}
      </div> 
  </div>
  <div class="col-md-4">
    <div class="well">
      <dl class="dl-horizontal">
        <dt>Created At:</dt>
        <dd>{{ date('M j, Y H:i',strtotime($post->created_at)) }}</dd>
      </dl>
      <dl class="dl-horizontal">
        <dt>Last Updated:</dt>
        <dd>{{ date('M j, Y H:i',strtotime($post->updated_at)) }}</dd>
      </dl>
      <hr>
      <div class="row">
        <div class="col-md-6">
          <a href="{{ route('posts.show',$post->id) }}" class="btn btn-warning btn-block btn-sm">Cancel</a>
        </div>
        <div class="col-md-6">
          <button type="submit" class="btn btn-success btn-block btn-sm">Update</button>
        </div>
      </div>
    </div>
  </div>
  {!! Form::close() !!}
@endsection

@section('js')
  <script src="{{ asset('/js/parsley.min.js') }}"></script>
@endsection