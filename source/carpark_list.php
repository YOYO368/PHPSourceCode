<?php session_start(); ?>
<html>
<head>
	<title>Mia Cark Park</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<script src="../js/common/jquery-3.3.1.js" ></script>
	<?php 
	require('../database/database.php');
	require('../database/carpark_query.php'); 
	$pageNum = 0;
	?>

	<script>
		var selectedcustomerId = "";
		var approvalYn;

		function approval(customerId, carparkNo,approval) {
			selectedcustomerId = customerId;
			selectedcarparkNo = carparkNo;
			approvalYn = approval;

			var statusCode = "";
			if(approval == 2)
			{
				statusCode = "A_003";
			}
			$.ajax({
					url: "./approval.php",
					type: "post",
					data: {carparkNo:selectedcarparkNo, statusCode:statusCode}
				}).done(function(result) {
					if(result == 1) {
						if(approvalYn == 2) {
							$("#"+selectedcarparkNo).val("Approval");
							$("#"+selectedcarparkNo).click(function(){
								approval(selectedcarparkNo, false);
							});
							$("#"+selectedcarparkNo+"_status").text("Approval");
						}
						alert("Updated Successfully");
					}
					else {
						alert("An error occurred during the process.\nPlease, try again later.");
					}
				});
			
		}
	</script>
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
			      <th>Customer</th>
				  <th>carparkNumber</th>
			      <th>Request Date</th>
			      <th>updateDate</th>
				  <th>Status</th>
				</tr>
				<?php
		         
				$carparkList = getCarParkList($pageNum, 20);
				if ($carparkList->num_rows > 0) {
					$num = 0;
		            while($board = $carparkList->fetch_array())
		            {
						if($board['statusCode'] == "A_001") {
							$approvalBtn = "<input type='button' id='".$board['carparkNumber']."' value='Disapproval' />";
		            	}
		            	else if($board['statusCode'] == "A_002") {
							$approvalBtn = "<input type='button' id='".$board['carparkNumber']."' value='Pending' onclick='approval(\"".$board['customerId']."\",\"".$board['carparkNumber']."\",2)' />";
		            	}
						else if($board['statusCode'] == "A_003") {
							$approvalBtn = "<input type='button' id='".$board['carparkNumber']."' value='Approval' />";
						}
		        ?>
				      <tbody>
				        <tr>
				          <td width="70" class="center"><?php echo ++$num; ?></td>
				          <td width="200" class="center"><?php echo $board['customerId']?></td>
						  <td width="200" class="center"><?php echo $board['carparkNumber']?></td>
				          <td width="150" class="center"><?php echo $board['requestDate']?></td>
				           <td width="150" class="center"><?php echo $board['updateDate']?></td>
				          <td width="100" class="center"><?php echo $approvalBtn ?></td>
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


