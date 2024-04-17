<div class="panel-group" id="accordion2"> 
<?php foreach ($journeyItenaries as $key => $journeyItenary) { ?> 
    <div class="panel3 panel-default">
        <a class="accordion-toggle2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#day<?php echo $key + 1; ?>">
            <div class="panel-heading2">
                <div class="panel-title3"><?php echo $journeyItenary['OurJourneyItenery']['day'] . ': ' . $journeyItenary['OurJourneyItenery']['title']; ?></div>
            </div>
        </a>
        <div id="day<?php echo $key + 1; ?>" class="panel-collapse collapse">
            <div class="newpanel-body">
                <?php echo $journeyItenary['OurJourneyItenery']['description']; ?>
            </div>
        </div>
    </div>
<?php } ?>
</div>

<div class="topmargin60">

<div class="panel3 panel-default tourcostpanel"> <a class="accordion-toggle2 collapsed " data-toggle="collapse" data-parent="#accordion2" href="#tourcost">
<div class="panel-heading2">
<div class="panel-title3" style="color: #673400">Departure Wise Tour Cost </div>
</div>
</a>
<div id="tourcost" class="panel-collapse collapse">
<div class="newpanel-body"><div class="table-responsive tourcosttbl">
<table width="100%" class="table">
<thead>
  <tr>
    <th>Departure Dates</th>
    <?php foreach ($tourCostTypes as $key => $tourCostType) { ?>
      <th><?php echo $tourCostType['TourCostType']['name']; ?></th>
    <?php } ?>  
  </tr>
</thead>  
<tbody>
 <?php foreach ($tourCosts as $key => $tourCost) { 
    if($tourCost['TourCost']['active'] == true){
 ?>
 <tr>
   <td><?php echo date('d M Y', strtotime($tourCost['TourCost']['date'])); ?></td>
    <?php
      if(!empty($tourCost['TourCostDetail'])){
      foreach ($tourCost['TourCostDetail'] as $key => $value) { ?>
     <td> <?php echo (!empty($value['price'])) ? $defaultCurCode.' '.$value['price'] : 'TBA'; ?> </td>
    <?php }}else{ 
      for ($i=1; $i <= count($tourCostTypes) ; $i++) { ?>
      <td>TBA</td>
    <?php }} ?>  
 </tr>
<?php }} ?>
</tbody>
</table>

</div>
</div>
</div>
</div>

<!-- Journey Hotels -->
<?php if(!empty($journeyHotels)) { ?>
<div class="panel3 panel-default tourcostpanel"> <a class="accordion-toggle2 collapsed " data-toggle="collapse" data-parent="#accordion2" href="#hotels">
<div class="panel-heading2">
<div class="panel-title3" style="color: #673400">Hotels</div>
</div>
</a>
<div id="hotels" class="panel-collapse collapse">
<div class="newpanel-body">
<div class="row">
<?php foreach ($journeyHotels as $key => $hotel) { 
  $starCount = $hotel['OurJourneyHotel']['rating'];
  ?>    
<div class="col-sm-6">
<div class="hotelbox">
<div class="row">
<div class="col-xs-4">
<?php echo $this->Bs->image('OurJourneyHotel.image_file',$hotel,['alt'=>$hotel['OurJourneyHotel']['hotel_name']]); ?>
</div>
<div class="col-xs-8">
<h4><?php echo $hotel['OurJourneyHotel']['hotel_name']; ?></h4> 

<?php if($starCount > 0) { ?>
<div class="star">
  <?php for ($i=1; $i <= $starCount ; $i++) { ?>
    <i class="fa fa-star"></i>
  <?php } ?>
</div> 
<?php } ?>
<div class="location"><i class="fa fa-map-marker"></i> <?php echo $hotel['OurJourneyHotel']['city_name']; ?></div>    
</div>    
</div>    
</div>    
</div>
<?php } ?>

   
</div>
</div>
</div>
</div>
<?php } ?>

