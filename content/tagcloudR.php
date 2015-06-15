<html>
	<br></br>
	
	<?php
	
        $query = mysqli_query($bd, "SELECT tag_description from `tag` ORDER BY tag_description ASC");
		$tagEcho = "";
		
		while ($data = mysqli_fetch_assoc($query)) {
			$tagDesc = $data['tag_description'];
			$tagEcho = "<a>.   $tagDesc   .</a>";
			echo $tagEcho;
		}
	?>
	
</html>