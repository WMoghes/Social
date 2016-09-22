$('.edit-post-a').on('click', function(event){
    event.preventDefault();
    var postBody = event.target.parentNode.parentNode.childNodes[1].textContent;
    $('#edit-body').val(postBody);
    $('#edit-model').modal();
});

$('#modal-save').on('click', function(){
    $.ajax({
       method: 'POST',
        url: url,
        data: {body: $('#edit-body').val(), postId: '', _token: token}
    })
        .done(function(msg){
           console.log(msg['message']);
        });
});