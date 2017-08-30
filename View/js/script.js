$(document).ready(function () {
    $('#add-comment').click(function(){
        $.post(
            'index.php?controller=comment&action=addcomment&id=1',
            {
                'username' : $('#username').val(),
                'comment' : $('#comment').val()
            }
        ).done(function(data) {
            var dataObject = JSON.parse(data);
            if (dataObject.status) {
                $(dataObject.html).hide().insertBefore('.comment-box').slideDown();
            }
        });
    });
});
