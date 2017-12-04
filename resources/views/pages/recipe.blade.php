@extends('layouts.app')
@section('content')

<img class="pannkakor" src={{ asset('img/' . $recipe . '.jpg') }}>

<h2>{{ $recipe }}</h2>

<h3>Ingredients</h3>
<p>{{ $ingredients }}</p>
<br>
<h3>Instructions</h3>
<p>{{ $description }}</p>
<br>
<br>
<h4>Comments</h4>
<hr>

@if(Auth::check())
    <div class="actionBox">
    	<form action="{{route('commentrecipe', [$id] )}}" method="POST">
    	{{csrf_field()}}
      <input type ="hidden" name="recipe_id" value="{{ $id }}">
      <p>Write a comment</p>        
          <div class="form-group">                             
              <textarea class="form-group" name="comment" style="min-width: 100%"></textarea>
              <br>
              <input type="Submit" class="btn btn-primary" value="Submit">
              <br>
          </div>
        </form>        
	</div>
  <hr>
@foreach($comments as $comment)

	<p> {{$comment['name']}}</p>
	<p> {{$comment['comment']}}</p> 

@if (Auth::user() && (Auth::user()->id == $comment['user_id']))
<div class="row text-center">
  <div class='col-lg-6'>  
    <a href="{{route('delete', $comment['id'] )}}">
      <button type="submit" class="btn btn-danger pull-right">Delete</button>
    </a>
  </div>
</div>
@endif
<hr>
@endforeach
@else
@foreach($comments as $comment)
	<p> {{$comment['name']}}</p>
	<p> {{$comment['comment']}}</p>

@endforeach

@endif

@endsection