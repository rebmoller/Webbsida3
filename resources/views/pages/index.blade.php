@extends('layouts.app')


@section('content')


	<div class="slideshow">
  <img class="mySlides" src={{ asset('img/gratang.jpg') }}>
  <img class="mySlides" src={{ asset('img/linssoppa.jpg') }}>
  <img class="mySlides" src={{ asset('img/sallad.jpg') }}>
  <img class="mySlides" src={{ asset('img/chokladgrot.jpg') }}>
  <div class="center">Don't know what to cook today?
  	<br><a href="/blog/public/calendar">Click here!</a>
  </div>
</div>


<script>
var myIndex = 0;
carousel();

function carousel() {
    var i;
    var x = document.getElementsByClassName("mySlides");
    for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";  
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
    setTimeout(carousel, 2000); // Change image every 2 seconds
}
</script>
@endsection
