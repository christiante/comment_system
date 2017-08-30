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
            } else {
                alert('Sorry, you comment contains censored word. It will not be shown in live.');
            }
        });
    });
    
    $('#add-post').click(function(){
        $.post(
            'index.php?controller=post&action=addpost',
            {
                'author' : $('#author').val(),
                'content' : $('#post-content').val()
            }
        ).done(function(data) {
                console.log(data);
            var dataObject = JSON.parse(data);
            if (dataObject.status) {
                $('.post-container').prepend(dataObject.html);
            }
        });
    });
});
