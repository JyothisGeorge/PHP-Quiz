<?php
	include("class/users.php");
	$qus = new users;
	$topic = $_POST['topic'];
	$qus->qus_show($topic);
	$_SESSION['topic']=$topic;
?>	

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
	<div class="col-sm-2"></div>
	<div class="col-sm-8">
  <h2>Online Quiz</h2>
  <form method="post" action="answer.php">
  <?php 
	  $i=1;
	  foreach($qus->qus as $qust) { ?>         
  <table class="table table-bordered">
    <thead>
      <tr>
        <th><?php echo $i; ?> <?php echo $qust["question"]; ?></th>
      </tr>
    </thead>
    <tbody>
	  <?php if(isset($qust['answer_1'])) { ?>
      <tr>
        <td>&nbsp;1&emsp;<input type="radio" value="<?php echo $qust["answer_1"]; ?>" name="<?php echo $qust['qsid'];?>" />&nbsp; <?php echo $qust["answer_1"]; ?></td>
      </tr>
      <?php } ?>
      <?php if(isset($qust['answer_2'])) { ?>
      <tr>
        <td>&nbsp;2&emsp;<input type="radio" value="<?php echo $qust["answer_2"]; ?>" name="<?php echo $qust['qsid'];?>" />&nbsp; <?php echo $qust["answer_2"]; ?></td>
      </tr>  
      <?php } ?>
      <!-- It was isset but changed to !empty-->
      <?php if(!empty($qust['answer_3'])) { ?>
      <tr>
        <td>&nbsp;3&emsp;<input type="radio" value="<?php echo $qust["answer_3"]; ?>" name="<?php echo $qust['qsid'];?>" />&nbsp; <?php echo $qust["answer_3"]; ?></td>
      </tr>
      <?php } ?>
      <?php if(!empty($qust['answer_4'])) { ?>
      <tr>
        <td>&nbsp;4&emsp;<input type="radio" value="<?php echo $qust["answer_4"]; ?>" name="<?php echo $qust['qsid'];?>" />&nbsp; <?php echo $qust["answer_4"]; ?></td>
      </tr> 
      <?php } ?>     
      <?php if(!empty($qust['hint'])) { ?>
      <tr>
        <td>
	        <button type="button" class="btn btn-info clickme btn-sm">Show Hint</button>
	        <span class="box"><?php echo $qust["hint"]; ?></span>
	        </td>
      </tr> 
      <?php } ?>     
      <tr>
	      <td><input type="radio" checked="checked" style="display:none" value="no_attempt" name="<?php echo $qust['qsid'];?>"></td>
      </tr>
    </tbody>
  </table>
  <?php $i++;} ?>
  <center><input type="submit" value="Submit Quiz" class="btn btn-success"/></center>
  </form>
  </div>
  <div class="col-sm-2"></div>

</div>

</body>
<script>
	var $clickme = $('.clickme'),
    $box = $('.box');

$box.hide();

$clickme.click( function(e) {
    $(this).text(($(this).text() === 'Hide Hint' ? 'Show Hint' : 'Hide Hint')).next('.box').slideToggle();;
    e.preventDefault();
});

</script>
</html>
