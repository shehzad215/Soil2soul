
<div class="" id="subjectscholars"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo"></div>
<div class="mainheading text-center">
<h2>Our Tour Scholars</h2>
</div>
<div class="scholarboxcontarea">
<div class="bx-wrapper1 topmargin40">
<div class="bxslider1">
<?php foreach ($ourJourny['OurTeam'] as $key => $OurTeam) { 
    
  ?>
<div class="scholarboxcont">
<div class="scholarbox">
<div class="guideimgcircle">
<div class="guideleaf"><img src="<?php echo $this->webroot;?>img/guideleaf.png" alt="soil-2-soul-leaf-logo"></div>  
<!-- <div class="guideimg"><img src="img/guide_img01.jpg"></div> -->
<div class="guideimg" id="scholarImage<?php echo $OurTeam['id'];?>"><?php echo $this->bs->image('OurTeam.image_file',$OurTeam,['alt'=>$ourJourny['OurJourny']['page_slug'].'-'.$OurTeam['page_slug'],'title'=>$OurTeam['name']]); ?></div>
</div>
<div class="text-center topmargin25 guidename" id="scholer_<?php echo $OurTeam['id'];?>"><?php echo $OurTeam['name'];?></div>
<div class="text-center topmargin5"><?php echo (!empty($OurTeam['expertise'])) ? $OurTeam['expertise'] : '';?></div>

<!-- <div class="text-center topmargin10" id="scholarNote<?php //echo $OurTeam['id'];?>" 
  data-note="<?php //echo $OurTeam['description'];?>"><?php //echo substr($OurTeam['description'],'0','100').'...';?></div> -->

<div class="topmargin25 text-center"> 
  <img src="<?php echo $this->webroot;?>img/elephant_left.png"  alt="<?php echo $ourJourny['OurJourny']['page_slug'].'-'.$OurTeam['page_slug'];?>"/> &nbsp;
<button type="button" class="viewallbtn prevent OurTeamModel" data_id="<?php echo $OurTeam['id'];?>">Read More</button>
&nbsp; <img src="<?php echo $this->webroot;?>img/elephant_right.png"  alt="<?php echo $ourJourny['OurJourny']['page_slug'].'-'.$OurTeam['page_slug'];?>"/> </div>
</div>
</div>
<?php } ?>

</div>
</div>
</div>

