<!--Collage start here-->
<section class="collage">
<!--Tagline start here-->
<div class="taglinearea">
<div class="container">
<div class="taglinecont">	
<div class="taglineicon"><img src="<?php echo $this->webroot;?>img/taglineicon.png" alt="soil-2-soul-lotus-logo"></div>	
<h1>Transformative journeys<br class="hidden-xs">
from the Soil 2 Soul of India / Bharat</h1>	
<h6>“Scholar led unique and life changing experiences focusing on sanatan dharma and its virtues”</h6>
<div class=""><img src="<?php echo $this->webroot;?>img/elephant_leftw.png"  alt="soil-2-soul-elephant-logo"/> &nbsp;
 <a href="<?php echo Router::url('/our_journies'); ?>"><button type="button" class="explorebtn">Explore</button></a> &nbsp; <img src="<?php echo $this->webroot;?>img/elephant_rightw.png"  alt="soil-2-soul-elephant-logo"/></div>	
</div>	
</div>	
</div>
<!--Tagline end here-->	
<video width="100%" src="<?php echo $this->webroot ?>img/collagevdo.mp4" autoplay loop muted playsinline="true" disablePictureInPicture="true" preload="auto"></video>
</section>
<!--Collage end here--> 
	
<!--Our Journeys start here-->
<section class="ourjourneysarea trishul">
<div class="container">
<div class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">	
<div class="ourjourneysbigtext">
<img src="<?php echo $this->webroot;?>img/om.png" alt="soil-2-soul-Om"/><br>
<br>
<strong>Soil 2 Soul Expeditions</strong> offers a scholar led transformative journey that encourages self-reflection, mindfulness, and personal growth, fostering a sense of purpose and fulfilment. We are proud to introduce <strong>"Transformative Journeys to Sacred India / Bharat,"</strong> a pioneering initiative aimed at offering seekers an opportunity to explore India's sacred places in a profound and insightful way.
</div>
</div>
<div class="wow fadeInUp" style="visibility: visible; animation-name: fadeInUp;">	
<div class="ourjourneyssmalltext topmargin25">Embracing a holistic experience that combines cultural exploration, spiritual understanding, and personal growth. The primary objective of our programs is to provide seekers with an enriching and life-changing experience. Through meticulously designed itineraries, in-depth research, and comprehensive training, we aim to: Immerse seekers in the richness of India's culture, facilitate a deeper understanding of the spiritual practices, philosophies, and beliefs that have shaped India's sacred sites for centuries.</div>	
</div>
<div class="wow zoomIn topmargin25" style="visibility: visible; animation-name: zoomIn;">		
<div class="text-center"><img src="<?php echo $this->webroot;?>img/elephant_left.png"  alt="soil-2-soul-elephant-logo"/> &nbsp; <a href="<?php echo Router::url('/about-us'); ?>"><button type="button" class="viewallbtn">Learn More</button></a> &nbsp; <img src="<?php echo $this->webroot;?>img/elephant_right.png" alt="soil-2-soul-elephant-logo"/></div>
</div>		
<!-- Our journey Packge Start Hew -->	
<?php  if(!empty($packages)){ echo $this->element('HomePage/our_journey');}?>	
</section>	
<!--Our Journeys end here-->
	
<!--Meet Our Team start here-->
<?php if(!empty($ourTeams)){ ?>
<section class="meetyourguidearea diya">
<div class="container">
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
<div class=""><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo"></div>	
<div class="mainheading text-center"><h2>Meet Our Team</h2></div>
</div>	
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">
<div class="meetyourguidecont">

	
<div class="bx-wrapper topmargin40">
<div class="bxslider3">
<?php foreach ($ourTeams as $key => $ourTeam) { 
	$altName = strtolower($ourTeam['OurTeam']['name']);
   $slug = strtolower($ourTeam['OurTeam']['page_slug']);
?>
<a href="<?php echo $this->html->url(['controller'=>'our_teams','action'=>'view','team_slug'=>$slug]); ?>">	
<div class="meetyourguidebox">
<div class="guideimgcircle">
<div class="guideleaf"><img src="<?php echo $this->webroot;?>img/guideleaf.png" alt="soil-2-soul-leaf-logo"></div>	
<div class="guideimg">
	<?php echo $this->bs->image('OurTeam.image_file',$ourTeam,['alt'=>'soil-2-soul-our-team'.$altName,'title'=>$ourTeam['OurTeam']['name']]); ?>
</div>
<h6><?php echo $ourTeam['OurTeam']['name'];?></h6>	
</div>		
</div>
</a>	
<?php } ?>



</div>
</div>	
	
</div>	
</div>	
<div class="wow zoomIn topmargin30" style="visibility: visible; animation-name: zoomIn;">	
<div class="text-center"><img src="<?php echo $this->webroot;?>img/elephant_left.png"  alt=""/> &nbsp; <a href="<?php echo Router::url('/our-teams'); ?>"><button type="button" class="viewallbtn">Our Team</button></a> &nbsp; <img src="<?php echo $this->webroot;?>img/elephant_right.png"  alt=""/> </div>
</div>	
</div>	
</section>	
<?php } ?>
<!--Meet Our Team end here-->
	
