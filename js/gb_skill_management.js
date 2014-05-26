// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_management.js....");
    monitorEventHandlers();
    skillActivityEventHandlers();
});
function getDiscussionPosts(data) {
    $("#gb-discussion-posts-" + data["discussion_title_id"]).html(data["_discussion_posts"]);
    $(".gb-discussion-post-title[discussion-title-id='" + data["discussion_title_id"] + "']")
            .attr("has-expanded", 1);
    //alert($(".gb-discussion-post-title[discussion-title-id='" + data["discussion_title_id"]+"']")
    //       .attr("has-expanded")==0);
    $("#gb-discussion-posts-" + data["discussion_title_id"]).show("slow");
    // $("#gb-add-weblink-modal").modal("hide");
}
function addNewDiscussion(data) {
    $("#gb-discussion-submit-btn").closest(".gb-discussion-input").hide("slow");
    $("#gb-discussions").prepend(data["_discussion"]);
    $("#discussion-input-form input").val("");
    $("#discussion-input-form textarea").val("");
    // $("#gb-add-weblink-modal").modal("hide");
}
function discussionReply(data) {
    $("#gb-discussion-posts-" + data["discussion_title_id"] + " .gb-discussion-posts-container")
            .append(data["_discussion_post_row"]);
    $("#gb-discussion-posts-" + data["discussion_title_id"] + " .gb-discussion-posts-actions").hide("slow");
    $("#gb-discussion-posts-" + data["discussion_title_id"] + " .gb-discussion-post-another-reply").show();
    $("#gb-discussion-posts-" + data["discussion_title_id"] + " .gb-discussion-reply-text").val("");

}
function addskillWebLink(data) {
    $("#gb-skill-management-web-links").prepend(data["web_link_row"]);
    //$("#gb-add-weblink-modal").modal("hide");
}
function monitorEventHandlers() {
    $('#gb-skill-management-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('.gb-monitor-dropdown-menu-btns').click(function(e) {
        e.preventDefault();
        $("#gb-monitor-dropdown-btn").text($(this).text());
    });
    $('.gb-mentorship-dropdown-menu-btns').click(function(e) {
        e.preventDefault();
        $("#gb-mentorship-dropdown-btn").text($(this).text());
    });
}
function skillActivityEventHandlers() {
    $(".gb-discussion-input-toggle-btn").click(function() {
        $(".gb-discussion-input").toggle("slow");
    });
    $("#gb-discussion-submit-btn").click(function(e) {
        e.preventDefault();
        var data = $("#discussion-input-form").serialize();
        ajaxCall(addNewDiscussionUrl, data, addNewDiscussion);
    });
    $("body").on("click", ".gb-discussion-post-title", function(e) {
        e.preventDefault();
        var discussionTitleId = $(this).attr("discussion-title-id");
        if ($(this).attr("has-expanded") == 0) {
            var data = {discussion_title_id: discussionTitleId};
            ajaxCall(getDiscussionPostsUrl, data, getDiscussionPosts);
        } else {
            $("#gb-discussion-posts-" + discussionTitleId).toggle("slow");
        }
    });
    $("body").on("click", ".gb-discussion-reply-btn", function(e) {
        e.preventDefault();
        var discussionTitleId = $(this).closest(".gb-discussion-posts").attr("discussion-title-id");
        var discussionDescription = $(this).closest(".gb-discussion-posts")
                .find(".gb-discussion-reply-text").val();
        var data = {discussion_title_id: discussionTitleId,
            discussion_description: discussionDescription};
        ajaxCall(discussionReplyUrl, data, discussionReply);
    });
    $("body").on("click", ".gb-discussion-post-another-reply", function(e) {
        e.preventDefault();
        $(this).hide("slow");
        $(this).prev().show();
    });
    $(".gb-add-weblink-toggle-btn").click(function() {
        $(".gb-weblinks-input").toggle("slow");
    });
    $("#add-weblink-submit-btn").click(function(e) {
        e.preventDefault();

        var data = $("#gb-skill-weblink-form").serialize();
        ajaxCall(addGoalWebLinkUrl, data, addskillWebLink);
    });
}