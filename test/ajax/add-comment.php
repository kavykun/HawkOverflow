<?php
extract($_POST);
if($_POST['act'] == 'add-com'):
    $name = htmlentities($name, ENT_QUOTES, 'UTF-8');
    $email = htmlentities($email, ENT_QUOTES, 'UTF-8');
    $comment = htmlentities($comment, ENT_QUOTES, 'UTF-8');

    // Connect to the database
	include('../config.php');

	if(strlen($name) <= '1'){ $name = 'Guest';}
    //insert the comment in the database
    mysqli_query($bd,"INSERT INTO comments (name, email, comment, id_post)VALUES( '$name', '$email', '$comment', '$id_post')");
    if(!mysql_errno()){
?>
    <div class="cmt-cnt">
		<div class="thecom">
	        <h5><?php echo $name; ?></h5><span  class="com-dt"><?php echo date('d-m-Y H:i'); ?></span>
	        <br/>
	       	<p><?php echo $comment; ?></p>
	    </div>
	</div><!-- end "cmt-cnt" -->

	<?php } ?>
<?php endif; ?>