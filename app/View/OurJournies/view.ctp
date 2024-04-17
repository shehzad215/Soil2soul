<?php //debug($ourJourny);exit; ?>
<script src="<?php echo $this->webroot;?>js/custome_js/fixednav.js"></script> 
<link href="<?php echo $this->webroot;?>css/custome_css/gallerypopup.css" rel="stylesheet" type="text/css">
<!-- Photo Gallery css start here -->
<!-- Photo Gallery css end here -->
<!-- Zoomer Script start css -->
<!--<script src="zoom/demo.js"></script>-->
<link href="<?php echo $this->webroot;?>zoom/jquery.fs.zoomer.css" rel="stylesheet" type="text/css" media="all" />
<script src="<?php echo $this->webroot;?>zoom/jquery.fs.zoomer.js"></script>
<script>
$(document).ready(function() {
    $(".zoomer_basic").zoomer();

    $(".zoomer_custom").zoomer({
        controls: {
            zoomIn: ".zoomer_custom_zoom_in",
            zoomOut: ".zoomer_custom_zoom_out"
        },
        customClass: "dark_zoomer",
        increment: 0.03,
        interval: 0.1,
        marginMax: 50
    });

    $(window).on("resize", function(e) {
        $(".zoomer_wrapper").zoomer("resize");
    });
});
</script>
<!-- Zoomer Script and css -->
<!--Collage start here-->
<section class="innercollage"> 
<?php $nights = $ourJourny['OurJourny']['no_of_nights'];
       $days = $nights - 1;
 ?>

<?php //debug($ourJourny);die; ?>

<div class="innerheading">  <?php echo $days.' '.'Nights' ?> / <?php echo $nights.' '.'Days' ?>
<div class="headdivider"></div>
 <h1><?php echo $ourJourny['Package']['name']; ?></h1>  
 <h5>“<?php echo $ourJourny['Package']['short_note']; ?>”</h5>
 <h4>“<?php echo $ourJourny['Package']['tag_line']; ?>”</h4> 
 <h6>Trail <?php echo $ourJourny['OurJourny']['trail'] ?> - <?php echo $ourJourny['OurJourny']['name']  ?></h6> 
</div>
<!-- Banner Image -->
<?php echo $this->bs->image('OurJourny.journey_banner',$ourJourny,['alt'=>$ourJourny['OurJourny']['page_slug'],'title'=>$ourJourny['OurJourny']['name']]); ?>
</section>
<!--Collage end here--> 
    
<!--Fix Navbar start here-->
<?php echo $this->element('JourneyDetail/fixed_menu'); ?>
<!--Fix Navbar end here--> 
    
<!--Learning objective start here-->
<section class="graycontarea diyasm" id="objective">
<div class="container">
<div class="mainheading text-center"><img src="<?php echo $this->webroot;?>img/om.png" alt="soil-2-soul-Om-logo"/><br>
<br>
<h2>Learning Objective</h2>
</div>
<div class="ourjourneyssmalltext">
<?php echo  $ourJourny['OurJourny']['description'];  ?>
</div>
</div>
</div>
</section>
<!--Learning objective end here-->
    
<div class="whitecontarea trishul">
<div class="container"> 
 <!--Our Tour Scholar start here-->
<?php 
  if(!empty($ourJourny['OurTeam'])){
    echo $this->element('JourneyDetail/our_team');
  } 
?>
<!--Our Tour Scholar end here-->
<!--Journey Overview start here-->
<div class="topmargin60" id="overview"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo"></div>
<div class="mainheading text-center"><h2>Journey Overview</h2></div>

 <div class="ourjourneyssmalltext">
  <?php echo $ourJourny['OurJourny']['overview'] ?>
</div>
  
<div class="row topmargin40">
<div class="col-md-8"> 
<?php 
 if(!empty($ourJourny['JourneyImage'])){
  echo $this->element('JourneyDetail/images');
}
?>
</div>
<?php //debug($ourJourny);die; ?>
<div class="col-md-4 extpaddleft rowmargin30">
<div class="mainheading">
<h4>Video</h4>
</div>

<?php if(!empty($ourJourny['OurJourny']['video_link_1'])) { ?>
<div class="topmargin10">
<iframe width="100%" height="290" src="<?php echo $ourJourny['OurJourny']['video_link_1'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
<?php } ?>

<?php if(!empty($ourJourny['OurJourny']['video_link_2'])) { ?>
<div class="topmargin30">
<iframe width="100%" height="290" src="<?php echo $ourJourny['OurJourny']['video_link_2'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
</div>
<?php } ?>

</div>
</div>
<!--Journey Overview end here--> 
<!--Tour Glimpse start here-->
<div class="topmargin60" id="tourglimpse"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo"></div>
<div class="mainheading text-center"><h2>Tour Glimpse</h2></div>
<div class="tourinfolist topmargin30">
<ul>

<?php foreach ($tourGlimpses as $key => $tourGlimpse) { 

  //debug($tourGlimpse);die;
  ?>
  <li>  
   <div class="infobox">
   <h4><?php echo $this->bs->image('Amenity.icon',$tourGlimpse,['alt'=>'soil-2-soul-'.$tourGlimpse['Amenity']['name']]); ?>  <?php echo (!empty($tourGlimpse['Amenity']['name'])) ? $tourGlimpse['Amenity']['name'] : '';?></h4>
   <?php echo (!empty($tourGlimpse['TourGlimpse']['description'])) ? $tourGlimpse['TourGlimpse']['description'] : ''; ?>  
    </div>
  </li>
<?php } ?>
</ul>
</div>
<!--Tour Glimpse end here--> 
<!--Detail Left Panel Start Here-->
<?php echo $this->element('JourneyDetail/journey_details'); ?> 
<!--Detail Left Panel End Here-->   


<!--Testimonials section start here-->
<?php //echo $this->element('JourneyDetail/journey_testimonials'); ?>
<!--Testimonials end here--> 
</div>

<div class="whitecontarea">
<div class="container"> 
  <!--Our Co-Brands section start here-->
  
<?php echo $this->element('blogs/brand'); ?>
  
  <!--Our Co-Brands section end here--> 
</div>
</div>

  <script type="text/javascript">
  $('.nav_linksfixed a[href^="#"]').on('click', function(event) {

    var target = $(this.getAttribute('href'));
  var removeOffset=0;
  if($('#nav_barfixed').hasClass("fixed2")){
    removeOffset=190;
  }else{
    removeOffset= 190;
  }
  
    if( target.length ) {
        event.preventDefault();
        $('html, body').stop().animate({
            scrollTop: eval(target.offset().top) - eval(removeOffset)
        }, 700);
    
    }

});



// <!-- Photo Gallery script start here --> 
function openModal() {
  document.getElementById('myModalgallery').style.display = "block";
}

function closeModal() {
  document.getElementById('myModalgallery').style.display = "none";
}



var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  // alert(n)
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
 
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
 
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}
// <!-- Photo Gallery script end here -->  

  $('.OurTeamModel').click(function(){
    var scholarId = $(this).attr('data_id');
    var journeyId = "<?php echo $ourJourny['OurJourny']['id'];?>";

    //alert(scholarId);

    $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(['controller'=>'our_scholar_details','action'=>'scholar_details']); ?>",
            data: {"scholarId": scholarId,"journeyId":journeyId},
            dataType: "html",
            success: function (data) {
                // $("#nerror").text(data);
                $('#TourScholars').modal('show');
                $('.ScholarData').html(data);
              // alert('hi');
            }
        });

  
  });

</script>
  
