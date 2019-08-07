<html>
<head>
	<title>Mia's Car Park</title>
	<link rel="stylesheet" type="text/css" href="./css/style.css" />
	<script src="./js/common/jquery-3.3.1.js" ></script>
	<?php require('./database/database.php'); ?>

	<script>
		$(document).ready(function(){
 			
			$("#btnLgoin").on("click", function(){
				if(!checkForm()) {
					return;
				}
				$.ajax({
					url: "./source/login.php",
					type: "post",
					data: {adminId:$("#adminId").val(), adminPassword:$("#adminPassword").val()}
				}).done(function(result) {
					 if(result == "true") {
						location.href = "./source/parkingarea_state.php";
					}
					else {
						alert("Invalid login, please try again.");
					}
				});
			});

			$("#userPassword").keypress(function(e) {
			    if(e.which == 13) {
			        $("#btnLgoin").trigger("click");
			    }
			});
		});

		function checkForm() {
			if($("#adminId").val() == null || $("#adminId").val() == "") {
				alert("Please enter admin ID.");
				$("#adminId").focus();
				return false;
			}
			else if($("#adminPassword").val() == null || $("#adminPassword").val() == "") {
				alert("Please enter admin password.");
				$("#adminPassword").focus();
				return false;
			}
			else {
				return true;
			}
		}
	</script>
</head>
<body style="margin: 0;">
	<form method="post" action="./source/login.php">
		<div class="contentBackground" style="width:100%;text-align: center;padding-top: 20px;">
			<p class="textBlue">Mia's Car Park</p>
			<table style="vertical-align: middle;display: inline-block;margin-right:600px">
				<tr>
					<td class="textGray">ID :</td>
					<td><input type="text" id="adminId" name="adminId"/></td>
				</tr>
				<tr>
					<td class="textGray">Password :</td>
					<td><input type="Password" id="adminPassword" name="adminPassword" /></td>
				</tr>
			</table>
			<p><input type="submit" value="LOGIN" id="btnLgoin" class="btnSubmit"/></p>
		</div>
	</form>
</body>
</html>