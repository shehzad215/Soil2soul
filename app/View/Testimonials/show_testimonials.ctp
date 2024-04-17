<div class="modal-body">
   <button type="button" class="close closemodal" data-dismiss="modal">&times;</button>
<h4 class="scholarmodal-title"><?php echo $testimonial['Testimonial']['name']; ?></h4>

<div class="row">
  <div class="col-sm-5 ">
    <div class="guideimgcircle2">
      <div class="guideleaf2"><img src="img/testimonials_qoute.png" alt="soil-2-soul-leaf-logo"></div>
      <div class="guideimg2"> <?php echo $this->Bs->image('Testimonial.image',$testimonial); ?>  </div>
    </div>
  </div>
  <div class="col-sm-7 rowmargin30 conte"><?php echo $testimonial['Testimonial']['msg']; ?></div>
</div>
</div>
