{{-- @extends('layouts.main') --}}
@extends('layouts.master')

@section('pagetitle','| All Categories')

@push('css')
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
@endpush

@section('content')    
  <div class="container">
    <div class="col-md-8">
      <h1>Categories</h1>
      @include('layouts.partials._messages')
      <table class="table">
        <thead>
          <th>No.</th>
          <th>Name</th>
        </thead>
        <tbody>
          @foreach ($categories as $cat)
            <tr>
              <td>{{$cat->id}}</td>
              <td>{{$cat->name}}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="col-md-4">
      <div class="well btn-h1-spacing">
        {!! Form::open(['route'=>'categories.store','method'=>'POST']) !!}
          <h2>New Category</h2>
          {!! Form::label('category', 'Category:') !!}
          {!! Form::text('name', null,['class'=>'form-control']) !!}
          {!! Form::submit('Save', ['class'=>'btn btn-success btn-block btn-h1-spacing']) !!}
        {!! Form::close() !!}
      </div>
    </div>
  </div>
@endsection

@push('js')
    
@endpush