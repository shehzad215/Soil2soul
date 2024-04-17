<!--Collage start here-->
<?php //debug($ourTeam);die; ?>
<section class="innercollage">
  <div class="innerheading">
    <div class="lotus"><img src="<?php echo $this->webroot; ?>img/lotus.png" alt="soil-2-soul-lotus-flower"/></div>
    <h1><?php echo $ourTeam['OurTeam']['name']; ?></h1>
  </div>
  <img src="<?php echo $this->webroot; ?>img/ourteam_collage.jpg" alt="soil-2-soul-our-team"> </section>
<!--Collage end here-->

<div class="whitecontarea">
  <div class="container">
  <div class="text-center"><img src="<?php echo $this->webroot; ?>img/om.png" alt="soil-2-soul-Om-logo"/><br>
<br></div>
    <div class="row">
	 <div class="col-sm-9">
	<div class="row">
	<div class="col-sm-4">
	<div class="teamphoto">
	<?php echo $this->Bs->image('OurTeam.image_file',$ourTeam,['alt'=>'soil-2-soul-our-team-'.$ourTeam['OurTeam']['page_slug'],'title'=>$ourTeam['OurTeam']['name']]) ?>
	 
		<h3><?php echo $ourTeam['OurTeam']['name']; ?></h3>
		<h4><?php echo (!empty($ourTeam['OurTeam']['designation'])) ? $ourTeam['OurTeam']['designation'] :''; ?></h4>
		</div>	
	</div>
	<div class="col-sm-8 rowmargin30">
	<div class="content2">
	<?php echo $ourTeam['OurTeam']['description']; ?>
	</div>	
	</div>	
	</div>	
	</div> 
	<div class="col-sm-3 rowmargin30">
	<div class="mainheading"><h3>Other Members</h3></div>	

<?php //debug($otherTeams);die; ?>
<?php foreach ($otherTeams as $key => $otherTeam) { 
	$altName = strtolower($otherTeam['OurTeam']['name']);
	$slug = strtolower($otherTeam['OurTeam']['page_slug']);
	?>
<div class="teamboxinner">	
<a href="<?php echo $this->html->url(['controller'=>'our_teams','action'=>'view','team_slug'=>$slug]); ?>">	
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td><?php echo $this->bs->image('OurTeam.image_file',$otherTeam,['alt'=>'soil-2-soul-our-team'.$altName,'title'=>$otherTeam['OurTeam']['name']]); ?></td>
<td><h4><?php echo $otherTeam['OurTeam']['name']; ?></h4></td>

</tr>
</tbody>
</table>
</a>	
</div>
<?php } ?>		

		



		
		
	</div> 	
	 </div>
  </div>
</div>

<!--Testimonials section start here-->
<?php echo $this->element('testimonials'); ?>   
<!--Testimonials end here-->

<div class="whitecontarea ourBrandPedding">
  <div class="container"> 
    <!--Our Co-Brands section start here-->
    <?php echo $this->element('blogs/brand'); ?>  
    
    <!--Our Co-Brands section end here--> 
  </div>
</div>
