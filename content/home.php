<?php
#Author: Kavy Rattana
include('config.php');
include('template/header.php');

unset($_SESSION['questionid']);
unset($_SESSION['questiontitle']);
unset($_SESSION['questiondescription']);
unset($_SESSION['questionasked']);
unset($_SESSION['questionviews']);
unset($_SESSION['questionupvote']);
unset($_SESSION['questiontotalvote']);
unset($_SESSION['questioncreated']);
unset($_SESSION['questionedited']);


?>

<div class="row">
    <!-- Results column -->
    <div class="col-lg-10">
        <div id="container">
            <ul class="news_list">
                <?php
                $query2 = mysqli_query($bd, "SELECT question_id,question_title, question_description, asked, views, up_vote, down_vote, time_created, time_edited, (up_vote - down_vote) as total_vote, (up_vote + down_vote) as total_views FROM `question` ORDER BY views DESC");
                while ($data = mysqli_fetch_assoc($query2)) {
                    $title = $data['question_title'];
                    ?>
                    <form action="index.php?page=userquestion" method="post">
                        <a href="javascript:;" onclick="parentNode.submit();">
                            <h3><?php echo $title ?></h3></a>
                        <input type="hidden" name="mess" value="<?php echo $title ?>"/>
                    </form>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="votenumber">
                                <?php echo $data['total_vote'] ?>
                            </div>
                            <p>votes</p>
                        </div>
                        <div class="col-sm-4">
                            <div class="answercount">
                                <?php echo $data['up_vote'] ?>
                            </div>
                            <p>answers</p>
                        </div>
                        <div class="col-sm-4">
                            <div class="viewscount">
                                <?php echo $data['total_views'] ?>
                            </div>
                            <p>views</p>
                        </div>
                    </div>
                <?php
                }//end query2
                ?>
                <li class="loadbutton">
                    <button class="loadmore" data-page="2">More</button>
                </li>
            </ul>
        </div>
        <!--end container-->
    </div>
</div>