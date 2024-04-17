<div class="offersAjax view">
<div class="row">
<div class="col-md-12">
    <div class='portlet box yellow'>
        <div class="portlet-title">
            <div class="caption"><?php echo __('Testimonial'); ?></div>
        </div>
        <div class="portlet-body">
            <div class="table-responsive">
            <div class="row">
              <div class="col-sm-5">
                <?php echo $this->bs->image('Testimonial.image',$testimonial,['class'=>'imageTestimonail']); ?>
              </div>
              <div class="col-sm-7 rowmargin30 conte">
                <p><?php echo $testimonial['Testimonial']['msg'];?></p>
              </div>
            </div> 
            </div>
        </div>
    </div>
</div>
</div>
