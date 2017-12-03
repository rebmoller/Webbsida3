@extends('layouts.app')
@section('content')


<h2>All recipes</h2>
<br>
@foreach ($recipes as $recipe)


<h3><a href="{{url('/recipe', $recipe->id)}}">{{$recipe->recipe}}</a></h3>
<br>

@endforeach
@endsection