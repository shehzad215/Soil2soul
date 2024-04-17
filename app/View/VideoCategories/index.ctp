<link href="<?php echo $this->webroot;?>css/custome_css/gallerypopup.css" rel="stylesheet" type="text/css">
<!--Collage start here-->
<section class="innercollage">
  <div class="innerheading">
    <div class="lotus"><img src="<?php echo $this->webroot;?>img/lotus.png" alt=""/></div>
    <h1>Video Gallery</h1>
  </div>
  <img src="<?php echo $this->webroot;?>img/gallery_collage.jpg"> </section>
<!--Collage end here-->

<div class="whitecontarea">
  <div class="container">
    <div class="text-center"><img src="<?php echo $this->webroot;?>img/om.png" alt="Om"/><br>
<br></div>

  
      <div class="row">
      <div class="col-sm-9">
          <div class="mainheading"><h3>Latest Videos :- <?php echo (!empty($catName)) ? $catName : ''; ?></h3></div> 
   
    <?php //debug($catName);die; ?>
<?php foreach ($videoDetails as $key => $videoDetail) { ?>
<div class="videoimgbox">
   <div class="row">
        <div class="col-md-5 col-sm-4">
            <a href="javascript:void(0);" onclick="openModal('<?php echo $videoDetail['Video']['video_link'].'?&autoplay=1&mute=1';?>');">
            <span class="videoimgboxplay"></span>
            <?php echo $this->Bs->image('Video.image_file',$videoDetail,['alt'=>$videoDetail['Video']['title'],'class'=>'img-responsive']); ?>
            <!-- <img src="<?php //echo $this->webroot;?>img/a_journey_beyond.jpg" alt="" class="img-responsive" /> -->
            </a>    
            </div>
        <div class="col-md-7 col-sm-8">
    <h4><?php echo $videoDetail['Video']['title'] ?></h4>
<?php echo strlen($videoDetail['Video']['description']) > 450 ? substr($videoDetail['Video']['description'], 0, 450) . '... <a href="#" class="prevent OurVideoModel" data_id="' . $videoDetail['Video']['id'] . '">Read More</a>' : $videoDetail['Video']['description']; ?>
        </div>    
        </div>
              
              <div id="myModalgallery" class="modalgallery"> <span class="closegallery cursor" onclick="closeModal()">&times;</span>
                <div class="modalgallery-content">
                  <div class="container">               
                      <iframe src="" title="YouTube video player" frameborder="0" style="aspect-ratio: 14 / 7; width: 100%;" ></iframe>         
                      
                    </div>
                </div>
              </div>
  </div>
<?php } ?>  

</div>
    <div class="col-md-3 rowmargintabmob30">

<div class="mainheading"><h3>Most Viewed Videos</h3></div>
<div class="row">

<?php foreach ($randomVideos as $key => $randomVideo) { ?>
<div class="col-md-12 col-sm-6">
<div class="mostviewvideobox">
<a href="javascript:void(0);" onclick="openModal('<?php echo $randomVideo['Video']['video_link'].'?&autoplay=1&mute=1';?>');">
<div class="row nopaddingarea">
<div class="col-xs-4 nopadding"><?php echo $this->Bs->image('Video.image_file',$randomVideo,['alt'=>$randomVideo['Video']['title']]); ?></div>
<div class="col-xs-8 nopadding">
<div class="mostviewvideocont">
<h6><?php echo $randomVideo['Video']['title']; ?></h6>    
</div>    
</div>    
</div>    
</a>       
</div>
</div>
<?php } ?>  
  
</div>

 

  
<div class="mainheading topmargin30"><h3>Tags</h3></div>  
<div class="blogtags">
<ul>
 <?php foreach ($videoTags as $key => $videoTag) { ?>
   <li><a href="<?php echo $this->Html->url(array('controller'=>'blog_tags','action'=>'video_tags','video_tag_slug' => $videoTag['BlogTag']['page_slug']))?>"><?php echo $videoTag['BlogTag']['name']; ?></a></li>
 <?php } ?>
</ul> 
</div>  
</div>
      </div>
      
  </div>
</div>



<div class="whitecontarea">
  <div class="container"> 
    <!--Our Co-Brands section start here-->
    
<!--Our Co-Brands section start here--> 
<?php echo $this->element('blogs/brand'); ?>  
<!--Our Co-Brands section end here-->
    
    <!--Our Co-Brands section end here--> 
  </div>
</div>
 <!-- Photo Gallery script start here --> 
<script>
function openModal(videoUrl) {
  var modal = document.getElementById('myModalgallery');
  var iframe = modal.querySelector('iframe');
  iframe.src = videoUrl;
  modal.style.display = "block";
}

function closeModal() {
  document.getElementById('myModalgallery').style.display = "none";
}

var slideIndex = 1;
showSlides(slideIndex);

function plusSlides(n) {
  showSlides(slideIndex += n);
}

function currentSlide(n) {
  showSlides(slideIndex = n);
}

function showSlides(n) {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("demo");
  var captionText = document.getElementById("caption");
  if (n > slides.length) {slideIndex = 1}
  if (n < 1) {slideIndex = slides.length}
  for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (i = 0; i < dots.length; i++) {
      dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";
  dots[slideIndex-1].className += " active";
  captionText.innerHTML = dots[slideIndex-1].alt;
}



</script> 
<!-- Photo Gallery script end here --> 
<script type="text/javascript">
  $('.OurVideoModel').click(function(){


    var videoId = $(this).attr('data_id');

    //alert(scholarId);

    $.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(['controller'=>'videos','action'=>'show_details']); ?>",
            data: {"videoId": videoId},
            dataType: "html",
            success: function (data) {
                // $("#nerror").text(data);
                $('#Videos').modal('show');
                $('.VideoData').html(data);
              // alert('hi');
            }
        });
  });

</script>  


