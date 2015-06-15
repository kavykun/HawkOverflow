
<?php

//echo '<p>THIS getting here</p>';

if(isset($_SESSION['username'])){

    //echo '<p>THIS getting farther</p>';

    $q = "select * FROM user WHERE username=\"".$_SESSION['username']."\";";
    $r = @mysqli_query ($bd, $q);

    //echo ''.$q.'';
    if ($r) {

        while($row = mysqli_fetch_array($r)){

            $usrnam =$row['username'];
            $major =$row['major'];
            $concen=$row['concentration'];
            $jd=$row['date_joined'];
            $dateOB=$row['dob'];
            $gender=$row['gender'];
            $bl=$row['best_languages'];
            $bio=$row['bio'];
            $email=$row['email'];
            $img=$row['img'];

        }


        //mysqli_close($bd);

    }
    else {

        echo '<div class="alert alert-danger" role="alert"><p class="error">Could not execute query</p></div>';

        echo '<div class="alert alert-danger" role="alert"><p>' . mysqli_error($bd) . '<br><br>Query: ' . $q . '</p></div>';
    }

}//end main if



else{

    echo '<div class="alert alert-danger" role="alert"><p>You are not logged in anymore</p>></div>';
    redirect_user('index.php?page=sign_in');

}

?>
<br>
<?php
    include("template/header.php");
?>
<br>

<div class="row" style="font-family: sans-serif; ">

    <div class="panel panel-primary" style="background-color: #696969">
        <div class="panel-heading">

            <h3 class="panel-title"><?php echo "$usrnam"?></h3>

        </div>
        <div class="">


            <div class="row">

                <div class=" col-md-12 col-lg-12 " style="color:#b3b3b4; text-align: center">
                    <table class="table table-user-information">
                        <tbody>
                        <tr style="margin-bottom: 20px">
                            <img style="height:300px; width:240px" alt="User Pic"
                                 src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/uploads/<?php echo "$img"?>"
                                 class="img-rounded">
                        </tr>
                        <tr>
                            <td><p>Major:</p></td>

                            <td><?php echo "<p>$major</p>"?></td>
                        </tr>
                        <tr>
                            <td><p>Concentration:</p></td>
                            <td><?php echo "<p>$concen</p>"?></td>

                        </tr>
                        <tr>
                            <td><p>Date Joined:</p></td>
                            <td><?php echo "<p>$jd</p>"?></td>
                        </tr>
                        <tr>
                            <td><p>Date of Birth</p></td>
                            <td><?php echo "<p>$dateOB</p>"?></td>
                        </tr>

                        <tr>
                            <td><p>Best Languages</p></td>
                            <td><?php echo "<p>$bl</p>"?></td>
                        </tr>
                        <tr>
                            <td><p>Gender</p></td>
                            <td><?php echo "<p>$gender</p>"?></td>
                        </tr>
                        <tr>
                            <td><p>Email</p></td>
                            <td><a href="mailto:<?php echo "$email"?>"><?php echo "<p>$email</p>"?></a></td>
                        </tr>
                        <tr>
                            <td width=50%><p>About Me</p></td>
                            <td width=50%><?php echo "<p>$bio</p>"?>
                        </tr>


                        </tbody>
                    </table>


                </div>


            </div>


        </div>
        <div class="panel-footer" style="height:50px ; background-color: #808080">
                        <span class="pull-right ">
                            <a href="index.php?page=profileEditor"  type="button" class="btn btn-sm btn-warning"><i
                                    class="glyphicon glyphicon-edit"></i></a>
                        </span>

        </div>

    </div>


</div>


