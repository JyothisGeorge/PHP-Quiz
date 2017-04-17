<?php
include("class/users.php");;
$ans=new users;
$email = $_SESSION['email'];
$answers=$ans->answer($_POST);
$ans->user_profile($email);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Answers</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
$total_qus = $answers['right'] + $answers['wrong'] + $answers['no_answer'];
$attempted_qs = $total_qus - $answers['no_answer'];
$resultpercentage = ($answers['right']*100)/$total_qus;
?>

<?php
$answerr = $answers["right"];
$answerw = $answers["wrong"];
$noans = $answers['no_answer'];
$topicid = $_SESSION['topic'];
$userId = '';
// attempt insert query execution

		foreach($ans->data as $prof) {
			//echo $prof['id'];
			$userId = $prof['id'];
}

$sql = "INSERT INTO score (percentage, correct_answer, wrong_answer, attempted_qs, not_attempted_qs, user_id, topic_id) VALUES ('$resultpercentage', '$answerr','$answerw','$attempted_qs','$noans','$userId','$topicid')";
if($ans->add_quiz($sql)){
	    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($sql);
}

?>
<div class="container">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
  <h2>Your Quiz Results</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Total Number of Questions</th>
        <th><?php echo $total_qus ?></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Attempted Questions</td>
        <td><?php echo $total_qus ?></td>
      </tr>
      <tr>
        <td>Right Answer</td>
        <td><?php echo $answers['right'] ?></td>
      </tr>
      <tr>
        <td>Wrong Answer</td>
        <td><?php echo $answers['wrong'] ?></td>
      </tr>
      <tr>
        <td>Your Result</td>
        <td><?php echo $resultpercentage."%" ?></td>
      </tr>
    </tbody>
  </table>

  
  <h2>Right Answers</h2>
  <div id="results">
	  <?php
	$feedback=$ans->feedback($_POST);
	?>
  </div>
  -----
  </div>
  <div class="col-sm-2">
  </div>
</div>



<script>
$.ajax({url: "test.php"}).done(function( html ) {
    $("#results").append(html);
});

</script>

</body>
</html>