{{-- @extends('layouts.main') --}}
@extends('layouts.master')

@section('pagetitle','Create New Post')

@push('css')
  <link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
@endpush

@section('content')
  @include('layouts.partials._messages')
  <div class="col-md-8">
    {!! Form::model($post,['route' => ['posts.update',$post->id],'method'=>'PUT','data-parsley-validate'=>'']) !!}
      <div class="form-group">
        {!! Form::label('title', 'Title:') !!}
        {!! Form::text('title', null, ['class'=>'form-control','data-parsley-required'=>'','maxlength'=>'100']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('category_id', 'Category:') !!}
        {!! Form::select('category_id', $categories,null,['class'=>'form-control']) !!}
      </div>
      <div class="form-group">
        {!! Form::label('tags', 'Tag:') !!}	
        {!! Form::select('tags[]', $tags, null, ['class'=>'select2-multi form-control','multiple'=>'multiple']) !!}
      </div>
      	<div class="form-group">
					{!! Form::label('featured_image', 'Upload Feature Image') !!}
					{!! Form::file('featured_image', ['class'=>'form-control']) !!}
				</div>
      <div class="form-group">
        {!! Form::label('body', 'Body:') !!}
        {!! Form::textarea('body', null, ['class'=>'form-control']) !!}
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

@push('js')
  <script src="{{ asset('/js/parsley.min.js') }}"></script>
  <script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js') }}"></script>
  <script src="{{ asset('assets\plugins\ckeditor4\ckeditor.js') }}"></script>
  {{-- <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script> --}}
	<script type="text/javaScript">
		$(document).ready(function() {
			$('.select2-multi').select2();
      // $('.select2-multi').select2().val({!!json_encode($post->tags()->allRelatedIds()->toArray())!!}).trigger('change');
			// laravel Filemanager
			var editor_config = {
				path_absolute : "/",
				selector: "textarea#body",
				plugins: [
					"advlist autolink lists link image charmap print preview hr anchor pagebreak",
					"searchreplace wordcount visualblocks visualchars code fullscreen",
					"insertdatetime media nonbreaking save table contextmenu directionality",
					"emoticons template paste textcolor colorpicker textpattern"
				],
				toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media",
				relative_urls: false,
				file_browser_callback : function(field_name, url, type, win) {
					var x = window.innerWidth || document.documentElement.clientWidth || document.getElementsByTagName('body')[0].clientWidth;
					var y = window.innerHeight|| document.documentElement.clientHeight|| document.getElementsByTagName('body')[0].clientHeight;

					var cmsURL = editor_config.path_absolute + 'laravel-filemanager?field_name=' + field_name;
					if (type == 'image') {
						cmsURL = cmsURL + "&type=Images";
					} else {
						cmsURL = cmsURL + "&type=Files";
					}

					tinyMCE.activeEditor.windowManager.open({
						file : cmsURL,
						title : 'Filemanager',
						width : x * 0.8,
						height : y * 0.8,
						resizable : "yes",
						close_previous : "no"
					});
				}
			};
  		// tinymce.init(editor_config);
			// ckeditor config
			var options = {
				filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
				filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
				filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
				filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
			};			
			CKEDITOR.replace('body', options);            
		});
	</script>  
@endpush