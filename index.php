<?php
ob_start();
session_start();
if(session_id() == '' || !isset($_SESSION)) {
    session_start();
    //guest session variables
    $_SESSION["firstName"] = "Guest";
    $_SESSION["lastName"] = "User";
    $_SESSION["userName"] = "guestUser000";
    $_SESSION["gender"] = "Undefined";
    $_SESSION["major"] = "Undefined";
    $_SESSION["majCon"] = "Undefined";
    $_SESSION["lastLogin"] = date("Y-m-d H:i");
    $_SESSION["joinDate"] = date("Y-m-d H:i");
    $_SESSION["birthday"] = date("Y-m-d H:i");
}
//Require PHP files
require('content/config.php');
$pg = 'home';
if (isset($_GET['page'])) {
    if ($_GET['page'] == '') {
        $pg = $_GET['page'];
    } else {
        $pg = $_GET['page'];
    }//end else
}//end if
?>
<!-- Start of the HTML document -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>HawkOverflow - UNCW Code Forum</title>
    <!-- CSS files -->
    <link href="assets/css/bootstrap.css" rel="stylesheet">
    <link href="assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="assets/css/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="assets/css/jquery.typeahead.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/jquery.upvote.css">
    <link href="http://netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">
    <!-- Custom styles-->
    <link href="assets/css/main.css" rel="stylesheet">
    <!-- Jquery file -->
    <script type="text/javascript" src="assets/js/jquery-2.1.1.min.js"></script>

    <script type="text/javascript" src="assets/js/event.js"></script>
    <script type="text/javascript" src="assets/js/jquery.upvote.js"></script>
</head>
<body data-spy="scroll" data-offset="0" data-target="#theMenu">
<!-- Search bar -->
<section id="about" name="about"></section>
<div id="f">
    <div class="container">
        <div class="col-lg-10 pull-left">
            <form class="navbar-form" align="center" role="search" action="index.php?page=search_results" method="post">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search" name="srch-term" id="srch-term">
                    <div class="input-group-btn">
                        <button class="btn btn-lg" type="submit" style="height: 34px"><i class="glyphicon glyphicon-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <a href="index.php?page=home"><img class="img-responsive" src="assets/img/LOgo.png"></a>
        <?php include('content/' . $pg . '.php'); ?>
    </div>
    <!-- /f -->
    <!-- Main navigation -->
    <?php
    include('template/nav_main.php');
    ?>
    <!-- Required Javascript files -->
    <script src="assets/js/classie.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/smoothscroll.js"></script>
    <script src="assets/js/main.js"></script>
    <script type="text/javascript" src="assets/js/jquery.bootpag.min.js"></script>
    <script type="text/javascript" src="assets/js/loadmore.js"></script>
    <script type="text/javascript" src="assets/js/bootstrap3-typeahead.js"></script>

    <?php include('template/footer.php'); ?>
    <!-- /container -->
</div>
</body>
</html>