<div class="row">

    <div class="panel panel-primary" style="background-color: #696969;">
        <div class="panel-heading">
            <h3 class="panel-title">Questions Posed</h3>
        </div>
        <div class="panel-body">
            <?php

            //echo '<p>THIS getting here</p>';

            if(isset($_SESSION['username'])){


                $quu = "SELECT question_title, views, question_description, time_created  FROM question
                        NATURAL JOIN user_question
                        NATURAL JOIN user WHERE username=\"".$_SESSION['username']."\";";
                $r = @mysqli_query($bd, $quu);
                
                if ($r) {

                    while($row = mysqli_fetch_array($r)){

                        $views =$row['views'];
                        $qt=$row['question_title'];
                        $qd=$row['question_description'];
                        $tc=$row['time_created'];

                        echo '<div style="background-image:none; background-color: #007b80; text-align: left" class="well well-sm">
                                <div class="row" style="width: 90%">
                                    <div class="col-md-6" <p style="float: left; color: #b3b3b4"><u>Views:</u> '. $views.'</p></div>
                                    <div class="col-me-6"<p style="float: right; color: #b3b3b4"><u>Date posted:</u> '. $tc.'</p></div>
                                </div>

                                <div class="row" style="width:90%; padding-left:20px">
                                    <p><u>Question Title:</u> ' . $qt. '</p><hr>
                                </div>
                                <div class="row" style="width:90%; padding-left:20px">
                                <p><u>Question Details:</u> '. $qd.'</p>
                                <hr></div>
                            </div>';

                    }

                }
                else {
                    echo '<div class="alert alert-danger" role="alert">Could not execute query</div>';
                    echo '<div class="alert alert-danger" role="alert">' . mysqli_error($bd) . '<br><br>Query: ' . $quu . '</div>';
                }

            }//end main if
            else{

                echo '<div class="alert alert-danger" role="alert">You are not logged in anymore</div>';
                redirect_user('index.php?page=sign_in');
            }

            ?>


        </div>

        <div class="panel-footer" style="height:50px ; background-color: #808080">
                        <span class="pull-right ">
                            <a href="DELETE POST"" data-original-title="Edit this user"
                               data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i
                                    class="glyphicon glyphicon-trash"></i></a>
                        </span>

        </div>

    </div>

</div>


<div class="row">

    <div class="panel panel-primary" style="background-color: #696969;">
        <div class="panel-heading">
            <h3 class="panel-title">Questions Answered</h3>
        </div>
        <div class="panel-body">
            <?php

            //echo '<p>THIS getting here</p>';

            if(isset($_SESSION['username'])){


                $qask = "SELECT answer, up_vote, created FROM answer
                        NATURAL JOIN user_answer
                        NATURAL JOIN user WHERE username=\"".$_SESSION['username']."\";";
                $r = @mysqli_query($bd, $qask);

                if ($r) {

                    while($row = mysqli_fetch_array($r)){

                        $ans =$row['answer'];
                        $uv=$row['up_vote'];
                        $tm=$row['created'];

                        echo '<div style="background-image:none; background-color: #007b80; text-align: left" class="well well-sm">
                                <div class="row" style="width: 90%">
                                    <div class="col-md-6" <p style="float: left; color: #b3b3b4"><u>Up Votes:</u> '. $uv.'</p></div>
                                    <div class="col-me-6"<p style="float: right; color: #b3b3b4"><u>Date posted:</u> '. $tm.'</p></div>
                                </div>

                                <div class="row" style="width:90%; padding-left:20px">
                                    <p><u>Question Title:</u> ' . $ans. '</p><hr>
                                </div>

                            </div>';

                    }


                    mysqli_close($bd);

                }
                else {
                    echo '<div class="alert alert-danger" role="alert">Could not execute query</div>';
                    echo '<div class="alert alert-danger" role="alert">' . mysqli_error($bd) . '<br><br>Query: ' . $qask . '</div>';
                }

            }//end main if
            else{

                echo '<div class="alert alert-danger" role="alert">You are not logged in anymore</div>';
                redirect_user('index.php?page=sign_in');
            }

            ?>

        </div>

        <div class="panel-footer" style="height:50px ; background-color: #808080">
                        <span class="pull-right ">
                            <a href="DELETE POST" data-original-title="Edit this user"
                               data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i
                                    class="glyphicon glyphicon-trash"></i></a>
                        </span>

        </div>

    </div>

</div>






