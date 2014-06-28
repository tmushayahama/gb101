// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````
$(document).ready(function(e) {
    console.log("Loading gb_goal_home.js....");
    activateFirstTab();
    listBankEventHandlers();
    addSkillEventHandlers();
});
function appendMoreSkill(data) {
    $("#gb-skillbank-search-result").append(data["_skill_bank_list"]);
    var nextPage = parseInt($("#gb-load-more-skillbank").attr("next-page"));
    $("#gb-load-more-skillbank").attr("next-page", nextPage + 1);
}
function mentorshipEnrollRequest(data) {
    $("#gb-request-mentorship-enroll-modal").modal("hide");
    $("#gb-request-confirmation-modal").modal("show");
    $("#gb-request-message").val("");
    var $enrollTriggerBtn = $(".gb-commitment-post[mentorship-id='" + data["mentorship_id"] + "']")
            .find(".gb-mentorship-enroll-request-modal-trigger");
    $enrollTriggerBtn.text("Pending Request");
    $enrollTriggerBtn.attr("status", 0);
}
function acceptMentorshipEnrollment(data) {
    $(".gb-person-badge[mentee-id='" + data["mentee_id"] + "']")
            .replaceWith(data["mentee_badge"]);
    $(data["mentee_badge_small"]).insertAfter("#home-activity-stats h5");
}
function activateFirstTab() {
    $("#gb-skill-activity-nav li:nth-child(2) a").click();
    $("#gb-goal-activity-nav li:nth-child(2) a").click();
}
function addSkillList(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-skill-list-form"), $("#gb-skill-list-form-error-display"), data);
    } else {
        $("#gb-home-posts").prepend(data["_skill_list_post_row"]);
        clearForm($("#gb-skill-list-form"));
        //junk
        $("#skill-posts").prepend(data["new_skill_post"]);
            $("#gb-no-skill-notice").remove();
        $("#gb-skill-list-accordion-level-" + data["skill_level_id"] + " .accordion-inner").prepend(data["new_skill_list_row"]);
        $("a[href='#gb-skill-list-accordion-level-" + data["skill_level_id"] + "']").click();
 }
}
function editSkillList(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-skill-list-form"), $("#gb-skill-list-form-error-display"), data);
    } else {
        $("#gb-skill-modal").find(".modal-body").html($("#gb-skill-list-form"));
        $(".gb-skill-gained[goal-id='" + data['goal_list_id'] + "']").replaceWith(data["_skill_list_post_row"]);
        clearForm($("#gb-skill-list-form"));
    }
}
function addSkillEventHandlers() {
    $("body").on('click', '.gb-bank-list-modal-trigger', function(e) {
        e.preventDefault();
        $("#gb-bank-list-modal").modal({backdrop: 'static', keyboard: false});
    });
    $('#gb-skill-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-home-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-skill-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-goal-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-skill-bank-nav a, #gb-skill-bank-modal-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $("body").on("click", ".gb-skill-bank-select-item", function(e) {
        $("#gb-bank-list-modal").modal("hide");
        var skillName = $(this).closest(".gb-skill-bank-item-row").find(".gb-skill-name").text();
        $(".gb-skill-bank-select-item").removeClass("btn-success");
        $(".gb-skill-bank-select-item").addClass("btn-primary");
        $(".gb-skill-bank-item-row").removeClass('gb-level-selection-active');
        $(this).closest(".gb-skill-bank-item-row").addClass('gb-level-selection-active');
        if ($(this).text() === "Select") {
            $(" .gb-skill-bank-select-item").text("Select");
            $(this).closest(".gb-skill-bank-item-row").addClass('gb-level-selection-active');
            $("#gb-skill-list-form-title-input").val(skillName);
            $(this).text("Selected");
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-success");
        } else {
            $(this).closest(".gb-skill-bank-item-row").removeClass('gb-level-selection-active');
            $("#gb-skill-list-form-title-input").val("");
            $(this).text("Select");
            $(this).removeClass("btn-success");
            $(this).addClass("btn-primary");
        }
    });
    $("body").on("click", "#skilllist-submit-skill", function(e) {
        e.preventDefault();
        var data = $("#gb-skill-list-form").serialize();
        if ($(this).attr('gb-edit-btn') == 0) {
            ajaxCall(addSkillListUrl, data, addSkillList);
        } else if ($(this).attr('gb-edit-btn') == 1) {
            var goalListId = $(this).closest(".gb-skill-gained").attr('goal-id');
            ajaxCall(editSkillListUrl + "/goalListId/" + goalListId, data, editSkillList);
        }
    });
    $('#skill-tab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
$("#skill_commitment_begin_date, #skill_commitment_end_date, #academic-begin-date, #academic-end-date").datepicker({
        changeMonth: true,
        changeYear: true,
        timeFormat: "HH:mm:ss",
        dateFormat: "yy-mm-dd"
    });
    $("body").on("click", ".gb-edit-skill-post", function(e) {
        e.preventDefault();
        clearForm($("#gb-skill-list-form"));
        var parent = $(this).closest(".gb-skill-gained");
        parent.find(".gb-panel-form").html($("#gb-skill-list-form"));
        var title = parent.find(".goal-title").text().trim();
        var description = parent.find(".goal-description").text().trim();
        var levelId = parent.find(".goal-level").attr("goal-level-id");
        $("#gb-skill-list-form-title-input").val(title);
        $("#gb-skill-list-form-description-input").val(description);
        $("#gb-skill-list-form-level-input option[value=" + levelId + "]").attr('selected', 'selected');
        $("#skilllist-submit-skill").attr("gb-edit-btn", 1);
        $("#gb-advice-page-subgoal-btn").attr("gb-edit-btn", 1);
    });
}
function listBankEventHandlers() {
    $("#gb-load-more-skillbank").click(function() {
        var data = {type: $(this).attr("type"),
            next_page: $(this).attr("next-page")};
        ajaxCall(appendMoreSkillUrl, data, appendMoreSkill);
    });
    $("body").on("click", ".gb-toggle-subskill", function(e) {
        e.preventDefault();
        var isCollapse = $(this).text() === "collapse";
        $(this).text(isCollapse ? "expand" : "collapse");
        $(this).closest(".gb-skill-bank-item-row").find(".gb-subskill").toggle("slow");
    });
}