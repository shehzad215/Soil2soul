<!--Photo Gallery start here-->
<div class="" id="PhotoGallery">
<div class="row">
<div class="col-xs-7">
<div class="mainheading">
<h4>Photo Gallery</h4>
</div>
</div>
<div class="col-xs-5 text-right">
<div class="seeallphotostext"><a href="javascript:void(0);" onclick="openModal();currentSlide(<?php echo $ourJourny['JourneyImage'][0]['id'];?>)">See all Photos</a></div>
</div>
</div>

<!-- Gallery images start here-->
<div class="row nopaddingarea">
<?php 

	$totalValues = count($ourJourny['JourneyImage']);
	$altname = $ourJourny['OurJourny']['page_slug'];
	$title = $ourJourny['OurJourny']['name'];
	//debug($altname);die;
	foreach ($ourJourny['JourneyImage'] as $key => $journeyImage) { 
	//debug($journeyImage);die;	
	if($key >= 7){
		break;
	}	
	$fileImage = $this->webroot.'files/journey_image/image_file/'.$journeyImage['id'].'/'.$journeyImage['image_file'];

	//debug($key);

	if($key == 0 || $key == 6) {
		$class = 'col-xs-7' ;
	}elseif ($key == 1 || $key == 5) {
		$class = 'col-xs-5' ;
	}else{
		$class = 'col-xs-4' ;
	}	


	 // For the last and second last values, adjust the class
/*    if ($key == $totalValues - 1) {
        $class = 'col-xs-7';
    } elseif ($key == $totalValues - 2) {
        $class = 'col-xs-5';
    }*/

 if($journeyImage['active'] == true){
?>
<div class="<?php echo $class;?> nopadding2">
	<div class="photogalleryimg"><img src="<?php echo $fileImage;?>" alt="<?php echo $altname.'-'.$journeyImage['name']; ?>" title="<?php echo $journeyImage['name'];?>"  onclick="openModal();currentSlide(<?php echo $key+1 ?>)" class="cursor"></div>
</div>
<?php }} ?>

</div>
<!-- Gallery images end here--> 

<!-- Gallery Popup start here-->
<div id="myModalgallery" class="modalgallery"> <span class="closegallery cursor" onclick="closeModal()">&times;</span>
<div class="modalgallery-content">

<?php foreach ($ourJourny['JourneyImage'] as $key => $journeyImage) { 
$fileImage = $this->webroot.'files/journey_image/image_file/'.$journeyImage['id'].'/'.$journeyImage['image_file'];
?>
<div class="mySlides">
<div class="numbertext"><?php echo $key+1; ?> / <?php echo $totalValues; ?></div>

<img src="<?php echo $fileImage; ?>" alt="<?php echo $altname.'-'.$journeyImage['name']; ?>" title="<?php echo $journeyImage['name'];?>" > 

</div>
<?php } ?>


<a class="prevgallery" onclick="plusSlides(-1)">&#10094;</a> 
<a class="nextgallery" onclick="plusSlides(1)">&#10095;</a>
<div class="caption-container">
<p id="caption"></p>
</div>

<div class="thumbnails">
<?php foreach ($ourJourny['JourneyImage'] as $key => $journeyImage) { 
$fileImage = $this->webroot.'files/journey_image/image_file/'.$journeyImage['id'].'/'.$journeyImage['image_file'];	
	?>
 <img class="demo cursor" src="<?php echo $fileImage; ?>"  title="<?php echo $journeyImage['name'];?>" onclick="currentSlide(<?php echo $key+1 ?>)" alt=""> 
<?php } ?>
</div>
</div>
</div>
<!-- Gallery Popup end here--> 
</div>
<!--Photo Gallery end here--> 