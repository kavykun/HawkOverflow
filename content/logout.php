
<?php
session_start();
/**
 * Created by PhpStorm.
 * User: kylewillcox21
 * Date: 12/5/14
 * Time: 1:36 PM
 */
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

    <!-- Bootstrap core CSS -->
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-theme.css" rel="stylesheet">
    <link href="../assets/css/bootstrap-tagsinput.css" rel="stylesheet">
    <link href="../assets/css/jquery.typeahead.css" rel="stylesheet">

    <!-- Custom styles-->
    <link href="../assets/css/main.css" rel="stylesheet">

    <!-- Jquery file -->
    <script type="text/javascript" src="../assets/js/jquery-2.1.1.min.js"></script>

</head>

<body>

</body>
</html>

<?php # Script 12.6 - logout.php
require ('login_functions.php');

// If no cookie is present, redirect the user:
if (!isset($_SESSION['username'])) {
    redirect_user();
} else { // Delete the cookies:
    //Cancel the session:
    $_SESSION = array(); // Clear the variables.
    session_destroy(); // Destroy the session itself.
    setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0); // Destroy the cookie.
    redirect_user();
}
?>

