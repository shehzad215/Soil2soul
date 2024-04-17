<!--Collage start here-->
<section class="innercollage">
  <div class="innerheading">
    <div class="lotus"><img src="img/lotus.png" alt="soil-2-soul-expedition-lotus-flower"/></div>
    <h1>Contact</h1>
  </div>
  <img src="img/traveltips_collage.jpg" alt="soil-2-soul-expedition-our-team"> </section>
<!--Collage end here-->

<div class="whitecontarea">
  <div class="container">
<div class="mainheading text-center"><h2><span class="textblack18">Have any questions? We’d love to hear from you.</span>    
</h2>    
</div>

<div class="row topmargin40">
<div class="col-md-6">
<div class="row">
<div class="col-md-10 col-sm-11 col-xs-11">
<div class="contactbox">
<h4>Corporate Office</h4> 
<div class="textwhite15">513/514 Neelkanth Corporate IT Park, Nathani Rd, Kirol Village, Vidyavihar West, Mumbai, Maharashtra 400086.</div>     
</div>
<div class="contactinfobox">
<table width="100%" cellpadding="0" cellspacing="0">
<tr>
<td width="30" class="contacticon"><i class="fa fa-phone"></i></td>
<td style="padding-left: 15px;" class="textwhite15"><a href="tel://+918657540585">+91 8657540585</a></td>    
</tr> 
<tr>
<td height="10"></td>
<td height="10"></td>    
</tr>    
<tr>
<td width="30" class="contacticon"><i class="fa fa-whatsapp"></i></td>
<td style="padding-left: 15px;" class="textwhite15"><a href="https://api.whatsapp.com/send?phone=+918657540586&text=Hi,%20welcome%20to%20soil2soul" target="_blank">+91 8657540586</a></td>    
</tr> 
<tr>
<td height="10"></td>
<td height="10"></td>    
</tr> 
<tr>
<td width="30" class="contacticon"><i class="fa fa-envelope"></i></td>
<td style="padding-left: 15px;" class="textwhite15"><a href="mailto:sales@tatvaexpeditions.com">sales@tatvaexpeditions.com</a></td>    
</tr> 
</table>    
</div>    
</div>
<div class="col-md-2 col-sm-1 col-xs-1"></div>    
</div>
</div>    
<div class="col-md-6 rowmargintabmob30">
<?php echo $this->Session->flash(); ?>
<div class="enquirybox">
<h4>Feedback / Enquiry</h4>

<div class="row">
  <?php echo $this->Bs->create('ContactEnquery', array('class'=>'form-vertical','type'=>'file'));
  echo $this->Bs->inputDefaults(array('label'=>false));

   ?>
 
<div class="col-sm-6">
<div class="form-group">
  <?php echo $this->Bs->input('first_name',['type'=>'text','placeholder'=>'First Name','class'=>'form-control']); ?>
</div>    
</div>
<div class="col-sm-6">
<div class="form-group">
  <?php echo $this->Bs->input('last_name',['type'=>'text','placeholder'=>'Last Name','class'=>'form-control']); ?>
</div>    
</div>
<div class="col-sm-6">
<div class="form-group">
<div class="row padding5pxarea">
<div class="col-xs-3 padding5px"><input type="text" class="form-control" placeholder="+91" readonly="true"></div>
<div class="col-xs-9 padding5px">
    <?php 
    echo $this->Bs->input('contact_no',['type'=>'text','placeholder'=>'Mobile','class'=>'numeric','maxlength'=>10]);
  ?>
</div>    
</div>    
</div>    
</div>
<div class="col-sm-6">
<div class="form-group">
  <?php echo $this->Bs->input('email',['type'=>'email','placeholder'=>'Email','class'=>'form-control']); ?>
</div>    
</div>
<div class="col-sm-12">
<div class="form-group">
    <?php echo $this->Bs->input('msg',['type'=>'text','placeholder'=>'Message','rows'=>'5']);?>
</div>    
</div>  
</div>    
<div>
<div class="row">
<div class="col-sm-6">
<div class="form-group">
    <input type="text" name="data[Page][vercode]" class="form-control" placeholder="Verfication Code" required="required">
</div>
</div>
<div class="col-sm-6"> 
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
</div>
</div>
<!-- <div class="g-recaptcha" data-sitekey="YOUR_SITE_KEY"></div> -->
<button class="submit_btn2 btnmd" type="submit">Send</button>
</div> 
<?php echo $this->form->end(); ?>   
</div> 

</div>    
</div>  


    
</div>
</div>

<!--Testimonials section start here-->
<?php echo $this->element('testimonials'); ?> 
<!--Testimonials end here-->

<div class="whitecontarea ourBrandPedding">
  <div class="container"> 
    <!--Our Co-Brands section start here-->
    
     <?php echo $this->element('blogs/brand'); ?> 
    
    <!--Our Co-Brands section end here--> 
  </div>
</div>
