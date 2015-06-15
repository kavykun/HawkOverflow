<?php
#Author: Kavy Rattana
include('template/header.php');

if ($_POST['mess']) {

    $title = $_POST['mess'];
    $q = "SELECT question_id,question_title, question_description, asked, views, up_vote, down_vote, time_created, time_edited, (up_vote - down_vote) as total_vote, answered FROM `question` WHERE question_title = '" . $title . "'";
    $query = mysqli_query($bd, $q);
    $data = mysqli_fetch_assoc($query);
    $question_id = $data['question_id'];
    $title = $data['question_title'];
    $description = $data['question_description'];
    $asked = $data['asked'];
    $views = $data['views'];
    $up_vote = $data['up_vote'];
    $total_vote = $data['total_vote'];
    $created = $data['time_created'];
    $edited = $data['time_edited'];

    if (!isset($_SESSION['questionid'])) {
        $_SESSION['questionid'] = $question_id;
    }
    if (!isset($_SESSION['questiontitle'])) {
        $_SESSION['questiontitle'] = $title;
    }
    if (!isset($_SESSION['questiondescription'])) {
        $_SESSION['questiondescription'] = $description;
    }
    if (!isset($_SESSION['questionasked'])) {
        $_SESSION['questionasked'] = $asked;
    }
    if (!isset($_SESSION['questionviews'])) {
        $_SESSION['questionviews'] = $views;
    }
    if (!isset($_SESSION['questionupvote'])) {
        $_SESSION['questionupvote'] = $up_vote;
    }
    if (!isset($_SESSION['questiontotalvote'])) {
        $_SESSION['questiontotalvote'] = $total_vote;
    }
    if (!isset($_SESSION['questioncreated'])) {
        $_SESSION['questioncreated'] = $created;
    }
    if (!isset($_SESSION['questionedited'])) {
        $_SESSION['questionedited'] = $edited;
    }

}
if (isset($_POST['submit'])) {
    $dt = new DateTime();
    $answer = $_POST['text_area'];
    $current_time = $dt->format('Y-m-d H:i:s');
    $q = "INSERT INTO answer (`answer`,`up_vote`,`down_vote`,`created`) VALUES ('$answer',0,0,$current_time)";
    mysqli_query($bd, $q);
    $q = "SELECT answer_id FROM answer WHERE answer = '$answer'";
    $query = mysqli_query($bd, $q);
    $data = mysqli_fetch_assoc($query);
    $a_id = $data['answer_id'];
    $q = "SELECT user_id FROM user WHERE username ='" . $_SESSION['username'] . "'";
    $query = mysqli_query($bd, $q);
    $data = mysqli_fetch_assoc($query);
    $u_id = $data['user_id'];
    $q = "INSERT INTO user_answer (`user_id`,`answer_id`) VALUES ($u_id,$a_id)";
    $query = mysqli_query($bd, $q);
    $qq_id = $_SESSION['questionid'];
    $q = "INSERT INTO question_answer (`question_id`,`answer_id`) VALUES ($qq_id,$a_id)";
    $query = mysqli_query($bd, $q);
}
?>
<div class="q_title">
    <h3><?php echo $title ?></h3>
</div>
<div class="q_description movedown">
    <div class="container">
        <div class="row">
            <div id="topic-123" class="upvote movedown" style="float:left; width: 75px;">
                <div data-id="<?php echo $_SESSION['questionid']; ?>"></div>
                <a class="upvote" title="This idea is helpful"></a>
                <span class="count"><?php echo $_SESSION['questiontotalvote']; ?></span>
                <a class="downvote" title="This isn't so helpful"></a>
                <a class="star starred"></a>
            </div>
            <div id="message"></div>
            <div class="movedown"><p><?php echo $_SESSION['questiondescription']; ?></p></div>
            <script>
                $('#topic-123').upvote();
                $('#topic-123').upvote({
                    id: <?php echo  $_SESSION['questionid']; ?>,
                    count: <?php echo $_SESSION['questiontotalvote']; ?>,
                    upvoted: <?php echo $_SESSION['questionupvote']; ?>,
                    starred: 1
                });
            </script>

            <?php
            $qr = "SELECT username, img, time_created FROM user NATURAL JOIN user_question NATURAL JOIN question WHERE question_id =" . $_SESSION['questionid'];
            $query = mysqli_query($bd, $qr);
            $data = mysqli_fetch_assoc($query);
            $usernameicon = $data['username'];
            $img = $data['img'];
            $timecreated = $data['time_created'];
            ?>
        </div>

        <div class="moveright movedown" style="margin-left: 100px">
            <img style="height:50px; width:40px float: left; " alt="User Pic"
                 src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/uploads/<?php if (isset($img)) {
                     echo $img;
                 } else {
                     echo 'profile-img.jpg';
                 } ?>"
                 class="img-rounded"></div>
        <div class="userdescription"><?php echo $usernameicon ?></div>
        <div class="usertimecreated"><?php echo $timecreated ?></div>
    </div>
</div>
</div>

<div class="q_tag movedown">
    <link rel="stylesheet" href="../assets/css/github.css">
    <link rel="stylesheet" href="../assets/css/app.css">
    <div class="container">
        <div class="example example_multivalue">
            <div class="bs-example">
                <select multiple data-role="tagsinput">
                </select>
            </div>
        </div>
    </div>

    <script src="../assets/js/angular.min.js"></script>
    <script src="../assets/js/bootstrap-tagsinput.js"></script>
    <script src="../assets/js/bootstrap-tagsinput-angular.js"></script>
    <script src="../assets/js/html.js"></script>
    <script src="../assets/js/rainbow.min.js"></script>
    <script src="../assets/js/javascript.js"></script>
    <script src="../assets/js/app.js"></script>
