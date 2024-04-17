</div>	
<!--Footer start here-->
<footer class="footer">
<div class="container">
<div class="text-center"><img src="<?php echo $this->webroot ?>img/footer_art.png" alt="soil-2-soul-om" title="Soil 2 Soul : expeditions"/></div>	
<div class="topmargin20"><img src="<?php echo $this->webroot ?>img/footer_logoshape.png" class="img-responsive center-block" alt="soil-2-soul-lotus-logo" title="Soil 2 Soul : expeditions"></div>	
<div class="text-center topmargin15"><h6>Our Journeys</h6></div>	
<div class="footerlinks">
	<?php 
	$lastkey = (array_key_last($packages)); 
	?>

<?php foreach ($packages as $key => $package) {
	
	$htmlUrl = $this->Html->url(array('controller'=>'packages','action'=>'view','id' => $package['Package']['id'],'pacakage_slug'=>$package['Package']['page_slug']));

 ?>
    <a href="<?php echo $htmlUrl; ?>"><?php echo $package['Package']['short_name'];?></a>
    <?php
    if ($key !== $lastkey) {
        echo ' | ';
    } else {
        break;
    }
    ?>
<?php } ?>
</div>	
	
<div class="footercontactarea">
<div class="row">
<div class="col-sm-8">
<h6>Contact Info</h6>
<div class="footertext">
<ul>
<!-- <li><span>Phone:</span> <a href="tel://+911123456789">+91 11 23456789</a></li> -->
<li><span>Mobile:</span> <a href="tel://+918657540585">+91 8657540585</a></li>
<li><span>WhatsApp:</span> <a href="https://api.whatsapp.com/send?phone=+918657540586&text=Hi,%20welcome%20to%20soil2soul" target="_blank">+91 8657540586</a></li>
<li><span>Email:</span> <a href="mailto:sales@tatvaexpeditions.com">sales@tatvaexpeditions.com</a></li>	
</ul>	
</div>	
</div>
<div class="col-sm-4 rowmargin20">
<h6>Subscribe to our newsletter</h6>
<div class="input-group">
<input type="text" class="newslettertextfield" placeholder="Enter Email*">
<span class="input-group-btn">
<button class="newsletterbtn" type="button"><i class="fa fa-send"></i></button>
</span> </div>	
 <span id="nerror" style="color:#fff"></span>
</div>	
</div>	
</div>	
	
<div class="footermenu"> <a href="<?php echo Router::url('/'); ?>">Home</a> 
	<a href="<?php echo Router::url('/our_journeys'); ?>">Journeys</a> <a href="<?php echo Router::url('/about-us'); ?>">About us</a> 	
	<a href="<?php echo Router::url('/our-mentors'); ?>">Our Mentors</a>
	<a href="<?php echo Router::url('/our-scholars'); ?>">Our Scholars</a>
	<a href="<?php echo Router::url('/our-teams'); ?>">Our Team</a> 
	<a href="<?php echo Router::url('/brand'); ?>">Soil 2 Soul Brand</a>
	<a href="<?php echo Router::url('/why-spiritual'); ?>">Why Spiritual Tours?</a> 
	<a href="<?php echo Router::url('/sanatana-dharma'); ?>">Sanatan Dharma</a>
	 <!-- <a href="<?php //echo Router::url('/galleries'); ?>">Gallery</a> --> 
	<a href="<?php echo Router::url('/travel-tips'); ?>">Travel Tips</a>
    <a href="<?php echo Router::url('/blogs'); ?>">Blogs</a> 
<!-- <a href="<?php //echo Router::url('/testimonials'); ?>">Testimonials</a> --> <a href="<?php echo Router::url('/contacts'); ?>">Contact</a>
    </div>	<div class="row topmargin30">
<div class="col-sm-4 col-xs-4">
<div class="footertext">Powered by:</div>	
<div class="topmargin10"><img src="<?php echo $this->webroot ?>img/tatva_logo.png" alt="tatva : expeditions" title="tatva : expeditions"></div>	
</div>
<div class="col-sm-4 col-xs-8 center-mob-right">

</div>
<div class="col-sm-4 col-xs-12 right-mob-center">
<div class="footertext topmargin20">
Copyright <script>document.write(new Date().getFullYear())</script>. All Rights Reserved.	
</div>
</div>	
</div>
	
</div>		
</footer>
<!--Footer end here-->
	
</main>

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

<!-- Menu css and script start-->
<script type="text/javascript" src="<?php echo $this->webroot; ?>menu/navigation.js"></script> 
<script type="text/javascript">
	$(document).ready(function(){				
		$("#navigation").navigation();	
	});

	 $('.prevent').click(function(){
		return false;
	});

	$('.newsletterbtn').click(function () {
	var value = $('.newslettertextfield').val();
	var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
	if(value != '' && testEmail.test(value)){

		$.ajax({
            type: "POST",
            url: "<?php echo $this->Html->url(['controller'=>'newsletters','action'=>'add']); ?>",
            data: {"value": value  },
            dataType: "json",
            success: function (data) {
                $("#nerror").text(data);
            }
        });

	}else{
		$('#nerror').text('Please Add Email Id!');	
	}
});

// alert('hi');



</script>
<!-- Menu css and script end-->	
<!-- Tabs slider script start here --> 
<script  src="<?php echo $this->webroot; ?>css/tab/script.js"></script> 
<!-- Tabs slider script end here --> 
<script type="text/javascript">
	$('.defaultCurrency').change(function(){
		var defaultCurrencyId = $(this).val();
		$.ajax({
	         type:"POST",
	         dataType : 'json',
	         url: "<?php echo $this->Html->url(['controller'=>'currencies','action'=>'update_currency_session']); ?>",
	         data: {"defaultCurrencyId":defaultCurrencyId},
	         success : function(Data){  
	         	location.reload();
	         }
	      });
	});

	setUpCurrency();

	function setUpCurrency(){
		var defaultCurrencyId = $('.defaultCurrency').val();
		$.ajax({
	         type:"POST",
	         dataType : 'json',
	         url: "<?php echo $this->Html->url(['controller'=>'currencies','action'=>'update_currency_session']); ?>",
	         data: {"defaultCurrencyId":defaultCurrencyId},
	         success : function(Data){  
	         	// location.reload();
	         }
	      });
	}



	/*For Listing Enquiry For*/
	$('.enquryLink').click(function(){
		var JourneyId = $(this).attr('data-id');

		 var parentDiv = $(this).closest('.journeyslistarea');
   		 var selectedJourneyDate = parentDiv.find('.selectedJourneyDate');
    	 var SelectedDate = selectedJourneyDate.data('value');
	    
	     var SelectedDate1 = (typeof SelectedDate !== "undefined") ? SelectedDate : "" ;	
		

		$('#modalJourneyId').val(JourneyId);
		$('#modalJourneyDate').val(SelectedDate1);
	});

	$('.journeyDate').click(function(){
		 var parentDiv = $(this).closest('.journeyslistarea');
		 parentDiv.find('.journeyDate').removeClass("selectedJourneyDate");
		 parentDiv.find('.journeyDate').removeClass("touravailable");
		 
		// $(".journeyDate").removeClass("selectedJourneyDate");
		// $(".journeyDate").removeClass("touravailable");
		$(this).addClass("selectedJourneyDate");
		$(this).addClass("touravailable");
	});

</script>
