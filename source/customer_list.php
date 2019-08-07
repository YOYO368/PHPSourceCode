<?php session_start(); ?>
<html>
<head>
	<title>Mia Cark Park</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script src="../js/common/jquery-3.3.1.js" ></script>
	<?php 
	require('../database/database.php');
	require('../database/customer_query.php'); 
	$pageNum = 0;
	?>

</head>
<body style="margin: 0;">
	<div class="topBackground">
		<?php require('./top.php'); ?>
	</div>
	<div style="clear: both;">
		<div class="menuBackground">
			<?php require('./menu.php'); ?>
		</div>
		<div id="requestListArea" class="contentBackground">
			<table class="gridtable">
				<tr>
			      <th>No</th>
			      <th>Customer ID</th>
			      <th>First Name</th>
			      <th>Last Name</th>
			      <th>Email</th>
				  <th>Phone Number</th>
				</tr>
				<?php
		         
				$customerList = getCustomerInfo($pageNum, 20);
				if ($customerList->num_rows > 0) {
					$num = 0;
		            while($board = $customerList->fetch_array())
		            {
			        ?>
				      <tbody>
				        <tr>
				          <td width="70" class="center"><?php echo ++$num; ?></td>
				          <td width="200" class="center"><?php echo $board['customerId']?></td>
				          <td width="150" class="center"><?php echo $board['firstName']?></td>
						  <td width="150" class="center"><?php echo $board['lastName']?></td>
				          <td width="150" class="center"><?php echo $board['email']?></td>
				          <td width="150" class="center"><?php echo $board['phoneNumber']?></td>
				        </tr>
				      </tbody>
				<?php 
					}
				  } 
				  ?>
			</table>
		</div>
	</div>
</body>
</html>
<script>
	$(document).ready(function(){
	
	});
</script>


