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
function mentorshipActivityEventHandlers() {
 $("body").on("click", ".gb-adit-question-trigger-btn", function(e) {
        e.preventDefault();
        $(this).closest(".panel").find(".gb-question-form").show("slow");
    });
       
    $('.gb-bank-list-modal-trigger').click(function(e) {
        e.preventDefault();
        $("#gb-bank-list-modal").modal({backdrop: 'static', keyboard: false});
    });
    $('.skilllist-form-cancel-btn').click(function(e) {
        e.preventDefault();
        $("#gb-add-skilllist").hide("fast");
        $("#gb-commit-form").show("slow");
        resetSkillListModal("#gb-add-skilllist",
                "#add-skill-list-form-steps",
                skillListChildForm,
                "#gb-skill-form-back-btn",
                "#gb-skill-form-next-btn");
    });
    $('.skill-commit-modal-close-btn').click(function(e) {
        e.preventDefault();
        resetSkillCommitModal("#gb-add-skill-modal",
                "#commit-skill-form-steps",
                skillCommitmentChildForm,
                "#gb-academic-form-back-btn",
                "#gb-academic-form-next-btn");
    });
    $("body").on("click", ".gb-add-answer-btn", function(e) {
        e.preventDefault();
        var $parent = $(this).closest(".panel");
        var question = $parent.find(".gb-add-answer-input").val().trim();
        var mentorshipId = $parent.attr("mentorship-id");
        var questionId = $parent.attr("question-id");
        alert(question);
        if (question != "") {
            data = {question: question,
                question_id: questionId};
            ajaxCall(addMentorshipQuestionUrl, data, addMentorshipQuestionDetail);
        } else {
            alert("Cannot save an empty question.")
        }
    });
    $("#gb-mentorship-edit-cancel-btn").click(function(e) {
        e.preventDefault();
        closeEdit($(".mentorship-info-container"));
    });
}