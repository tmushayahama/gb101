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
    $("#gb-start-mentorship-btn").click(function(e) {
        e.preventDefault();
        var mentoringLevel = $("#gb-mentoring-level-selector").val();
        var goalId = $("#gb-mentoring-goal-selector").find(":selected").attr("value");
        var fullUrl = goalMentorshipDetailUrl + "/mentoringLevel/" + mentoringLevel + "/goalId/" + goalId;
        window.location.href = fullUrl;
    });

    $("#gb-mentorship-edit-btn").click(function(e) {
        e.preventDefault();
        $("#gb-mentorship-description-edit-input").val(mentorshipDescription);
        var $parent = $(this).closest(".mentorship-info-container");
        $parent.find(".gb-content").hide();
        $parent.find(".gb-footer").hide()
        $parent.find(".gb-content-edit").show("slow");
        $parent.find(".gb-footer-edit").show("slow")
    });
    $("#gb-mentorship-edit-save-btn").click(function(e) {
        e.preventDefault();
        var $parent = $(this).closest(".mentorship-info-container");
        var description = $("#gb-mentorship-description-edit-input").val().trim();
        var mentorshipId = $parent.attr("mentorship-id");
        if (description != "") {
            data = {mentorship_id: mentorshipId,
                description: description};
            ajaxCall(editDetailUrl, data, editDetail);
        } else {
            alert("Cannot save an empty description.")
        }
    });
    $("#gb-mentorship-edit-cancel-btn").click(function(e) {
        e.preventDefault();
        closeEdit($(".mentorship-info-container"));
    });
}