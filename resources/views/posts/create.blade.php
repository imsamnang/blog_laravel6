{{-- @extends('layouts.main') --}}
@extends('layouts.master')

@section('pagetitle','Create New Post')

@push('css')
	<link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/bower_components/select2/dist/css/select2.min.css') }}">
	{{-- <link rel="stylesheet" href="{{ asset('assets\plugins\summernote\dist\summernote.css') }}"> --}}
@endpush

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
			<h1>Create New Post</h1>
			{!! Form::open(['route' => 'posts.store','data-parsley-validate'=>'','files' => true]) !!}
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
				{{-- <div class="form-group">
					{!! Form::label('body', 'Body:') !!}
					{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
				</div> --}}
				<div class="form-group">
					{!! Form::label('featured_image', 'Upload Feature Image') !!}
					{!! Form::file('featured_image', ['class'=>'form-control']) !!}
				</div>
				<div class="form-group">
					{!! Form::textarea('body', null, ['class'=>'form-control']) !!}
				</div>			
				{!! Form::submit('Submit', ['class'=>'btn btn-success btn-block']) !!}
			{!! Form::close() !!}
    </div>
  </div>
@endsection

@push('js')
	<script src="{{ asset('/js/parsley.min.js') }}"></script>
	<script src="{{ asset('assets/bower_components/select2/dist/js/select2.min.js') }}"></script>
	<script src="{{ asset('assets\plugins\ckeditor4\ckeditor.js') }}"></script>
	{{-- <script src="{{ asset('assets/plugins/tinymce/tinymce.min.js') }}"></script> --}}
	{{-- <script src="{{ asset('assets\plugins\summernote\dist\summernote.min.js') }}"></script> --}}
	<script type="text/javaScript">
		$(document).ready(function() {
			$('#tags').select2({
				placeholder: 'Select an tag'
			});
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
		// $('#sumeditor').summernote();
    	// Define function to open filemanager window
			// var lfm = function(options, cb) {
			// 	var route_prefix = (options && options.prefix) ? options.prefix : '/laravel-filemanager';
			// 	window.open(route_prefix + '?type=' + options.type || 'file', 'FileManager', 'width=900,height=600');
			// 	window.SetUrl = cb;
			// };

		// Define LFM summernote button
			// var LFMButton = function(context) {
			// 	var ui = $.summernote.ui;
			// 	var button = ui.button({
			// 		contents: '<i class="note-icon-picture"></i> ',
			// 		tooltip: 'Insert image with filemanager',
			// 		click: function() {
			// 			lfm({type: 'image', prefix: '/laravel-filemanager'}, function(lfmItems, path) {
			// 					lfmItems.forEach(function (lfmItem) {
			// 					context.invoke('insertImage', lfmItem.url);
			// 				});
			// 			});

			// 		}
			// 	});
			// 	return button.render();
			// };

			// Initialize summernote with LFM button in the popover button group
			// Please note that you can add this button to any other button group you'd like
			// $('#sumeditor').summernote(
			// 	{
			// 		toolbar: [
			// 			['popovers', ['lfm']],
			// 		],
			// 		buttons: {
			// 			lfm: LFMButton
			// 		}
			// 	}
			// );	
		});
	</script>
@endpush