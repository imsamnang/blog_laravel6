@extends('layouts.main')

@section('pagetitle','Create New Post')

@section('css')
  <link rel="stylesheet" href="{{ asset('/css/parsley.css') }}">
<link rel="stylesheet" href="{{asset('css/styles.css')}}">
@endsection

@section('content')
  <div class="row">
    <div class="col-md-10">
      <h1>List all Posts</h1>
      @include('layouts.partials._messages')
    </div>
    <div class="col-md-2">
      <a href="{{route('posts.create')}}" class="btn btn-primary btn-block btn-h1-spacing">Create Post</a>
    </div>
    <div class="col-sm-12">
      <hr>
    </div>
    <div class="col-sm-12">
      <div class="col-md-12">
        <table class="table">
          <thead>
            <th>No.</th>
            <th>Title</th>
            <th>Body</th>
            <th>Created At</th>
            <th>Action</th>
          </thead>
          <tbody>
            @foreach ($posts as $key => $post)                
              <tr>
              <td>{{$post->id}}</td>
              <td>{{$post->title}}</td>
              <td>{!!substr($post->body,0,50)!!}{{strlen($post->body)>50?"...":""}}</td>
              <td>{{date('M j, Y',strtotime($post->created_at))}}</td>
                <td>
                  {!! Form::open(['route'=>['posts.destroy',$post->id],'method'=>'DELETE']) !!}            
                    <a href="{{route('posts.show',$post->id)}}" class="btn btn-info btn-sm">View</a>
                    <a href="{{route('posts.edit',$post->id)}}" class="btn btn-success btn-sm">Edit</a>
                    {!! Form::submit('Delete', ['class'=>'btn btn-danger btn-sm']) !!}
                  {!! Form::close() !!}                  
                  {{-- <a href="{{route('posts.destroy',$post->id)}}" class="btn btn-danger btn-sm">Delete</a> --}}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="text-center">
          {{$posts->links()}}
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')
  <script src="{{ asset('/js/parsley.min.js') }}"></script>
@endsection