{{-- @extends('layouts.main') --}}
@extends('layouts.master')

@section('pagetitle','Create New Post')

@push('css')
  {{-- <link rel="stylesheet" href="{{ asset('/css/parsley.css') }}"> --}}
  <link rel="stylesheet" href="{{ asset('/css/styles.css') }}">
  
@endpush

@section('content')
  <div class="row">
    <div class="col-md-8 col-md-offset-2">
      <div class="well btn-h1-spacing">
        {!! Form::open(['route'=>'tags.store','method'=>'POST']) !!}
          <h2>New Tag</h2>
           @include('layouts.partials._messages')
          {!! Form::label('tag', 'Tag:') !!}
          {!! Form::text('name', null,['class'=>'form-control']) !!}
          {!! Form::submit('Save', ['class'=>'btn btn-success btn-block btn-h1-spacing']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection

@push('js')
  {{-- <script src="{{ asset('/js/parsley.min.js') }}"></script> --}}
@endpush