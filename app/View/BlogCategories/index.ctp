<!--Collage start here-->
<section class="blogcollage">
<div class="blogheading"><h1>Blogs to Inspire Your Inner Journey</h1></div>	
<img src="<?php echo $this->webroot;?>img/blogs_collage.jpg"  alt="soil-2-soul-expedition-blogs">
</section>
<!--Collage end here--> 
	
<!--Middle section start here-->
<section class="whitecontarea">
<div class="container">
<div class="text-center"><img src="<?php echo $this->webroot; ?>img/om.png" alt="soil-2-soul-expedition-Om-logo"/><br>
<br></div>		
<div class="row">
<div class="col-md-9">
<div class="mainheading"><h3><?php echo $blogCategory['BlogCategory']['name'];?></h3></div>
<!-- Blog Listing Start Here -->
<div class="row">
<?php foreach ($blogDetails as $key => $blog) {
	$slugMethod = 	strtolower($blog['BlogCategory']['page_slug']);
	$htmlUrl = $this->Html->url(array('controller'=>'blogs','action'=>'view','id' => $blog['Blog']['id'],'slugMethod'=>$slugMethod ,'blog_slug' => $blog['Blog']['page_slug']));
 ?>
<div class="col-sm-6">
<div class="blogboxinnerarea">
<div class="blogboxinner">	
<a href="<?php echo $htmlUrl;?>">
<div class="blogboxbigimg">
<div class="blogboxbigshade">
<h5><?php echo $blog['Blog']['title']; ?></h5>	
<div class="blogadmindetails">
<div class="blogadmindetailscont">
<div class="blogadminiconcircle">
	<!-- <img src="<?php //echo $this->webroot;?>img/usericon.png"> -->
	 <?php echo $this->bs->image('BlogAuthor.author_image',$blog['BlogAuthor'],['alt'=>$blog['Blog']['page_slug'].'-'.$blog['BlogAuthor']['page_slug'],'title'=>$blog['BlogAuthor']['author_name']]); ?>
</div>	
</div>
<div class="blogadmindetailscont">
<div class="blognamedatetext"><?php echo $blog['BlogAuthor']['author_name'];?><br>
<span><?php echo date_format(date_create($blog['Blog']['blog_date']),'d M Y') ?></span></div>	
</div>
</div>	
</div>	
<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>$blog['Blog']['page_slug'],'title'=>$blog['Blog']['title']]); ?>
</div>
</a>
</div>
<div class="blogboxdesc"><?php echo  substr($blog['Blog']['note'], 0, 170).'...'; ?></div>	
</div>
</div>	
<?php } ?>
</div>	
<!-- End Here -->
</div>
<!-- Page Left Panel -->
<div class="col-md-3 rowmargintabmob30">
<?php echo $this->element('blogs/blog_left_panel'); ?>	
</div>	
</div>	
<!-- Co Brands -->	
<?php echo $this->element('blogs/brand'); ?>	
	
</div>	
</section>	
<!--Middle section end here-->	