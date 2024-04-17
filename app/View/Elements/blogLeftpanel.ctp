<div class="col-md-4 rowmargintabmob30">
<?php if(!empty($relatedBlogs)){ ?>
<div class="mainheading"><h4>Related Post</h4></div>
<div class="row">
<?php foreach ($relatedBlogs as $key => $relatedBlog) {
	/*HTML Url*/
	$htmlUrlLink = 	$this->Html->url(array('controller'=>'blogs','action'=>'view','blog_slug'=>$relatedBlog['Blog']['page_slug'],'id'=>$relatedBlog['Blog']['id']));
 ?>
<div class="col-md-12 col-sm-6">
<div class="mostviewblogbox">
<a href="<?php echo $htmlUrlLink;?>">
<div class="row nopaddingarea">
<div class="col-xs-4 nopadding">
	<?php echo $this->Bs->image('Blog.image_file',$relatedBlog,['alt'=>$relatedBlog['Blog']['page_slug'],'title'=>$relatedBlog['Blog']['page_slug']]); ?>
</div>
<div class="col-xs-8 nopadding">
<div class="mostviewblogcont">
<h6><?php echo $relatedBlog['Blog']['title'];?></h6>    
</div>    
</div>    
</div>    
</a>       
</div>    
</div>
<?php } ?> 
</div>
<hr>
<?php } ?>
<!-- Categories -->
<div class="mainheading"><h5>CATEGORIES</h5></div>
<ul class="BlogCategoryUl">
 <?php foreach ($blogCategories as $key => $blogCategory) { 
 		// if($categoryId == $blogCategory['BlogCategory']['id']){
 	$active = ($categoryId == $blogCategory['BlogCategory']['id']) ? 'activeLi' : '';
 ?>
	<li><a href="<?php echo $this->Html->url(array('controller'=>'blogs','action'=>'lists','category_slug'=>$blogCategory['BlogCategory']['page_slug']));?>" class="<?php echo $active;?>"><?php echo $blogCategory['BlogCategory']['name'];?> <span class="pull-right">(<?php echo (!empty($blogCategory['Blog'])) ? count($blogCategory['Blog']) : '0'; ?>)</span></a></li>
 <?php } ?>		
</ul>


<!-- Tags -->
<?php if(!empty($blogTagsArr)){ ?>
<div class="mainheading"><h5>TAGS</h5></div>
<?php foreach ($blogTagsArr as $key => $value) { ?>
<a href="<?php echo $this->Html->url(array('controller'=>'blog_tags','action'=>'index','tag_slug'=>$value['BlogTag']['page_slug']));?>"><button class="taglabel"><?php echo $value['BlogTag']['name'];?></button></a>	
<?php } ?>
<?php } ?>
</div>