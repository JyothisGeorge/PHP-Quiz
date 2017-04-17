<?php
include_once "connection.php";
include ("class/users.php");	
$email = $_SESSION['email'];
$profile=new users;	
$profile->user_profile($email);
$id="";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Case</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Web Quiz Application</h2>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Home</a></li>
    <li><a data-toggle="tab" href="#menu1">Profile</a></li>
    <li><a data-toggle="tab" href="#menu2">Quiz</a></li>
    <li style="float:right"><a href="logout.php">Logout</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <h3>HOME</h3>
	  	<center><button type="button" class="btn btn-success" data-toggle="tab" href="#select">Start Quiz</button></center>
	  	<div class="col-sm-4"></div>
	  	<div class="col-sm-4">
		  <br>
		  	<div id="select" class="tab-pane fade">
			<form method="post" action="qus_show.php">	  
			  
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
			<br>
			<input type="submit" value="submit" class="btn btn-primary" />
			</form>
			</div>
		</div>

    </div>
    <div id="menu1" class="tab-pane fade">
      <h3>Profile</h3>
      
      
      <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Full Name</th>
        <th>Email</th>
        <th>StudentID</th>
      </tr>
    </thead>
    <tbody>
	  	<?php 
		foreach($profile->data as $prof) {
		?>	 
      <tr>
        <td><?php echo $prof['id']; $id=$prof['id'];?></td>
        <td><?php echo $prof['name']; ?></td>
        <td><?php echo $prof['email']; ?></td>
        <td><?php echo $prof['studentid']; ?></td>
        <?php 
        }
		?> 
      </tr>

<?php
	//$score=new users;
//$email = $_SESSION['email'];
//$answers=$ans->answer($_POST);
//$score->profilescore($id);

//foreach($score->data as $da) {
	//echo $da['topic_id'];
	//print($da['percentage']);
//}

//$query="SELECT * FROM score where user_id ='$id'";
$query = "SELECT * FROM score LEFT JOIN topic ON topic.topicid=score.topic_id LEFT JOIN module ON module.module_code=topic.module_code  WHERE user_id ='$id'";
$result = $con->query($query);
if ($result->num_rows > 0) {
     // output data of each row
     while($row = $result->fetch_assoc()) {
         echo "<br> id: ". $row["topic_name"]. " - Percentage: ". $row["module_name"]. " - Userid" . $row["user_id"] . "<br>";
     }
} else {
     echo "0 results";
}

$con->close();

/*
while ($row = mysqli_fetch_array($results)) {
    echo '<tr>';
    foreach($row as $field) {
        echo '<td>' . htmlspecialchars($field) . '</td>';
    }
    echo '</tr>';
}
*/


	?>
    </tbody>
  </table>
  
  
    </div>
    <div id="menu2" class="tab-pane fade">
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
    <div id="menu3" class="tab-pane fade">
      <h3>Menu 3</h3>
      <p>Eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
    </div>
  </div>
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
