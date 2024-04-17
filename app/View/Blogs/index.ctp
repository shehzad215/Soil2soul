<!--Collage start here-->
<section class="blogcollage">
<div class="blogheading"><h1>Blogs to Inspire Your Inner Journey</h1></div>	
<img src="<?php echo $this->webroot; ?>img/blogs_collage.jpg" alt="soil-2-soul-expedition-blogs">
</section>
<!--Collage end here--> 
	
<!--Middle section start here-->
<section class="whitecontarea">
<div class="container">
<div class="text-center"><img src="<?php echo $this->webroot; ?>img/om.png" alt="soil-2-soul-expedition-Om-logo"/><br>
<br></div>	
<!-- Blog Categories -->	
<?php if(!empty($blogcategories)){ ?>	
<div class="mainheading text-center"><h3>Explore by Categories</h3></div>
<div class="bx-wrapper4">
<div class="bxslider6">
<?php foreach ($blogcategories as $key => $blogcategory) { ?>
<div class="blogcatbox">	
	<a href="<?php echo $this->Html->url(array('controller'=>'blog_categories','action'=>'index','blog_cat_slug' => $blogcategory['BlogCategory']['page_slug']))?>">	
		<div class="blogcatboximg">
			<div class="blogcatboxshade"><h6><?php echo $blogcategory['BlogCategory']['name']?></h6></div>	
			<!-- <img src="img/blogcat_img01.jpg" alt=""> -->
			<?php echo $this->BS->image('BlogCategory.image_file',$blogcategory,['alt'=>$blogcategory['BlogCategory']['page_slug'],'title'=>$blogcategory['BlogCategory']['name']]); ?>
		</div>
	</a>	
</div>
<?php } ?>

	
</div>
</div>
<?php }?>
<!-- Blog Category End -->
<div class="row topmargin50">
<div class="col-md-9">

<!-- Ajax Deiv Start -->
<div id="showBlog">
<div class="mainheading "><h3>Latest Blog</h3></div>	
<div class="row">
	<?php //debug($blogs);die; ?>
<?php foreach ($blogs as $key => $blog) { 

$slugMethod = 	strtolower($blog['BlogCategory']['page_slug']);
$htmlUrl = $this->Html->url(array('controller'=>'blogs','action'=>'view','id' => $blog['Blog']['id'],'slugMethod'=>$slugMethod ,'blog_slug' => $blog['Blog']['page_slug']));
?>
<div class="col-sm-6 ">
<div class="blogboxinnerarea">
<div class="blogboxinner">	
<a href="<?php echo $htmlUrl;?>">
<div class="blogboxbigimg">
<div class="blogboxbigshade">
<h5><?php echo $blog['Blog']['title']; ?></h5>	
<div class="blogadmindetails">
<?php if(!empty($blog['BlogAuthor']['id'])){ ?>
<div class="blogadmindetailscont">
<div class="blogadminiconcircle">
 <?php echo $this->bs->image('BlogAuthor.author_image',$blog['BlogAuthor'],['alt'=>$blog['BlogAuthor']['page_slug'].'-'.$blog['Blog']['page_slug']]); ?>
</div>	
</div>
<?php } ?>
<div class="blogadmindetailscont">
<div class="blognamedatetext"><?php echo (!empty($blog['BlogAuthor']['author_name'])) ? $blog['BlogAuthor']['author_name'] : ''; ?><br>
<span><?php echo date_format(date_create($blog['Blog']['blog_date']),'d M Y') ?></span></div>	
</div>
</div>

</div>	
<!-- <img src="img/blog_img01.jpg" alt=""> -->
<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>$blog['BlogCategory']['page_slug'].'-'.$blog['Blog']['page_slug'],'title'=>$blog['Blog']['title']]); ?>
</div>
</a>
</div>
<div class="blogboxdesc"><?php echo  substr($blog['Blog']['note'], 0, 170).'...'; ?></div>	
</div>
</div>
<?php  if ($key == 3) {break;}} ?>	
</div>
</div>
<!-- Ajax Div End Here -->

<div class="mainheading topmargin10"><h3>Trending Posts</h3></div>
<div class="bx-wrapper5">
<div class="bxslider5">
<?php foreach ($blogs as $key => $blog) { 
	if($key <= 3){continue;}
	$slugMethod = 	strtolower($blog['BlogCategory']['page_slug']);
	$htmlUrl = $this->Html->url(array('controller'=>'blogs','action'=>'view','id' => $blog['Blog']['id'],'slugMethod'=>$slugMethod ,'blog_slug' => $blog['Blog']['page_slug']));
?>
<div class="blogbox">	
<a href="<?php echo $htmlUrl; ?>">
<div class="blogboxbigimg">
<div class="blogboxbigshade">
<h5><?php echo $blog['Blog']['title']; ?></h5>	
<div class="blogadmindetails">
<?php if(!empty($blog['BlogAuthor']['id'])){ ?>
<div class="blogadmindetailscont">
<div class="blogadminiconcircle">
	<!-- <img src="img/usericon.png"> -->
	<?php echo $this->bs->image('BlogAuthor.author_image',$blog['BlogAuthor'],['alt'=>$blog['BlogAuthor']['page_slug'].'-'.$blog['Blog']['page_slug']]); ?>
</div>	
</div>
<?php } ?>
<div class="blogadmindetailscont">
<div class="blognamedatetext"><?php echo (!empty($blog['BlogAuthor']['author_name'])) ? $blog['BlogAuthor']['author_name'] : ''; ?><br>
<span><?php echo date_format(date_create($blog['Blog']['blog_date']),'d M Y') ?></span></div>	
</div>
</div>	

</div>	

<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>$blog['Blog']['page_slug'],'title'=>$blog['Blog']['title']]); ?>
</div>
</a>	
</div>
<?php } ?>
	
</div>
</div>
</div>
<!-- Page Left Panel -->
<div class="col-md-3 rowmargintabmob30">
<?php echo $this->element('blogs/blog_left_panel'); ?>		
</div>	

</div>
	
<!--Our Co-Brands section start here-->	
<?php echo $this->element('blogs/brand'); ?>	
<!--Our Co-Brands section end here-->
	
</div>	
</section>	
<!--Middle section end here-->	
