@extends('layouts.main')

@section('pagetitle','Contact Page')

@section('css')
    
@endsection

@section('content') 
  <div class="container">
    <div class="col-md-12">
      <h1>Contact Me</h1>
      <hr>
      <form action="">
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email">            
        </div>
        <div class="form-group">
          <label for="subject">Subject:</label>
          <input type="text" class="form-control" name="subject">            
        </div>
        <div class="form-group">
          <label for="message">Message:</label>
          <textarea type="text" class="form-control" name="message" rows="3"></textarea>            
        </div>
        <div class="form-group">
          <input type="submit" value="Send Message" class="btn btn-success">
        </div>
      </form>
    </div>
  </div>
@endsection

@section('js')
    
@endsection