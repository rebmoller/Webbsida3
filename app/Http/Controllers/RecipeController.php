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
    	$displaycomments = array();
    	
        return view('pages.recipe', ['recipe' => $recipe->recipe, 'ingredients' => $recipe->ingredients, 'description' => $recipe->description, 'id' => $recipe->id]);
    }
}


    

