<?php
	include_once "../connection.php";
	include"../class/users.php";
	$email = $_SESSION['email'];
	//$addquiz = new users;
	$profile=new users;	
	$profile->user_profile($email);
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Light Bootstrap Dashboard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>


    <!--  CSS for Demo Purpose, don't include it in your project     -->
    <link href="assets/css/demo.css" rel="stylesheet" />


    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>
    <link href="assets/css/pe-icon-7-stroke.css" rel="stylesheet" />
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="orange" data-image="assets/img/sidebar-5.jpg">

    <!--   you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple" -->


    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    Creative Tim
                </a>
            </div>

            <ul class="nav">
                <li class="">
                    <a href="dashboard.php">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="questions.php">
                        <i class="pe-7s-note2"></i>
                        <p>QUESTIONS</p>
                    </a>
                </li>                
                <li>
                    <a href="icons.html">
                        <i class="pe-7s-users"></i>
                        <p>USER LIST</p>
                    </a>
                </li>
                <li>
                    <a href="user.html">
                        <i class="pe-7s-user"></i>
                        <p>User Profile</p>
                    </a>
                </li>
                <li>
                    <a href="typography.html">
                        <i class="pe-7s-news-paper"></i>
                        <p>MODULE / TOPIC</p>
                    </a>
                </li>

				<li class="active-pro">
                    <a href="../home.php">
                        <i class="pe-7s-rocket"></i>
                        <p>TAKE A QUIZ</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>


    <div class="main-panel">
		<nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#"><?php 
		foreach($profile->data as $prof) { echo $prof['name']; }
		?>	</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="dashboard.html" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
								<p class="hidden-lg hidden-md">Dashboard</p>
                            </a>
                        </li>
                                            </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="../index.php">
                                <p>Log out</p>
                            </a>
                        </li>
						<li class="separator hidden-lg hidden-md"></li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Add Questions</h4>
                                	  	 
      
      </tr>
                                	<?php
									  if(isset($_GET['msg']) && !empty($_GET['msg'])){
										  echo "<br><div class='alert alert-success'>Data Added Successfully!</div>";
									  }
									?>
                            </div>
                            <div class="content">
                                  <form method="post" action="add_quiz.php">
								    <div class="form-group">
								      <label for="text">Question:</label>
								      <input type="text" class="form-control" name="qus" id="question" placeholder="Enter Question">
								    </div>
								    <div class="form-group">
								      <label for="text">Option 1:</label>
								      <input type="text" class="form-control" name="opt1" id="option_1" placeholder="Enter Option 1">
								    </div>
								    <div class="form-group">
								      <label for="text">Option 2:</label>
								      <input type="text" class="form-control" name="opt2" id="option_2" placeholder="Enter Option 2">
								    </div>
								    <div class="form-group">
								      <label for="text">Option 3:</label>
								      <input type="text" class="form-control" name="opt3" id="option_3" placeholder="Enter Option 3">
								    </div>
								    <div class="form-group">
								      <label for="text">Option 4:</label>
								      <input type="text" class="form-control" name="opt4" id="option_4" placeholder="Enter Option 4">
								    </div>
								    <div class="form-group">
								      <label for="text">Right Answer:</label>
								      <input type="text" class="form-control" name="right_ans" id="right_answer" placeholder="Enter Correct Answer">
								    </div>
								    <div class="form-group">
								      <label for="text">Hint:</label>
								      <input type="text" class="form-control" name="hint" id="hint" placeholder="Enter Hint">
								    </div>
								    								    
								    <div class="form-group">
										<div class="adminmodule">
										<label for="text">Module</label>
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
								    </div>
								    
								    <div class="form-group">
								      <label for="text">Topic: </label>

				<select name="topic" id="topiclist" class="selectpicker">
					<option value="">Select Topic</option>
				</select>
								    </div>
								    
								    <button type="submit" class="btn btn-default">Submit</button>
								  </form>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>

    </div>
</div>

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<script>
	function getmoduleId(val){
		//alert(val);
		$.ajax({
			type: "POST",
			url: "../getdata.php",
			data:"module_code="+val,
			success: function(data){
				$("#topiclist").html(data);
			}
		});
	}
</script>

</body>

    <!--   Core JS Files   -->
    <script src="assets/js/jquery-1.10.2.js" type="text/javascript"></script>
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Checkbox, Radio & Switch Plugins -->
	<script src="assets/js/bootstrap-checkbox-radio-switch.js"></script>

	<!--  Charts Plugin -->
	<script src="assets/js/chartist.min.js"></script>

    <!--  Notifications Plugin    -->
    <script src="assets/js/bootstrap-notify.js"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?sensor=false"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="assets/js/light-bootstrap-dashboard.js"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
	<script src="assets/js/demo.js"></script>

</html>