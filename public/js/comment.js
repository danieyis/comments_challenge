
$('body').on('click', 'div#replies-list a', showForm);
$('#create-comment').on('click',showForm);

$("#addcomment").click(function () {
    $("#frm-comment").css('display', 'block');
    $("#commentId").val(0);
    $("#commentdiv").append($("#frm-comment"));
});

function showForm() {
    $("#frm-comment").show();
    $("#comment_id").val($(this).data("parent_id"));
    $(this).after($("#frm-comment"));
}

$("#submit-comment").click(function () {
    submitPost();
});

function submitPost() {
    if (!isValidForm()) {
        alert("Please enter name and comment");
        return false;
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $.ajax({
        type: "POST",
        url: "/comment/public/comment",
        data: $("#frm-comment").serializeArray(),
        success: addComment,
        error: handleAjaxError
    });

}

function addComment(comment) {
    refreshForm();
    var level = 0;
    var parentLevel = $("#comment-id-" + comment.parent_id).data('level');
    if( typeof parentLevel !== "undefined")
        level = 1 + parseInt(parentLevel);

    var newComment = $('<div id="comment-id-' + comment.id + '" class="level-' + level + '" data-level="'+level+'"></div>');
    var blockquote = $('<blockquote></blockquote>')
            .append('<p class="comment-text"> ' + comment.content + '</p>')
            .append(' <footer>Posted by:'+ comment.username +'   edited: now </footer>');
    if (level < 2) {
        blockquote.append('<a data-parent_id="' + comment.id + '" type="button" class="btn">Add a public reply... </a> <div> </div>');
    }

    newComment.append(blockquote);
    if(comment.parent_id ==  0 ){
        $("div#replies-list").prepend(newComment);
    }else{
        $("div#comment-id-" + comment.parent_id).after(newComment);
    }

}

function isValidForm() {
    return $.trim($("#name").val()) !== "" && $.trim($("#content").val() !== "");
}

function refreshForm() {
    $("#frm-comment").hide();
    $("#comment-message").show();
    $("#comment").val('');
    $("#name").val('');
}

function handleAjaxError(jqXHR, textStatus, errorThrown) {
    console.log("HTTP_STATUS_CODE: " + jqXHR.status);
    console.log("ERROR: " + errorThrown);
}
