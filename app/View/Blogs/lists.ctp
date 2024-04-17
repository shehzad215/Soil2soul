<?php 
	// debug($blogs);exit;
?>
<!--Breadcrum area start here-->
<section class="breadcrumbarea">
<div class="container">
<nav class="breadcrumb"><a class="breadcrumb-item" href="<?php echo Router::url('/')?>">ATS Travel</a> 
 <span class="breadcrumb-item active"><?php echo $blogCategory['BlogCategory']['name']; ?></span> <span class="breadcrumb-item active">Blogs</span> </nav>
</div>
</section>
<!--Breadcrum area end here-->
	
<!--Middle section start here-->
<section class="innercontarea">
<div class="container">
<div class="row">
<div class="col-md-8">	
<div class="mainheading"><h3>Blogs / <?php echo $blogCategory['BlogCategory']['name']; ?></h3></div>	
<div class="row">
<?php foreach ($blogs as $key => $blog) { 
	/*Short Note*/
	$shortNote = (!empty($blog['Blog']['header_text'])) ? substr($blog['Blog']['header_text'],0,120).'...' : '---';
	/*HTML Url*/
	$htmlUrlLink = 	$this->Html->url(array('controller'=>'blogs','action'=>'view','blog_slug'=>$blog['Blog']['page_slug'],'id'=>$blog['Blog']['id']));
?>
<div class="col-md-6 col-sm-6">
<div class="blogsbox">
<div class="blogsboximg">
<a href="<?php echo $htmlUrlLink;?>">
	<!-- <img src="img/recentarticles_img01.jpg"> -->
	<?php echo $this->Bs->image('Blog.image_file',$blog,['alt'=>$blog['Blog']['page_slug'],'title'=>$blog['Blog']['page_slug']]); ?>
</a>
</div>	
<h3><a href="<?php echo $htmlUrlLink;?>"><?php echo $blog['Blog']['title'];?></a></h3>
<div class="blogsdatetext"><a href="<?php echo $this->Html->url(array('controller'=>'blogs','action'=>'lists','category_slug'=>$blog['BlogCategory']['page_slug']));?>"><?php echo $blog['BlogCategory']['name']; ?></a> - <?php echo date_format(date_create($blog['Blog']['blog_date']),'jS M Y')?></div>     
<div class="blogpostcontent topmargin20"><?php echo $shortNote;?></div> 
<div class="viewalltext topmargin20"><a href="<?php echo $htmlUrlLink;?>">Learn More <i class="fa fa-chevron-right"></i></a></div>	    
</div>	
</div>
<?php } ?>
</div>    
<?php echo $this->Bs->paginationRow(); ?>
<?php echo $this->Js->writeBuffer(); ?>
</div>
<!-- Left Side Panel Start Here -->	
<?php echo $this->element('blogLeftpanel'); ?>  
</div>
</div>	
</section>
<!--Middle section end here-->
	