<!--Testimonials section start here-->	
<?php echo $this->element('testimonials'); ?>		
<!--Testimonials end here-->	
	
<!--Middle section start here-->
<section class="whitecontareahome kalash">
<div class="container">
<!--Why Choose Us section start here-->	
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">	
<div class=""><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block"></div>	
<div class="mainheading text-center"><h2>Why Choose Us?</h2></div>
<div class="subheadingtext text-center">Bring spirituality to your life</div>
</div>

<div class="wow bounce" style="visibility: visible; animation-name: bounce;">	
<div class="row padding5pxarea topmargin30">

<?php foreach ($bookingFacilities as $key => $bookingFacility) { ?>
<div class="col-md-2 col-sm-4 col-xs-6 padding5px">
<div class="whychooseboxarea">
<div class="whychoosebox affordablejourneysbox">
<div class="whychooseboxcont">
<div class="whychooseicon"><?php echo $this->bs->image('BookingFacility.image_file',$bookingFacility,['alt'=>'soil-2-soul-our-team'.$bookingFacility['BookingFacility']['name'],'title'=>$bookingFacility['BookingFacility']['name']]); ?></div>
<h6><?php echo $bookingFacility['BookingFacility']['name']; ?></h6>
<img src="<?php echo $this->webroot;?>img/swastika.png" alt=""/> </div>	
</div>
</div>		
</div>	
<?php } ?>

</div>	
</div>	
<!--Why Choose Us section end here-->			
	
<!--Blogs section start here-->
<?php  if(!empty($blogs)){?>	
<!--Blogs section start here-->
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">	
<div class="topmargin60"><img src="<?php echo $this->webroot ?>img/logoshape_heading.png" class="img-responsive center-block"></div>	
<div class="mainheading text-center"><h2>Blogs to Inspire Your Inner Journey</h2></div>
</div>	
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">	
<div class="row topmargin30">
<?php foreach ($blogs as $key => $blog) {
	$slugMethod = 	strtolower($blog['BlogCategory']['page_slug']);
	$htmlUrl = $this->Html->url(array('controller'=>'blogs','action'=>'view','id' => $blog['Blog']['id'],'slugMethod'=>$slugMethod ,'blog_slug' => $blog['Blog']['page_slug']));
?>
<div class="col-md-5 col-sm-4">
<div class="blogbox">	
<a href="<?php echo $htmlUrl;?>">
<div class="blogboxbigimg">
<div class="blogboxbigshade">
<h5><?php echo $blog['Blog']['title']; ?></h5>	
<div class="blogadmindetails">
<div class="blogadmindetailscont">
<div class="blogadminiconcircle">
	<!-- <img src="<?php //echo $this->webroot ?>img/usericon.png"> -->
	<?php echo $this->bs->image('BlogAuthor.author_image',$blog['BlogAuthor'],['alt'=>$blog['BlogAuthor']['page_slug'].'-'.$blog['Blog']['page_slug']]); ?>
</div>	
</div>
<div class="blogadmindetailscont">
<div class="blognamedatetext"><?php echo (!empty($blog['BlogAuthor']['author_name'])) ? $blog['BlogAuthor']['author_name'] : ''; ?><br>
<span><?php echo date_format(date_create($blog['Blog']['blog_date']),'d M Y') ?></span></div>	
</div>
</div>	
</div>	
<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>$blog['BlogCategory']['page_slug'].'-'.$blog['Blog']['page_slug'],'title'=>$blog['Blog']['title']]); ?>
</div>
</a>	
</div>	
</div>
<?php if ($key == 0) {break;}} ?>

