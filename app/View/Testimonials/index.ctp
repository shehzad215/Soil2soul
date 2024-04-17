<section class="testimonialsarea">
<div class="container">
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;"> 
<div class="" id="reviews"><img src="<?php echo $this->webroot;?>img/testimonials_logoshape.png" class="img-responsive center-block"  alt="soil-2-soul-lotus-logo" title="Soil 2 Soul : expeditions"></div>
<div class="text-center"><h2>Soil2Soul Videos </h2></div> 
<div class="subheadingtextwhite text-center"></div> 
</div>  
<div class="testimonialsboxarea">
<div class="row">
   <?php foreach ($videos as $key => $video) {
    if($key > 2){
      break;
    }
    ?>
   <div class="col-sm-4">
      <iframe width="100%" height="290" src="<?php echo $video['Video']['video_link'] ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
   </div>
   <?php } ?>
</div>  
<div class="wow zoomIn" style="visibility: visible; animation-name: zoomIn;"> 
<div class="topmargin30 text-center"><img src="<?php echo $this->webroot;?>img/elephant_left.png"  alt="soil-2-soul-elephant" title="Soil 2 Soul"/>  &nbsp;
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