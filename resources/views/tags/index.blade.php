@extends('layouts.main')

@section('pagetitle','| All Tags')

@section('css')
  <link rel="stylesheet" href="{{asset('css/styles.css')}}">
@endsection

@section('content')    
  <div class="container">
    <div class="row">
      <div class="col-md-8">
        <h1>Tags</h1>
      </div>
      <div class="col-md-2">
        <a href="{{route('tags.create')}}" class="btn btn-primary btn-block btn-h1-spacing">Create Tag</a>
      </div>
      <div class="col-sm-12">
        <hr>
      </div>
      <div class="col-md-8">
        @include('layouts.partials._messages')
        <table class="table">
          <thead>
            <th>No.</th>
            <th>Name</th>
          </thead>
          <tbody>
            @foreach ($tags as $tag)
              <tr>
                <td>{{$tag->id}}</td>
                <td>
                  <a href="{{route('tags.show',$tag->id)}}">{{$tag->name}}</a>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>  
  </div>
@endsection

@section('js')
    
@endsection