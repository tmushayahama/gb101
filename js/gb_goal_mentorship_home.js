// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_mentorship_home.js....");
    $("textarea").each(function() {
        $(this).val($(this).val().trim());
    });
    mentorshipActivityEventHandlers();
    mentorshipRequestHandlers();
});
function addMentorship(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-add-mentorship-form"), $("#gb-add-mentorship-form-error-display"), data);
    } else {
        window.location.href = mentorshipDetailUrl + "/mentorshipId/" + data["mentorshipId"];
    }
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
function acceptMentorshipEnrollment(data) {
    $(".gb-person-badge[mentee-id='" + data["mentee_id"] + "']")
            .replaceWith(data["mentee_badge"]);
    $(data["mentee_badge_small"]).insertAfter("#home-activity-stats h5");
}
function editDetail(data) {
    $(".gb-mentorship-description").text(data["description"]);
    mentoshipDescription = data["description"];
    $("#gb-mentorship-description-edit-input").val(mentorshipDescription);
    closeEdit($(".mentorship-info-container"));
}
function activateTabs() {
    $('#gb-mentorship-nav a, #gb-mentorship-all-activity-nav a, gb-settings-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
}
function closeEdit($parent) {
    $parent.find(".gb-content-edit").hide();
    $parent.find(".gb-footer-edit").hide()
    $parent.find(".gb-content").show("slow");
    $parent.find(".gb-footer").show("slow");
}
function mentorshipActivityEventHandlers() {
    $("body").on("click", ".gb-add-mentorship-modal-trigger", function() {
       $("#gb-add-mentorship-modal").modal({backdrop: 'static', keyboard: false});
        var $parent = $(this).closest(".gb-skill-gained");
        var goalId = $parent.attr("goal-id");
       $("#gb-add-mentorship-form-goal-id option[value=" + goalId+"]").attr("selected","selected") ;
    });
    $("body").on("click", ".gb-add-mentorship-form-slide", function() {
        clearForm($("#gb-add-mentorship-form"));
        $(this).addClass("gb-backdrop-escapee");
        $(".gb-panel-form").hide();
        $("#gb-add-mentorship-form-container").html($("#gb-add-mentorship-form"));
        $(".gb-backdrop").show();
        $("#gb-add-mentorship-form-container").slideDown("slow");
      //  $("#add-skilllist-submit-skill").attr("gb-edit-btn", 0);
    });
    $("body").on("click", "#gb-add-mentorship-btn", function(e) {
        e.preventDefault();
        var data = $("#gb-add-mentorship-form").serialize();
        ajaxCall(addMentorshipUrl, data, addMentorship);
    });
    $("body").on("click", ".gb-request-mentorship-modal-trigger", function() {
        var $parent = $(this).closest(".gb-skill-to-learn");
        var goalTitle = $parent.find(".goal-title").text();
        $("#gb-request-mentorship-modal").modal("show");
        $("#gb-request-mentorship-goal-input").val(goalTitle);
        $("#gb-request-mentorship-btn").attr("goal-id", $parent.attr("goal-id"));
    });

    $("#gb-mentorship-edit-btn").click(function(e) {
        e.preventDefault();
        $("#gb-mentorship-description-edit-input").val(mentorshipDescription);
       // var $parent = $(this).closest(".mentorship-info-container");
        //$parent.find(".gb-content").hide();
       // $parent.find(".gb-footer").hide()
        //$parent.find(".gb-content-edit").show("slow");
        //$parent.find(".gb-footer-edit").show("slow")
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
function mentorshipRequestHandlers() {
    $("body").on("click", ".gb-mentorship-enroll-request-modal-trigger", function(e) {
        e.preventDefault();
        switch (parseInt($(this).attr("status"))) {
            case -1:
                var $parent = $(this).closest(".gb-commitment-post");
                var mentorshipTitle = $parent.find(".mentorship-title").text();
                $("#gb-request-mentorship-enroll-modal").modal("show");
                $("#gb-request-mentorship-enroll-input").val(mentorshipTitle);
                $("#gb-send-request-mentorship-enroll-btn").attr("mentorship-id", $parent.attr("mentorship-id"));
                break;
            case 0:
                break;
        }

    });
    $("body").on("click", ".gb-accept-enrollment-request-btn", function(e) {
        e.preventDefault();
        var menteeId = $(this).closest(".gb-person-badge").attr("mentee-id");
        // alert(menteeId)
        var data = {mentee_id: menteeId};
        ajaxCall(acceptMentorshipEnrollmentUrl, data, acceptMentorshipEnrollment);

    });
    $("#gb-send-request-mentorship-enroll-btn").click(function(e) {
        e.preventDefault();
        var mentorshipId = $(this).attr("mentorship-id");
        var message = $("#gb-request-message").val();
        var data = {mentorship_id: mentorshipId,
            message: message};
        ajaxCall(mentorshipEnrollRequestUrl, data, mentorshipEnrollRequest);
    });
}