<?php
#users page for
include('template/header.php');
?>

<div>
<?php
/**
 * Created by PhpStorm.
 * User: kylewillcox21
 * Date: 12/7/14
 * Time: 5:58 PM
 */


$qr = "SELECT username, major, concentration, best_languages, date_joined, img FROM user";
$r = @mysqli_query ($bd, $qr);
$indx=0;
$flip=0;
 echo '<div>';
if ($r) {

    while($row = mysqli_fetch_array($r)){

        if($indx%3===0 && $flip%3===0){
            echo '</div><div class="row">';
            $flip=$flip+1;

        }

        $un =$row['username'];
        $maj =$row['major'];
        $con=$row['concentration'];
        $bl=$row['best_languages'];
        $jd=$row['date_joined'];
        $img=$row['img'];

        ?>
    <div class="thumbnail col-sm-6 col-md-4" style="background-color: #626262">
        <div>
                         <form action="index.php?page=other_user" method="post">
                            <a href="javascript:" onclick="parentNode.submit();">
                            <h3><?php echo $un ?></h3></a>
                        <input type="hidden" name="mess" value= "<?php echo $un ?>"/>
                        </form>

        </div>
        <div><img style="height:50px; width:40px" alt="User Pic"
                  src="http://<?php echo $_SERVER['HTTP_HOST'] ?>/assets/uploads/<?php if(isset($img)){ echo $img; } else { echo 'profile-img.jpg';}?>"
                  class="img-rounded"></div>
        <div><p><u>Major:</u> <?php echo $maj?></p></div>
        <div><p><u>Concentration:</u> <?php echo $con ?></p></div>
        <div><p><u>Best Languages:</u> <?php echo $bl ?></p></div>
        <div><p><u>Date Joined:</u> <?php echo $jd ?></p></div>
        <div><p><u>Date Joined:</u> </p></div>
    </div>
    <?php
        $indx=$indx+1;

    }

    mysqli_close($bd);

}
else {

    echo '<div class="alert alert-danger" role="alert"><p class="error">Could not execute query.</p></div>';

    echo '<div class="alert alert-danger" role="alert"><p>' . mysqli_error($bd) . '<br><br>Query: ' . $qr. '</p></div>';
}


?>

    <hr>
</div>