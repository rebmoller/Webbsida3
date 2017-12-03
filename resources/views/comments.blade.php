@extends('layouts.app')

@section('content')

<div class="detailBox">
    <div class="titleBox">
      <label>Comments </label>        
    </div>
   
    <div class="actionBox">
        <ul class="commentList">             
          @if (!empty($comments))
            @foreach ($comments as $cm)
              <div class="commentAnswerBox" style="background-color:#ade5f4"></div>
              <li>               
                <div class="commentText">                    
                    <p class="" >{{$cm->comment_text}}</p> 
                    <div style="margin-top:10px">                    
                      <span class="date sub-text" id="dt">on {{$cm->post_d_time}}</span>                    
                    </div>
                </div>
              </li>              
            @endforeach  
          @endif
        </ul>      
    </div>

    <div class="actionBox">
        {{ Form::open(array('url'=>'/comments', 'method' => 'post' , 'class' => 'form-inline' )) }}        
          <div class="form-group" style="width:100%; position:relative">                             
              {{ Form::textarea('commentText', null, ['class' => 'form-control', 'placeholder' => 'Add your comment', 'rows' => '4']) }}
          </div>
          <div class="form-group">                
              {{ Form::submit('Post Comment', array('class' => 'btn btn-block btn-primary' , 'style' => 'width:220px')) }}
          </div>
        {{ Form::close() }}         
    </div>
</div>


@endsection
