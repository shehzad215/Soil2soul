<?php //debug($location); ?>
<div class="col-md-4">	
<div id="sidebar" class="" style="">
<div class="sidebar__inner">
<div class="enquirybox">
<?php echo $this->Session->flash(); ?>	
<h4>Schedule a Visit</h4>
<div class="textgray13">Enter your details below and our experts will contact you soon with the best options for you to work, collaborate & grow.</div>
<?php echo $this->Form->create('Page', array('class'=>'form-vertical','url'=>['controller'=>'pages', 'action'=>'submit_form'], 'type'=>'file')); ?>
 <?php echo $this->Bs->inputDefaults(['label'=>false]);?>
<div class="form-group topmargin20">
<?php  echo $this->Bs->input('name',['type'=>'text','class'=>'form-control','placeholder'=>'Name*','required']); ?>
<!-- <input type="text" class="form-control" placeholder="Name*"> -->
</div>	
<div class="form-group">
<?php  echo $this->Bs->input('company_name',['type'=>'text','class'=>'form-control','placeholder'=>'Company Name*','required']); ?>		
<!-- <input type="text" class="form-control" placeholder="Company Name*"> -->
</div>
<div class="form-group">
<?php  echo $this->Bs->input('mobile',['type'=>'text','class'=>'form-control numeric','placeholder'=>'Mobile*','required']); ?>		
<!-- <input type="text" class="form-control" placeholder="Mobile*"> -->
</div>
<div class="form-group">
<?php  echo $this->Bs->input('email',['type'=>'email','class'=>'form-control','placeholder'=>'Work Email*','required']); ?>	
<!-- <input type="text" class="form-control" placeholder="Work Email*"> -->
</div>
<div class="form-group">	
<div class="row padding5pxarea">
<div class="col-xs-6 padding5px">
<?php 
	echo $this->Bs->input('plan',['type'=>'select','empty'=>'Select Plan*','required','class'=>'form-controlselect','options' => ['Private Cabins' => 'Private Cabins', 'Enterprise Solution' => 'Enterprise Solution', 'Meeting Rooms' => 'Meeting Rooms', 'Fixed Desks' => 'Fixed Desks', 'Flexible Desk' => 'Flexible Desk','Event Spaces'=>'Event Spaces','Day Pass'=>'Day Pass','Virtual Office'=>'Virtual Office']]);

	echo $this->Bs->input('location',['type'=>'hidden','value'=>$location]);

?>			
</div>
<div class="col-xs-6 padding5px">
<?php  echo $this->Bs->input('no_of_seats',['type'=>'text','class'=>'form-control numeric','placeholder'=>'No of Seats*','required']); ?>	
<!-- <input type="text" class="form-control" placeholder="No of Seats*">	 -->
</div>	
</div>
</div>
<div class="form-group">	
<div class="row padding5pxarea">
<div class="col-xs-6 padding5px">
<input type="text" name="data[Page][vercode]" class="form-control" placeholder="Verfication Code" required="required">		
</div>
<div class="col-xs-6 padding5px">
<?php 
    	echo $this->Html->image(
		    array(
		        'controller' => 'pages',
		        'action' => 'generateCaptcha',
		        '?' => array('timestamp' => time()) // Add a timestamp to prevent caching
		    ),
		    array('alt' => 'Captcha Image')
		);
    ?>
</div>	
</div>
</div>		
<div class="text-right">
<button type="submit" class="submit_btn5">Send</button>
</div>
<?php echo $this->form->end(); ?>
</div>	
</div>
</div>
</div>	