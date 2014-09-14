// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_mentorship_detail.js....");
    $("textarea").each(function() {
        $(this).val($(this).val().trim());
    });
    mentorshipActivityEventHandlers();
});
function mentorshipEnrollRequest(data) {
    $("#gb-request-mentorship-enroll-modal").modal("hide");
    $("#gb-request-confirmation-modal").modal("show");
    $("#gb-request-message").val("");
    var $enrollTriggerBtn = $(".gb-commitment-post[mentorship-id='" + data["mentorship_id"] + "']")
            .find(".gb-mentorship-enroll-request-modal-trigger");
    $enrollTriggerBtn.text("Pending Request");
    $enrollTriggerBtn.attr("status", 0);
}
function activateTabs() {
    $('#gb-mentorship-nav a, #gb-mentorship-all-activity-nav a, gb-settings-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
}
function acceptMentorshipEnrollmentSuccess(data) {
    $(".gb-person-badge[mentee-id='" + data["mentee_id"] + "']")
            .replaceWith(data["mentee_badge"]);
    $(data["mentee_badge_small"]).insertAfter("#home-activity-stats h5");
}
function editMentorshipDetailsSuccess(data) {
    $(".gb-mentorship-title").text(data["title"]);
    $(".gb-mentorship-description").text(data["description"]);
    $("#gb-edit-mentorship-form").hide("fast");
    $("#gb-edit-mentorship-form").prev().show("slow");
    $("#gb-edit-mentorship-form").closest(".panel").find(".panel-footer").show("fast");
}
function addMentorshipTimelineItemSuccess(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-mentorship-timeline-form"), $("#gb-mentorship-timeline-form-error-display"), data);
    } else {
        clearForm($("#gb-mentorship-timeline-form"));
        sendFormHome($("#gb-mentorship-timeline-form"));
        $("#gb-timeline").html(data["_mentorship_timeline_item_row"]);
        document.getElementById("gb-timeline-day-container-" + data["timelineDay"]).scrollIntoView(true);
    }
}
function editMentorshipTimelineItemSuccess(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-answer-question-form"), $("#gb-answer-question-form-error-display"), data);
    } else {
        clearForm($("#gb-mentorship-timeline-form"));
        sendFormHome($("#gb-mentorship-timeline-form"));
        $("#gb-timeline").html(data["_mentorship_timeline_item_row"]);
        document.getElementById("gb-timeline-day-container-" + data["timelineDay"]).scrollIntoView(true);
    }
}
function addMentorshipAnswer(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-answer-question-form"), $("#gb-answer-question-form-error-display"), data);
    } else {
        $(".gb-answer-list-" + data["question_id"]).append(data["_answer_list_item"]);
        $("#gb-answer-question-form").closest(".panel").find(".gb-no-information-alert").hide("slow");
        clearForm($("#gb-answer-question-form"));
    }
}
function addMentorshipAskQuestion(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-ask-question-form"), $("#gb-ask-question-form-error-display"), data);
    } else {
        $(".gb-mentorship-ask-question-list").prepend(data["_mentorship_ask_question_list_item"]);
        clearForm($("#gb-ask-question-form"));
    }
}
function addMentorshipAskAnswer(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-mentorship-ask-answer-form"), $("#gb-mentorship-ask-answer-form-error-display"), data);
    } else {
        var $listContainer = $(".gb-mentorship-ask-answer-list[mentorship-question-id='" + data['mentorship_question_id'] + "']")
                .find(".gb-answers-list");
        clearForm($("#gb-mentorship-ask-answer-form"));
        $listContainer.prepend(data["_mentorship_ask_answer_list_item"]);
        if ($listContainer.children().length > 1) {
            $('> .gb-no-information-alert', $listContainer).hide();
        }
    }
}
function editMentorshipAnswer(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-answer-question-form"), $("#gb-answer-question-form-error-display"), data);
    } else {
        clearForm($("#gb-answer-question-form"));
        sendFormHome($("#gb-answer-question-form"));
        $(".gb-answer-list-item[answer-id='" + data['answer_id'] + "']").replaceWith(data["_answer_list_item"]);
    }
}
function editMentorshipAnnouncement(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-mentorship-announcement-form"), $("#gb-mentorship-announcement-form-error-display"), data);
    } else {
        clearForm($("#gb-mentorship-announcement-form"));
        sendFormHome($("#gb-mentorship-announcement-form"));
        $(".gb-announcement-list-item[mentorship-announcement-id='" + data['mentorship_announcement_id'] + "']").replaceWith(data["_announcement_list_item"]);
    }
}
function editMentorshipTodoSuccess(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-mentorship-todo-form"), $("#gb-mentorship-todo-form-error-display"), data);
    } else {
        clearForm($("#gb-mentorship-todo-form"));
        sendFormHome($("#gb-mentorship-todo-form"));
        $(".gb-todo-list-item[mentorship-todo-id='" + data['mentorship_todo_id'] + "']").replaceWith(data["_mentorship_todo_list_item"]);
    }
}
function editMentorshipWeblinkSuccess(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-mentorship-weblink-form"), $("#gb-mentorship-weblink-form-error-display"), data);
    } else {
        clearForm($("#gb-mentorship-weblink-form"));
        sendFormHome($("#gb-mentorship-weblink-form"));
        $(".gb-mentorship-weblink-item[mentorship-weblink-id='" + data['mentorship_weblink_id'] + "']").replaceWith(data["_mentorship_weblink_list_item"]);
    }
}
function postMentorshipDiscussionTitleSuccess(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-discussion-title-form"), $("#gb-discussion-title-form-error-display"), data);
    } else {
        var $listContainer = $(".gb-mentorship-discussion-title-list");
        clearForm($("#gb-discussion-title-form"));
        $listContainer.prepend(data["_discussion_title"]);
        if ($listContainer.children().length > 1) {
            $('> .gb-no-information-alert', $listContainer).hide();
        }
    }
}
function getDiscussionPosts(data) {
    $("#gb-mentorship-discussion-posts-" + data["discussion_title_id"]).html(data["_discussion_posts"]);
    $(".gb-post-entry[discussion-title-id='" + data["discussion_title_id"] + "']")
            .attr("has-expanded", 1);
    $("#gb-mentorship-discussion-posts-" + data["discussion_title_id"]).slideDown("slow");

}
function discussionReply(data) {
    $("#gb-mentorship-discussion-posts-" + data["discussion_title_id"] + '"')
            .html(data["_discussion_post_row"]);
    $("#gb-discussion-posts-" + data["discussion_title_id"] + " .gb-discussion-posts-actions").hide("slow");
    $("#gb-discussion-posts-" + data["discussion_title_id"] + " .gb-discussion-post-another-reply").show();
    $("#gb-discussion-posts-" + data["discussion_title_id"] + " .gb-discussion-reply-text").val("");
}
function mentorshipActivityEventHandlers() {
   
    $("body").on("click", ".gb-assign-mentee-btn", function(e) {
        e.preventDefault();
        $("#gb-assign-to-modal-trigger").text("Choose Mentee");
        $("#gb-send-request-modal").attr("gb-select", "single");
        $("#gb-request-modal-heading").text("Choose a Mentee");
    });
    $('.gb-edit-mentorship-btn').click(function(e) {
        e.preventDefault();
        $("#gb-edit-mentorship-form").show("slow");
        $("#gb-edit-mentorship-form").prev().hide("fast");
        $("#gb-edit-mentorship-form").closest(".panel").find(".panel-footer").hide("fast");
    });
    $('.gb-update-mentorship-cancel-btn').click(function(e) {
        e.preventDefault();
        $("#gb-edit-mentorship-form").hide("fast");
        $("#gb-edit-mentorship-form").prev().show("slow");
        $("#gb-edit-mentorship-form").closest(".panel").find(".panel-footer").show("fast");
    });
    $('.gb-bank-list-modal-trigger').click(function(e) {
        e.preventDefault();
        $("#gb-bank-list-modal").modal({backdrop: 'static', keyboard: false});
    });
    $("body").on("click", ".gb-discussion-post-title-view", function(e) {
        e.preventDefault();
        var discussionTitle = $(this).closest(".gb-post-entry");

        var discussionTitleId = discussionTitle.attr("discussion-title-id");
        if (discussionTitle.attr("has-expanded") == 0) {
            var data = {discussion_title_id: discussionTitleId};
            ajaxCall(getDiscussionPostsUrl, data, getDiscussionPosts);
        } else {
            $("#gb-mentorship-discussion-posts-" + discussionTitleId).slideToggle();
        }
    });
}
