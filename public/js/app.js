var postId = 0;
var postBodyElement;

$('.edit-post-a').on('click', function (event) {
    event.preventDefault();
    postBodyElement = event.target.parentNode.parentNode.childNodes[1];
    var postBody = postBodyElement.textContent;
    postId = event.target.parentNode.parentNode.dataset['postid'];
    $('#edit-body').val(postBody);
    $('#edit-model').modal();
});

$('#modal-save').on('click', function () {
    $.ajax({
            method: 'POST',
            url: url,
            data: {body: $('#edit-body').val(), postId: postId, _token: token}
        })
        .done(function (msg) {
            $(postBodyElement).text(msg['new_body']);
            $('#edit-model').modal('hide');
        });
});