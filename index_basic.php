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
	<br><br>
<div class="container">
	<div class="row">
		<div class="col-sm-12">
	    	<div class="panel panel-warning">
			<div class="panel-heading">Welcome to Quiz Application</div>
			<div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
    		</div>
		</div>
	</div>
</div>
	
<div class="container">
	<div class="row">
		<div class="col-sm-6">
			<div class="panel panel-info"> 
			  <div class="panel-heading">Login</div>
			  <div class="panel-body">
				  	<?php
					  if (isset($_GET['run']) && $_GET['run'] =="failed")
					  {
						  echo ("Your email or password does not match");
					  }
					?>
			  <form role="form" action="signin_sub.php" method="post">
			    <div class="form-group">
			      <label for="email">Email:</label>
			      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
			    </div>
			    <div class="form-group">
			      <label for="pwd">Password:</label>
			      <input type="password" class="form-control" name="pass" id="pwd" placeholder="Enter password">
			    </div>
			    <div class="checkbox">
			      <label><input type="checkbox"> Remember me</label>
			    </div>
			    <button type="submit" class="btn btn-default">Submit</button>
			  </form>
			  </div>
		  </div>
		</div>
		<div class="col-sm-6">
		  <div class="panel panel-danger"> 
			  <div class="panel-heading">Signup Form</div>
			  <div class="panel-body">
				<?php
					if(isset($_GET['run']) && $_GET['run']=="success")
					{
						echo("<mark>Your have successfully registered!</mark>");
					}  
				?>	
			  <form role="form" method="post" action="signup_sub.php" enctype="multipart/form-data">
				<div class="form-group">
			      <label for="fullname">Name:</label>
			      <input type="text" class="form-control" name="name" id="fullname" placeholder="Enter Full Name">
			    </div>  
			    <div class="form-group">
			      <label for="studentid">Student ID:</label>
			      <input type="text" class="form-control" name="id" id="studentid" placeholder="Enter Your Student Id">
			    </div> 
			    <div class="form-group">
			      <label for="email">Email:</label>
			      <input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
			    </div>
			    <div class="form-group">
			      <label for="pwd">Password:</label>
			      <input type="password" class="form-control" name="pass" id="pwd" placeholder="Enter password">
			    </div>
			    <div class="checkbox">
			      <label><input type="checkbox"> Remember me</label>
			    </div>
			    <button type="submit" class="btn btn-default">Submit</button>
			  </form>
			  </div>
		  </div>
		</div>
	</div>
</div> 
</body>
</html>
