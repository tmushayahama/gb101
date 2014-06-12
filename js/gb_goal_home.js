// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````
var skillListChildForm = [
    "#skill-define-form",
    "#skill-share-with-form"];
var skillCommitmentChildForm = [
    "#academic-skill-bank-form",
    "#academic-define-skill-form",
    "#academic-share-skill-form"];
$(document).ready(function(e) {
    console.log("Loading gb_goal_home.js....");
    activateFirstTab();
    skillAccordion();
    dropDownHover();
    listBankEventHandlers();
    addSkillEventHandlers();
    addPeopleEventHandlers();
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
function skillAccordion() {
    $("#gb-skill-list-accordion div:first-child .accordion-body").addClass("in");
}
function activateFirstTab() {
    $("#gb-skill-activity-nav li:nth-child(2) a").click();
    $("#gb-goal-activity-nav li:nth-child(2) a").click();
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
function recordSkillCommitment(data) {
    $("#gb-skill-modal").modal("hide");
    $("#skill-posts").prepend(data["new_skill_post"]);
    resetSkillCommitModal("#gb-skill-modal",
            "#commit-skill-form-steps",
            skillCommitmentChildForm,
            "#gb-academic-form-back-btn",
            "#gb-academic-form-next-btn");
}
function displayAddConnectionMemberForm(data) {
//$("#gb-connection-member-modal-content").prepend(data["add_connection_member_form"]);
    $("#ConnectionMember_userIdList input").each(function() {
        for (var i = 0; i < data["memberExistInConnection"].length; i++) {
            if ($(this).attr("value") == data["memberExistInConnection"][i]) {
                $(this).attr("name", "")
                        .attr("checked", true)
                        .attr("disabled", true);
            }
        }
    });
    $("#gb-connection-member-modal").modal("show");
}
function sendConnectionMemberRequest(data) {
    $("#gb-connection-member-modal").modal("hide");
    $("#gb-request-confirmation-modal").modal("show");
}
function mentorshipRequest(data) {
    $("#gb-request-mentorship-modal").modal("hide");
    $("#gb-request-message").val("");
}
function sendMonitorRequest(data) {
    $("#gb-request-monitors-modal").modal("hide");
    $("#gb-request-mentorship-modal").modal("hide");
    $("#gb-request-confirmation-modal").modal("show");
}
function acceptRequest(data) {
    $(".modal").modal("hide");
    $("#gb-accept-request-modal").modal("show");
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
    /* $(window).scroll(function() {
     if ($(window).scrollTop() >= $(document).height() - $(window).height() - 10) {
     var data = {next_page: $(this).attr("next-page")};
     ajaxCall(appendMoreSkillUrl, data, appendMoreSkill);
     }
     });*/
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
function mentorshipActivityEventHandlers() {
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
function connectionTabEventHandlers() {
//$("#toolbar-connection-"+activeConnectionId).addClass("active");
//$(".connection-name").text($("#toolbar-connection-"+activeConnectionId).text())
    $("#gb-create-connection-btn").click(function() {
        $("#gb-create-connection-modal").modal("show");
    });
    $("#gb-view-connection-btn").click(function() {
        $("#gb-view-connection-member-modal").modal("show");
    });
}
function addRecordSkillCommitmentEventHandlers() {
    $("#skill_commitment_begin_date, #skill_commitment_end_date, #academic-begin-date, #academic-end-date").datepicker({
        changeMonth: true,
        changeYear: true,
        timeFormat: "HH:mm:ss",
        dateFormat: "yy-mm-dd"
    });
    $("#skill-commitment-submit-btn").click(function(e) {
        e.preventDefault();
        var data = $("#skill-academic-form").serialize();
        ajaxCall(recordSkillCommitmentUrl, data, recordSkillCommitment);
    });
}
function mentorshipRequestEventHandlers() {
    $("body").on("click", ".gb-start-mentoring-modal-trigger", function() {
        $("#gb-start-mentoring-modal").modal("show");
        var $parent = $(this).closest(".gb-skill-gained");
        $("#gb-start-mentorship-btn").attr("goal-id", $parent.attr("goal-id"));
        var goalTitle = $parent.find(".goal-title").text();
        $("#gb-start-mentoring-skill-name-input").val(goalTitle);
    });
    $("body").on("click", ".gb-request-mentorship-modal-trigger", function() {
        var $parent = $(this).closest(".gb-skill-to-learn");
        var goalTitle = $parent.find(".goal-title").text();
        $("#gb-request-mentorship-modal").modal("show");
        $("#gb-request-mentorship-goal-input").val(goalTitle);
        $("#gb-request-mentorship-btn").attr("goal-id", $parent.attr("goal-id"));
    });
    $("body").on("click", ".gb-request-menteeship-modal-trigger", function() {
        $("#gb-request-menteeship-modal").modal("show");
        $("#send-menteeship-request-btn").attr("skill-id", $(this).attr("skill-id"));
    });
    $("#gb-request-mentorship-btn").click(function() {
        var goalId = $(this).attr("goal-id");
        //alert(goalId);
        var message = $("#gb-request-message").val();
        var data = {goal_id: goalId,
            message: message};
        ajaxCall(mentorshipRequestUrl, data, mentorshipRequest);
    });
    $("#send-menteeship-request-btn").click(function(e) {
        e.preventDefault();
        console.log("me clicked");
        var fullUrl = sendMenteeshipRequestUrl + "/skillId/" + $(this).attr("skill-id");
        var data = $("#skill-menteeship-request-form").serialize();
        ajaxCall(fullUrl, data, sendMonitorRequest);
    });
    $("body").on("click", ".gb-accept-mentorship-request-btn", function() {
        var data = {request_notification_id: $(this).attr('request-notificaction-id')};
        ajaxCall(acceptRequestUrl, data, acceptRequest);
    });
    $("body").on("click", ".gb-accept-menteeship-request-btn", function() {
        var data = {request_notification_id: $(this).attr('request-notificaction-id')};
        ajaxCall(acceptRequestUrl, data, acceptRequest);
    });
}
function monitorRequestEventHandlers() {
    $("body").on("click", ".gb-request-monitors-modal-trigger", function() {
        $("#gb-request-monitors-modal").modal("show");
        $("#send-monitor-request-btn").attr("skill-id", $(this).attr("skill-id"));
    });
    $("#send-monitor-request-btn").click(function() {
        var fullUrl = sendMonitorRequestUrl + "/skillId/" + $(this).attr("skill-id");
        var data = $("#skill-monitor-request-form").serialize();
        ajaxCall(fullUrl, data, sendMonitorRequest);
    });
    $("body").on("click", ".gb-accept-request-btn", function() {
        var data = {request_notification_id: $(this).attr('request-notificaction-id')};
        ajaxCall(acceptRequestUrl, data, acceptRequest);
    });
}
function addPeopleEventHandlers() {
    $(".connection-member-btn").click(function() {
        var memberId = $(this).parent().find("a").attr("connection-member-id");
        var fullname = $(this).parent().find("a").text();
        var data = {new_connection_member_id: memberId};
        ajaxCall(displayAddConnectionMemberFormUrl, data, displayAddConnectionMemberForm);
        $("#connection-member-request-btn").attr("user-id", $(this).attr("user-id"));
        $("#gb-connection-member-modal-fullname").text(fullname);
        $("input[name='ConnectionMember[connection_member_id]']").val(memberId);
    });
    $("#connection-member-request-btn").click(function() {
        var fullUrl = sendConnectionMemberRequestUrl + "/userId/" + $(this).attr("user-id");
        var data = $("#connection-form").serialize();
        ajaxCall(fullUrl, data, sendConnectionMemberRequest);
    });
}
/*function populateRecentCommitments() {
 for(var i=0; i<skills.length; i++) {
 addPost("#gb-recent-posts-home", true, skills[i]["task_name"], "Tremayne Mushayahama", "tmtrigga@gmail.com");
 }
 }
 function populateSuggestedFriends() {
 for(var i=0; i<suggestedFriends.length; i++) {
 addSuggestedFriend("#gb-suggested-friends", suggestedFriends[i]["username"], suggestedFriends[i]["first_name"], suggestedFriends[i]["last_name"]);
 }
 }
 function populateSkills () {
 for(var i=0; i<skills.length; i++) {
 $("#rm-skills-home")
 .append($("<li/>")
 .append($("<a/>")
 .text(skills[i]["task_name"])));
 }
 }
 function populateFriends () {
 for(var i=0; i<friends.length; i++) {
 $("#rm-friends-selector-home")
 .append($("<label/>")
 .addClass("checkbox")
 .text(friends[i]["first_name"] + " " + friends[i]["last_name"])
 .append($("<input/>")
 
 .attr("type", "checkbox")));
 }
 }
 function skillCommit(e) {
 e.preventDefault();
 $.post("commit/", $('#rm-commit-form').serialize(), function(data) {
 console.log(data);
 console.log(data["commitment"]);
 console.log(data["taskee_name"])
 addPost("#gb-recent-posts-home", false,  data["commitment"], data["taskee_name"], "tmtrigga@gmail.com");
 $("#rm-skills-home")
 .prepend($("<li/>")
 .append($("<a/>")
 .text(data["commitment"])));
 }, "json");
 }
 function addEventHandlers() {
 $('#rm-post-tab a').click(function (e) {
 console.log("tab clicked");
 e.preventDefault();
 $(this).tab('show');
 });
 $('.rm-stop-propagation').click(function (e) {
 e.stopPropagation();
 });
 $( "#rm-post-start-dp" ).datepicker({
 changeMonth: true,
 changeYear: true
 });
 $( "#rm-post-end-dp" ).datepicker({
 changeMonth: true,
 changeYear: true
 });
 $("#rm-commit-post-home").click(function(e) {
 skillCommit(e);
 });
 }
 */