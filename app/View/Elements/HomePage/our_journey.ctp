<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">	
<div class="topmargin70"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo" title="Soil 2 Soul : expeditions"></div>	
<div class="mainheading text-center"><h2>Our Journeys</h2></div>	
</div>	
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">	
	<div class="topmargin40">
		<ul class="tabs5">
       <?php foreach ($packages as $key => $package) { 
       	$tabId = 'tab'.$package['Package']['id'].'a';
       	$active = ($key == 0) ? 'active' : '';

       ?>
        <li rel="<?php echo $tabId; ?>" class="<?php echo $active; ?>"><?php echo $package['Package']['short_name'];?></li>
       <?php } ?>
     </ul>
     <div class="tab_container5">
 	 <?php foreach ($packages as $key => $package) { 
   	
 	 	$shortNote = strip_tags($package['Package']['description']);
	     $shortNote = substr($shortNote, 0,130);

   	$tabId = 'tab'.$package['Package']['id'].'a';
   	$active = ($key == 0) ? 'd_active5' : '';

   	$trailCount = count($package['OurJourny']);
   	$trailCount = sprintf("%02d", $trailCount);

   	$htmlUrl = $this->Html->url(array('controller'=>'packages','action'=>'view','id' => $package['Package']['id'],'pacakage_slug'=>$package['Package']['page_slug']));

   ?>
    <h4 class="<?php echo $active; ?> tab_drawer_heading5" rel="<?php echo $tabId; ?>"><?php echo $package['Package']['short_name'];?></h4>
    <div id="<?php echo $tabId; ?>" class="tab_content5"> 
      <!--<h3 class="hidden-sm hidden-xs">North America</h3>-->
      <div class="journeyslistareahome">
    <div class="journeyslistbox">
    <div class="row">
    <div class="col-md-5">
    <div class="journeyslistboximgareahome">
    <div class="trailtag"><span><?php echo $trailCount;?></span><br> Trails</div>        
    <div class="journeyslistboximghome">
    	<!-- <img src="img/journey_img03.jpg"> -->
    	<?php echo $this->bs->image('Package.image_file',$package,['alt'=>$package['Package']['page_slug'],'title'=>$package['Package']['name']]) ?>
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
      <a href="<?php echo $detailUrl;?>"><li><span>Trail <?php echo sprintf("%02d", $value['trail']);?>:</span> <?php echo $value['name']; ?> <div class="traillink"><i class="fa fa-chevron-circle-right"></i></div></li></a>
    <?php } ?>	
      
    </ul>    
    </div>  


    </div>	
    </div>	
    </div>	
        </div>	
        </div>
    </div>
    <?php } ?>	 
 </div>
	</div>
</div>
<div class="wow zoomIn topmargin40" style="visibility: visible; animation-name: zoomIn;">		
<div class="text-center"><img src="<?php echo $this->webroot;?>img/elephant_left.png"  alt="soil-2-soul-elephant"/> &nbsp; <a href="<?php echo Router::url('/our_journeys'); ?>"><button type="button" class="viewallbtn">View all Journeys</button></a> &nbsp; <img src="<?php echo $this->webroot;?>img/elephant_right.png"  alt="soil-2-soul-elephant"/> </div>
</div>	
</div>