<section class="testimonialsarea">
<div class="container">
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">	
<div class="" id="reviews"><img src="<?php echo $this->webroot;?>img/testimonials_logoshape.png" class="img-responsive center-block"  alt="soil-2-soul-lotus-logo" title="Soil 2 Soul : expeditions"></div>
<div class="text-center"><h2>Soil2Soul Videos </h2></div>	
<div class="subheadingtextwhite text-center"></div>	
</div>	
<div class="testimonialsboxarea">
<div class="testimonialsbox row">
   <?php foreach ($videos as $key => $video) { ?>
   <div class="col-sm-4 videotestim">
    <a href="javascript:void(0);" onclick="openModal('<?php echo $video['Video']['video_link'].'?&autoplay=1&mute=1';?>');">
<span class="videoimgboxplay"></span>
<?php echo $this->Bs->image('Video.image_file',$video,['alt'=>$video['Video']['title'],'class'=>'img-responsive']); ?>
<!-- <img src="<?php //echo $this->webroot;?>img/a_journey_beyond.jpg" alt="" class="img-responsive" /> -->
</a>
      <h6><?php echo $video['Video']['title']?></h6> 
   </div>
   <?php } ?>
</div>	
<div id="myModalgallery" class="modalgallery"> <span class="closegallery cursor" onclick="closeModal()">&times;</span>
<div class="modalgallery-content">
<div class="container">               
  <iframe width="100%" src="" title="YouTube video player" frameborder="0" style="aspect-ratio: 14 / 7;
  " ></iframe>
</div>
</div>
</div>
<div class="wow zoomIn" style="visibility: visible; animation-name: zoomIn;"> 
<div class="text-center"><img src="<?php echo $this->webroot;?>img/elephant_left.png"  alt="soil-2-soul-elephant" title="Soil 2 Soul"/>  &nbsp;
 <a href="<?php echo Router::url('/videos'); ?>"><button type="button" class="viewallbtn">View all Videos</button></a> &nbsp; <img src="<?php echo $this->webroot;?>img/elephant_right.png"  alt="soil-2-soul-elephant" title="Soil 2 Soul"/> </div>
</div>
</div>

<!--Testimonials Why Choose section end here-->
</div>	
</section>
<script type="text/javascript">
 $('.testimonialsClass').click(function(){
    var id = $(this).attr('data_id');
    var clientName = $('#testimonail_'+id).text();
    var ImageId = '#testimonailImage_'+id;
    var clientImage =  $(ImageId).html();
    var Note = $('#testimonailnote_'+id).attr('data-note');
     
     $('#Testimonials').modal('show');
     $('.scholarmodal-title').text(clientName);
     $('.guideimg2').html(clientImage);
     $('.conte').text(Note);

    
    // alert(Note);
    // $.ajax({
    //     type: "POST",
    //     url: "<?php echo $this->Html->url(['controller'=>'testimonials','action'=>'show_testimonials']); ?>",
    //     data: {"id": id  },
    //     dataType: "html",
    //     success: function (data) {
    //         $('#TourScholars').modal('show');
    //         $('.scholarmodal-content').html(data);
    //     }
    // });


  });
</script>

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