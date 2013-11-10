// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_goal_home.js....");

    addPeopleEventHandlers();
    connectionTabEventHandlers();
    addSkillEventHandlers();
    addRecordGoalCommitmentEventHandlers();
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
function addSkillList(data) {
    $(".skill-row-num").each(function(e) {
        e.preventDefault;
        var value = parseInt($(this).text());
        value++;
        $(this).text(value);
    });
    $("#gb-goal-skill-container").prepend(data["new_skill_list_row"]);
    $("#gb-add-skilllist-modal").modal("hide");
}
function addPromiseList(data) {
    $("#gb-goal-promise-container").prepend(data["new_skill_list_row"]);
    $("#gb-add-promiselist-modal").modal("hide");
}
function recordSkillCommitment(data) {
    $("#gb-add-skill-modal").modal("hide");
    $("#goal-posts").prepend(data["new_goal_post"]);
}
function recordGoalCommitment(data) {
    $("#gb-add-commitment-modal").modal("hide");
    $("#goal-posts").prepend(data["new_goal_post"]);
}
function displayAddConnectionMemberForm(data) {
    $("#gb-add-connection-member-modal-content").prepend(data["add_connection_member_form"]);
    $("#UserConnection_userIdList input").each(function() {
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

function formSlideDown(stepListId, childFormId, prevBtn, nextBtn) {
  $(prevBtn).hide();
  $(prevBtn+"-disabled").show();
  $(nextBtn+"-disabled").hide();
    $(nextBtn).click(function() {
        $(prevBtn).show();
        $(prevBtn+"-disabled").hide();
        $(stepListId + " li a").removeClass("gb-current-selected");
        var formNum = parseInt($(this).attr('form-num'));
        var nextFormNum = formNum + 1;
        $(childFormId[formNum]).slideUp(1);
        $(childFormId[nextFormNum]).slideDown();
        console.log(childFormId[formNum]);
        $(stepListId + " li:nth-child(" + (nextFormNum + 1) + ") a").addClass("gb-current-selected");
        $(nextBtn).attr('form-num', nextFormNum);
        $(prevBtn).attr('form-num', nextFormNum);
        if (childFormId.length == nextFormNum + 1) {
            $(this).hide();
            $(nextBtn+"-disabled").show();
        }
    });
    $(prevBtn).click(function() {
        $(nextBtn).show();
        $(nextBtn+"-disabled").hide();
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
            $(prevBtn+"-disabled").show();
        }
    });
}

function addSkillEventHandlers() {
    $('#gb-goal-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    })
    $(".add-skill-model-trigger").click(function(e) {
        e.preventDefault();
        if ($(this).attr('type') == 1) {
            $("#gb-add-skilllist-modal").modal("show");
        } else if ($(this).attr('type') == 2) {
            $("#gb-add-promiselist-modal").modal("show");
        }
    });
    $(".gb-level-selection").click(function(e) {
        $("#skill-level-input").val($(this).attr('value'));
        $(".gb-level-selection").removeClass('gb-level-selection-active');
        $(this).addClass('gb-level-selection-active');
    });
    $("#add-skilllist-submit-goal").click(function(e) {
        e.preventDefault();
        var data = $("#goal-list").serialize();
        ajaxCall(addSkillListUrl, data, addSkillList);
    });
    $("#add-promiselist-submit-goal").click(function(e) {
        e.preventDefault();
        var data = $("#promise-list").serialize();
        ajaxCall(addPromiseListUrl, data, addPromiseList);
    });
    $("#gb-add-commitment-input").click(function(e) {
        e.preventDefault();
        $(this).val("");
        $("#gb-add-skill-modal").modal("show");

    });
    var skillListChildForm = [
        "#skill-define-form",
        "#skill-share-with-form",
        "#skill-choose-mentors-form"];
    var skillCommitmentChildForm = [
        "#academic-define-skill-form",
        "#academic-share-skill-form",
        "#academic-monitor-form"];
    formSlideDown("#add-skill-list-form-steps", skillListChildForm, "#gb-skill-form-back-btn",
            "#gb-skill-form-next-btn");
    formSlideDown("#commit-skill-form-steps", skillCommitmentChildForm, "#gb-academic-form-back-btn",
            "#gb-academic-form-next-btn");

    $("#gb-add-commitment-input").click(function(e) {
        e.preventDefault();
        $(this).val("");
        $("#gb-add-skill-modal").modal("show");

    });
    $("#academic").click(function() {
        $(".skill-entry-cover").slideUp("slow");
        $("#academic-skill-entry-form").slideDown();
        //$(this).slideUp();
        //$(this).parent().find(".skill-entry-form").slideDown();
    });
    $("#gb-academic-form-back-btn-disabled").click(function() {
        $("#academic-skill-entry-form").slideUp();
        $(".skill-entry-cover").slideDown("slow");
    })
    $('#skill-tab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
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
     $("#skill-commitment-submit-btn").click(function(e) {
        e.preventDefault();
        var data = $("#skill-academic-form").serialize();
        ajaxCall(recordSkillCommitmentUrl, data, recordSkillCommitment);
    });
    $("#goal-commitment-submit-btn").click(function(e) {
        e.preventDefault();
        var data = $("#goal-form").serialize();
        ajaxCall(recordGoalCommitmentUrl, data, recordGoalCommitment);
    });
}
function addPeopleEventHandlers() {
    $(".add-connection-member-btn").click(function() {
        var memberId = $(this).parent().find("a").attr("connection-member-id");
        var fullname = $(this).parent().find("a").text();
        var data = {new_connection_member_id: memberId};
        ajaxCall(displayAddConnectionMemberFormUrl, data, displayAddConnectionMemberForm);

        $("#gb-connection-member-modal-fullname").text(fullname);
        $("input[name='UserConnection[connection_member_id]']").val(memberId);
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