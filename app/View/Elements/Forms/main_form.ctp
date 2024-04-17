<!--Enquiry form start here-->
<div class="innercontareagray">
<div class="container">
<div class="text-center">
<div class="maineheading"><h2>Enquire Now<br>
<span style="font-size: 25px;">GET PRICING DETAILS</span></h2></div>
<div class="textblack16">Please take a minute to fill your details and our space expert will contact you shortly with the best space options for your team to Work, Collaborate & Grow.</div>
<?php echo $this->Session->flash(); ?>	
</div>
<div class="row topmargin30">
<div class="col-sm-6"><img src="<?php echo $this->webroot; ?>img/enquiryimg.jpg" class="img-responsive"></div>
 <?php echo $this->Form->create('Page', array('class'=>'form-vertical','url'=>['controller'=>'pages', 'action'=>'submit_form'], 'type'=>'file')); ?>
 <?php echo $this->Bs->inputDefaults(['label'=>false]);?>
<div class="col-sm-6 rowmargin20">
<div class="row">
<div class="col-sm-6">
<div class="form-group">
<?php  echo $this->Bs->input('name',['type'=>'text','class'=>'form-control','placeholder'=>'Name*','required']); ?>
<!--  <input type="text" class="form-control" name="name" placeholder="Name*" required>  -->
</div>	
</div>
<div class="col-sm-6">
<div class="form-group">
<?php  echo $this->Bs->input('company_name',['type'=>'text','class'=>'form-control','placeholder'=>'Company Name*','required']); ?>	
	<!-- <input type="text" class="form-control" name="company_name" placeholder="Company Name*" required> -->
</div>
</div>	
<div class="col-sm-6">
<div class="form-group">
<?php  echo $this->Bs->input('mobile',['type'=>'text','class'=>'form-control numeric','placeholder'=>'Mobile*','required']); ?>	
	<!-- <input type="text" class="form-control" name="mobile"   placeholder="Mobile*" required> -->
</div>	
</div>
<div class="col-sm-6">
<div class="form-group">
<?php  echo $this->Bs->input('email',['type'=>'email','class'=>'form-control','placeholder'=>'Work Email*','required']); ?>	
	<!-- <input type="email" class="form-control" name="email" placeholder="Work Email*" required> -->
</div>
</div>
<div class="col-sm-6">
<div class="form-group">
	<?php 
	echo $this->Bs->input('plan',['type'=>'select','empty'=>'Select Plan*','required','class'=>'form-controlselect','options' => ['Private Cabins' => 'Private Cabins', 'Enterprise Solution' => 'Enterprise Solution', 'Meeting Rooms' => 'Meeting Rooms', 'Fixed Desks' => 'Fixed Desks', 'Flexible Desk' => 'Flexible Desk','Event Spaces'=>'Event Spaces','Day Pass'=>'Day Pass','Virtual Office'=>'Virtual Office']]);
?>	
	
</div>	
</div>
<div class="col-sm-6">
<div class="form-group">
<?php 
	echo $this->Bs->input('location',['type'=>'select','empty'=>'Select Location*','required','class'=>'form-controlselect','options' => ['Andheri East MIDC' => 'Andheri East MIDC', 'Andheri East Chakala' => 'Andheri East Chakala', 'Andheri West SV Road' => 'Andheri West SV Road']]);
?>	
</div>	
</div>
<div class="col-sm-6">
<div class="form-group">
	<?php  echo $this->Bs->input('no_of_seats',['type'=>'text','class'=>'form-control numeric','placeholder'=>'No of Seats*','required']); ?>
	<!-- <input type="text" class="form-control"  name="seats" placeholder="No of Seats*" required> -->
</div>
</div>    
</div>
<div class="form-group">
<?php  echo $this->Bs->input('comments',['type'=>'textarea','class'=>'form-control','rows'=>3,'placeholder'=>'Comments','required']); ?>
</div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
    <input type="text" name="data[Page][vercode]" class="form-control" placeholder="Verfication Code" required="required">
</div>
</div>
<div class="col-sm-6"> 
<div class="form-group small clearfix">
    <!-- <img src="<?php //echo $this->element('captcha'); ?>" style="margin-top: 2px;"> -->
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
<div class="row">
<div class="col-sm-9">
<div class="textgray13"><em>Your data is safe with us and won't be shared with anyone</em></div>
</div>
<div class="col-sm-3 text-right"><button type="submit" class="btn">Send</button></div>	
</div>
</div>
<?php echo $this->form->end(); ?>
</div>
</div>	
</div>	
<!--Enquiry form end here-->

