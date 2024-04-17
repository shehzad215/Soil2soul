<div class="row">
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