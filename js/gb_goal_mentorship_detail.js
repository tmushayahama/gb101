// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_mentorship_detail.js....");
    $("textarea").each(function() {
        $(this).val($(this).val().trim());
    })

    mentorshipActivityEventHandlers();
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
function togglePanelForm(toggleBtn, form) {
    $("body").on("click", toggleBtn, function(e) {
        e.preventDefault();
        var $questionForm = $(this).closest(".panel").find(form);
        $(form).hide("fast");
        if ($questionForm.is(":hidden")) {
            $questionForm.show("slow");
        }
    });
}
function clearForm($parent) {
    $parent.find("input").val("");
    $parent.find("textarea").val("");
}
function mentorshipEnrollRequest(data) {
    $("#gb-request-mentorship-enroll-modal").modal("hide");
    $("#gb-request-confirmation-modal").modal("show");
    $("#gb-request-message").val("");
    var $enrollTriggerBtn = $(".gb-commitment-post[mentorship-id='" + data["mentorship_id"] + "']")
            .find(".gb-mentorship-enroll-request-modal-trigger");
    $enrollTriggerBtn.text("Pending Request");
    $enrollTriggerBtn.attr("status", 0);
    // alert($enrollTriggerBtn.attr("status"))
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
function activateTabs() {
    $('#gb-mentorship-nav a, #gb-mentorship-all-activity-nav a, gb-settings-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
}
function addMentorshipAnswer(data) {
    $(".gb-answer-list-" + data["question_id"]).append(data["_answer_list_item"]);
    $(".gb-answer-form").hide("slow");
    $(".gb-answer-title").val("");
    $(".gb-answer-description").val("");
}
function addMentorshipAnnouncement(data) {
    $(".gb-announcement-list").append(data["_announcement_list_item"]);
    $(".gb-announcement-form").hide("slow");
    $(".gb-announcement-title").val("");
    $(".gb-announcement-description").val("");
}
function mentorshipActivityEventHandlers() {
    togglePanelForm(".gb-add-mentorship-answer-toggle", ".gb-answer-form");
    togglePanelForm(".gb-add-mentorship-announcement-toggle", ".gb-announcement-form");
    togglePanelForm(".gb-add-mentorship-todo-toggle", ".gb-todo-form");
    togglePanelForm(".gb-add-mentorship-weblink-toggle", ".gb-weblink-form");

    $('.gb-bank-list-modal-trigger').click(function(e) {
        e.preventDefault();
        $("#gb-bank-list-modal").modal({backdrop: 'static', keyboard: false});
    });

    $("body").on("click", ".gb-add-answer-clear-btn", function(e) {
        e.preventDefault();
        clearForm($(this).closest(".panel"));
    });
    $("body").on("click", ".gb-add-announcement-clear-btn", function(e) {
        e.preventDefault();
        clearForm($(this).closest(".panel"));
    });
    $("body").on("click", ".gb-add-answer-btn", function(e) {
        e.preventDefault();
        var $parent = $(this).closest(".panel");
        var title = $parent.find(".gb-answer-title").val().trim();
        var description = $parent.find(".gb-answer-description").val().trim();
        var questionId = $parent.attr("question-id");
        if (title != "") {
            data = {title: title,
                description: description,
                question_id: questionId};
            ajaxCall(addMentorshipAnswerUrl, data, addMentorshipAnswer);
        } else {
            alert("Cannot save an empty question.")
        }
    });
    $("body").on("click", ".gb-add-announcement-btn", function(e) {
        e.preventDefault();
        var $parent = $(this).closest(".panel");
        var title = $parent.find(".gb-announcement-title").val().trim();
        var description = $parent.find(".gb-announcement-description").val().trim();
        if (title != "") {
            data = {title: title,
                description: description};
            ajaxCall(addMentorshipAnnouncementUrl, data, addMentorshipAnnouncement);
        } else {
            alert("Cannot save an empty announcement.")
        }
    });
    $("#gb-mentorship-edit-cancel-btn").click(function(e) {
        e.preventDefault();
        closeEdit($(".mentorship-info-container"));
    });
}