<div class="col-md-4 col-sm-4">
<?php foreach ($blogs as $key => $blog) {
	if($key <= 0){continue;}
	$slugMethod = 	strtolower($blog['BlogCategory']['page_slug']);
	$htmlUrl = $this->Html->url(array('controller'=>'blogs','action'=>'view','id' => $blog['Blog']['id'],'slugMethod'=>$slugMethod ,'blog_slug' => $blog['Blog']['page_slug']));
?>
<div class="blogbox">	
<a href="<?php echo $htmlUrl;?>">
<div class="blogboxsmallimg">
<div class="blogboxbigshade">
<h5><?php echo $blog['Blog']['title']; ?></h5>	
<div class="blogadmindetails">
<div class="blogadmindetailscont">
<div class="blogadminiconcircle">
	<!-- <img src="<?php //echo $this->webroot ?>img/usericon.png"> -->
	<?php echo $this->bs->image('BlogAuthor.author_image',$blog['BlogAuthor'],['alt'=>$blog['BlogAuthor']['page_slug'].'-'.$blog['Blog']['page_slug']]); ?>
</div>	
</div>
<div class="blogadmindetailscont">
<div class="blognamedatetext"><?php echo (!empty($blog['BlogAuthor']['author_name'])) ? $blog['BlogAuthor']['author_name'] : ''; ?><br>
<span><?php echo date_format(date_create($blog['Blog']['blog_date']),'d M Y') ?></span></div>	
</div>
</div>	
</div>	
<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>$blog['BlogCategory']['page_slug'].'-'.$blog['Blog']['page_slug'],'title'=>$blog['Blog']['title']]); ?>
</div>
</a>	
</div>	
<?php if ($key == 2) {break;}} ?>
</div>
<!-- Last panel -->
<?php foreach ($blogs as $key => $blog) {
	if($key <= 2){continue;}
	$slugMethod = 	strtolower($blog['BlogCategory']['page_slug']);
	$htmlUrl = $this->Html->url(array('controller'=>'blogs','action'=>'view','id' => $blog['Blog']['id'],'slugMethod'=>$slugMethod ,'blog_slug' => $blog['Blog']['page_slug']));
?>
<div class="col-md-3 col-sm-4">
<div class="blogbox">	
<a href="<?php echo $htmlUrl;?>">
<div class="blogboxbigimg">
<div class="blogboxbigshade">
<h5><?php echo $blog['Blog']['title']; ?></h5>
<div class="blogadmindetails">
<div class="blogadmindetailscont">
<div class="blogadminiconcircle"><?php echo $this->bs->image('BlogAuthor.author_image',$blog['BlogAuthor'],['alt'=>$blog['BlogAuthor']['page_slug'].'-'.$blog['Blog']['page_slug']]); ?></div>	
</div>
<div class="blogadmindetailscont">
<div class="blognamedatetext"><?php echo (!empty($blog['BlogAuthor']['author_name'])) ? $blog['BlogAuthor']['author_name'] : ''; ?><br>
<span><?php echo date_format(date_create($blog['Blog']['blog_date']),'d M Y') ?></span></div>	
</div>
</div>	
</div>	
<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>$blog['BlogCategory']['page_slug'].'-'.$blog['Blog']['page_slug'],'title'=>$blog['Blog']['title']]); ?>
</div>
</a>	
</div>	
</div>
<?php } ?>	
</div>	
</div>
<div class="wow zoomIn" style="visibility: visible; animation-name: zoomIn;">	
<div class="text-center"><a href="<?php echo Router::url('/blogs')?>"><button type="button" class="viewallbtn">View all Blogs</button></a></div>
</div>	
<?php }?>	
<!--Blogs section end here-->
<!--Our Co-Brands section start here-->	
<?php echo $this->element('blogs/brand'); ?>		
<!--Our Co-Brands section end here-->	

</div>	
</section>	
<!--Middle section end here-->