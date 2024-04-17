
<!-- Price Box Start -->
<?php //debug($ourJourny);die; ?>

<div class="pricebox">
<?php if(!empty($tourCosts)){ 	
  echo $this->element('JourneyDetail/enquiryForm');	
} //else{  echo $this->element('JourneyDetail/onRequestForm'); } ?>

<div class="priceboxcont">
<div class="row">
<div class="col-xs-6 pull-right">
<button type="button" class="submit_btn2 btnlg btnlgfullwidth" data-toggle="modal" data-target="#Enquire">Enquire</button>
</div>
<!-- <div class="col-xs-6 text-right">
<button type="button" class="submit_btn1 btnlg btnlgfullwidth">Book</button>
</div> -->
</div>
</div>
</div>
<!-- Price Box End -->

<!-- Broucher Box Start -->
<?php if(!empty($ourJourny['OurJourny']['broucher_file'])){ ?>
<div class="broucher text-center">  
	<?php $filePath = $this->webroot.'files/our_journy/broucher_file/'.$ourJourny['OurJourny']['id'].'/'.$ourJourny['OurJourny']['broucher_file'];  

	$filePath = (!empty($filePath)) ? $filePath : '#'; ?>
	<a href="<?php echo $filePath; ?>" target="_blank" style="color: #673400">Download Brochure</a>
</div>
<?php } ?>
<!-- Broucher Box End -->

<div class="sharetour"> Share this Journey: 
<?php foreach ($socialMedias as $key => $socialMedia) { ?>
	<a href="<?php echo $socialMedia['SocialMedia']['url']; ?>">
	<?php echo $this->Bs->image('SocialMedia.image_file',$socialMedia,['alt'=>'soil-2-soul'.' '.$socialMedia['SocialMedia']['name']]); ?>	
	</a>
<?php } ?>
</div>

<div class="whyusboxinner">
<h3>Why Book with us?</h3>
<?php foreach ($bookingFacilities as $key => $bookingFacility) { ?>
<div class="whyboxcont <?php echo $bookingFacility['BookingFacility']['class'];?>">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tbody>
<tr>
<td width="50"><div class="whybookicon">
	<!-- <img src="<?php //echo $this->webroot; ?>img/scholar_led.png" alt="soil-2-soul">  -->
	<?php echo $this->bs->image('BookingFacility.image_file',$bookingFacility,['alt'=>'soil-2-soul-'.$bookingFacility['BookingFacility']['name'],'title'=>$bookingFacility['BookingFacility']['name']]) ?>
</div></td>
<td><div class="">
<h5><?php echo $bookingFacility['BookingFacility']['name']?></h5>
</div></td>
</tr>
</tbody>
</table>
</div>
<?php } ?>
<!-- <div class="whyboxcont accomodationbox">
	<?php $filePath //= $this->webroot.'files/our_journy/broucher_file/'.$ourJourny['OurJourny']['id'].'/'.$ourJourny['OurJourny']['broucher_file'];  

	//$filePath = (!empty($filePath)) ? $filePath : '#'; ?>

    <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tbody>
             <tr>
               <td width="50"><div class="whybookicon"><img src="img/inner_transformation.png"> </div></td>
                  <td><div class="">
                         <a href="<?php //echo $filePath; ?>" target="_blank"><h5>Download Brochure</h5></a>
                        </div></td>
                    </tr>
        </tbody>
    </table>
  </div> -->
</div>

<script type="text/javascript">
	$('.DateSelect').click(function(){
		var tourCostId = $(this).attr('id');
		var selectedDate = $(this).text();
		$('.selecteddate').text(selectedDate);
		$(this).addClass('selectedClass');

		$.ajax({
	         type:"POST",
	         dataType : 'json',
	         url: "<?php echo $this->Html->url(['controller'=>'tour_cost_details','action'=>'get_selected_price']); ?>",
	         data: {"tourCostId":tourCostId},
	         success : function(Data){ 
	         		$('.Totalprice').text(Data);
	         }
      	});
	});

	$('.submit_btn2').click(function() {

			var JourneyId = "<?php echo $ourJourny['OurJourny']['id']; ?>";
			var enquiryDate = "<?php echo $currentDate;?>";
			var SelectedDate = $('.selectedClass').attr('data-value');
			var SelectedDate1 = (typeof SelectedDate !== "undefined") ? SelectedDate : "<?php echo $closest_date;?>" ;
			var tourCostDateId = $('.selectedClass').attr('id');
			var tourCostId = (typeof tourCostDateId !== "undefined") ? tourCostDateId : "<?php echo $tourCostId;?>";
			var AdultsValue = $('#adultSelect').val();
			AdultsValue = (AdultsValue === '') ? 0 : AdultsValue;

			var ChildValue = $('#childSelect').val();
			ChildValue = (ChildValue === '') ? 0 : ChildValue;

			$('#modalJourneyId').val(JourneyId);
			 $('#modalJourneyDate').val(SelectedDate1);
			 $('#modaltourCostId').val(tourCostId);
			 $('#modalNoofAdults').val(AdultsValue);
			 $('#modalNoofChilds').val(ChildValue);
		

			var journeyDate = (typeof SelectedDate !== "undefined") ? "\nJourney Date: " + SelectedDate : "\nJourney Date: " + "<?php echo $closest_date;?>";

				// alert(journeyDate);

			var textValue = "Enquiry Date: " + enquiryDate + journeyDate + "\nNumber of Adults: " + AdultsValue + "\nNumber of Child: " + ChildValue + '\n----------------------------------';

			 $('.enquiryDetails').val(textValue);




	});

</script>