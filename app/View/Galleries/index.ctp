<!--Collage start here-->
<section class="innercollage">
  <div class="innerheading">
    <div class="lotus"><img src="<?php echo $this->webroot ?>img/lotus.png" alt="soil-2-soul-lotus-logo" title="Soil 2 Soul : expeditions"/></div>
    <h1>Journeys Gallery</h1>
  </div>
  <img src="<?php echo $this->webroot ?>img/gallery_collage.jpg" alt="soil-2-soul-galleries" title="Soil 2 Soul : Gallery"> </section>
<!--Collage end here-->

<?php //debug($galleryCategories);die; ?>

<div class="whitecontarea">
  <div class="container">
	  <div class="text-center"><img src="<?php echo $this->webroot ?>img/om.png" alt="soil-2-soul-Om-logo"/><br>
<br></div>
    <div class="row">
    <?php foreach ($galleryCategories as $key => $galleryCategory) { 
    			//debug($galleryCategory);die;
    			?>
    		 <div class="col-sm-4">
			 <div class="galleryimgbox">
			 <a href="<?php echo $this->Html->url(['controller' => 'galleries', 'action' => 'view', 
			 'gallery_slug' => $galleryCategory['GalleryCategory']['page_slug']]); ?>">		
			 <div class="galleryimg"><?php echo $this->Bs->image('GalleryCategory.image_file',$galleryCategory,['alt'=>'soil-2-soul'.'-'.$galleryCategory['GalleryCategory']['name']]) ?> 
			 </div>
			 <h3><?php echo $galleryCategory['GalleryCategory']['name'] ?></h3>
			 </a>	
			 </div>	
			 </div>
   <?php } ?>


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