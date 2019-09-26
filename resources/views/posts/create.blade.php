@extends('layouts.main')

@section('pagetitle','Create New Post')

@section('css')
	<link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
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
					{!! Form::label('category_id', 'Category:') !!}	
					<select name="category_id" id="category_id" class="form-control data-parsley-required">
						@foreach ($categories as $cat)							
							<option value="{{$cat->id}}">{{$cat->name}}</option>
						@endforeach
					</select>
				</div>
				<div class="form-group">
					{!! Form::label('tags', 'Tag:') !!}	
					<select name="tags[]" id="tags" class="form-control data-parsley-required" multiple="multiple">
						@foreach ($tags as $tag)							
							<option value="{{$tag->id}}">{{$tag->name}}</option>
						@endforeach
					</select>
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
	<script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js') }}"></script>
	<script type="text/javaScript">
		$(document).ready(function() {
			$('#tags').select2({
				placeholder: 'Select an tag'
			});
		});
	</script>
@endsection