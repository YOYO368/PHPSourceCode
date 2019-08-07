<?php
	if(!isset($_SESSION['adminId']) || !isset($_SESSION['adminId'])) {
		echo "<meta http-equiv='refresh' content='0;url=../index.php'>";
		exit;
	}
	$adminId = $_SESSION['adminId'];
	
?>

<script>
	$(document).ready(function(){
 			

			$("#btnLogout").on("click", function(){

				$.ajax({
					url: "./logout.php",
					type: "post",
					data: null
				}).done(function(result) {
					if(result == "true") {
						location.href='../index.php';
					}
				});
			});
		});
</script>

<div class="textBlue" style="float:left;">Mia's Car Park</div>
<div class="textRed" style="float:right;">
	Welcome <span id="adminId"><?=$adminId?></span>
	<span style="margin-left:20px;cursor:pointer;" class="textGray" id="btnLogout">LOGOUT</span>
</div>
