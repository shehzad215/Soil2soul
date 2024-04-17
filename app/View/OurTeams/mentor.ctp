<!--Collage start here-->
<section class="innercollage">
<div class="innerheading">
  <div class="lotus"><img src="<?php echo $this->webroot; ?>img/lotus.png" alt="soil-2-soul-lotus-flower"/></div>
  <h1>Our Mentors</h1>
</div>
<img src="<?php echo $this->webroot; ?>img/thumbnail_ourmentor_collage.jpg" alt="soil-2-soul-our-teams" title="Soil 2 Soul : Our Teams"> </section>
<!--Collage end here-->

<div class="whitecontarea">
<div class="container">
  <div class="text-center"><img src="<?php echo $this->webroot; ?>img/om.png" alt="soil-2-soul-Om-logo"/><br>
<br></div>
  <div class="teamlist">
    <ul>
     <?php foreach ($ourTeams as $key => $ourTeam) {
          $altName = strtolower($ourTeam['OurTeam']['name']);
          $shortNote = substr($ourTeam['OurTeam']['description'], 0, 70).'...';
          $slug = strtolower($ourTeam['OurTeam']['page_slug']);
      ?>
      <li>
        <div class="scholarboxcont"> <a href="<?php echo $this->html->url(['controller'=>'our_teams','action'=>'view','team_slug'=>$slug]); ?>">
          <div class="scholarbox">
            <div class="guideimgcircle">
              <div class="guideleaf"><img src="<?php echo $this->webroot;?>img/guideleaf.png" alt="soil-2-soul-leaf-logo"></div>
              <div class="guideimg">
                <?php echo $this->bs->image('OurTeam.image_file',$ourTeam,['alt'=>'soil-2-soul-our-team'.'-'.$altName,'title'=>$ourTeam['OurTeam']['name']]); ?>
              </div>
            </div>
            <div class="text-center topmargin25 guidename"><?php echo $ourTeam['OurTeam']['name'];?></div>
            <div class="text-center topmargin5"><?php echo (!empty($ourTeam['OurTeam']['designation'])) ? $ourTeam['OurTeam']['designation'] : '';?></div>
            <div class="text-center topmargin10"><?php echo  $shortNote; ?></div>
            <div class="topmargin25 text-center">
              <button type="button" class="viewallbtn">Read More</button>
            </div>
          </div>
          </a> </div>
      </li>
    <?php } ?>
    </ul>
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
