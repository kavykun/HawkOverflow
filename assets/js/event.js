$(document).ready(function(){
    var callback = function(data) {
        $.ajax({
            url: 'insert.php',
            type: 'post',
            data: { id: data.id, up: data.upvoted, down: data.downvoted, star: data.starred },
            success: function(data) {
                $("#message").html(data);
                $("#message").hide();
                $("#message").fadeIn(1500);
            }
        });
    };
});