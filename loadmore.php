<?php
require('content/config.php');
if (isset($_POST['page'])):
    $paged = $_POST['page'];
    $sql = "SELECT * FROM `question` ORDER BY `question_id` ASC";
    if ($paged > 0) {
        $page_limit = $resultsPerPage * ($paged - 1);
        $pagination_sql = " LIMIT  $page_limit, $resultsPerPage";
    } else {
        $pagination_sql = " LIMIT 0 , $resultsPerPage";
    }
    $result = mysqli_query($bd, $sql . $pagination_sql);
    if (!empty($result)) {
        $num_rows = mysqli_num_rows($result);
    }
    if ($num_rows > 0) {
        while ($data = mysqli_fetch_assoc($result)) {
            $title = $data['question_title'];
            $content = $data['question_description'];
            echo "     <form action=\"index.php?page=userquestion\" method=\"post\">
                        <a href=\"javascript:;\" onclick=\"parentNode.submit();\">
                            <h3><?php echo $title ?></h3></a>
                        <input type=\"hidden\" name=\"mess\" value=\"$title\"/>
                    </form>
                    ";
        }
    }
    if ($num_rows == $resultsPerPage) {
        ?>
        <li class="loadbutton">
            <button class="loadmore" data-page="<?php echo $paged + 1; ?>">Load More</button>
        </li>
    <?php
    } else {
        echo "<li class='loadbutton'><h3>No More Questions</h3></li>";
    }
endif;
?>