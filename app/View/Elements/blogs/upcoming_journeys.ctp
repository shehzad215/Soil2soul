<?php //debug($journeyListings);die; ?>

<?php if(!empty($journeyListings)) { ?>
<div class="mainheading topmargin30"><h3>Upcoming Journeys</h3></div>

<div class="bx-wrapper5">
<div class="bxslider7">

<?php foreach ($journeyListings as $key => $journeyListing) { ?>
<div class="upcomingjourneysbox">
<?php $htmlUrl = $this->Html->url(array('controller'=>'our_journies','action'=>'view','page_slug' => $journeyListing['OurJourny']['page_slug'])); ?>	
<a href="<?php echo $htmlUrl; ?>">	
<div class="upcomingjourneysboximg">
<div class="upcomingjourneysboxshade ourjourneysboxbg01"><h4><?php echo $journeyListing['OurJourny']
['name']; ?></h4></div>
<?php echo $this->Bs->image('OurJourny.journey_banner',$journeyListing); ?>
<!-- <img src="<?php //echo $this->webroot;?>img/ourjourneys_img01.jpg" alt=""> -->
</div>
</a>	
</div>	
<?php } ?>
</div>
</div>	
<?php } ?>