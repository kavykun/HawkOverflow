<div class="movedown spacebelow">
    <?php
    if ($_GET['page'] == 'questions') {
        echo '<a href="index.php?page=questions" class="btn btn-success">Questions</a>';
    } else {
        echo '<a href="index.php?page=questions" class="btn btn-default">Questions</a>';
    }
    if ($_GET['page'] == 'users') {
        echo '<a href="index.php?page=users" class="btn btn-success">Users</a>';
    } else {
        echo '<a href="index.php?page=users" class="btn btn-default">Users</a>';
    }
    if ($_GET['page'] == 'badges') {
        echo '<a href="index.php?page=badges" class="btn btn-success">Badges</a>';
    } else {
        echo '<a href="index.php?page=badges" class="btn btn-default">Badges</a>';
    }
    if ($_GET['page'] == 'tags') {
        echo '<a href="index.php?page=tags" class="btn btn-success">Tags</a>';
    } else {
        echo '<a href="index.php?page=tags" class="btn btn-default">Tags</a>';
    }
    ?>
    <a href="index.php?page=ask_question" class="btn btn-default">Ask Question</a>
</div>