<h4 class="scholarmodal-title"><?php echo $schoLarDetails['OurTeam']['name'];?></h4>
<div class="row">
<div class="col-sm-5">
  <div class="guideimgcircle2">
    <div class="guideleaf2"><img src="<?php echo $this->webroot;?>img/guideleaf.png" alt="soil-2-soul-leaf-logo" title="Soil 2 Soul Logo"></div>
    <div class="guideimg2">
      <?php echo $this->Bs->Image('OurTeam.image_file',$schoLarDetails,['alt'=>$schoLarDetails['OurTeam']['page_slug']]); ?>
    </div>
  </div>
</div>
<div class="col-sm-7 rowmargin30 conte">
 <h4><?php echo $schoLarDetails['OurTeam']['expertise'];?></h4> 
<?php echo (!empty($schoLarDetails['OurScholarDetail'])) ? $schoLarDetails['OurScholarDetail'][0]['description'] : '';?></div>
</div>