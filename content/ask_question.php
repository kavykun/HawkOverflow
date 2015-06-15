<?php
#Author: Kavy Rattana
require('login_functions.php');
$_SESSION['ask_question_page'] = true;
if (!isset($_SESSION['username'])) {
    redirect_user('index.php?page=sign_in');
}
if (isset($_POST['submit'])) {
    $dt = new DateTime();
    $title = $_POST['question_title'];
    $textarea = $_POST['text_area'];
    $current_time = $dt->format('Y-m-d H:i:s');
    $q = "INSERT INTO question (`question_title`,`question_description`,`asked`,`views`,`up_vote`,`down_vote`,`time_created`,`time_edited`) VALUES ('$title','$textarea',0,0,0,0,'$current_time','$current_time')";
    mysqli_query($bd, $q);
    $q = "SELECT question_id FROM question WHERE question_title = '$title'";
    $query = mysqli_query($bd, $q);
    $data = mysqli_fetch_assoc($query);
    $q_id = $data['question_id'];
    $q = "SELECT user_id FROM user WHERE username ='" . $_SESSION['username'] . "'";
    $query = mysqli_query($bd, $q);
    $data = mysqli_fetch_assoc($query);
    $u_id = $data['user_id'];
    $q = "INSERT INTO user_question (`user_id`,`question_id`) VALUES ($u_id,$q_id)";
    $query = mysqli_query($bd, $q);
    mysqli_close($bd);

    redirect_user('index.php?page=home');

}
?>
<link type="text/css" rel="stylesheet" href="../assets/css/jquery-te-1.4.0.css">
<script type="text/javascript" src="../assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
<div class="container">
    <form action="index.php?page=ask_question" method="post">
        <div class="form-group">
            <label for="question_title">Question Title:</label>
            <input name="question_title" type="text" class="form-control" id="q_title">
        </div>
         
        <div class="form-group">
                <label for="comment">Question Description:</label>
            <textarea name="text_area" type="textarea" id="text_area" class="jqte-test form-control"><b>Type Here..</b></textarea>
        </div>
        <input type="submit" name="submit" value="Submit" class="btn btn-info btn-block">
    </form>
</div>
<script>
    $('.jqte-test').jqte();
    // settings of status
    var jqteStatus = true;
    $(".status").click(function () {
        jqteStatus = jqteStatus ? false : true;
        $('.jqte-test').jqte({"status": jqteStatus})
    });
</script>