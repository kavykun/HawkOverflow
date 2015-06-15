<?php
#navigation for hawkoversflow
?>
<!-- Menu -->
<nav class="menu" id="theMenu">
    <div class="menu-wrap">
        <i class="icon-remove menu-close"></i>
        <style>
			hr { 
				display: block;
				margin-top: 0.5em;
				margin-bottom: 0.5em;
				margin-left: auto;
				margin-right: auto;
				border-style: inset;
				border-width: 1px;
			} 
		</style>
		<hr>
		<a href="index.php" class="smoothScroll">Home</a>
		<hr>
		<a href="index.php?page=users" class="smoothScroll">Users</a>
		<a href="index.php?page=badges" class="smoothScroll">Badges</a>
		<a href="index.php?page=courses" class="smoothScroll">CSC Courses</a>
        <a href="index.php?page=tags" class="smoothScroll">Tag Cloud</a>
        <hr>
		<a href="index.php?page=contact" class="smoothScroll">Contact</a>
        <a href="index.php?page=about" class="smoothScroll">About Us</a>
		<a href="index.php?page=faq" class="smoothScroll">FAQ</a>
		<hr>
		<?php
        if (isset($_SESSION['username'])) {
            echo '<a href="index.php?page=logout" class="smoothScroll">Logout</a>';
            echo '<a href="index.php?page=profile" class="smoothScroll">My Profile</a>';
        }//end if
        else {
            echo '<a href="index.php?page=sign_in" class="smoothScroll">Login</a>';
        }
        ?>
    </div>
    <!-- Menu button -->
    <div id="menuToggle"><i class="glyphicon glyphicon-hand-right"></i></div>
</nav>