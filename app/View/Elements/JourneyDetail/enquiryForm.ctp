<div class="priceboxcont">
<h3>Departure Dates</h3>
<div class="row">
<div class="col-xs-5 available">
<div></div>
Available</div>
<div class="col-xs-7 notavailable">
<div></div>
Not Available</div>
</div>
<div class="availstatus">
<ul>
<?php foreach ($tourCosts as $key => $tourCost) { 
	if(($currentDate > $tourCost['TourCost']['date']) || ($tourCost['TourCost']['active'] == false)){
		$class = "tournotavailable";
		$dataid = "";
		$id = "";
	}else{
		$class = "touravailable";
		$dataid = "DateSelect";
		$id = $tourCost['TourCost']['id'];
	}
	?>
	<li><a href="#" class="prevent <?php echo $class; ?> <?php echo $dataid ?>" id="<?php echo $id; ?>" data-value="<?php echo $tourCost['TourCost']['date'];?>" ><?php echo date('d-M-Y', strtotime($tourCost['TourCost']['date'])); ?>
</a></li>
<?php } ?>
</ul>
</div>
<hr style="padding: 0px; margin: 5px 0px;" />
<div class=""> Selected Date: <span class="selecteddate"><?php echo date_format(date_create($closest_date),'d-M-Y');?></span> </div>
<hr style="padding: 0px; margin: 5px 0px;">
<div class="row topmargin10">
	<div class="col-sm-12">
		No. of Travellers:
	</div>
	<div class="col-sm-6">
		<select class="currencyselect"  id ="adultSelect">
		<option selected value="">Adult</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select>
	</div>
	<div class="col-sm-6">
		<select class="currencyselect"  id ="childSelect">
		<option selected value="">Child</option>
		<option value="1">1</option>
		<option value="2">2</option>
		<option value="3">3</option>
		<option value="4">4</option>
		<option value="5">5</option>
		</select>
	</div>
</div>
<div class="totalpricebox topmargin15"> Starting From:
<div class="totalprice">
	<span class="Totalprice"> <?php echo (!empty($closest_price)) ? $defaultCurCode.' '.$closest_price : 'TBA'; ?> &nbsp;&nbsp;</span> <!-- <span class="pricebreakup"><a href="#" class="prevent">Price breakup</a></span> -->
</div>
<span class="price_pp" style="color:#fff">PP on <?php echo $tourCostTypeName;?> </span> 	
</div>	
</div>