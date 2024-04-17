<?php //debug($this->webroot);exit; ?>
<head>
<meta charset="utf-8">
<?php echo $this->element('pageSeo'); ?>
<!-- <title>ATS Travels</title> -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/custome_css/bootstrap.css">
<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/custome_css/bootstrap-theme.css">
<link href="<?php echo $this->webroot; ?>css/custome_css/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot; ?>css/custome_css/form.css" rel="stylesheet" type="text/css">    
<link href="<?php echo $this->webroot; ?>css/custome_css/developer.css" rel="stylesheet" type="text/css">    
<link href="<?php echo $this->webroot; ?>css/fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    
<!-- on click show image script and css start-->		
<link rel='stylesheet' href='<?php echo $this->webroot; ?>serviceslider/style8a54.css?ver=1.0.0' media='all' />	
<script src='<?php echo $this->webroot; ?>serviceslider/jquery.minaf6c.js?ver=3.6.0'></script>	
<script src='<?php echo $this->webroot; ?>serviceslider/main8a54.js?ver=1.0.0' id='main-js'></script>
<script src='<?php echo $this->webroot; ?>serviceslider/slick.min8a54.js?ver=1.0.0' id='slick-js'></script>	
<!-- on click show image script and css end-->

<!-- Menu css and script start-->
<script src="<?php echo $this->webroot; ?>menu/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $this->webroot; ?>menu/navigation.css">
<link rel="stylesheet" href="<?php echo $this->webroot; ?>menu/navigation.dropdown.css">
<!-- Menu css and script end-->

<script src="<?php echo $this->webroot; ?>js/bootstrap.min.js"></script>

<!-- Slider script start-->
<script type="text/javascript" src="<?php echo $this->webroot; ?>slider/modernizr-2.5.3.custom.min.js"></script>
<script type="text/javascript" src="<?php echo $this->webroot; ?>slider/responsiveCarousel.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($){
		$('.gallery-01').carousel({ autoRotate: 4000, visible: 1, speed: 800, itemMargin: 0 });
		$('.gallery-02').carousel({ autoRotate: 4000, visible: 4, speed: 800, itemMargin: 30, itemMinWidth: 200 });
	});
</script>
<!-- Slider script end-->

<!-- Fixed Header script start-->
<script>
 $(window).on("scroll", function() {
    if($(window).scrollTop() > 50) {
        $(".topband").addClass("active");
    } else {
        //remove the background property so it comes transparent again (defined in your css)
       $(".topband").removeClass("active");
    }
});	
</script>
<!-- Fixed Header script end-->	

  <!-- Load React. -->
  <!-- Note: when deploying, replace "development.js" with "production.min.js". -->
 <!--  <script src="<?php //echo $this->webroot; ?>js/react/react.development.js" crossorigin></script>
  <script src="<?php //echo $this->webroot; ?>js/react/react-dom.development.js" crossorigin></script> -->

<script src="https://unpkg.com/react@18/umd/react.development.js" crossorigin></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.development.js" crossorigin></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>
  

<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
<link rel="icon" href="favicon.ico" type="image/x-icon">	
</head>