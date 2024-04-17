<!-- <head> -->
<meta charset="utf-8">
<?php echo $this->element('pageSeo'); ?>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<link rel="stylesheet" href="<?php echo $this->webroot ?>css/custome_css/bootstrap.css">
<link rel="stylesheet" href="<?php echo $this->webroot ?>css/custome_css/bootstrap-theme.css">
<link href="<?php echo $this->webroot ?>css/custome_css/main.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot ?>css/custome_css/form.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot; ?>css/custome_css/developer.css" rel="stylesheet" type="text/css">
<link href="<?php echo $this->webroot ?>css/fonts/font-awesome.css" rel="stylesheet" type="text/css">
<link href="https://fonts.googleapis.com/css2?family=Alegreya+Sans:wght@300;400;500;700&family=Philosopher:wght@400;700&display=swap" rel="stylesheet">

<!-- Menu css and script start-->
<script src="<?php echo $this->webroot; ?>menu/jquery-latest.min.js" type="text/javascript"></script>
<link rel="stylesheet" href="<?php echo $this->webroot ?>menu/navigation.css">
<link rel="stylesheet" href="<?php echo $this->webroot ?>menu/navigation.dropdown.css">
<!-- Menu css and script end-->

<script src="<?php echo $this->webroot; ?>js/bootstrap.min.js"></script>  

<!-- Tabs slider css start here -->
<link rel="stylesheet" href="<?php echo $this->webroot; ?>css/tab/style.css">
<!-- Tabs slider css end here -->     
<!-- Tabs CSS & JS Start Here -->
<link href="<?php echo $this->webroot; ?>css/tab/tabs.css" rel="stylesheet">
<script src="<?php echo $this->webroot; ?>css/tab/tab.js"></script> 
<script>
    var Tabs = {
    init: function () {
        this.bindUIfunctions();
        this.pageLoadCorrectTab();
    },
    bindUIfunctions: function () {
        $(document).on('click', '.transformer-tabs a[href^=\'#\']:not(\'.active\')', function (event) {
            Tabs.changeTab(this.hash);
            event.preventDefault();
        }).on('click', '.transformer-tabs a.active', function (event) {
            Tabs.toggleMobileMenu(event, this);
            event.preventDefault();
        });
    },
    changeTab: function (hash) {
        var anchor = $('[href=' + hash + ']');
        var div = $(hash);
        anchor.addClass('active').parent().siblings().find('a').removeClass('active');
        div.addClass('active').siblings().removeClass('active');
        anchor.closest('ul').removeClass('open');
    },
    pageLoadCorrectTab: function () {
        this.changeTab(document.location.hash);
    },
    toggleMobileMenu: function (event, el) {
        $(el).closest('ul').toggleClass('open');
    }
};
Tabs.init();
      //@ sourceURL=pen.js
</script> 
<!-- Tabs CSS & JS End Here --> 
<!-- Bx css and script start-->
<link rel="stylesheet" href="<?php echo $this->webroot ?>bxslider/jquery.bxslider.css">
<script src="<?php echo $this->webroot ?>bxslider/jquery.bxslider.min.js"></script>
<script>
 $(document).ready(function(){
    $('.bxslider1').bxSlider({
      mode: 'horizontal',
      moveSlides: 1,
      slideMargin: 40,
      infiniteLoop: true,
      slideWidth: 320,
      minSlides: 1,
      maxSlides: 20,
      speed: 800,
      auto: true,
      pager:false,
    });  

     $('.bxslider2').bxSlider({
      mode: 'horizontal',
      moveSlides: 1,
      slideMargin: 0,
      infiniteLoop: false,
      //slideWidth: 262,
      minSlides: 1,
      maxSlides: 20,
      speed: 800,
      auto: true,
      pager:false,
    });

     $('.bxslider3').bxSlider({
      mode: 'horizontal',
      moveSlides: 1,
      slideMargin: 20,
      infiniteLoop: true,
      slideWidth: 280,
      minSlides: 1,
      maxSlides: 20,
      speed: 800,
      auto: false,
      pager:false,
    });
    
    $('.bxslider4').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 0,
        infiniteLoop: false,
        //slideWidth: 262,
        minSlides: 1,
        maxSlides: 20,
        speed: 800,
        auto: true,
        pager:true,
    }); 

     $('.bxslider5').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 20,
        infiniteLoop: true,
        slideWidth: 270,
        minSlides: 1,
        maxSlides: 20,
        speed: 800,
        auto: true,
        pager:true,
    }); 

    $('.bxslider6').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 15,
        infiniteLoop: true,
        slideWidth: 165,
        minSlides: 1,
        maxSlides: 20,
        speed: 800,
        auto: true,
        pager:false,
    }); 
    $('.bxslider7').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 0,
        infiniteLoop: false,
        //slideWidth: 270,
        minSlides: 1,
        maxSlides: 20,
        speed: 800,
        auto: true,
        pager:true,
    });   
     $('.bxslider8').bxSlider({
        mode: 'horizontal',
        moveSlides: 1,
        slideMargin: 30,
        infiniteLoop: true,
        slideWidth: 160,
        minSlides: 3,
        maxSlides: 30,
        speed: 800,
        auto: true,
        pager:true,
        controls:false,
    }); 
});
</script>
<!-- Bx slider css and script end-->

<!-- Photo Gallery css start here -->
<link href="<?php echo $this->webroot ?>css/custome_css/gallerypopup.css" rel="stylesheet" type="text/css">
<!-- Photo Gallery css end here --> 

<!-- Animated Css and script start-->
<link rel="stylesheet" href="<?php echo $this->webroot ?>animate/animate.css">
<script src="<?php echo $this->webroot ?>animate/wow.min.js"></script>
<script>
new WOW().init();
</script>
<!-- Animated Css and script end--> 

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
