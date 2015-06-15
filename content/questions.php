<?php
#Displays all of the questions
include('config.php');
include('template/header.php');
?>
	<?php
	$query = mysqli_query($bd, "SELECT question_title, question_description, asked, views, up_vote, down_vote, time_created, time_edited, (up_vote - down_vote) as total_vote FROM `question`");
	$echoOut = "";
	while ($data = mysqli_fetch_assoc($query)) {
		$Qtitle = $data['question_title'];
		$Qviews = $data['views'];
		$Qscore = $data['total_vote'];
		
		echo $echoOut = "<h3>$Qtitle</h3><h4>Current score: $Qscore, $Qviews views</h4>"; 
	}
    ?>