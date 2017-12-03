<ul class="menu">
  <li>
<?php

if (isset($_SESSION['username'])){
  echo '<li><a href="logout.php">Logout</a></li>';
  }
  else{
  echo '<li><a href="/blog/public/login">Login</a></li>';
}
?>
  
</li>
  <li><a href="/blog/public/recipes">Recipes</a></li>
  <li><a href="/blog/public/calendar">Calendar</a></li>
</ul> 	

<h1><a href="/blog/public/">Tasty Recipes</a></h1>