// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_mentorship_home.js....");
    $("textarea").each(function() {
        $(this).val($(this).val().trim());
    });
    mentorshipActivityEventHandlers();
});
function addMentorship(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-mentorship-form"), $("#gb-mentorship-form-error-display"), data);
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
function selectPerson(name, userId) {
    $(".gb-choose-person-name-display").show();
    $(".gb-choose-person-name").text(name);
    $("#gb-mentorship-form-person-chosen-id-input").val(userId);
}
function closeEdit($parent) {
    $parent.find(".gb-content-edit").hide();
    $parent.find(".gb-footer-edit").hide()
    $parent.find(".gb-content").show("slow");
    $parent.find(".gb-footer").show("slow");
}
function mentorshipActivityEventHandlers() {
    $("body").on("click", ".gb-mentorship-modal-trigger", function() {
        $("#gb-mentorship-modal").modal({backdrop: 'static', keyboard: false});
        var $parent = $(this).closest(".gb-skill-gained");
        var goalId = $parent.attr("goal-id");
        $("#gb-mentorship-form-goal-id option[value=" + goalId + "]").attr("selected", "selected");
    });
    $("body").on("click", ".gb-select-mentorship-type", function(e) {
        e.preventDefault();
        $(".gb-select-mentorship-type").removeClass("btn-success");
        $(".gb-select-mentorship-type").addClass("btn-link");
        $(this).removeClass("btn-link");
        $(this).addClass("btn-success");
        var type = $(this).attr("gb-mentorship-type");
        $("#gb-mentorship-form-type-input").val(type);
        if (type == 1) {
            $(".gb-choose-people").text("Choose Mentee");
        } else {
            $(".gb-choose-people").text("Choose Mentor");
        }
        $(".gb-choose-people-btn").show();
    });

    $("body").on("click", ".gb-select-person-btn", function(e) {
        e.preventDefault();
        $(".gb-select-person-btn").removeClass("btn-success");
        $(".gb-select-person-btn").addClass("btn-info");
        $(this).removeClass("btn-info");
        $(this).addClass("btn-success");
        var chosenName = $(this).closest(".gb-person-badge").find(".gb-person-name").text().trim();
        var userId = $(this).closest(".gb-person-badge").attr("person-id");
        selectPerson(chosenName, userId);
        $("#gb-choose-people-modal").modal("hide");
    });
    $("body").on("click", ".gb-choose-person-remove", function(e) {
        e.preventDefault();
        selectPerson("", null);
        $(".gb-choose-person-name-display").hide();
    });
    $("body").on("click", ".gb-choose-people-btn", function() {
        $("#gb-choose-people-modal").modal({backdrop: 'static', keyboard: false});
    });
    $("body").on("click", ".gb-mentorship-form-slide", function() {
        clearForm($("#gb-mentorship-form"));
        $(this).addClass("gb-backdrop-escapee");
        $(".gb-panel-form").hide();
        $("#gb-mentorship-form-container").html($("#gb-mentorship-form"));
        $(".gb-backdrop").show();
        $("#gb-mentorship-form-container").slideDown("slow");
        //  $("#skilllist-submit-skill").attr("gb-edit-btn", 0);
    });
    $("body").on("click", "#gb-mentorship-btn", function(e) {
        e.preventDefault();
        var data = $("#gb-mentorship-form").serialize();
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