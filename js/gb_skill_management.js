// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_management.js....");

    monitorEventHandlers();
    skillActivityEventHandlers();
    dropDownHover();
});
function ajaxCall(url, data, callback) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: 'json',
        data: data,
        success: callback
    });
}
function dropDownHover() {
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
        // $(this).addClass('open');
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
        //$(this).removeClass('open');
    });
}
function getDiscussionPosts(data) {
    $("#gb-discussion-posts-"+data["discussion_title_id"]).html(data["_discussion_posts"]);
    $("#gb-discussion-posts-"+data["discussion_title_id"]).show("slow");
   // $("#gb-add-weblink-modal").modal("hide");
}
function addNewDiscussion(data) {
    $("#gb-discussion-submit-btn").closest(".gb-discussion-input").hide("slow");
    $("#gb-discussions").prepend(data["_discussion"]);
   // $("#gb-add-weblink-modal").modal("hide");
}
function addSkillCommitmentWebLink(data) {
    $("#gb-skill-management-web-links").prepend(data["web_link_row"]);
    $("#gb-add-weblink-modal").modal("hide");
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
     $(".gb-discussion-post-title").click(function(e) {
        e.preventDefault();
        var discussionTitleId = $(this).attr("discussion-title-id");
        var data = {discussion_title_id: discussionTitleId};
        ajaxCall(getDiscussionPostsUrl, data, getDiscussionPosts);
    });
    $("#gb-add-weblink-modal-trigger").click(function() {
        $("#gb-add-weblink-modal").modal("show");
        var skillId = $(this).attr("skill-id");
        $("input[name='GoalCommitmentWebLink[goal_commitment_id]']").val(skillId);

    });
    $("#add-weblink-submit-btn").click(function(e) {
        e.preventDefault();

        var data = $("#gb-skill-commitment-weblink-form").serialize();
        ajaxCall(addGoalCommitmentWebLinkUrl, data, addSkillCommitmentWebLink);
    });
}