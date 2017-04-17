<?php
	include_once "connection.php";
	
	if (!empty($_POST["module_code"])){
	$module_code = $_POST["module_code"];	
	$query = "SELECT * FROM topic WHERE module_code = $module_code";
	$results = mysqli_query($con, $query);
	
	foreach($results as $topic){
		?>
	<option value="<?php echo $topic["topicid"]; ?>"> <?php echo $topic["topic_name"]; ?></option>
		<?php
		}	
	}
	?>