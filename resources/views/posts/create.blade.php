@extends('layouts.main')

@section('pagetitle','Create New Post')

@section('css')
  <link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			{!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'']) !!}
				<div class="form-group">
					{!! Form::label('title', 'Title:') !!}
					{!! Form::text('title', null, ['class'=>'form-control','data-parsley-required'=>'','maxlength'=>'100']) !!}
				</div>
				<div class="form-group">
					{!! Form::label('body', 'Body:') !!}
					{!! Form::textarea('body', null, ['class'=>'form-control','data-parsley-required'=>'','maxlength'=>'500']) !!}
				</div>
				{!! Form::submit('Submit', ['class'=>'btn btn-success btn-block']) !!}
			{!! Form::close() !!}
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('/js/parsley.min.js') }}"></script>
@endsection