<?php
include('login_functions.php');
// Check for form submission:
if (!empty($_POST['submit'])) {
    $errors = array();
    $usrnam = $_POST['usrnam'];
    $major = $_POST['major'];
    $concen = $_POST['concen'];
    $jd = $_POST['jd'];
    $dateOB = $_POST['dateOB'];
    $gender = $_POST['gender'];
    $bl = $_POST['bl'];
    $bio = $_POST['bio'];
    $email = $_POST['email'];
    if (empty($errors)) { // If everything is OK.
        // Make the query:
        $qu = "UPDATE user SET username='$usrnam', major='$major', concentration='$concen',
        date_joined='$jd', dob='$dateOB', gender='$gender', best_languages='$bl', bio='$bio',
        email='$email' WHERE username=\"" . $_SESSION['username'] . "\";";
        $r = @mysqli_query($bd, $qu); // Run the query.
        if ($r) { // If it ran OK.
            // Print a message:
            echo '<div class="alert alert-success" role="alert"><p class="error">Authorized</p></div>';
            redirect_user('index.php?page=profile');
        } else { // If it did not run OK.
            // Public message:
            echo '<div class="alert alert-danger" role="alert"><p class="error">Could not execute query</p></div>';
            echo '<div class="alert alert-danger" role="alert"><p>' . mysqli_error($bd) . '<br><br>Query: ' . $qu . '</p></div>';
        } // End of if ($r) IF.
        //mysqli_close($dbc); // Close the database connection.
        // Include the footer and quit the script:
        //exit();
    } else { // Report the errors.
        echo '<div class="alert alert-danger" role="alert"><p class="error">Could not execute query</p></div>';
        echo '<div class="alert alert-danger" role="alert"><p class="error">';
        foreach ($errors as $msg) { // Print each error.
            echo "- $msg<br>";
        }
        echo '</p></div>';
    } // End of if (empty($errors)) IF.
} // End of the main Submit conditional.
// Check if the form has been submitted:
if (!empty($_POST['imagesubmit'])) {
    // Check for an uploaded file:
    if (isset($_FILES['upload'])) {
        // Validate the type. Should be JPEG or PNG.
        $allowed = array('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
        if (in_array($_FILES['upload']['type'], $allowed)) {
            // Move the file over.
            if (move_uploaded_file($_FILES['upload']['tmp_name'], "assets/uploads/{$_FILES['upload']['name']}")) {
                echo '<p><em>The file ' . $_FILES['upload']['name'] . ' has been uploaded!</em></p>';

                $imageName = $_FILES['upload']['name'];
                $image = "assets/uploads/{$_FILES['upload']['name']}";

                $withoutExt = preg_replace("/\\.[^.\\s]{3,4}$/", "", $imageName);

                $qimg = "UPDATE user SET img='$imageName' WHERE username=\"" . $_SESSION['username'] . "\";";
                $res = @mysqli_query($bd, $qimg); // Run the query.
                if ($res) { // If it ran OK.
                    // Print a message:
                    echo '<div class="alert alert-success" role="alert"><p class="error">Image Named Added to DB</p></div>';

                } else { // If it did not run OK.
                    // Public message:
                    echo '<div class="alert alert-danger" role="alert"><p class="error">Could not execute query</p></div>';
                    echo '<div class="alert alert-danger" role="alert"><p>' . mysqli_error($bd) . '<br><br>Query: ' . $qimg . '</p></div>';
                } // End of if ($r) IF.


            }
        } else { // Invalid type.
            echo '<p class="error">Please upload a JPEG or PNG image.</p>';
        }
    } // End of isset($_FILES['upload']) IF.
    // Check for an error:
    if ($_FILES['upload']['error'] > 0) {
        echo '<p class="error">The file could not be uploaded because: <strong>';
        // Print a message based upon the error.
        switch ($_FILES['upload']['error']) {
            case 1:
                print 'The file exceeds the upload_max_filesize setting in php.ini.';
                break;
            case 2:
                print 'The file exceeds the MAX_FILE_SIZE setting in the HTML form.';
                break;
            case 3:
                print 'The file was only partially uploaded.';
                break;
            case 4:
                print 'No file was uploaded.';
                break;
            case 6:
                print 'No temporary folder was available.';
                break;
            case 7:
                print 'Unable to write to the disk.';
                break;
            case 8:
                print 'File upload stopped.';
                break;
            default:
                print 'A system error occurred.';
                break;
        } // End of switch.
        print '</strong></p>';
    } // End of error IF.
    // Delete the file if it still exists:
    if (file_exists($_FILES['upload']['tmp_name']) && is_file($_FILES['upload']['tmp_name'])) {
        unlink($_FILES['upload']['tmp_name']);
    }
} // End of the submitted conditional.
?>
<?php
//echo '<p>THIS getting here</p>';
if (isset($_SESSION['username'])) {
    //echo '<p>THIS getting farther</p>';
    $q = "select * FROM user WHERE username=\"" . $_SESSION['username'] . "\";";
    $r = @mysqli_query($bd, $q);
    //echo ''.$q.'';
    if ($r) {
        while ($row = mysqli_fetch_array($r)) {
            $usrnam = $row['username'];
            $major = $row['major'];
            $concen = $row['concentration'];
            $jd = $row['date_joined'];
            $dateOB = $row['dob'];
            $gender = $row['gender'];
            $bl = $row['best_languages'];
            $bio = $row['bio'];
            $email = $row['email'];
        }
    } else {
        echo '<div class="alert alert-danger" role="alert">Could not execute query</div>';
        echo '<div class="alert alert-danger" role="alert"><p>' . mysqli_error($bd) . '<br><br>Query: ' . $q . '</p></div>';
    }
}//end main if
else {
    echo '<div class="alert alert-danger" role="alert">You are not logged in anymore</div>';
    redirect_user('index.php?page=sign_in');
}
?>
<div class="row" style="font-family: sans-serif;">
    <div class="panel panel-primary" style="background-color: #696969">
        <form enctype="multipart/form-data" action="index.php?page=profileEditor" method="post">
            <input type="hidden" name="MAX_FILE_SIZE" value="2097152">
            <fieldset>
                <legend>Select a JPEG or PNG image of 2M or smaller to be uploaded:</legend>
                <p><b>File:</b> <input type="file" name="upload" id="file"></p>
            </fieldset>
            <div align="center"><input type="submit" name="imagesubmit" value="Submit"></div>
        </form>
        <form action="index.php?page=profileEditor" method="post">
            <div class="panel-heading">
                <input type="text" name="usrnam" size="20" maxlength="25" value="<?php if (isset($_POST['usrnam'])) ;
                echo $usrnam; ?>">
            </div>
            <div class="">
                <div class="row">
                   
                    <div class=" col-md-12 col-lg-12 " style="color:#b3b3b4; text-align: center">
                        <table class="table table-user-information">
                            <tbody>
                            <tr>
                                <td><p>Major:</p></td>
                                <td><input type="text" name="major" size="20" maxlength="25"
                                           value="<?php if (isset($_POST['major'])) ;
                                           echo $major; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Concentration:</p></td>
                                <td><input type="text" name="concen" size="20" maxlength="25"
                                           value="<?php if (isset($_POST['concen'])) ;
                                           echo $concen; ?>"></td>

                            </tr>
                            <tr>
                                <td><p>Date Joined:</p></td>
                                <td><input type="text" name="jd" size="20" maxlength="25"
                                           value="<?php if (isset($_POST['jd'])) ;
                                           echo $jd; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Date of Birth</p></td>
                                <td><input type="text" name="dateOB" size="20" maxlength="25"
                                           value="<?php if (isset($_POST['dateOB'])) echo "$dateOB"; ?>"></td>
                            </tr>

                            <tr>
                                <td><p>Best Languages</p></td>
                                <td><input type="text" name="bl" size="20" maxlength="25"
                                           value="<?php if (isset($_POST['bl'])) ;
                                           echo $bl; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Gender</p></td>
                                <td><input type="text" name="gender" size="10" maxlength="15"
                                           value="<?php if (isset($_POST['gender'])) ;
                                           echo $gender; ?>"></td>
                            </tr>
                            <tr>
                                <td><p>Email</p></td>
                                <td><input type="text" name="email" size="20" maxlength="25"
                                           value="<?php if (isset($_POST['email'])) ;
                                           echo $email; ?>"></td>
                            </tr>
                            <tr>
                            </tr>
                            <td width=50%><p>About me</p></td>
                            <td width=50%><textarea style="margin:0px 10px 0px 50px; width:400px" rows="5"
                                                    cols="100" name="bio" maxlength="5000"
                                                    value="biotext"><?php if (isset($_POST['bio'])) ;
                                    echo $bio; ?></textarea>
                            </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="panel-footer" style="height:50px ; background-color: #808080">
                        <span class="pull-right ">
                            <p><input type="submit" name="submit" value="edit" class="btn btn-primary"></p>
                        </span>

            </div>
        </form>
    </div>
</div>

