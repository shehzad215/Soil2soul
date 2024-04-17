
<?php //debug($enquiry);exit;

$jounrney = $ourJourney['OurJourny']['name'];
$name = $enquiry['Enquiry']['cust_name'];
$email = $enquiry['Enquiry']['cust_email'];
$contact = $enquiry['Enquiry']['contact_no'];
$journeyDate = $enquiry['Enquiry']['journey_date'];
$adults = $enquiry['Enquiry']['no_of_adults'];
$adults = $enquiry['Enquiry']['no_of_child'];
// $totalCost = $enquiry['Enquiry']['total_cost'];
$message = isset($enquiry['Enquiry']['message']) ? $enquiry['Enquiry']['message'] : '';
	

?>
<html>
<head>
<title>Enquiry Form</title>
<style type="text/css">
body {
  margin-left: 0px;
  margin-top: 0px;
  margin-right: 0px;
  margin-bottom: 0px;
}
</style>
</head>
 <body>
    <table rules="all" style="border-color: #666;" cellpadding="10">
        <tbody>
        	<!--Name-->
        	<tr>
				<th><strong>Trail:</strong></th>
				<td><?php echo strip_tags($jounrney); ?></td>
			</tr>
        	<!--Name-->
        	<tr>
				<th><strong>Name:</strong></th>
				<td><?php echo strip_tags($name); ?></td>
			</tr>
			<!--Company Name-->
				<tr>
					<th><strong>Email:</strong></th>
					<td>
						<?php echo strip_tags($email); ?>
					</td>
				</tr>
				<!--Mobile-->
				<tr>
					<th><strong>Contact:</strong></th>
					<td><?php echo strip_tags($contact); ?></td>
				</tr>
				<!--Country-->
				<tr>
					<th><strong>Nationality:</strong></th>
					<td><?php echo strip_tags($country); ?></td>
				</tr>
				<!--Email-->
				<tr>
					<th><strong>Journey Date:</strong></th>
					<td><?php echo strip_tags($journeyDate); ?></td>
				</tr>	
				<!--Plan-->
				<tr>
					<th><strong>Adults:</strong></th>
					<td><?php echo strip_tags($adults); ?></td>
				</tr>
				<tr>
					<th><strong>Child:</strong></th>
					<td><?php echo strip_tags($adults); ?></td>
				</tr>
				<!--Message-->
				<?php if(!empty($message)){ ?>
				<tr>
					<th><strong>Message:</strong></th>
					<td><?php echo strip_tags($message); ?></td>
				</tr>
				<?php } ?>
            </tbody>
        </table>
 </body>
</html>