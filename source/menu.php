<script>
	$(document).ready(function(){
		$("#menuCustomer1").on("click", function() {
			$("#menuCustomer2").css("background-color", "#585858");
			$(this).css("background-color", "#fc8369");
			$('#mainPage').load('/source/carpark_list.php'); 
		});

		$("#menuCustomer2").on("click", function() {
			$("#menuCustomer1").css("background-color", "#585858");
			$(this).css("background-color", "#fc8369");
			$('#mainPage').load('/source/customer_list.php'); 
		});
	});
</script>

<link rel="stylesheet" type="text/css" href="../css/menu.css" />
<p style="text-align: center;"><img src="../images/carpark_logo.png" style="width:150px;display:block;margin-left:auto;margin-right:auto;"></p>
<nav class="cbp-spmenu cbp-spmenu-vertical" id="cbp-spmenu-s1">
	<h3>Parking Area</h3>
	<a id="menuCustomer1" href="/source/carpark_list.php">State of CarPark</a>
	<a id="menuCustomer2" href="/source/customer_list.php">List of Customer</a>
</nav>

