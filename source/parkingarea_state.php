<?php session_start(); ?>
<html>
<head>
	<title>Mia Cark Park</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css" />
	<?php 
	require('../database/database.php');
	require('../database/carpark_query.php'); 
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
			      <th>carparkNumber</th>
			      <th>Status</th>
			      <th>updateDate</th>
				</tr>
				<?php
		         
				$ParkingAreaList = getCarParkEmptyList($pageNum, 20);
				if ($ParkingAreaList->num_rows > 0) {
					$num = 0;
		            while($board = $ParkingAreaList->fetch_array())
		            {
		            	if($board['statusCode'] == "A_001") {
							$status = "Empty";
		            	}
		        ?>
				      <tbody>
				        <tr>
				          <td width="70" class="center"><?php echo ++$num; ?></td>
				          <td width="200" class="center"><?php echo $board['carparkNumber']?></td>
						  <td width="200" class="center" id="<?php echo $board['carparkNumber']?>_status"><?php echo $status?></td>
				          <td width="200" class="center"><?php echo $board['updateDate']?></td>
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


