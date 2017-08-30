$(document).ready(function () {
    $('#add-comment').click(function(){
        $('#submitBtn').click();
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
            }else {
                $('.comments-container').prepend(dataObject.html);
            }
        });
    });
    
    $('#add-post').click(function(){
        $('#submitBtnPost').click();
        $.post(
            'index.php?controller=post&action=addpost',
            {
                'author' : $('#author').val(),
                'content' : $('#content').val()
            }
        ).done(function(data) {
            var dataObject = JSON.parse(data);
            if (dataObject.status) {
                $('.post-container').prepend(dataObject.html);
            }
        });
    });
});
