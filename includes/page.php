<?php 
 require_once "libs/ssh/vserver.php";
 require_once "sections/config.php";
?> 

<!DOCTYPE html>
<html>
      <?php include("head.php"); ?>    
<body id="top" class="scrollspy">

<div id="loader" class="trans"><div class="mloader"></div></div>

<!-- Nav -->
 <div class="navbar-fixed">
  <nav role="navigation">
    <div class="nav-wrapper indigo darken-2">
      <a href="index.php?page=welcome" class="brand-logo logo-padding"><?php include("sitename.php"); ?></a>
      <?php include("navigation.php"); ?>  
    </div>
  </nav>
</div>
   

<!-- PHP Include Pages -->
      <?php include("sections/pages.php"); ?>    


<!-- Button -->
  <div class="fixed-action-btn">
  <a id="menu" href="#top" class="indigo waves-effect waves-light btn-large btn-floating"><i class="material-icons">navigation</i></a>
  </div>
</div>
 
  <div class="section"></div>

<!-- Footer -->
      <?php include("footer/index.php"); ?>    

<!-- Modal Impressum -->

<script>
   $(document).ready(function(){
	   $(window).bind('scroll', function() {
	   var navHeight = $( window ).height() - 500
			 if ($(window).scrollTop() > navHeight) {
				 $('nav').addClass('fixed');
			 }
			 else {
				 $('nav').removeClass('fixed');
			 }
		});
	});
</script>
</body>
</html>