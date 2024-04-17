<?php //debug($ourJournies);exit; ?>
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
<br>Embark on a life-changing experience and delve into the ancient energies of the world's most sacred sites with one of our spiritual journeys. 
 
Led by knowledgeable and insightful guides who share their unique perspectives and passion, these tours will guide you on a path to deeper connection and understanding.</div>

   
<?php 
$sr = 0;	
foreach ($ourJournies as $key => $ourJourny) { 
$sr++;

$packageSlug = $ourJourny['Package']['page_slug'];   
$detailUrl = $this->Html->url(array('controller'=>'our_journies','action'=>'view','page_slug' => $ourJourny['OurJourny']['page_slug']));

?>
<div class="journeyslistarea">
<div class="journeyslistbox">
<div class="journeysnightlabel">Trail<br>
<span><?php echo sprintf("%02d", $ourJourny['OurJourny']['trail']);;?></span></div>
<div class="row">
<div class="col-md-5">
<div class="journeyslistboximgarea">	
<?php foreach ($ourJourny['JourneyImage'] as $key => $journeyImage) { ?>
	<div class="journeyslistboximg">
		<?php echo $this->bs->image('JourneyImage.image_file',$journeyImage,['alt'=>['soil-2-soul-journey'.'-'.$ourJourny['OurJourny']['page_slug']]]); ?>
	</div>
<?php } ?>
</div>	
</div>
<div class="col-md-7">
<div class="journeyslistboxcontarea">
<h4><a href="<?php echo $detailUrl;?>"><?php echo $ourJourny['Package']['name'];?></a></h4>
<h5><?php echo 'Trail '.sprintf("%02d", $ourJourny['OurJourny']['trail']).' - '.$ourJourny['OurJourny']['name'];?></h5>		
<div class="journeyslistboxdesc"><?php echo substr($ourJourny['OurJourny']['description'],'0','150').'...';?> <a href="<?php echo $detailUrl;?>">Read More</a></div>	
<div class="journeysdepdate">
<ul>
<li>Departure Dates:</li>
<?php foreach ($ourJourny['TourCost'] as $key => $tourCost) { 
		$selecteDate = ($key == 0) ? 'selectedJourneyDate' : '';
?>
	<li class="journeyDate <?php echo $selecteDate;?> <?php if($key == 0){echo 'touravailable';} ?>" data-value= "<?php echo $tourCost['date']; ?>"><?php echo date('d M Y', strtotime($tourCost['date'])); ?></li>
<?php } ?>
</ul>
</div>	
<hr>	
<div class="scholarheading">Subject Scholars:</div>	
<div class="row padding5pxarea topmargin10">
<div class="col-sm-10 padding5px">
<div class="subjectscholarsarea">
<ul>
<?php 


usort($ourJourny['OurScholarDetail'], function($a, $b) {
    return $a['OurTeam']['order'] <=> $b['OurTeam']['order'];
});

foreach ($ourJourny['OurScholarDetail'] as $key3 => $ourTeam) { 
if($key3 <= 3){ ?>	
<li>
<span class="tooltip_listing">
<div class="subjectscholarsbox">
<div class="subjectscholarsimgcircle">
<div class="subjectscholarsleaf"><img src="<?php echo $this->webroot; ?>img/guideleaf.png" alt="soil-2-soul-leaf-logo"></div>	
<div class="subjectscholarsimg"><?php echo $this->bs->image('OurTeam.image_file',$ourTeam['OurTeam'],['alt'=>'soil-2-soul'.'-'.$ourTeam['OurTeam']['page_slug']]); ?></div>
<h6><?php echo $ourTeam['OurTeam']['name']; ?></h6>	
</div>		
</div>	
<span class="tooltiptext"><?php echo $ourTeam['description'];?></span></span>		
</li>
<?php }} ?>
	
</ul>	
</div>	
</div>
<div class="col-sm-2 padding5px">
<div class="row topmargin10">
<div class="col-sm-12 col-xs-6">
<div class="text-center"><button type="button" class="submit_btn2 btnlg btnlgfullwidth enquryLink" data-id="<?php echo $ourJourny['OurJourny']['id'];?>"  data-toggle="modal" data-target="#Enquire">Enquire</button></div>
</div>
<div class="col-sm-12 col-xs-6">
<div class="rowmargindesk10"><a href="<?php echo $detailUrl;?>">
  <button type="button" class="submit_btn1 btnlg btnlgfullwidth">View</button>
</a></div>	
</div>	
</div>	
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