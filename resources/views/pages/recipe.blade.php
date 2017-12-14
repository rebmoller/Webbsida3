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
    	<form id="recipe_comment_form" action="{{route('commentrecipe', [$id] )}}"  method="POST">
    	{{csrf_field()}}
      <input type ="hidden" name="recipe_id" value="{{ $id }}">
      <p>Write a comment</p>        
          <div class="form-group">                             
              <textarea id="comment" class="form-group" name="comment" style="min-width: 100%"></textarea>
              <br>
              <input type="Submit" class="btn btn-primary" value="Submit">
              <br>
          </div>
        </form>
      <div id="comment_placeholder" ></div>        
	</div>
  <hr>

@else
<div class="actionBox">
  <div id="comment_placeholder"></div>
</div>

<hr>
@endif


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>

    let load_comments = function()
  {
    $.get({{ $id }} +  '/comment',  {recipe_id: {{$id}}},function(comments_data)
    {
      console.error(comments_data);
      let comments = comments_data.map( (comment) => {

let response = '<div data-id="' + comment.id + '">';

  response += '<br>' + '<b>' + comment.name + '</b>' + '<p>' + comment.comment + '</p>' ;


 if (comment.delete_permission) {
  response +=

   '<button type="submit" class="btn btn-danger pull-right">Delete</button>';
  }

        return response + '</div>';
      });

      $('#comment_placeholder').html(comments);
    });
  };

  $(document).ready(function()
  {
    //submittar kommentaren 
    $('#recipe_comment_form').submit( function(event)
    {
      event.preventDefault();
      //funktion som hämtar kommentaren från textarea och skickar till servern  
      $.post('{{route('commentrecipe', [$id] )}}',
      {
        '_token': $('#recipe_comment_form input[name=\'_token\']').val(),
        'comment': $('#comment').val(), 
        'recipe_id': {{ $id }}
      }, function(data)
      {
        if(data=='OK')
        {

          $('#comment').val('');
          load_comments();

        }
        else
        {
          alert(data);
        }
      });
    });

    load_comments();
    
  });

  $(document).on('click', '.remove_comment', function()
  {
    var comment_holder = $(this).parent();
    var comment_id_to_delete = comment_holder.attr('data-id');

    $.post('/blog/public/delete/{{ $id }}',
    {
      delete_id: comment_id_to_delete,
      '_token': $('#recipe_comment_form input[name=\'_token\']').val()
    }, function(data)
    {
      comment_holder.remove();
    });
  });


  
</script>
@endsection
