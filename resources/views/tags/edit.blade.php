@extends('layouts.main')

@section('pagetitle','Edit Tag')

@section('css')
  {{-- <link rel="stylesheet" href="{{ asset('/css/parsley.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
  
@endsection

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="well btn-h1-spacing">
        {!! Form::model($tag,['route'=>['tags.update',$tag->id],'method'=>'PUT']) !!}
          <h2>Edit Tag</h2>
           @include('layouts.partials._messages')
          {!! Form::label('tag', 'Tag:') !!}
          {!! Form::text('name', null,['class'=>'form-control']) !!}
          {!! Form::submit('Save', ['class'=>'btn btn-success btn-block btn-h1-spacing']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection

@section('js')
  {{-- <script src="{{ asset('/js/parsley.min.js') }}"></script> --}}
@endsection