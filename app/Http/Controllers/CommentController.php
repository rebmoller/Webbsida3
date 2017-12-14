<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use \App\Recipe;
use \App\Comment;
use \App\User;
use Auth;

class CommentController extends Controller
{
 
   public function store(Recipe $recipe)
 
   {
       
       $comment = Comment::create([

        'comment' => request('comment'),
        'recipe_id' => request('recipe_id'),
        'user_id' => Auth::user()->id
       ]

     );
  
    return Response('OK',200);
 
   }

    public function get($recipe_id){

      $comments = Comment::where('recipe_id' , $recipe_id)->get();

      $dispaycomments = array();

    foreach ($comments as $comment) {

    $user = User::find($comment->user_id);  
    $displaycomments[] = ['comment' => $comment->comment,'name' => $user->name, 'id' => $comment->id, 'user_id' => $comment->user_id, 'delete_permission'=> $comment->user_id==Auth::user()->id] ;
      }


    return Response($displaycomments, 200);

    }  

   public function delete($recipe_id){

    $comment_id = request('delete_id');

    $comment = Comment::find($comment_id);

    if (Auth::user() && (Auth::user()->id == $comment->user_id)) {
    
    Comment::where('id',$comment_id)->delete();
    
    return Response('OK',200);
  
  }else{
    return Response('you dont have permission',200);
  }
}

}


