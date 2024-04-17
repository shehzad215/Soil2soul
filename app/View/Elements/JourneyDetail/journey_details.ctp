<!--Details itinerary  start here-->
<div class="topmargin60" id="itinerary"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo"></div>
<div class="mainheading text-center"><h2>Detailed Itinerary</h2></div>
<div class="row topmargin30">
<div class="col-md-8">
<?php echo $this->element('JourneyDetail/details_left_panel'); ?>
</div>

<!--Details Right Panel Start Here-->
<div class="col-md-4"> 
<?php echo $this->element('JourneyDetail/details_right_panel'); ?>
</div>
<!--Details Right Panel End Here-->
</div>
<!--Details itinerary  end here--> 
<!-- Other Trails -->
<?php if(!empty($otherTrails)) {echo $this->element('JourneyDetail/other_trail');} ?>
<!-- Other Trail End Here -->

<!--Journey map start here-->
<?php if(!empty($ourJourny['OurJourny']['upload_map'])){?>
<div class="topmargin60" id="map"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo"></div>
<div class="mainheading text-center">
<h2>Journey Map</h2>
</div>
 <div class="topmargin30">
<div class="transfertype">
<span class="road">By Road <i class="fa fa-cab"></i></span>    <span class="air">By Air  <i class="fa fa-plane"></i></span>    <span class="rail">By Rail  <i class="fa fa-train"></i></span>    
</div>    
  <div class="zoomer_wrapper zoomer_basic"> 
  	<!-- <img src="<?php echo $this->webroot;?>img/trailsmap/ramayan_trail1.jpg" />  -->
  	<?php echo $this->Bs->image('OurJourny.upload_map',$ourJourny,['alt'=>$ourJourny['OurJourny']['page_slug'],'title'=>$ourJourny['OurJourny']['name']]); ?>
  </div>
</div>
<?php } ?>
<!--Journey map end here--> 


</div>
</div>

<!--Journey FAQs section end here-->
<?php if(!empty($faqs)) {echo $this->element('JourneyDetail/faq',['journey'=>true]);} ?>
<!--Journey FAQs section end here-->  
