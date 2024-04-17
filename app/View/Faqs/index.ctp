<!--Collage start here-->
<section class="innercollage">
<div class="innerheading">
<div class="lotus"><img src="<?php echo $this->webroot;?>img/lotus.png" alt="soil-2-soul-lotus-flower"/></div>		
<h1>FAQs</h1></div>	
<img src="<?php echo $this->webroot;?>img/thumbnail_faq_collage.jpg" alt="soil-2-soul-faqs" title="Soil 2 Soul : Faqs">
</section>
<!--Collage end here--> 
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

</div>	
</section>	
<!--Journey FAQs section end here-->	
	
<!--Testimonials section start here-->	
		
<!--Testimonials end here-->	
	
</div>	
	

