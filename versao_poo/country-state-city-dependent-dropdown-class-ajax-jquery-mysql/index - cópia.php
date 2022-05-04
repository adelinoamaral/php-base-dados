<?php
	require_once("dbcontroller.php");

	$db_handle = new DBController();
	$query = "SELECT * FROM country";
	$results = $db_handle->runQuery($query);
?>
<html>
<head>
	<TITLE>DropDown List dependente - Paises, estados/regiões e cidades</TITLE>
	<link rel="stylesheet" href="style.css">

	<script src="jquery-3.2.1.min.js" type="text/javascript"></script>
	<script>

		function getState(val) {
			$.ajax({
			type: "POST",
			url: "getState.php",
			data:'country_id='+val,
			success: function(data){
				$("#state-list").html(data);
				getCity();
			}
			});
		}


		function getCity(val) {
			$.ajax({
			type: "POST",
			url: "getCity.php",
			data:'state_id='+val,
			success: function(data){
				$("#city-list").html(data);
			}
			});
		}

	</script>
</head>
<body>

	<div class="frmDronpDown">
		<div class="row">
			<label>País:</label><br/>
			<select name="country" id="country-list" class="demoInputBox" onChange="getState(this.value);">
				<option value disabled selected>Select Country</option>
				<?php
				foreach($results as $country) {
				?>
				<option value="<?php echo $country["id"]; ?>"><?php echo $country["country_name"]; ?></option>
				<?php
				}
				?>
			</select>
		</div>

		<div class="row">
			<label>Estado:</label><br/>
			<select name="state" id="state-list" class="demoInputBox" onChange="getCity(this.value);">
				<option value="">Select State</option>
			</select>
		</div>

		<div class="row">
			<label>Cidade:</label><br/>
			<select name="city" id="city-list" class="demoInputBox">
				<option value="">Select City</option>
			</select>
		</div>
	</div>
</body>
</html>