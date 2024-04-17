<?php //debug($pageSEO);exit; 
	$defaultImage =  $url.'/img/logo.png';
?>
<title>
	<?php echo (!empty($pageSEO['PageSeo']['page_title'])) ? $pageSEO['PageSeo']['page_title'] : 'Soil 2 Soul : Expeditions'; ?>	
</title>

<link rel="canonical" href="<?php echo (!empty($pageSEO['PageSeo']['page_url'])) ? $pageSEO['PageSeo']['page_url'] : $link; ?>">

<meta http-equiv="content-language" content="en-IN">

<!-- Meta Keyword -->
<meta name="keywords" content="<?php echo (!empty($pageSEO['PageSeo']['meta_keyword'])) ? $pageSEO['PageSeo']['meta_keyword'] : 'Soil 2 Soul : Expeditions';?>"> 

<!-- Meta Description -->
<meta name="description" content="<?php echo (!empty($pageSEO['PageSeo']['meta_description'])) ? $pageSEO['PageSeo']['meta_description'] : 'Soil 2 Soul : Expeditions';?>">

<!-- Meta Image -->
<meta data-react-helmet="true" property="og:image" content="<?php echo (!empty($pageSEO['PageSeo']['image_file'])) ? $pageSEO['PageSeo']['image_file'] :  $defaultImage;?>"/>


<?php 
	if($controller == 'blogs' && $currentaction == 'index'){
		$type = 'article';
	}elseif($currentaction == 'view'){
		$type = 'article';
	}else{
		$type = 'websites';
	}
	// $type = ($currentaction == 'view') ? 'article' : 'object';
?>

<?php if($controller == 'blogs' || $controller = 'blog_categories' || $controller == 'blog_authors' || $controller == 'blog_tags' || $controller = 'video_categories'){ ?>
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="<?php echo $type;?>" />

<meta property="og:title" content="<?php echo (!empty($pageSEO['PageSeo']['page_title'])) ? $pageSEO['PageSeo']['page_title'] : 'Soil 2 Soul : Expeditions'; ?>	" />

<meta property="og:description" content="<?php echo (!empty($pageSEO['PageSeo']['meta_description'])) ? $pageSEO['PageSeo']['meta_description'] : 'Soil 2 Soul : Expeditions';?>" />

<meta property="og:url" content="<?php echo (!empty($pageSEO['PageSeo']['page_url'])) ? $pageSEO['PageSeo']['page_url'] : $link; ?>" />
<meta property="og:site_name" content="Soil 2 Soul : Expeditions" />

<?php if($currentaction == 'view'){ ?>
 <!-- <meta property="article:publisher" content="https://business.facebook.com/atstravelke" />
 <meta property="article:author" content="https://www.facebook.com/pages/?category=your_pages" /> --> 
<?php if(!empty($pageSEO['PageSeo']['BlogTag'])){

	 foreach ($pageSEO['PageSeo']['BlogTag'] as $key => $blogtag) {
?>
 <meta property="article:tag" content="<?php echo $blogtag['name'];?>" /> 

<?php }}} ?>
  <!-- <meta property="article:section" content="<?php //echo $pageSEO['PageSeo']['title'];?>" /> --> 		
  <!-- <meta property="article:published_time" content="<?php //echo date_format(date_create($pageSEO['PageSeo']['created']),DATE_ATOM)?>" /> -->  
 <meta property="og:image" content="<?php echo (!empty($pageSEO['PageSeo']['image_file'])) ? $pageSEO['PageSeo']['image_file'] :  $defaultImage;?>" /> 
 <meta property="og:image:secure_url" content="<?php echo (!empty($pageSEO['PageSeo']['image_file'])) ? $pageSEO['PageSeo']['image_file'] :  $defaultImage;?>" /> 
 <meta property="og:image:width" content="1200" /> 
 <meta property="og:image:height" content="800" /> 
<?php } ?>

<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:description" content="<?php echo (!empty($pageSEO['PageSeo']['meta_description'])) ? $pageSEO['PageSeo']['meta_description'] : 'Soil 2 Soul : Expeditions';?>" />
<meta name="twitter:title" content="<?php echo (!empty($pageSEO['PageSeo']['page_title'])) ? $pageSEO['PageSeo']['page_title'] : 'Soil 2 Soul : Expeditions'; ?>" />
<meta name="twitter:site" content="@soil2soul" />
<?php //if($currentaction == 'view'){ ?>
<!-- <meta name="twitter:image" content="<?php //echo $this->webroot;?>files/blog/image_file/<?php //echo $pageSEO['PageSeo']['id'].'/'. $pageSEO['PageSeo']['image_file']; ?>" /> -->
<?php //} ?>
<!-- <meta name="twitter:creator" content="@soil2soul" />	 -->
<?php //} ?>	

