<section class="testimonialsarea">
<div class="container">
<div class="wow slideInUp" style="visibility: visible; animation-name: slideInUp;">	
<div class="" id="reviews"><img src="<?php echo $this->webroot;?>img/testimonials_logoshape.png" class="img-responsive center-block"  alt="soil-2-soul-lotus-logo" title="Soil 2 Soul : expeditions"></div>
<div class="text-center"><h2>Experience & Sharing</h2></div>	
<div class="subheadingtextwhite text-center">A glimpse into spiritual experiences</div>	
</div>	
<div class="testimonialsboxarea">
<div class="bx-wrapper1">
<div class="bxslider1">
<?php //debug($testimonials);die; ?>	
<?php foreach ($ourJournyTestimonials as $key => $testimonial) {
 ?>

<div class="testimonialsbox"><a href="#" class="prevent testimonialsClass" data_id="<?php echo $testimonial['Testimonial']['id'];?>">

<div class="testimonialsimg">
<div class="testimonialsqoute">
	<img src="<?php echo $this->webroot;?>img/testimonials_qoute.png" src="<?php echo $this->webroot;?>img/elephant_left.png"  alt="soil-2-soul-quote" title="Soil 2 Soul"></div>	
	<div id="testimonailImage_<?php echo $testimonial['Testimonial']['id'];?>"><?php echo $this->Bs->image('Testimonial.image',$testimonial,['alt'=>'soil-2-soul-scholar-'.$testimonial['Testimonial']['name']]); ?></div>
</div>	
<h5 id="testimonail_<?php echo $testimonial['Testimonial']['id'];?>"><?php echo $testimonial['Testimonial']['name']?></h5>	
<div class="testimonialstext" id="testimonailnote_<?php echo $testimonial['Testimonial']['id'];?>" data-note="<?php echo $testimonial['Testimonial']['msg'];?>"><?php echo substr($testimonial['Testimonial']['msg'],'0','100').'...';?></div>
</a>

</div>
<?php } ?>

	
</div>
</div>
<div class="wow zoomIn" style="visibility: visible; animation-name: zoomIn;">	
<div class="topmargin30 text-center"><img src="<?php echo $this->webroot;?>img/elephant_left.png"  alt="soil-2-soul-elephant" title="Soil 2 Soul"/>  &nbsp; <a href="<?php echo Router::url('/testimonials'); ?>"><button type="button" class="viewallbtn">View all Experiences</button></a> <button type="button" class="addreviewbtn rowmargin5" data-toggle="modal" data-target="#AddReview">Add Your Experiences</button> &nbsp; <img src="<?php echo $this->webroot;?>img/elephant_right.png"  alt="soil-2-soul-elephant" title="Soil 2 Soul"/> </div>
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