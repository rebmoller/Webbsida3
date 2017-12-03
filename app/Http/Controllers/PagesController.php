<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function index(){
    	return view ('pages.index');
    }
    public function recipes(){

        $recipes = \App\Recipe::all();
    	return view ('pages.recipes', compact('recipes'));
    }
    public function calendar(){
    	return view ('pages.calendar');
    }
    public function login(){
    	return view ('pages.login');
    }

}
