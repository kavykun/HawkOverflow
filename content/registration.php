<?php
/**
 * Created by PhpStorm.
 * User: kylewillcox21
 * Date: 11/30/14
 * Time: 9:48 PM
 */

include('login_functions.php');

$page_title = 'registration';

// Check for form submission:
if (isset($_POST['submit'])) {
    $errors = array();
    // Initialize an error array.
    //Text fields will be trimmed using trim() - meaning that extraneous spaces are deleted.

    // Check for a first name:
    if (empty($_POST['usr_name'])) {
        $errors[] = 'You forgot to enter your username.';
        $usrn="";
    } else {
        $usrn= trim($_POST['usr_name']);
    }

    // Check for a last name:
    if (empty($_POST['password'])) {
        $errors[] = 'You forgot to enter your password.';
        $pw="";
    } else {
        $pw = trim($_POST['password']);
    }

    // Check for an email address:
    if (empty($_POST['password2'])) {
        $errors[] = 'You forgot to enter the password check.';
        $pw2="";
    } else {
        $pw2 = trim($_POST['password2']);
    }

    // Check for a board
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email.';
        $em="";
    } else {
        $em = trim($_POST['email']);
    }

    // Check for a stancce:
    if (empty($_POST['major'])) {
        $errors[] = 'You forgot to enter your street.';
        $mjr="";
    } else {
        $mjr = trim($_POST['major']);
    }

    //Check for password
    if( $pw != $pw2) {
        $errors[] = 'Your passwords did not match';
    }

    if (empty($errors)) { // If everything's OK.

        // Register the user in the database...

        // Connect to the db.

        // Make the query:
        $q ="INSERT INTO user (username, pass, email,major,date_joined) VALUES ('$usrn',SHA1('$pw'),'$em','$mjr',CURRENT_DATE)";

        $r = @mysqli_query ($bd, $q); // Run the query.
        //echo '<div class="alert alert-success" role="alert"><h6>Thank you!</h6><p>It got here</p></div>';

        if ($r) { // If it ran OK.

            // Print a message:
            echo '<div class="alert alert-success" role="alert"><h6>Thank you!</h6><p>You are now registered.</p></div>';
            redirect_user();

            header( "refresh:3;url=index.php?page=sign_in" );

        } else { // If it did not run OK.

            // Public message:
            echo '<div class="alert alert-danger" role="alert"><h6>We are sorry</h6><p>There was an error with your registration.</p></div>';

            // Debugging message:
            echo '<p>' . mysqli_error($bd) . '<br><br>Query: ' . $q . '</p>';

        } // End of if ($r) IF.

        mysqli_close($bd); // Close the database connection.

        // Include the footer and quit the script:

        exit();

    } else { // Report the errors.

        echo '<div class="alert alert-danger" role="alert">Error!
		The following error(s) occurred:<br>';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br>";
        }
        echo '</div>';
        
        echo '<div class="alert alert-danger" role="alert">There seems to be an error with your registration</div>';

    } // End of if (empty($errors)) IF.

} // End of the main Submit conditional.

?>


<div class="panel panel-primary">
    <div class="panel-heading">

        <h4 class="panel-title">Register for HawkOverflow</h4>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-6">
                <div class="well">
                    <h3 style="color: #696969">Registration</h3>
                    <hr>

                    <form action="index.php?page=registration" method="post">

                    <div class="form-group col-lg-12">
                        <label>Username
                        <input type="text" name="usr_name" class="form-control" id=""
                               value="<?php if (isset($_POST['usr_name'])) echo $_POST['usr_name']; ?>"></label>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Password
                            <input type="password" name="password" class="form-control" id=""
                                   value="<?php if (isset($_POST['password'])) echo $_POST['password']; ?>"></label>

                    </div>

                    <div class="form-group col-lg-6">
                        <label>Repeat Password
                            <input type="password" name="password2" class="form-control" id=""
                                   value="<?php if (isset($_POST['password2'])) echo $_POST['password2']; ?>"></label>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Email Address
                            <input type="text" name="email" class="form-control" id=""
                                   value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>"></label>
                    </div>

                    <div class="form-group col-lg-6">
                        <label>Major
                            <input type="text" name="major" class="form-control" id=""
                                   value="<?php if (isset($_POST['major'])) echo $_POST['major']; ?>"></label>
                    </div>

                        <div class="form-group col-lg-6">
                            <label>Professor Status
                                <input type="radio" name="proff" class="form-control" id=""
                                       value="">
                            </label>
                        </div>

                        <div class="form-group col-lg-6">

                            <input type="submit" name="submit" value="Register" class="btn btn-info btn-block">

                        </div>

                    </form>


                </div>
            </div>
            <div class="col-xs-6">
            <h3 class="dark-grey" style="padding-top:20px">Terms and Conditions</h3>
                <hr>
            <p>
                By clicking on "Register" you agree to Hawk Overflow's Terms and Conditions
            </p>
            <p>
              There will be no posting of graded content or source code on HawkOverflow.
            </p>
                <br>
                <p>
                    Users will be banned for posting any spam or un-authorized content.
                </p>
                <br>
                <p>
                    Registration for UNCW students only.
                </p>
                <br>







        </div>
    </div>
</div>
    <div class="panel-footer" style="height:50px ; background-color: #808080">
    </div>


</div>

