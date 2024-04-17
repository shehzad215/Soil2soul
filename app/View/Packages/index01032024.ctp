<?php //debug($packages);exit; ?>
<!--Collage start here-->
<section class="innercollage">
<div class="innerheading">
<div class="lotus"><img src="<?php echo $this->webroot;?>img/lotus.png" alt="soil-2-soul-leaf-logo"/></div>		
<h1>Our Journeys</h1></div>	
<img src="<?php echo $this->webroot;?>img/journey_collage.jpg" alt="soil-2-soul-our-journey" titel="Our Journey">
</section>
<!--Collage end here--> 
	
<!--Journeys section start here-->
<section class="whitecontarea">
<div class="container">
<div class="ourjourneyssmalltext"><img src="<?php echo $this->webroot;?>img/om.png" alt="soil-2-soul-Om-logo"/><br>
<br>Join us on one of our spiritual journeys to connect with the ancient energies that exist at some of the most important sacred sites around the world. Our tour leaders are ready to share their extensive knowledge, unique perspective Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>

<?php foreach ($packages as $key => $package) { 
   
	$packageId = $package['Package']['id'];
	 
	 $shortNote = strip_tags($package['Package']['description']);
   $shortNote = substr($shortNote, 0,130);

 	$packageTabId = 'package'.$package['Package']['id'];
 	$active = ($key == 0) ? 'd_active5' : '';

 	$trailCount = count($package['OurJourny']);
 	$trailCount = sprintf("%02d", $trailCount);

 	$htmlUrl = $this->Html->url(array('controller'=>'packages','action'=>'view','id' => $package['Package']['id'],'pacakage_slug'=>$package['Package']['page_slug']));

 // 	debug($packageId);
 // debug($journeyImageArr[$packageId]['JourneyImage']);	

 ?>
<div class="journeyslistarea" id="<?php echo $packageTabId;?>">
<div class="journeyslistbox">
<div class="row">
<div class="col-md-5">
<div class="journeyslistboximgarea">
<div class="trailtag"><span><?php echo $trailCount;?></span><br> Trails</div>        
<div class="bx-wrapper3">
<div class="bxslider4">
	 <?php 
	 if(isset($journeyImageArr[$packageId]['JourneyImage'])){
	 foreach ($journeyImageArr[$packageId]['JourneyImage'] as $key => $JourneyImage) { ?>
			<div class="journeyslistboximg">
				<!-- <img src="img/journey_img01.jpg"> -->
				<?php echo $this->bs->image('JourneyImage.image_file',$JourneyImage,['alt'=>$package['Package']['page_slug'],'title'=>$package['Package']['name']]) ?>
			</div>
	 <?php }} ?>		
</div>
</div>	
</div>	
</div>
<div class="col-md-7">
<div class="journeyslistboxcontarea">
<h3><a href="<?php echo $htmlUrl;?>"><?php echo $package['Package']['name'];?></a></h3>
<div class="journeyslistboxdesc"><?php echo $shortNote;?>...</div>	
    
<div class="tails">
<ul>
<?php 
	$sr = 0;
	foreach ($package['OurJourny'] as $key => $value) {
	$sr++;

	$packageSlug = $package['Package']['page_slug'];   
    $detailUrl = $this->Html->url(array('controller'=>'our_journies','action'=>'view','page_slug' => $value['page_slug']));	

    
?>
	<a href="<?php echo $detailUrl;?>">	
	<li><span>Trail <?php echo sprintf("%02d", $value['trail']);;?>:</span> <?php echo $value['name']; ?> <div class="traillink"><i class="fa fa-chevron-circle-right"></i></div></li></a>
 <?php } ?>	
  
</ul>    
</div>  
    
<div class="row topmargin10">
<div class="col-sm-3 col-xs-6">
<div class=""><button type="button" class="submit_btn2 btnlg btnlgfullwidth" data-toggle="modal" data-target="#Enquire">Enquire</button></div>
</div>
<div class="col-sm-3 col-xs-6">
<div class=""><a href="<?php echo $htmlUrl; ?>">
  <button type="button" class="submit_btn1 btnlg btnlgfullwidth">View</button>
</a></div>	
</div>	
</div>    
	
</div>	
</div>	
</div>	
</div>	
</div>

<?php } ?>   

	
<!-- <div class="text-center topmargin50"><img src="img/elephant_left.png"  alt=""/> &nbsp; <a href="journeys.html"><button type="button" class="viewallbtn"><img src="img/logo_icon.png"><br>
View Past Journeys</button></a> &nbsp; <img src="img/elephant_right.png"  alt=""/></div> -->
	
</div>	
</section>		
<!--Journeys section end here-->	
	
<!--Journey FAQs section end here-->	
<?php if(!empty($faqs)){ echo $this->element('JourneyDetail/faq',['journey'=>true]);} ?>	
<!--Journey FAQs section end here-->	
	
<!--Testimonials section start here-->	
<?php echo $this->element('testimonials'); ?>		
<!--Testimonials end here-->	
</div>	
	<div class="whitecontarea">
	<div class="container">
	<!--Our Co-Brands section start here-->	
	<?php echo $this->element('blogs/brand'); ?>	
	<!--Our Co-Brands section end here-->	
	</div>
	</div>