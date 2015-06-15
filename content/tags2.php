<?php
$_SESSION['home'] = true;
include('content/config.php');
#page for tags
?>

<div class="movedown spacebelow">
    <?php
    include('template/header.php');

		include("content/tagcloudR.php");
    ?>
	

</div>