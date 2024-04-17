<!-- Search Panel -->
<?php if(($currentaction != 'view') && ($controller == 'blogs')){ ?>
<div class="mainheading"><h3>Search for Blogs</h3></div>	
<div class="blogsearchbox">
<div class="">
<!-- <select class="blogsearchfieldselect">
<option>Select Category</option>	
</select>	 -->
</div>
<div class="topmargin10"><input type="text" class="blogsearchfield" placeholder="Search"></div>
<span id="nerror1" style="color:red"></span>
<div class="topmargin15"><button class="blogsearchbtn" type="button">Search Now</button></div>	
</div>	

<?php } ?>

<!-- Blog Categories -->
<?php if(($currentaction == 'view') || ($controller != 'blogs')){
	if(!empty($blogcategories)){	
?>
<div class="mainheading"><h3>Explore by Categories</h3></div>	
<div class="row padding5pxarea">

<?php foreach ($blogcategories as $key => $blogcategory) { ?>

<div class="col-md-12 col-sm-4 col-xs-6 padding5px">
<div class="blogdetcatbox">	
<a href="<?php echo $this->Html->url(array('controller'=>'blog_categories','action'=>'index','blog_cat_slug' => $blogcategory['BlogCategory']['page_slug']))?>">	
<div class="blogdetcatboximg">
<div class="blogdetcatboxshade"><h6><?php echo $blogcategory['BlogCategory']['name']?></h6></div>	
<?php echo $this->BS->image('BlogCategory.image_file',$blogcategory,['alt'=>$blogcategory['BlogCategory']['page_slug'],'title'=>$blogcategory['BlogCategory']['name']]); ?>
</div>
</a>	
</div>	
</div>
<?php } ?>	
</div>
<?php }} ?>
<!-- End Here -->

<div class="mainheading topmargin30"><h3>Most Viewed Blogs</h3></div>
<div class="row">
<?php foreach ($blogs as $key => $blog) { 
	$slugMethod = 	strtolower($blog['BlogCategory']['page_slug']);
	$htmlUrl = $this->Html->url(array('controller'=>'blogs','action'=>'view','id' => $blog['Blog']['id'],'slugMethod'=>$slugMethod ,'blog_slug' => $blog['Blog']['page_slug']));
?>
<div class="col-md-12 col-sm-6">
<div class="mostviewblogbox">
<a href="<?php echo $htmlUrl;?>">
<div class="row nopaddingarea">
<div class="col-xs-4 nopadding">
	<!-- <img src="<?php echo $this->webroot;?>img/blog_img01.jpg"> -->
	<?php echo $this->Bs->image('Blog.main_image',$blog,['alt'=>$blog['BlogCategory']['page_slug'].'-'.$blog['Blog']['page_slug'],'title'=>$blog['Blog']['title']]); ?>
</div>
<div class="col-xs-8 nopadding">
<div class="mostviewblogcont">
<h6><span><?php echo date_format(date_create($blog['Blog']['blog_date']),'d M Y') ?></span><br>
<?php echo $blog['Blog']['title']; ?></h6>    
</div>    
</div>    
</div>    
</a>       
</div>	
</div>
<?php  if ($key == 3) {break;}} ?>
</div>
<?php if($currentaction == 'view'){ ?>
<div class="topmargin10"><a href="<?php echo Router::url('/blogs')?>"><button type="button" class="submit_btn2 btnmd btnlgfullwidth">View All Most View Blogs</button></a></div>	
<?php } ?>

<?php echo $this->element('blogs/upcoming_journeys'); ?>
	
<div class="mainheading topmargin30"><h3>Tags</h3></div>	
<?php if(!empty($blogTags)) { ?>
<div class="blogtags">
<ul>
<?php foreach ($blogTags as $key => $blogTag) { 

?>
 <li><a href="<?php echo $this->Html->url(array('controller'=>'blog_tags','action'=>'index','blog_tag_slug' => $blogTag['BlogTag']['page_slug']))?>"><?php echo $blogTag['BlogTag']['name'] ?></a></li>

<?php } ?>		
</ul>	
</div>
<?php } ?>
<script type="text/javascript">
	$('.blogsearchbtn').click(function(){
		var searchText = $('.blogsearchfield').val().trim();
;

	 if(searchText !== ''){
		$.ajax({
            type:"POST",
              dataType : 'html',
              url: "<?php echo $this->Html->url(['controller'=>'blogs','action'=>'search_blog']); ?>",
             data: {"searchText":searchText},
             success : function(data){
								$('#showBlog').html(data);
             }
        });
	} else {
		$('#nerror1').text('Please Add Text For Search');
	}

	});
</script>	