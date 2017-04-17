<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Bootstrap Login &amp; Register Templates</title>

        <!-- CSS -->
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
            <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
            <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Favicon and touch icons -->
        <link rel="shortcut icon" href="assets/ico/favicon.png">
        <link rel="apple-touch-icon-precomposed" sizes="144x144" href="assets/ico/apple-touch-icon-144-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="114x114" href="assets/ico/apple-touch-icon-114-precomposed.png">
        <link rel="apple-touch-icon-precomposed" sizes="72x72" href="assets/ico/apple-touch-icon-72-precomposed.png">
        <link rel="apple-touch-icon-precomposed" href="assets/ico/apple-touch-icon-57-precomposed.png">

    </head>

    <body>

        <!-- Top content -->
        <div class="top-content">
        	<div class="container">
                	
                <div class="row">
                    <div class="col-sm-8 col-sm-offset-2 text">
                        <h1>Bootstrap Login &amp; Register Forms</h1>
                        <div class="description">
                        	<p>
	                         	Free responsive template made with Bootstrap. 
	                         	Download it on <a href="http://azmind.com" target="_blank">AZMIND</a>, 
	                         	customize and use it as you like!
                        	</p>
                        </div>
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-sm-10 col-sm-offset-1 show-forms">
                    	<span class="show-register-form active">Register</span> 
                    	<span class="show-forms-divider">/</span> 
                    	<span class="show-login-form">Login</span>
                    </div>
                    
                </div>
                	                    				  	<?php
					  if (isset($_GET['run']) && $_GET['run'] =="failed")
					  {
						  echo ("Your email or password does not match");
					  }
					?>
                <div class="row register-form">
                    <div class="col-sm-4 col-sm-offset-1">
	                    <?php
					if(isset($_GET['run']) && $_GET['run']=="success")
					{

						echo("<mark>Your have successfully registered!</mark>");
					}  
						?>	
						<form role="form" action="signup_sub.php" method="post" class="r-form" enctype="multipart/form-data">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="fullname">Full Name</label>
	                        	<input type="text" name="name" placeholder="First name..." class="r-form-first-name form-control" id="fullname" required>
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="studentid">Student ID</label>
	                        	<input type="text" name="id" placeholder="Student ID..." class="r-form-last-name form-control" id="studentid" required>
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="email">Email</label>
	                        	<input type="email" name="email" placeholder="Email..." class="r-form-email form-control" id="email" required>
	                        </div>
	                        <div class="form-group">
	                        	<label class="sr-only" for="pwd">Password</label>
	                        	<input type="password" name="pass" placeholder="Password..." class="r-form-email form-control" id="pwd" required>
	                        </div>
				            <button type="submit" class="btn">Sign me up!</button>
						</form>
                    </div>
                    <div class="col-sm-6 forms-right-icons">
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-pencil"></i></div>
							<div class="col-sm-10">
								<h3>Add Multiple Choice Question</h3>
								<p>Create a bank of multiple choice questions to allow students to sign in and attempt the questions.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-commenting"></i></div>
							<div class="col-sm-10">
								<h3>Awesome Login</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-magic"></i></div>
							<div class="col-sm-10">
								<h3>Great Registration</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
							</div>
						</div>
                    </div>
                </div>
                
                <div class="row login-form">
	                
                    <div class="col-sm-4 col-sm-offset-1">

			  						<form role="form" action="signin_sub.php" method="post" class="l-form">
	                    	<div class="form-group">
	                    		<label class="sr-only" for="l-form-username email">Username</label>
	                        	<input type="email" name="email" placeholder="Username..." class="l-form-username form-control" id="email">
	                        </div>
	                        	                        <div class="form-group">
	                        	<label class="sr-only" for="l-form-password pwd">Password</label>
	                        	<input type="password" name="pass" placeholder="Password..." class="l-form-password form-control" id="pwd">
	                        </div>
				            <button type="submit" class="btn">Sign in!</button>
				    	</form>
                    </div>
                    <div class="col-sm-6 forms-right-icons">
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-user"></i></div>
							<div class="col-sm-10">
								<h3>New Features</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
							</div>
						</div>
						<div class="row">
							<div class="col-sm-2 icon"><i class="fa fa-eye"></i></div>
							<div class="col-sm-10">
								<h3>Easy To Use</h3>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et.</p>
							</div>
						</div>
                    </div>
                </div>
                    
        	</div>
        </div>

        <!-- Footer -->
        <footer>
        	<div class="container">
        		<div class="row">
        			
        			<div class="col-sm-8 col-sm-offset-2">
        				<div class="footer-border"></div>
        				<p>Made by <a href="http://azmind.com" target="_blank">AZMIND</a>.</p>
        			</div>
        			
        		</div>
        	</div>
        </footer>

        <!-- Javascript -->
        <script src="assets/js/jquery-1.11.1.min.js"></script>
        <script src="assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="assets/js/jquery.backstretch.min.js"></script>
        <script src="assets/js/scripts.js"></script>
        
        <!--[if lt IE 10]>
            <script src="assets/js/placeholder.js"></script>
        <![endif]-->

    </body>

</html>