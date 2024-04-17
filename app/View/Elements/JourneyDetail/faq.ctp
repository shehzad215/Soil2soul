<section class="graycontarea">
<div class="container">
<div class="" id="faq"><img src="<?php echo $this->webroot;?>img/logoshape_heading.png" class="img-responsive center-block" alt="soil-2-soul-leaf-logo" title="Soil 2 Soul : expeditions"></div>	
<div class="mainheading text-center"><h2>Journey FAQs</h2></div>	
<div class="row topmargin40">
<div class="col-md-1"></div>
<div class="col-md-10">
<div class="panel-group" id="accordion2">
<?php foreach ($faqs as $key => $faq) {
	$faqId = 'faq'.$faq['Faq']['id'];
?>
<!-- faq1 start -->  
<div class="panel2 panel-default"> <a class="accordion-toggle collapsed" data-toggle="collapse" data-parent="#accordion2" href="#<?php echo $faqId;?>">
<div class="panel-heading2">
<div class="panel-title"><?php echo $faq['Faq']['question'];?></div>
</div>
</a>
<div id="<?php echo $faqId;?>" class="panel-collapse collapse">
<div class="panel-body2"><?php echo $faq['Faq']['answer'];?>
</div>
</div>
</div>
<!-- faq1 end -->  
<?php } ?>
    
</div>	
</div>
</div>
<?php if($journey == true){ ?>
<div class="text-center topmargin20"><img src="<?php echo $this->webroot;?>img/elephant_left.png"  alt="soil-2-soul-elephant"/> &nbsp; <a href="<?php echo Router::url('/faqs'); ?>"><button type="button" class="viewallbtn">View more FAQs</button></a> &nbsp; <img src="<?php echo $this->webroot;?>img/elephant_right.png"  alt="soil-2-soul-elephant"/></div>
<?php } ?>
</div>	
</section>