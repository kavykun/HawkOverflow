<?php
#Dashboard
	
ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);


		$pg = 'query_testing';
		if (isset($_GET['page'])) {
			
    		if ($_GET['page'] ==  ''){
				
				$pg = $_GET['page'];
				
		} else {
			
			$pg = $_GET['page'];
			

			
			}//end else 
		}//end if

?>

<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy this line! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="dashboard.php">The Cupcake Factory - Admin</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li><a href="dashboard.php">Dashboard</a></li>
            <li><a href="../index.php">Home</a></li>
            
          </ul>
        </div>
      </div>
    </div>

    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-md-2 sidebar">
          <ul class="nav nav-sidebar">
            <li class="active"><a href="#">Overview</a></li>
            <li><a href="dashboard.php?page=query_testing">Query Tester</a></li>
            <li><a href="dashboard.php?page=employee_query">Manage Employees</a></li>
            <li><a href="dashboard.php?page=customers_query">Manage Customers</a></li>
            <li><a href="dashboard.php?page=department_query">Manage Departments</a></li>
             <li><a href="dashboard.php?page=inventory_query">Manage Inventory</a></li>
             <li><a href="dashboard.php?page=sales_query">Manage Sales</a></li>
              <li><a href="dashboard.php?page=images_query">Manage Images</a></li>
               <li><a href="dashboard.php?page=upload_image">Upload a Image</a></li>
          </ul>
        </div>
        <div class="col-sm-9 col-sm-offset-3 col-md-10 col-md-offset-2 main">
          <h1 class="page-header">Dashboard</h1>

			
			
			 <?php include($pg.'.php'); ?>
			
			
          
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="file:///C|/Users/Kavy/Documents/Courses/CSC 455/dist/js/bootstrap.min.js"></script>
    <script src="file:///C|/Users/Kavy/Documents/Courses/CSC 455/assets/js/docs.min.js"></script>
  </body>
</html>