</div>
<div class="topmargin60 row">
<div class="col-sm-6">
<div class="inclusions">
<h4>Inclusions</h4>
<ul>
 <?php 
    $remainCount = '';
    $InclusionCount = count($ourJourneyInclusions);
   foreach ($ourJourneyInclusions as $key => $ourJourneyInclusion) {

    // debug($InclusionCount);
    $remainCount = $InclusionCount - 4; 
        // debug($remainCount);
  ?>    
   <li><?php echo $ourJourneyInclusion['OurJourneyInclusion']['note']; ?></li>
 <?php if ($key == 3) {break;} } ?>
 
 <?php if($remainCount > 0){ ?>
  <div class="moretext">
   <?php foreach ($ourJourneyInclusions as $key => $ourJourneyInclusion) {
     if($key <= 3){continue;}
    ?>
     <li><?php echo $ourJourneyInclusion['OurJourneyInclusion']['note']; ?></li>
    <?php } ?>   
   </div>  
<?php } ?>

</ul>
<?php if($remainCount > 0){ ?>
<a href="javascript:void()" class="moreless-button">+ <?php echo $remainCount;?> more</a>
<?php } ?>
</div>
</div>
<div class="col-sm-6">
<div class="exclusions">
<h4>Exclusions</h4>
<ul>
 <?php 
    $remainCount1 = '';
    $ExclusionCount = count($ourJourneyExclusions);
   foreach ($ourJourneyExclusions as $key => $ourJourneyExclusion) {

    // debug($InclusionCount);
    $remainCount1 = $ExclusionCount - 4; 
        // debug($remainCount);
  ?>  
<li><?php echo $ourJourneyExclusion['OurJourneyExlusion']['note']; ?></li>
 <?php if ($key == 3) {break;} } ?>
 <?php if($remainCount1 > 0){ ?>
  <div class="moretext2">
   <?php foreach ($ourJourneyExclusions as $key => $ourJourneyExclusion) {
     if($key <= 3){continue;}
    ?>
     <li><?php echo $ourJourneyExclusion['OurJourneyExlusion']['note']; ?></li>
    <?php } ?>   
   </div>  
<?php } ?>
</ul>
<?php if($remainCount1 > 0){ ?>
<a href="javascript:void()" class="moreless-button2">+ <?php echo $remainCount1;?> more</a>
<?php } ?>
</div>
</div>
</div>
<div class="panel-group" id="accordion2"> 
            <!-- Payment Terms Start -->
            <?php if(!empty($ourJourny['OurJourny']['payment_terms'])) { ?>
              <div class="panel3 panel-default"> <a class="accordion-toggle2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#payment">
                <div class="panel-heading2">
                  <div class="panel-title3">Payment Terms</div>
                </div>
                </a>
                <div id="payment" class="panel-collapse collapse">
                  <div class="newpanel-body"><?php echo $ourJourny['OurJourny']['payment_terms']; ?></div>
                </div>
              </div>
            <?php } ?>
             <!-- Payment Terms End -->
              
             <!-- Cancellation Policy Start-->
              <?php if(!empty($ourJourny['OurJourny']['cancellation_policy'])) { ?>
              <div class="panel3 panel-default"> <a class="accordion-toggle2 collapsed" data-toggle="collapse" data-parent="#accordion2" href="#cancellation">
                <div class="panel-heading2">
                  <div class="panel-title3">Cancellation Policy</div>
                </div>
                </a>
                <div id="cancellation" class="panel-collapse collapse">
                  <div class="newpanel-body">
                    <?php echo $ourJourny['OurJourny']['cancellation_policy']; ?>
                  </div>
                </div>
              </div>
              <?php } ?>
             <!-- Cancellation Policy End--> 

</div>
<script type="text/javascript">

var totalInclusion = "<?php echo $remainCount ?>";


$('.moreless-button').click(function() {
$('.moretext').slideToggle();
if ($('.moreless-button').text() == "+ "+totalInclusion+" more") {
$(this).text("- Minimise")
} else {
$(this).text("+ "+totalInclusion+" more")
}
}); 


var totalExclution = "<?php echo $remainCount1 ?>";

$('.moreless-button2').click(function() {

$('.moretext2').slideToggle();
if ($('.moreless-button2').text() == "+ "+totalExclution+" more") {
$(this).text("Minimise")
} else {
$(this).text("+ "+totalExclution+" more")
}
});

$('.moreless-button3').click(function() {

$('.moretext3').slideToggle();
if ($('.moreless-button3').text() == "Read more") {
$(this).text("Minimise")
} else {
$(this).text("Read more")
}
});

</script>