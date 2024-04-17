<?php //debug($blog);exit; ?>
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
<div class="row">
<div class="col-md-9">
<div class="mainheading"><h2><?php echo $blog['Blog']['title']; ?></h2></div>	
<div class="blogsdetimg topmargin25">
	<!-- <img src="<?php //echo $this->webroot;?>img/blog_img01.jpg"> -->
	<?php echo $this->bs->image('Blog.main_image',$blog,['alt'=>$blog['BlogCategory']['page_slug'].'-'.$blog['Blog']['page_slug']]); ?>
</div>
<div class="blogdetadminarea">
<div class="row">
<div class="col-md-3 col-sm-4">
<div class="blogdetadmin">
<div class="blogdetadminscont">
<div class="blogdetadminiconcircle">
	<!-- <img src="<?php //echo $this->webroot;?>img/usericon.png"> -->
	<?php echo $this->bs->image('BlogAuthor.author_image',$blog['BlogAuthor'],['alt'=>$blog['BlogAuthor']['page_slug'].'-'.$blog['Blog']['page_slug']]) ?>
</div>	
</div>
<div class="blogdetadminscont">
<div class="blogdetnamedatetext"><?php echo $blog['BlogAuthor']['author_name'];?><br>
<span><?php echo date_format(date_create($blog['Blog']['blog_date']),'d M Y') ?></span></div>	
</div>
</div>	
</div>
<div class="col-md-9 col-sm-8">
<div class="blogdetcatsharearea">
<div class="row padding5pxarea">
<div class="col-xs-6 padding5px">
<div class="blogdetcatnametext"><span>Category</span><br>
<a href="<?php echo $this->Html->url(array('controller'=>'blog_categories','action'=>'index','blog_cat_slug' => $blog['BlogCategory']['page_slug']))?>"><?php echo $blog['BlogCategory']['name'];?></a></div>	
</div>
<div class="col-xs-3 padding5px text-right">
<button class="sharebtn" type="button" data-toggle="dropdown">View : <?php echo (!empty($blog['BlogView'])) ? count($blog['BlogView']) : 0;?></button>
</div>
<div class="col-xs-3 padding5px text-right">	
<button class="sharebtn" type="button" data-toggle="dropdown">Share <i class="fa fa-share-alt"></i></button>
<ul class="dropdown-menu pull-right" style="min-width: 140px !important; padding: 0px 5px !important;">
<li style="display: inline-block !important;"><a href="#" style="padding: 5px 2px !important;"><img src="<?php echo $this->webroot;?>img/facebook.png" alt="Facebook" title="Facebook"></a></li>
<li style="display: inline-block !important;"><a href="#" style="padding: 5px 2px !important;"><img src="<?php echo $this->webroot;?>img/twitter.png" alt="Twitter" title="Twitter"></a></li>
<li style="display: inline-block !important;"><a href="#" style="padding: 5px 2px !important;"><img src="<?php echo $this->webroot;?>img/youtube.png" alt="Youtube" title="Youtube"></a></li>    
<li style="display: inline-block !important;"><a href="#" style="padding: 5px 2px !important;"><img src="<?php echo $this->webroot;?>img/instagram.png" alt="Instagram" title="Instagram"></a></li>
</ul>		
</div>	
</div>	
</div>	
</div>
</div>	
</div>
<div class="blogboxdesc topmargin30">
<!-- Blog Descriptions -->
<?php echo  $blog['Blog']['description']; ?>	
<!-- End Here -->
</div>
<!-- Authur Details -->
<?php if(!empty($blog['BlogAuthor']['id'])){ ?>
<div class="authorbox">
<div class="row">
<div class="col-sm-6">
<h3>About Author</h3>
</div>
<div class="col-sm-6 right-mob-left"><a href="<?php echo $this->Html->url(array('controller'=>'blog_authors','action'=>'index','blog_authur_slug' => $blog['BlogAuthor']['page_slug']))?>"><button type="button" class="submit_btn2 btnsm">Read all post from this Author</button></a></div>	
</div>	
<div class="topmargin10 rowmargin20">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td width="90" valign="top">
<div class="authorboximgcircle">
	<!-- <img src="<?php //echo $this->webroot;?>img/usericon_big.png"> -->
	<?php echo $this->bs->image('BlogAuthor.author_image',$blog['BlogAuthor'],['alt'=>$blog['BlogAuthor']['page_slug'].'-'.$blog['Blog']['page_slug']]) ?>
</div>	
</td>
<td valign="top">
<div class="authorboxname"><?php echo $blog['BlogAuthor']['author_name'];?></div>
<div class="authorboxtext"><?php echo $blog['BlogAuthor']['note'];?></div>	
</td>
</tr>
</tbody>
</table>	
</div>	
</div>	
<?php } ?>
<!-- Authur Detail End Here -->	
<hr>
<div class="mainheading topmargin20"><h4>Leave a Reply</h4></div>	
<div class="blogboxdesc">Your email address will not be published. Required fields are marked *</div>
<?php 
 echo $this->Form->create('BlogComment', array('class'=>'form-vertical','url'=>['controller'=>'blog_comments', 'action'=>'add',$id],'type' =>'file','id'=>'commentForm'));
