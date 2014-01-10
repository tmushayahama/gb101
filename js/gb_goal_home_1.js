// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````
var goalListChildForm = [
    "#gb-goal-list-bank-form",
    "#goal-define-form",
    "#goal-share-with-form"];
var goalCommitmentChildForm = [
    "#academic-goal-bank-form",
    "#academic-define-goal-form",
    "#academic-share-goal-form"];

$(document).ready(function(e) {
    console.log("Loading gb_goal_home.js....");

    //populateGoalsEventHandlers();
    activateFirstTab();
    goalAccordion();
    dropDownHover();
    listBankEventHandlers();
    mentorshipRequestEventHandlers();
    monitorRequestEventHandlers();
    connectionTabEventHandlers();
    addGoalEventHandlers();
    addRecordGoalCommitmentEventHandlers();
    addPeopleEventHandlers();
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
function goalAccordion() {
    $("#gb-goal-list-accordion div:first-child .accordion-body").addClass("in");
}
function activateFirstTab() {
    $("#gb-goal-activity-nav li:nth-child(2) a").click();
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
function populateGoalList(data) {

}
function addGoalList(data) {
    $(".goal-row-num").each(function(e) {
        e.preventDefault;
        var value = parseInt($(this).text());
        value++;
        $(this).text(value);
    });
    if ($("#gb-no-goal-notice").length > 0) {
        $("#gb-no-goal-notice").remove();
    }
    //alert(data["goal_level_id"])
    $("#gb-goal-list-accordion-level-"+data["goal_level_id"]+ " .accordion-inner").prepend(data["new_goal_list_row"]);
    $("a[href='#gb-goal-list-accordion-level-"+data["goal_level_id"]+"']").click();
   
    $("#gb-add-goallist-modal").modal("hide");
    resetGoalListModal("#gb-add-goallist-modal",
            "#add-goal-list-form-steps",
            goalListChildForm,
            "#gb-goal-form-back-btn",
            "#gb-goal-form-next-btn");
            $("#gb-add-goallist-modal").modal("hide");
}
function addPromiseList(data) {
    $("#gb-goal-promise-container").prepend(data["new_goal_list_row"]);
    $("#gb-add-promiselist-modal").modal("hide");
}
function recordGoalCommitment(data) {
    $("#gb-add-goal-modal").modal("hide");
    $("#goal-posts").prepend(data["new_goal_post"]);
    resetGoalCommitModal("#gb-add-goal-modal",
            "#commit-goal-form-steps",
            goalCommitmentChildForm,
            "#gb-academic-form-back-btn",
            "#gb-academic-form-next-btn");
}
function displayAddConnectionMemberForm(data) {
    //$("#gb-add-connection-member-modal-content").prepend(data["add_connection_member_form"]);
    $("#ConnectionMember_userIdList input").each(function() {
        for (var i = 0; i < data["memberExistInConnection"].length; i++) {
            if ($(this).attr("value") == data["memberExistInConnection"][i]) {
                $(this).attr("name", "")
                        .attr("checked", true)
                        .attr("disabled", true);
            }
        }
    });
    $("#gb-add-connection-member-modal").modal("show");
}
function sendConnectionMemberRequest(data) {
    $("#gb-add-connection-member-modal").modal("hide");
    $("#gb-request-confirmation-modal").modal("show");
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
function resetModalData(parentId) {
    $(parentId).find("input, textarea").not("input[type='submit']").val("");
    $(parentId).find("input[type='checkbox']").attr("checked", false);
}
function resetGoalListModal(parentId, stepListId, childFormId, prevBtn, nextBtn) {
    resetModalData(parentId);
    $(prevBtn).hide();
    $(prevBtn + "-disabled").show();
    $(nextBtn + "-disabled").hide();
    $(nextBtn).show();
    $(stepListId + " li a").removeClass("gb-current-selected");
    for (var i = 1; i < childFormId.length; i++) {
        $(childFormId[i]).hide();
    }
    $(childFormId[0]).show();
    $(stepListId + " li:nth-child(" + (1) + ") a").addClass("gb-current-selected");
    $(nextBtn).attr('form-num', 0);
    $(prevBtn).attr('form-num', 0);

    $(".gb-goal-bank-select-item").text("Select");
    $(".gb-goal-bank-select-item").removeClass("gb-btn-green-1");
    $(".gb-goal-bank-item-row").removeClass('gb-level-selection-active');

    $(".gb-level-selection").removeClass('gb-level-selection-active');

}
function resetGoalCommitModal(parentId, stepListId, childFormId, prevBtn, nextBtn) {
    resetModalData(parentId);
    $(prevBtn).hide();
    $(prevBtn + "-disabled").show();
    $(nextBtn + "-disabled").hide();
    $(nextBtn).show();
    $(stepListId + " li a").removeClass("gb-current-selected");
    for (var i = 1; i < childFormId.length; i++) {
        $(childFormId[i]).hide();
    }
    $(childFormId[0]).show();
    $("#gb-goal-type-forms-container").show();
    $("#academic-goal-entry-form").hide();
    $(stepListId + " li:nth-child(" + (1) + ") a").addClass("gb-current-selected");
    $(nextBtn).attr('form-num', 0);
    $(prevBtn).attr('form-num', 0);

    $(".gb-goal-bank-select-item").text("Select");
    $(".gb-goal-bank-select-item").removeClass("gb-btn-green-1");
    $(".gb-goal-bank-item-row").removeClass('gb-level-selection-active');

    $(".gb-level-selection").removeClass('gb-level-selection-active');

}


function formSlideDown(stepListId, childFormId, prevBtn, nextBtn) {
    $(prevBtn).hide();
    $(prevBtn + "-disabled").show();
    $(nextBtn + "-disabled").hide();
    $(nextBtn).click(function() {
        $(prevBtn).show();
        $(prevBtn + "-disabled").hide();
        $(stepListId + " li a").removeClass("gb-current-selected");
        var formNum = parseInt($(this).attr('form-num'));
        var nextFormNum = formNum + 1;
        $(childFormId[formNum]).slideUp(1);
        $(childFormId[nextFormNum]).slideDown();
        $(stepListId + " li:nth-child(" + (nextFormNum + 1) + ") a").addClass("gb-current-selected");
        $(nextBtn).attr('form-num', nextFormNum);
        $(prevBtn).attr('form-num', nextFormNum);
        if (childFormId.length == nextFormNum + 1) {
            $(this).hide();
            $(nextBtn + "-disabled").show();
        }
    });
    $(prevBtn).click(function() {
        $(nextBtn).show();
        $(nextBtn + "-disabled").hide();
        $(stepListId + " li a").removeClass("gb-current-selected");
        var formNum = parseInt($(this).attr('form-num'));
        var prevFormNum = formNum - 1;
        $(childFormId[formNum]).slideUp(1);
        $(childFormId[prevFormNum]).slideDown();
        console.log(childFormId[formNum]);
        $(stepListId + " li:nth-child(" + (prevFormNum + 1) + ") a").addClass("gb-current-selected");
        $(nextBtn).attr('form-num', prevFormNum);
        $(prevBtn).attr('form-num', prevFormNum);
        if (prevFormNum == 0) {
            $(this).hide();
            $(prevBtn + "-disabled").show();
        }
    });
}


function populateGoalsEventHandlers() {
    $("#gb-goal-list-gained-pane").click(function() {
        var data = {type: 1}
        ajaxCall(populateGoalListUrl, data, populateGoalList);
    });
}
function addGoalEventHandlers() {
    $('.gb-list-trigger').click(function(e) {
        e.preventDefault();
        $("#gb-list-modal").modal('show');
    });
    $('.goallist-modal-close-btn').click(function(e) {
        e.preventDefault();
        resetGoalListModal("#" + $(this).closest(".modal").attr("id"),
                "#add-goal-list-form-steps",
                goalListChildForm,
                "#gb-goal-form-back-btn",
                "#gb-goal-form-next-btn");
    });
    $('.goal-commit-modal-close-btn').click(function(e) {
        e.preventDefault();
        resetGoalCommitModal("#gb-add-goal-modal",
                "#commit-goal-form-steps",
                goalCommitmentChildForm,
                "#gb-academic-form-back-btn",
                "#gb-academic-form-next-btn");
    });
    $('#gb-goal-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-goal-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-goal-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-goal-bank-nav a, #gb-goal-bank-modal-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $(".add-goal-modal-trigger").click(function(e) {
        e.preventDefault();
        if ($(this).attr('type') == 1) {
            $("#gb-add-goallist-modal").modal(
                    {backdrop: 'static', keyboard: false});
        } else if ($(this).attr('type') == 2) {
            $("#gb-add-promiselist-modal").modal("show");
        }
    });
    $(".add-goal-modal-trigger").click(function(e) {
        e.preventDefault();
        if ($(this).attr('type') == 1) {
            $("#gb-add-goallist-modal").modal(
                    {backdrop: 'static', keyboard: false});
        } else if ($(this).attr('type') == 2) {
            $("#gb-add-promiselist-modal").modal("show");
        }
    });

    $("#gb-add-goal-modal .gb-goal-bank-select-item").click(function(e) {
        var goalName = $(this).closest(".gb-goal-bank-item-row").find(".gb-goal-name").text();
        $("#gb-add-goal-modal .gb-goal-bank-select-item").removeClass("gb-btn-green-1");
        $("#gb-add-goal-modal .gb-goal-bank-item-row").removeClass('gb-level-selection-active');
        if ($(this).text() === "Select") {
            $("#gb-add-goal-modal .gb-goal-bank-select-item").text("Select");
            $(this).closest(".gb-goal-bank-item-row").addClass('gb-level-selection-active');
            $("#gb-add-goal-title-input").val(goalName);
            $(this).text("Selected");
            $(this).addClass("gb-btn-green-1");
        } else {
            $(this).closest(".gb-goal-bank-item-row").removeClass('gb-level-selection-active');
            $("#gb-add-goal-title-input").val("");
            $(this).text("Select");
            $(this).removeClass("gb-btn-green-1");
        }
        //$(this).attr("enabled", Selected");
    });
    $("#gb-add-goallist-modal .gb-goal-bank-select-item").click(function(e) {
        var goalName = $(this).closest(".gb-goal-bank-item-row").find(".gb-goal-name").text();
        $("#gb-add-goallist-modal .gb-goal-bank-select-item").removeClass("gb-btn-green-1");
        $("#gb-add-goallist-modal .gb-goal-bank-item-row").removeClass('gb-level-selection-active');
        $(this).closest(".gb-goal-bank-item-row").addClass('gb-level-selection-active');
        if ($(this).text() === "Select") {
            $("#gb-add-goallist-modal .gb-goal-bank-select-item").text("Select");
            $(this).closest(".gb-goal-bank-item-row").addClass('gb-level-selection-active');
            $("#gb-goalist-title-input").val(goalName);
            $(this).text("Selected");
            $(this).addClass("gb-btn-green-1");
        } else {
            $(this).closest(".gb-goal-bank-item-row").removeClass('gb-level-selection-active');
            $("#gb-goalist-title-input").val("");
            $(this).text("Select");
            $(this).removeClass("gb-btn-green-1");
        }
    });
    $(".gb-level-selection").click(function(e) {
        $("#goal-level-input").val($(this).attr('value'));
        $(".gb-level-selection").removeClass('gb-level-selection-active');
        $(this).addClass('gb-level-selection-active');
    });
    $("#add-goallist-submit-goal").click(function(e) {
        e.preventDefault();
        var data = $("#goal-list").serialize();
        ajaxCall(addGoalListUrl, data, addGoalList);
    });
    $("#add-promiselist-submit-goal").click(function(e) {
        e.preventDefault();
        var data = $("#promise-list").serialize();
        ajaxCall(addPromiseListUrl, data, addPromiseList);
    });
    $("#gb-add-commitment-input").click(function(e) {
        e.preventDefault();
        $(this).val("");
        $("#gb-add-goal-modal").modal("show");

    });

    formSlideDown("#add-goal-list-form-steps", goalListChildForm, "#gb-goal-form-back-btn",
            "#gb-goal-form-next-btn");
    formSlideDown("#commit-goal-form-steps", goalCommitmentChildForm, "#gb-academic-form-back-btn",
            "#gb-academic-form-next-btn");

    $("#gb-add-commitment-input").click(function(e) {
        e.preventDefault();
        $(this).val("");
        var connectionId = $(this).attr("connection-id");
        $("#GoalCommitmentShare_connectionIdList input[value=" + connectionId + "]")
                .attr("checked", true);
        $("#gb-add-goal-modal").modal("show");

    });
    $("#academic").click(function() {
        $("#gb-goal-type-forms-container").fadeOut(700);
        $("#academic-goal-entry-form").fadeIn(300);
        //$(this).slideUp();
        //$(this).parent().find(".goal-entry-form").slideDown();
    });
    $("#gb-academic-form-back-btn-disabled").click(function() {
        $("#academic-goal-entry-form").fadeOut(600);
        $("#gb-goal-type-forms-container").fadeIn(300);
    })
    $('#goal-tab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

}
function listBankEventHandlers() {
    $("body").on("click", ".gb-toggle-subgoal", function(e) {
        e.preventDefault();
        var isCollapse = $(this).text() === "collapse";
        $(this).text(isCollapse ? "expand" : "collapse");
        $(this).closest(".gb-goal-bank-item-row").find(".gb-subgoal").toggle("slow");
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
function addRecordGoalCommitmentEventHandlers() {
    $("#goal_commitment_begin_date, #goal_commitment_end_date, #academic-begin-date, #academic-end-date").datepicker({
        changeMonth: true,
        changeYear: true,
        timeFormat: "HH:mm:ss",
        dateFormat: "yy-mm-dd"
    });
    $("#goal-commitment-submit-btn").click(function(e) {
        e.preventDefault();
        var data = $("#goal-academic-form").serialize();
        ajaxCall(recordGoalCommitmentUrl, data, recordGoalCommitment);
    });
}
function mentorshipRequestEventHandlers() {
    $("body").on("click", ".gb-request-mentorship-modal-trigger", function() {
        $("#gb-request-mentorship-modal").modal("show");
        $("#send-mentorship-request-btn").attr("goal-id", $(this).attr("goal-id"));
    });
    $("body").on("click", ".gb-request-menteeship-modal-trigger", function() {
        $("#gb-request-menteeship-modal").modal("show");
        $("#send-menteeship-request-btn").attr("goal-id", $(this).attr("goal-id"));

    });

    $("#send-mentorship-request-btn").click(function() {
        var fullUrl = sendMentorshipRequestUrl + "/goalId/" + $(this).attr("goal-id");
        var data = $("#goal-mentorship-request-form").serialize();
        ajaxCall(fullUrl, data, sendMonitorRequest);
    });
    $("#send-menteeship-request-btn").click(function(e) {
        e.preventDefault();
        console.log("me clicked");
        var fullUrl = sendMenteeshipRequestUrl + "/goalId/" + $(this).attr("goal-id");
        var data = $("#goal-menteeship-request-form").serialize();
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
        $("#send-monitor-request-btn").attr("goal-id", $(this).attr("goal-id"));
    });

    $("#send-monitor-request-btn").click(function() {
        var fullUrl = sendMonitorRequestUrl + "/goalId/" + $(this).attr("goal-id");
        var data = $("#goal-monitor-request-form").serialize();
        ajaxCall(fullUrl, data, sendMonitorRequest);
    });
    $("body").on("click", ".gb-accept-request-btn", function() {
        var data = {request_notification_id: $(this).attr('request-notificaction-id')};
        ajaxCall(acceptRequestUrl, data, acceptRequest);
    });
}
function addPeopleEventHandlers() {
    $(".add-connection-member-btn").click(function() {
        var memberId = $(this).parent().find("a").attr("connection-member-id");
        var fullname = $(this).parent().find("a").text();
        var data = {new_connection_member_id: memberId};
        ajaxCall(displayAddConnectionMemberFormUrl, data, displayAddConnectionMemberForm);
        $("#add-connection-member-request-btn").attr("user-id", $(this).attr("user-id"));

        $("#gb-connection-member-modal-fullname").text(fullname);
        $("input[name='ConnectionMember[connection_member_id]']").val(memberId);
    });
    $("#add-connection-member-request-btn").click(function() {
        var fullUrl = sendConnectionMemberRequestUrl + "/userId/" + $(this).attr("user-id");
        var data = $("#add-connection-form").serialize();
        ajaxCall(fullUrl, data, sendConnectionMemberRequest);
    });
}
/*function populateRecentCommitments() {
 for(var i=0; i<goals.length; i++) {
 addPost("#gb-recent-posts-home", true, goals[i]["task_name"], "Tremayne Mushayahama", "tmtrigga@gmail.com");
 }
 }
 function populateSuggestedFriends() {
 for(var i=0; i<suggestedFriends.length; i++) {
 addSuggestedFriend("#gb-suggested-friends", suggestedFriends[i]["username"], suggestedFriends[i]["first_name"], suggestedFriends[i]["last_name"]);
 }
 }
 function populateGoals () {
 for(var i=0; i<goals.length; i++) {
 $("#rm-goals-home")
 .append($("<li/>")
 .append($("<a/>")
 .text(goals[i]["task_name"])));
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
 function goalCommit(e) {
 e.preventDefault();
 $.post("commit/", $('#rm-commit-form').serialize(), function(data) {
 console.log(data);
 console.log(data["commitment"]);
 console.log(data["taskee_name"])
 addPost("#gb-recent-posts-home", false,  data["commitment"], data["taskee_name"], "tmtrigga@gmail.com");
 $("#rm-goals-home")
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
 goalCommit(e);
 });
 }
 */