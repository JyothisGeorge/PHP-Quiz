<?php
include_once "connection.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dropdown AJAX</title>
</head>
<body>
<div class="module">
	<label>Module</label>
	<select name="country" onchange="getmoduleId(this.value);">
		<option value="">Select Module</option>
		<?php
			$query = "SELECT * FROM module";
			$results = mysqli_query($con, $query);
			
			foreach ($results as $module){
		?>		
		<option value="<?php echo $module["module_code"]; ?>"> <?php echo $module["module_name"]; ?> </option>
		<?php
		}
		?>
	</select>
</div>

<div class="topic">
	<label>Topic</label>
	<select name="topic" id="topiclist">
		<option value=""></option>
	</select>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<script>
	function getmoduleId(val){
		//alert(val);
		$.ajax({
			type: "POST",
			url: "getdata.php",
			data:"module_code="+val,
			success: function(data){
				$("#topiclist").html(data);
			}
		});
	}
</script>

</body>
</html>