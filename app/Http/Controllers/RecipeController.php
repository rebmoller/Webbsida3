<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Recipe;
use App\Comment;
use App\User;

class RecipeController extends Controller
{
    public function recipe($recipeid){

    	$recipe = Recipe::find($recipeid);
    	$comments = Comment::where('recipe_id', $recipeid)->get();
    	$displaycomments = array();

    	foreach($comments as $comment){
    		$user = User::find($comment->user_id);
    		$displaycomments[] = ['comment' => $comment->comment, 'name' => $user->name, 'id' => $comment->id];
		}
		//return $displaycomments;

    	return view('pages.recipe', ['recipe' => $recipe->recipe, 'ingredients' => $recipe->ingredients, 'description' => $recipe->description, 'comments' => $displaycomments, 'id' => $recipe->id]);
    }
}
