<!--Add Your Review Modal Start here -->
<div id="AddReview" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Your Review</h4>
      </div>
      <div class="modal-body">
        <?php echo $this->Form->create('Testimonial', array('class'=>'form-vertical','url'=>['controller'=>'testimonials', 'action'=>'add'], 'type'=>'file'));

        echo $this->Bs->inputDefaults(['label'=>false]);

         ?>
        <div class="form-group">
         <?php  echo $this->Bs->input('name',['type'=>'text','class'=>'form-control','placeholder'=>'Your Your full name']); ?>
         <!--  <input type="text" class="form-control" placeholder="Your full name"> -->
        </div>
        <div class="form-group">
           <?php  echo $this->Bs->input('email',['type'=>'email','class'=>'form-control','placeholder'=>'Enter your email id']); ?>
          <!-- <input type="text" class="form-control" placeholder="Enter your email id"> -->
        </div>
        <div class="form-group">
          <?php  echo $this->Bs->input('mobile',['type'=>'text','class'=>'form-control numeric','placeholder'=>'Mobile / Telephone']); ?>
          <!-- <input type="text" class="form-control" placeholder="Mobile / Telephone"> -->
        </div>
        <div class="form-group">
        <div class="form-group">
          <?php  echo $this->Bs->input('country',['type'=>'text','class'=>'form-control','placeholder'=>'Enter Your Country']); ?>
          <!-- <input type="text" class="form-control" placeholder="Mobile / Telephone"> -->
        </div>
        </div>
        <div class="form-group">
          <?php echo $this->Bs->input('msg',['rows'=>'3','class'=>'form-control','placeholder'=>'Your Message or Query']); ?>
          <!-- <textarea class="form-control" placeholder="Your Message or Query"></textarea> -->
        </div>
        <div class="text-center">
          <button class="submit_btn1 btnmd">Send</button>
        </div>
        <?php echo $this->form->end(); ?>
      </div>
    </div>
  </div>
</div>

<!--Add Your Review Modal end here -->
<!--Enquire Modal start here -->

<div id="Enquire" class="modal fade" role="dialog">
  <div class="modal-dialog modal-sm"> 
    
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Enquire</h4>
      </div>
      <div class="modal-body">
      <?php echo $this->Form->create('Enquiry', array('class'=>'form-vertical','url'=>['controller'=>'enquiries', 'action'=>'add'], 'type'=>'file'));

        echo $this->Bs->inputDefaults(['label'=>false]);

         ?>
         <!-- Hidden input fields to store the values -->
         <?php 
                echo $this->Form->input('our_journy_id',['type'=>'hidden','id'=>'modalJourneyId']); 
               echo $this->Form->input('tour_cost_id',['type'=>'hidden','id'=>'modaltourCostId']); 
               echo $this->Form->input('currency_id',['type'=>'hidden','id'=>'modalcurrencyId','value'=>$this->Session->read('Currency.id')]);
               echo $this->Form->input('journey_date',['type'=>'hidden','id'=>'modalJourneyDate']); 
               echo $this->Form->input('no_of_adults',['type'=>'hidden','id'=>'modalNoofAdults']);
               echo $this->Form->input('no_of_child',['type'=>'hidden','id'=>'modalNoofChilds']);
             
        ?>

        <div class="form-group">
          <?php  echo $this->Form->input('cust_name',['type'=>'text','class'=>'form-control',
                'placeholder'=>'Your full name']); ?>
         <!--  <input type="text" class="form-control" placeholder="Your full name"> -->
        </div>
        <div class="form-group">
          <?php  echo $this->Form->input('cust_email',['type'=>'email','class'=>'form-control','placeholder'=>'Enter your email id']); ?>
          <!-- <input type="text" class="form-control" placeholder="Enter your email id"> -->
        </div>
        <div class="form-group">
          <?php  echo $this->Form->input('contact_no',['type'=>'text','class'=>'form-control numeric','placeholder'=>'Mobile / Telephone']); ?>
          <!-- <input type="text" class="form-control" placeholder="Mobile / Telephone"> -->
        </div>
        <div class="form-group">
          <!-- <select class="form-controlselect">
            <option>Nationality</option>
            <option>India</option>
          </select> -->
          <?php echo $this->Form->input('country_id', array('empty'=>'Nationality','type'=>'select','options'=>$countries)); ?>
        </div>

        <div class="form-group">
          <?php echo $this->Form->input('message',['rows'=>'5','class'=>'form-control enquiryDetails','placeholder'=>'Your Message or Query']); ?>
          <!-- <textarea class="form-control" placeholder="Your Message or Query"></textarea> -->
        </div>

        <div class="form-group">
            <?php echo $this->Form->input('token',['type'=>'text','placeholder'=>'Verfication Code','class'=>'form-control']); ?>
        </div>
        <div class="form-group small clearfix">
          <img src="<?php //echo $this->element('captcha'); ?>" style="margin-top: 2px;">
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
        <div class="text-center">
          <button class="submit_btn1 btnmd" type="submit" data-toggle="modal" data-target="#myModal1">Send</button>
        </div>
        <?php echo $this->form->end(); ?>
      </div>
    </div>
  </div>
</div>
<!--Enquire Modal end here -->



<!--TourScholars Modal start here -->
<div id="TourScholars" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"> 
   <div class="scholarmodal-content">
     <button type="button" class="close closemodal" data-dismiss="modal">&times;</button>
     <div class="modal-body">
       <div class="ScholarData"></div>
     </div>
   </div>
  </div>
</div>
<!--TourScholars Modal end here -->

<!--TourScholars Modal start here -->
<div id="Testimonials" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"> 
   <div class="scholarmodal-content">
     <button type="button" class="close closemodal" data-dismiss="modal">&times;</button>
     <div class="modal-body">
       <h4 class="scholarmodal-title"></h4>
       <div class="row">
         <div class="col-sm-5">
            <div class="guideimgcircle2">
              <div class="guideleaf2"><img src="<?php echo $this->webroot;?>img/testimonials_qoute.png" alt="soil-2-soul-leaf-logo" title="Soil 2 Soul Logo"></div>
              <div class="guideimg2"></div>
            </div>
         </div>
         <div class="col-sm-7 rowmargin30 conte"></div>
       </div>
     </div>
   </div>
  </div>
</div>
<!--TourScholars Modal end here-->


<!-- TourScholars Start here -->
<div id="Videos" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg"> 
   <div class="scholarmodal-content">
     <button type="button" class="close closemodal" data-dismiss="modal">&times;</button>
     <div class="modal-body">
       <div class="VideoData"></div>
     </div>
   </div>
  </div>
</div>
<!-- TourScholars Modal end here -->