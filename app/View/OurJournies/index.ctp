<!--Collage start here-->
<section class="innercollage">
<div class="innerheading">
<div class="lotus"><img src="<?php echo $this->webroot; ?>img/lotus.png" alt="soil-2-soul-lotus-logo" title="Soil 2 Soul : expeditions"/></div>		
<h1>Our Journeys</h1></div>	
<img src="<?php echo $this->webroot; ?>img/journey_collage.jpg" alt="soil-2-soul-journey" title="Soil 2 Soul : Journey">
</section>
<!--Collage end here--> 
	
<!--Journeys section start here-->
<section class="whitecontarea trishul">
<div class="container">
<div class="ourjourneyssmalltext"><img src="<?php echo $this->webroot; ?>img/om.png" alt="soil-2-soul-Om-logo"/><br>
<br>Join us on one of our spiritual journeys to connect with the ancient energies that exist at some of the most important sacred sites around the world. Our tour leaders are ready to share their extensive knowledge, unique perspective Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>


<?php foreach ($ourJournies as $key => $ourJourny) { 
	//debug($ourJourny);die;
	?>
<div class="journeyslistarea">
<div class="journeyslistbox deep">
<div class="journeysnightlabel"><span><?php echo $ourJourny['OurJourny']['no_of_nights']; ?></span><br>
Nights</div>
<div class="row">
<div class="col-md-5">
<div class="journeyslistboximgarea">	
<div class="bx-wrapper3">
<div class="bxslider3">
<?php foreach ($ourJourny['JourneyImage'] as $key1 => $value) { ?>
<div class="journeyslistboximg">
	<?php echo $this->bs->image('JourneyImage.image_file',$value,['alt'=>['soil-2-soul-journey'.'-'.$value['name']]]); ?>
</div>
<?php } ?>
	

</div>
</div>	
</div>	
</div>
<div class="col-md-7">
<div class="journeyslistboxcontarea">
<h3><a href="journeysdetails.html"><?php echo $ourJourny['OurJourny']['name']; ?></a></h3>
<div class="journeyslistboxdesc"><?php echo substr($ourJourny['OurJourny']['description'],'0','150').'...';?>
<?php $htmlUrl = $this->Html->url(array('controller'=>'our_journies','action'=>'view','id' => $ourJourny['OurJourny']['id'],'page_slug'=>$ourJourny['OurJourny']['page_slug'])); ?>

<a href="<?php echo $htmlUrl; ?>">Read More</a></div>	
<?php if(!empty($ourJourny['TourCost'])){ ?>
<div class="journeysdepdate">
<ul>
<li>Departure Dates:</li>
<?php foreach ($ourJourny['TourCost'] as $key => $tourcost) { ?>
	<li><?php echo date('d M Y', strtotime($tourcost['date'])); ?></li>
<?php } ?>
</ul>
</div>	
<hr>	
<?php } ?>
<div class="scholarheading">Subject Scholars:</div>	
<div class="row padding5pxarea topmargin10">
<div class="col-sm-10 padding5px">
<div class="subjectscholarsarea">
<ul>
<?php foreach ($ourJourny['OurTeam'] as $key3 => $ourTeam) { 
if($key3 <= 3){ ?>	
<a href="#" class="prevent OurTeamModel" data_id="<?php echo $ourTeam['id'];?>">
<li>
<span class="tooltip_listing">
<div class="subjectscholarsbox">
<div class="subjectscholarsimgcircle">

<div class="subjectscholarsleaf">
	<img src="<?php echo $this->webroot; ?>img/guideleaf.png" alt="soil-2-soul-leaf-logo">
</div>	
<div class="subjectscholarsimg" id="ourTeamImage_<?php echo $ourTeam['id'];?>">
	<?php echo $this->bs->image('OurTeam.image_file',$ourTeam,['alt'=>'soil-2-soul'.'-'.$ourTeam['name']]); ?>
</div>
<h6 id="ourTeam_<?php echo $ourTeam['id'];?>"><?php echo $ourTeam['name']; ?></h6>	
</div>		
</div>	
<span class="tooltiptext" id="ourTeamNote_<?php echo $ourTeam['id'];?>" data-note="<?php echo $ourTeam['description'];?>"><?php echo substr($ourTeam['description'],'0','200').'...';?></span></span>	
</li>
</a>
<?php } } ?>	
</ul>	
</div>	
</div>
<div class="col-sm-2 padding5px">
<div class="row topmargin10">
<div class="col-sm-12 col-xs-6">
<div class="text-center"><button type="button" class="submit_btn2 btnlg btnlgfullwidth enquiryModule">Enquire</button></div>
</div>
<div class="col-sm-12 col-xs-6">
<div class="rowmargindesk10">

<?php $htmlUrl = $this->Html->url(array('controller'=>'our_journies','action'=>'view',
	'id'=>$ourJourny['OurJourny']['id'],'page_slug'=>$ourJourny['OurJourny']['page_slug'])); ?>

<a href="<?php echo $htmlUrl; ?>">
  <button type="button" class="submit_btn1 btnlg btnlgfullwidth">View</button>
</a>

</div>	
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
	
<!-- <div class="text-center topmargin50"><img src="<?php //echo $this->webroot; ?>img/elephant_left.png"  alt=""/> &nbsp; <a href="journeys.html"><button type="button" class="viewallbtn"><img src="<?php //echo $this->webroot; ?>img/logo_icon.png"><br>
View Past Journeys</button></a> &nbsp; <img src="<?php //echo $this->webroot; ?>img/elephant_right.png"  alt=""/></div> -->
	
</div>	
</section>		
<!--Journeys section end here-->	
	
<!--Journey FAQs section end here-->	
<section class="graycontarea nandi">
<div class="container">
<div class=""><img src="<?php echo $this->webroot; ?>img/logoshape_heading.png" class="img-responsive center-block"  alt="soil-2-soul-leaf-logo" title="Soil 2 Soul : expeditions"></div>	
<div class="mainheading text-center"><h2>Journey FAQs</h2></div>	
<div class="row topmargin40">
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="panel-group" id="accordion2">
<!-- faq1 start -->  
 <?php foreach ($faqs as $key => $faq) { ?>
<div class="panel2 panel-default"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#faq<?php echo $key + 1; ?>">
<div class="panel-heading2">
<div class="panel-title"><?php echo $faq['Faq']['question']; ?></div>
</div>
</a>
<div id="faq<?php echo $key + 1; ?>" class="panel-collapse collapse">
<div class="panel-body2"><?php echo $faq['Faq']['answer']; ?>
</div>
</div>
</div>
<?php } ?>
<!-- faq1 end -->  
</div>	
</div>
</div>
<div class="text-center topmargin20"><img src="<?php echo $this->webroot; ?>img/elephant_left.png"  alt="soil-2-soul-elephant"/> &nbsp; <a href="<?php echo Router::url('/faqs'); ?>"><button type="button" class="viewallbtn">View more FAQs</button></a> &nbsp; <img src="<?php echo $this->webroot; ?>img/elephant_right.png"  alt="soil-2-soul-elephant"/></div>
</div>	
</section>	
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
	
<script type="text/javascript">
  $('.OurTeamModel').click(function(){
    var testID = $(this).attr('data_id');
    var testName = $('#ourTeam_'+testID).text(); 
    var ImageId = '#ourTeamImage_'+testID;
    var testImage =  $(ImageId).html();
    var Note = $('#ourTeamNote_'+testID).attr('data-note');

    $('#TourScholars').modal('show');
    $('.scholarmodal-title').text(testName)
    $('.guideimg2').html(testImage);
    $('.conte').html(Note);

  });

  $('.enquiryModule').click(function(){
  		$('#Enquire').modal('show');
  });

</script>	
