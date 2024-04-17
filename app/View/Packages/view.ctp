<!--Collage start here-->
<section class="innercollage">
<div class="innerheading"> 
	<div class="headdivider"></div>
  <h1><?php echo $package['Package']['name']; ?></h1>
 <h5>“<?php echo $package['Package']['short_note']; ?>”</h5>
  <h6>“<?php echo $package['Package']['tag_line']; ?>”</h6> 
</div>
<img src="<?php echo $this->webroot;?>img/journey_collage.jpg" alt="soil-2-soul-our-journey" titel="<?php echo $package['Package']['name']; ?>">
</section>
<!--Collage end here--> 
	
<!--Journeys section start here-->
<section class="whitecontarea">
<div class="container">
<div class="ourjourneyssmalltext"><img src="<?php echo $this->webroot;?>img/om.png" alt="soil-2-soul-Om-logo"/><br>
<br>
<?php echo $package['Package']['description']; ?>
</div>

<?php 
$sr = 0;	
foreach ($ourJournies as $key => $ourJourny) { 
$sr++;

$packageSlug = $package['Package']['page_slug'];   
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
<h4><a href="<?php echo $detailUrl;?>"><?php echo $ourJourny['OurJourny']['name'];?></a></h4>
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
	


    
<div class="container">
	
<div class="">	
<div class="topmargin70"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" alt="soil-2-soul-leaf-logo" title="Soil 2 Soul : expeditions" class="img-responsive center-block"></div>	
<div class="mainheading text-center"><h2>Journeys You May Like</h2></div>	
</div>	
<div class="">	
<div class="row topmargin30">
<?php foreach ($pacakageDetails as $key => $pacakageDetail) { 
	$trailCount = count($package['OurJourny']);
  $trailCount = sprintf("%02d", $trailCount);

  $shortNote = strip_tags($package['Package']['description']);
	$shortNote = substr($shortNote, 0,130);

		$htmlUrl = $this->Html->url(array('controller'=>'packages','action'=>'view','id' => $pacakageDetail['Package']['id'],'pacakage_slug'=>$pacakageDetail['Package']['page_slug']));
?>
<div class="col-sm-3">
<div class="ourjourneysbox">
<a href="<?php echo $htmlUrl;?>">
<div class="ourjourneysboximg">
<div class="trailtag"><span><?php echo $trailCount;?></span><br> Trails</div>    
<!-- <img src="img/ourjourneys_img01.jpg"> -->
	<?php echo $this->bs->image('Package.image_file',$pacakageDetail,['alt'=>$pacakageDetail['Package']['page_slug'],'title'=>$pacakageDetail['Package']['name']]) ?>
<div class="details ourjourneysboxbg01">
<div class="ourjourneysboxcont">
<h4><?php echo $pacakageDetail['Package']['name'];?></h4>
<div class="ourjourneysboxcontdes"><?php echo $shortNote;?>...</div>    
<!-- <div class="ourjourneysboxhidecont"><span>04 Nights</span> Departure Dates: 05 Jan / 20 Jan / 10 Feb</div>     -->
</div>
</div>
</div>
</a>
</div>	
</div>	
<?php } ?>
	


</div>	
</div>	

<div class="">		
<div class="text-center"><img src="img/elephant_left.png"  alt="soil-2-soul-elephant"/> &nbsp; <a href="<?php echo Router::url('/our_journeys'); ?>"><button type="button" class="viewallbtn">View all Journeys</button></a> &nbsp;  <img src="img/elephant_right.png"  alt="soil-2-soul-elephant"/> </div>
</div>	
</div>    
    

	
</div>	
</section>		
<!--Journeys section end here-->	
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
<script type="text/javascript">
	$('.enquryLink').click(function(){
			var journeyId = $(this).attr('data-id');
		 $('#modalJourneyId').val(journeyId);

	});
</script>