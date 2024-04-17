<div class="topmargin60" id="trails"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo"></div>
<div class="mainheading text-center"><h2>Other Trails</h2></div>

<div class="traillist topmargin30">
<ul>
<?php foreach ($otherTrails as $key => $otherTrail) { 

  $packageSlug = $ourJourny['Package']['page_slug'];   
  $detailUrl = $this->Html->url(array('controller'=>'our_journies','action'=>'view','page_slug' => $otherTrail['OurJourny']['page_slug']));

?>
  <li><a href="<?php echo $detailUrl;?>">
    <div class="trailbox">
      <h6>Trail <?php echo sprintf("%02d", $otherTrail['OurJourny']['trail']); ?></h6>
      <?php echo $otherTrail['OurJourny']['name'];?>
      <div class="traillink"><i class="fa fa-chevron-circle-right"></i></div>
    </div>

  </a></li>
<?php } ?>
</ul>
</div>