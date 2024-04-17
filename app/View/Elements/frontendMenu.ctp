<div class="menu">
<div class="container">
<nav id="navigation" class="navigation">
<div class="nav-header">
<div class="nav-toggle"></div>
<div class="nav-brand">Menu</div>
</div>
<div class="nav-menus-wrapper">
<ul class="nav-menu">
<li><a href="<?php echo Router::url('/')?>"><i class="fa fa-home"></i></a></li>
<?php foreach ($menuLinksForHeaders as $key => $menuLinksForHeader) { 

?>
<li><a href="<?php echo $menuLinksForHeader['MenuLink']['link']; ?>"><?php echo $menuLinksForHeader['MenuLink']['title'];?></a>
<?php if(!empty($menuLinksForHeader['children'])){ ?>	
<ul class="nav-dropdown">

<?php foreach ($menuLinksForHeader['children'] as $key => $lavel1) {
	$itsFile = $lavel1['MenuLink']['is_file'];
	$itsOutLink1 = $lavel1['MenuLink']['is_outer_link'];
	$string = $lavel1['MenuLink']['link'];
	$menuLinkUrl = json_decode($string, true);

	$target = ($itsFile == true || $itsOutLink1 == true) ? '_blank' : ''; 

	if($itsFile == true){
		$path = $this->webroot.'files/menu_link/file/'.$lavel1['MenuLink']['id'].'/'.$lavel1['MenuLink']['file'];
		$htmlUrl = $path;
	}elseIF($itsOutLink1 == true){
		$htmlUrl = $lavel1['MenuLink']['outer_link'];
	}else{
		$htmlUrl = (!empty($menuLinkUrl)) ? $this->Html->url(array('controller'=>$menuLinkUrl['controller'],'action'=>$menuLinkUrl['action'])) : '#';
	}

	// debug($htmlUrl);
	
 ?>
<li>
	<a href="<?php echo $htmlUrl; ?>" target="<?php echo $target;?>"><?php echo $lavel1['MenuLink']['title'];?></a>
	<?php if(!empty($lavel1['children'])){ ?>
	<ul class="nav-dropdown">
		<?php foreach ($lavel1['children'] as $key => $lavel2) {
			$itsFile1 = $lavel2['MenuLink']['is_file'];
			$itsOutLink = $lavel2['MenuLink']['is_outer_link'];
			$target = ($itsOutLink == true || $itsFile1 == true) ? '_blank' : ''; 
			$string1 = $lavel2['MenuLink']['link'];
			$menuLinkUrl1 = json_decode($string1, true);
			
			if($itsFile1 == true){
				$path = $this->webroot.'files/menu_link/file/'.$lavel2['MenuLink']['id'].'/'.$lavel2['MenuLink']['file'];
				$htmlUrl1 = $path;
			}elseIF($itsOutLink == true){
				$htmlUrl1 = $lavel2['MenuLink']['outer_link'];
			}else{
				$htmlUrl1 = (!empty($menuLinkUrl1)) ? $this->Html->url(array('controller'=>$menuLinkUrl1['controller'],'action'=>$menuLinkUrl1['action'])) : '#';
			}
		 ?>
		<li><a href="<?php echo $htmlUrl1; ?>" target="<?php echo $target;?>"><?php echo $lavel2['MenuLink']['title'];?></a></li>
		<?php } ?>
	</ul>
	<?php } ?>
</li>    
<?php } ?>
</ul>
<?php } ?>
</li>
<?php } ?>
</ul>
</div>
</nav>
</div>        
</div>