<main class="mainwrapper">
<!--Topband start here-->
<header class="topband">
<div class="container">
<div class="menulogobg">
<div class="row nopaddingarea">
<div class="col-md-4 col-sm-12 col-xs-12 nopadding">
<div class="menu">
<nav id="navigation" class="navigation">
<div class="nav-header">
<div class="nav-toggle"></div>
</div>
<div class="nav-menus-wrapper">
<ul class="nav-menu"> 
<li class="hidden-lg hidden-md">
<select name="defaultCurrency" class="defaultCurrency" id="currencySelect"> 
	<?php foreach ($currencies as $key => $currency) { 
		$selected = ($defaultCurCode ==  $currency['Currency']['iso_code']) ? 'selected' : '';
	?>
	<option value="<?php echo $currency['Currency']['id'];?>" <?php echo $selected;?>><?php echo $currency['Currency']['iso_code'];?></option>
	<?php } ?>	
</select>
</li>	
<li><a href="<?php echo Router::url('/'); ?>">Home</a></li>
<li><a href="<?php echo Router::url('/our_journeys'); ?>">Journeys</a></li>
<li><a href="#">About</a>
<ul class="nav-dropdown">
<li><a href="<?php echo Router::url('/about-us'); ?>">About us</a></li>
<li><a href="<?php echo Router::url('/our-mentors'); ?>">Our Mentors</a></li>
<li><a href="<?php echo Router::url('/our-scholars'); ?>">Our Scholars</a></li>
<li><a href="<?php echo Router::url('/our-teams'); ?>">Our Team</a></li>
<li><a href="<?php echo Router::url('/brand'); ?>">Soil 2 Soul Brand</a></li>
<li><a href="<?php echo Router::url('/why-spiritual'); ?>">Why Spiritual Tours?</a></li>		
<li><a href="<?php echo Router::url('/sanatana-dharma'); ?>">Sanatan Dharma</a></li>
<li><a href="<?php echo Router::url('/galleries'); ?>">Gallery</a></li>
<li><a href="<?php echo Router::url('/videos'); ?>">Videos</a></li>
<li><a href="<?php echo Router::url('/faqs'); ?>">FAQs</a></li>
</ul>
</li>
<li class="hidden-lg hidden-md"><a href="<?php echo Router::url('/travel-tips'); ?>">Travel Tips</a></li>
<li class="hidden-lg hidden-md"><a href="<?php echo Router::url('/blogs'); ?>">Blogs</a></li>
<!-- <li class="hidden-lg hidden-md"><a href="<?php //echo Router::url('/testimonials'); ?>">Testimonials</a></li> -->
<li class="hidden-lg hidden-md"><a href="<?php echo Router::url('/contacts'); ?>">Contact</a></li>

</ul>
</div>
</nav>
</div>		
</div>
<div class="col-md-4 col-sm-6 col-xs-9 nopadding">
<div class="logo"><a href="<?php echo Router::url('/'); ?>"><img src="<?php echo $this->webroot;?>img/logolink.png" class="hidden-sm hidden-xs" alt="soil 2 soul : expeditions"><img src="<?php echo $this->webroot;?>img/logolink_mob.png" class="hidden-lg hidden-md" alt="soil 2 soul : expeditions"></a></div>	
</div>
<div class="col-md-4 col-sm-6 col-xs-3 nopadding">
<div class="topmenu">
<ul>
<li><a href="<?php echo Router::url('/travel-tips'); ?>">Travel Tips</a></li>	
<li><a href="<?php echo Router::url('/blogs'); ?>">Blogs</a></li>
<!-- <li><a href="<?php //echo Router::url('/testimonials'); ?>">Testimonials</a></li> -->
<li>
<select name="defaultCurrency" class="defaultCurrency" id="currencySelect"> 
	<?php foreach ($currencies as $key => $currency) { 
		$selected = ($defaultCurCode ==  $currency['Currency']['iso_code']) ? 'selected' : '';
	?>
	<option value="<?php echo $currency['Currency']['id'];?>" <?php echo $selected;?>><?php echo $currency['Currency']['iso_code'];?></option>
	<?php } ?>	
</select>
</li>
</ul>	

</div>	
</div>	
</div>	
</div>
</div>
</header>
<!--Topband end here-->
<!--Side Button start-->
<div class="fixedsocialicons">
<ul>
<li><a href="tel://+918657540585"><i class="fa fa-phone"></i></a></li>
<li><a href="https://api.whatsapp.com/send?phone=+918657540586&text=Hi,%20welcome%20to%20soil2soul" target="_blank"><i class="fa fa-whatsapp"></i></a></li>	
<li><a href="https://www.facebook.com/soil2soulexpedition/" target="_blank"><i class="fa fa-facebook-f"></i></a></li>
<li><a href="https://www.instagram.com/soil2soulexpeditions/" target="_blank"><i class="fa fa-instagram"></i></a></li>	
<li><a href="https://www.youtube.com/@Soil2soulexpedition" target="_blank"><i class="fa fa-youtube-play"></i></a></li>	
</ul>
</div>
<!--Side Button end-->	
<div class="maincontarea">