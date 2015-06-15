<?php
/**
 * Created by PhpStorm.
 * User: kylewillcox21
 * Date: 12/8/14
 * Time: 8:41 PM
**/

include('config.php');
include('template/header.php');

echo '<div class="alert alert-success" role="alert">'.$_POST['srch-term'].'</div>';

?>


<div class="row">
    <!-- Results column -->
    <div class="col-lg-10">
        <div id="container">

            <ul class="news_list">
                <?php
                $att= "SELECT question_id,question_title, question_description, asked, views, up_vote, down_vote, time_created, time_edited, (up_vote - down_vote) as total_vote FROM `question` WHERE question_title LIKE \"%".$_POST['srch-term']."%\"";
                $query2 = mysqli_query($bd,$att);
                while ($data = mysqli_fetch_assoc($query2)) {
                    $title = $data['question_title'];
                    ?>
                    <form action="index.php?page=userquestion" method="post">
                        <a href="javascript:;" onclick="parentNode.submit();">
                            <h3><?php echo $title ?></h3></a>
                        <input type="hidden" name="mess" value= "<?php echo $title ?>" />
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
                                <?php echo $data['total_vote'] ?>
                            </div>
                            <p>answers</p>
                        </div>
                        <div class="col-sm-4">
                            <div class="viewscount">
                                <?php echo $data['views'] ?>
                            </div>
                            <p>views</p>
                        </div>
                    </div>
                <?php
                }//end query2

                //echo $att;
                ?>
                <li class="loadbutton">
                    <button class="loadmore" data-page="2">More</button>
                </li>
            </ul>
        </div>
        <!--end container-->
    </div>
    <div class="col-md-4">

    </div>
</div>