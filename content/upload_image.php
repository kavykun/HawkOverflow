<?php
/**
 * Created by PhpStorm.
 * User: kylewillcox21
 * Date: 12/8/14
 * Time: 11:19 AM
 */

// Check if the form has been submitted:
if (isset($_POST['img'])) {

    //echo 'WORKKK';
    echo $_FILES['upload'].'<---the file';
    // Check for an uploaded file:
    if (isset($_FILES['upload'])) {

        //echo 'WORKKKingg';
        // Validate the type. Should be JPEG or PNG.
        $allowed = array ('image/pjpeg', 'image/jpeg', 'image/JPG', 'image/X-PNG', 'image/PNG', 'image/png', 'image/x-png');
        if (in_array($_FILES['upload']['type'], $allowed)) {
            //echo 'WORKKKinngg moar';
            // Move the file over.
            if (move_uploaded_file ($_FILES['upload']['tmp_name'], "../assets/img/{$_FILES['upload']['name']}")) {
                echo '<p><em>The file '.$_FILES['upload']['name'].' has been uploaded!</em></p>';

                $imageName = $_FILES['upload']['name'];
                $image = "../assets/img/{$_FILES['upload']['name']}";

                $withoutExt = preg_replace("/\\.[^.\\s]{3,4}$/", "", $imageName);


                $fp = fopen($image, 'r');
                $data = fread($fp, filesize($image));
                $data = addslashes($data);
                fclose($fp);




            } // End of move... IF.

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



} // End of the submitted conditional.
?>

<form enctype="multipart/form-data" action="index.php?page=upload_image" method="post">

    <input type="hidden" name="MAX_FILE_SIZE" value="2097152">

    <fieldset><legend>Select a JPEG or PNG image of 2M or smaller to be uploaded:</legend>

        <p><b>File:</b> <input type="file" name="upload" id="file"></p>

    </fieldset>
    <div align="center"><input type="submit" name="img" value="Upload Aavatar"></div>

</form>