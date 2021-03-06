<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>WebCodo :: Simple Comments System Using Php Jquery & Ajax</title>

        <link type="text/css" rel="stylesheet" href="css/style.css">
        <link type="text/css" rel="stylesheet" href="css/example.css">
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        

    </head>
    <body>


    <div class="webcodo-top" >
        <a href="http://webcodo.com/comments-system-using-php-ajax">
            <div class="wcd wcd-tuto"> < Come back to the tuto page</div>
        </a>
        <a href="http://webcodo.com">
            <div class="wcd wcd-logo">WEBCODO</div>
        </a>
        <div class="wcd"></div>
    </div>

    <br/><br/><br/><br/><br/>


<?php
// Connect to the database
include('config.php');
$id_post = "1"; //the post or the page id
?>
<div class="cmt-container" >
    <?php
    $sql = mysqli_query($bd,"SELECT * FROM comments WHERE id_post = '$id_post'") or die(mysql_error());;
    while($affcom = mysqli_fetch_assoc($sql)){
        $name = $affcom['name'];
        $email = $affcom['email'];
        $comment = $affcom['comment'];
        $date = $affcom['date'];

    ?>
    <div class="cmt-cnt">
        <div class="thecom">
            <h5><?php echo $name; ?></h5><span data-utime="1371248446" class="com-dt"><?php echo $date; ?></span>
            <br/>
            <p>
                <?php echo $comment; ?>
            </p>
        </div>
    </div><!-- end "cmt-cnt" -->
    <?php } ?>


    <div class="new-com-bt">
        <span>Write a comment ...</span>
    </div>
    <div class="new-com-cnt">
        <input type="hidden" id="name-com" name="name-com" value="" placeholder="<?php echo $_SESSION?>" />
        <textarea class="the-new-com"></textarea>
        <div class="bt-add-com">Post comment</div>
        <div class="bt-cancel-com">Cancel</div>
    </div>
    <div class="clear"></div>
</div><!-- end of comments container "cmt-container" -->


<script type="text/javascript">
   $(function(){
        //alert(event.timeStamp);
        $('.new-com-bt').click(function(event){
            $(this).hide();
            $('.new-com-cnt').show();
            $('#name-com').focus();
        });

        /* when start writing the comment activate the "add" button */
        $('.the-new-com').bind('input propertychange', function() {
           $(".bt-add-com").css({opacity:0.6});
           var checklength = $(this).val().length;
           if(checklength){ $(".bt-add-com").css({opacity:1}); }
        });

        /* on clic  on the cancel button */
        $('.bt-cancel-com').click(function(){
            $('.the-new-com').val('');
            $('.new-com-cnt').fadeOut('fast', function(){
                $('.new-com-bt').fadeIn('fast');
            });
        });

        // on post comment click
        $('.bt-add-com').click(function(){
            var theCom = $('.the-new-com');
            var theName = $('#name-com');
            var theMail = $('#mail-com');

            if( !theCom.val()){
                alert('You need to write a comment!');
            }else{
                $.ajax({
                    type: "POST",
                    url: "ajax/add-comment.php",
                    data: 'act=add-com&id_post='+<?php echo $id_post; ?>+'&name='+theName.val()+'&email='+theMail.val()+'&comment='+theCom.val(),
                    success: function(html){
                        theCom.val('');
                        theMail.val('');
                        theName.val('');
                        $('.new-com-cnt').hide('fast', function(){
                            $('.new-com-bt').show('fast');
                            $('.new-com-bt').before(html);
                        })
                    }
                });
            }
        });

    });
</script>

</body>
</html>