<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Recipe;
use App\Comment;
//use Illuminate\Foundation\Auth;
use Auth;

class CommentController extends Controller
{
   public function store(Recipe $recipe)
   {
 
       /*$this->validate($request, [
       'comment' => 'required', 
       'recipe_id' => 'filled', 
       'users_id' => 'required',
       ]);*/
 
       $comment = Comment::create([
       		'comment' => request('comment'), 
       		'recipe_id' => request('recipe_id'), 
       		'user_id' => Auth::user()->id

       ]);
 	return back();
 
   }
  public function delete($id){

    $comment = Comment::find($id);

    if (Auth::user() && (Auth::user()->id == $comment->user_id)) {
      Comment::where('id',$id)->delete();
      return back();
	 }else{
	   return 'you dont have permission';
	 }
  }
}
