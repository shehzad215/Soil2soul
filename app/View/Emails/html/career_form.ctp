<?php //debug($this->request->data);
$name = $this->request->data['Page']['name'];
$mobile = $this->request->data['Page']['contact'];
$email = $this->request->data['Page']['email'];
$comments = $this->request->data['Page']['comments'];
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
				<th><strong>Name:</strong></th>
				<td><?php echo strip_tags($name); ?></td>
			</tr>
			<!--Mobile-->
			<tr>
				<th><strong>Mobile:</strong></th>
				<td><?php echo strip_tags($mobile); ?></td>
			</tr>
			<!--Email-->
			<tr>
				<th><strong>Email:</strong></th>
				<td><?php echo strip_tags($email); ?></td>
			</tr>	
			<!--Comment-->
			<tr>
				<th><strong>Comment:</strong></th>
				<td><?php echo strip_tags($comments); ?></td>
			</tr>
            </tbody>
        </table>
 </body>
</html>