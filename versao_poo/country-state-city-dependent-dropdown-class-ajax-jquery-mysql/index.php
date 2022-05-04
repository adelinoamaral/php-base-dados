<?php
	require_once("dbcontroller.php");

	$db_handle = new DBController();
	$query = "SELECT * FROM country";
	$results = $db_handle->runQuery($query);
?>
<html>
<head>
	<TITLE>DropDown List dependente - Paises, estados/regiões e cidades</TITLE>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

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

	<div class="container">
		<div class="row">
			<label for="country-list">País:</label><br/>
			<select name="country" id="country-list" class="form-control" onChange="getState(this.value);">
				<option value="" disabled selected>Select Country</option>
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
			<label for="state-list">Região:</label><br/>
			<select name="state" id="state-list" class="form-control" onChange="getCity(this.value);">
				<option value="">Select State</option>
			</select>
		</div>

		<div class="row">
			<label for="city-list">Cidade:</label><br/>
			<select name="city" id="city-list" class="form-control">
				<option value="">Select City</option>
			</select>
		</div>
	</div>
</body>
</html>