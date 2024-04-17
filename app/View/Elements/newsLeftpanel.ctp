<div class="mainheading topmargin30"><h3>Most Viewed</h3></div>
<div class="row">
<?php foreach ($rendomBlogs as $key => $news) { ?>
<div class="col-md-12 col-sm-6">
<div class="mostviewblogbox">
<a href="<?php echo $this->Html->url(array('controller'=>'news','action'=>'view','news_slug' => $news['News']['page_slug'],'id'=>$news['News']['id']))?>">
<div class="row nopaddingarea">
<div class="col-xs-4 nopadding">
	<?php 
		echo $this->Bs->image('News.small_image',$news);
	?>
</div>
<div class="col-xs-8 nopadding">
<div class="mostviewblogcont">
<h6><?php echo $news['News']['title']; ?></h6>    
</div>    
</div>    
</div>    
</a>       
</div>    
</div>
<?php } ?>
</div>