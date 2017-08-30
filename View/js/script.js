$(document).ready(function () {
    $('#add-comment').click(function(){
        $.post(
            'index.php?controller=comment&action=addcomment&id='+$(this).data('post-id'),
            {
                'username' : $('#username').val(),
                'comment' : $('#comment').val()
            }
        ).done(function(data) {
            var dataObject = JSON.parse(data);
            if (dataObject.status) {
                $('.comments-container').prepend(dataObject.html);
            }
        });
    });
});