</div>

<!-- displays all answers -->
<div class="q_answers">
    <div class="container">
        <h3><?php echo $answered; ?> Answers</h3>
        <div id="message"></div>

        <!-- fetch the answers -->
        <?php
        $q = "SELECT * FROM question NATURAL JOIN question_answer NATURAL JOIN answer WHERE question_id = " . $_SESSION['questionid'] . "";
        $query = mysqli_query($bd, $q);
        while ($data = mysqli_fetch_assoc($query)) {
            $a_id = $data['answer_id'];
            $answer = $data['answer'];
            ?>
            <div class="movedown"><p><?php echo $answer; ?></p></div>

            <div class="moveright movedown" style="margin-left: 100px">
                <img style="height:50px; width:40px float: left; " alt="User Pic"
                     src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/uploads/<?php if (isset($img)) {
                         echo $img;
                     } else {
                         echo 'profile-img.jpg';
                     } ?>"
                     class="img-rounded"></div>
            <div class="userdescription"><?php echo $usernameicon ?></div>
            <div class="usertimecreated"><?php echo $timecreated ?></div>

        <?php } ?>



    </div>
</div>

<div class="q_comment movedown">

    <link type="text/css" rel="stylesheet" href="assets/css/style.css">
    <link type="text/css" rel="stylesheet" href="assets/css/example.css">

    <?php
    // Connect to the database
    include('config.php');
    $id_post = $_SESSION['questionid']; //the post or the page id
    ?>
    <div class="cmt-container container">
        <?php
        $sql = mysqli_query($bd, "SELECT * FROM comments WHERE id_post = '$id_post'") or die(mysql_error());;
        while ($affcom = mysqli_fetch_assoc($sql)) {
            $name = $affcom['name'];
            $email = $affcom['email'];
            $comment = $affcom['comment'];
            $date = $affcom['date'];

            ?>
            <div class="cmt-cnt">
                <div class="thecom">
                    <h5><?php echo $name; ?></h5><span data-utime="1371248446"
                                                       class="com-dt"><?php echo $date; ?></span>
                    <br/>

                    <div class="commentsec">
                        <?php echo $comment; ?>
                    </div>
                </div>
            </div>
            <!-- end "cmt-cnt" -->
        <?php } ?>

        <div class="new-com-bt">
            <span>Write a comment ...</span>
        </div>
        <div class="new-com-cnt">
            <input type="hidden" id="name-com" name="name-com" value="<?php echo $_SESSION['username'] ?>"
                   placeholder="<?php echo $_SESSION['username'] ?>"/>
            <textarea class="the-new-com"></textarea>

            <div class="bt-add-com">Post comment</div>
            <div class="bt-cancel-com">Cancel</div>
        </div>
        <div class="clear"></div>
    </div>
    <!-- end of comments container "cmt-container" -->

    <script type="text/javascript">
        $(function () {
            //alert(event.timeStamp);
            $('.new-com-bt').click(function (event) {
                $(this).hide();
                $('.new-com-cnt').show();
                $('#name-com').focus();
            });

            /* when start writing the comment activate the "add" button */
            $('.the-new-com').bind('input propertychange', function () {
                $(".bt-add-com").css({opacity: 0.6});
                var checklength = $(this).val().length;
                if (checklength) {
                    $(".bt-add-com").css({opacity: 1});
                }
            });

            /* on clic  on the cancel button */
            $('.bt-cancel-com').click(function () {
                $('.the-new-com').val('');
                $('.new-com-cnt').fadeOut('fast', function () {
                    $('.new-com-bt').fadeIn('fast');
                });
            });

            // on post comment click
            $('.bt-add-com').click(function () {
                var theCom = $('.the-new-com');
                var theName = $('#name-com');
                var theMail = $('#mail-com');

                if (!theCom.val()) {
                    alert('You need to write a comment!');
                } else {
                    $.ajax({
                        type: "POST",
                        url: "content/add-comment.php",
                        data: 'act=add-com&id_post='+<?php echo $id_post; ?>+
                        '&name='+theName.val() + '&email=' + theMail.val() + '&comment=' + theCom.val(),
                        success: function (html) {
                            theCom.val('');
                            theMail.val('');
                            theName.val('');
                            $('.new-com-cnt').hide('fast', function () {
                                $('.new-com-bt').show('fast');
                                $('.new-com-bt').before(html);
                            })
                        }
                    });
                }
            });

        });
    </script>
    <div class="q_answer movedown">
    </div>
    <div class="q_answer movedown">
        <div class="container">
            <link type="text/css" rel="stylesheet" href="../assets/css/jquery-te-1.4.0.css">
            <script type="text/javascript" src="../assets/js/jquery-te-1.4.0.min.js" charset="utf-8"></script>
            <div class="container">
                <form action="index.php?page=userquestion" method="post">
                    <div class="form-group">
                            <label for="comment">Write a Answer:</label>
                        <textarea name="text_area" type="textarea" id="text_area" class="jqte-test form-control"><b>Type
                                Here..</b></textarea>
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
        </div>
    </div>