?>	
<div class="form-group topmargin20">
<div class="genformlabel"><label>Comment*</label></div>	
<textarea class="form-control" name="data[BlogComment][comments]" rows="1" required></textarea>
</div>	
<div class="row topmargin20">
<div class="col-sm-4">
<div class="form-group">
<div class="genformlabel"><label>Name*</label></div>	
<input type="text" name="data[BlogComment][name]" class="form-control" placeholder="" required></div>	
</div>
<div class="col-sm-4">
<div class="form-group">
<div class="genformlabel"><label>Email*</label></div>	
<input type="text" name="data[BlogComment][email]" class="form-control" placeholder="" required></div>	
</div>	
</div>
<div class="row topmargin20">
<div class="col-sm-6">
<div class="form-group">
    <?php echo $this->Form->input('token',['type'=>'text','placeholder'=>'Verfication Code','class'=>'form-control','label'=>false]); ?>
</div>
</div>
<div class="col-sm-6"> 
<div class="form-group small clearfix">
    <?php 
      echo $this->Html->image(
        array(
            'controller' => 'contact_enqueries',
            'action' => 'generateCaptcha',
            '?' => array('timestamp' => time()) // Add a timestamp to prevent caching
        ),
        array('alt' => 'Captcha Image')
    );
    ?>
</div>  
</div>	
</div>	
<div class="topmargin10"><button type="submit" class="submit_btn2 btnlg">Post Comments</button></div>
<?php echo $this->form->end(); ?>
<?php //debug($blog);die; ?>
<?php if(!empty($blog['BlogComment'])){ ?>
<h4 class="topmargin20">Comments : (<?php echo count($blog['BlogComment']);?>)</h4>	
<?php foreach ($blog['BlogComment'] as $key => $blogComment) { ?>
<div class="authorbox">
<div class="row">
<div class="col-sm-6">
<h3><?php echo $blogComment['name']; ?></h3>
<?php echo (!empty($blogComment['comments'])) ? $blogComment['comments'] : ''; ?>
</div>
</div>	
</div>
 <?php } ?>
<?php } ?>
</div>

<div class="col-md-3 rowmargintabmob30">
<?php echo $this->element('blogs/blog_left_panel',); ?>	
</div>	
</div>	
	
<!--Our Co-Brands section start here-->	
<?php echo $this->element('blogs/brand'); ?>	
<!--Our Co-Brands section end here-->	
	
</div>	
</section>	
<!--Middle section end here-->	
<script type="text/javascript">
	
viewCount();	

function viewCount(){
	var id = "<?php echo $blog['Blog']['id']; ?>";
	var ipAddress = "<?php echo $_SERVER['REMOTE_ADDR']; ?>";

	$.ajax({
        type: "POST",
        url: "<?php echo $this->Html->url(['controller'=>'blog_categories','action'=>'viewCount']); ?>",
        data: {"id": id,"ipAddress":ipAddress},
        dataType: "json",
        success: function (data) {}
    });
}	

</script>
