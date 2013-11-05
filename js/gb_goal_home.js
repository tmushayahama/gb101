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
    $("#gb-goal-skill-container").prepend(data["new_skill_list_row"]);
    $("#gb-add-skilllist-modal").modal("hide");
}
function addPromiseList(data) {
    $("#gb-goal-promise-container").prepend(data["new_skill_list_row"]);
    $("#gb-add-promiselist-modal").modal("hide");
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
    $("#skill-level-slider").slider({
        range: "max",
        min: 1,
        max: 5,
        value: 1,
        slide: function(event, ui) {
            $("#skill-level-input").val(ui.value);
        }
    });
    $("#amount").val($("#slider-range-max").slider("value"));
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
    $("#gb-skill-form-next-btn").click(function() {
        $("#add-skill-list-form-steps li a").removeClass("gb-current-selected");

        if ($(this).attr('form-num') == 0) {
            $("#skill-define-form").slideUp(1);
            $("#skill-share-with-form").slideDown();
            $("#activate-share-skill-form").addClass("gb-current-selected");
            $("#gb-skill-form-back-btn").attr('form-num', 1);
            $("#gb-skill-form-next-btn").attr('form-num', 1);
        } else if ($(this).attr('form-num') == 1) {
            $("#skill-share-with-form").slideUp(1);
            $("#skill-choose-mentors-form").slideDown();
            $("#activate-mentorship-form").addClass("gb-current-selected");
            $("#gb-skill-form-back-btn").attr('form-num', 2);
            $("#gb-skill-form-next-btn").attr('form-num', 2);
        }
    });
    $("#gb-skill-form-back-btn").click(function() {
        $("#add-skill-list-form-steps li a").removeClass("gb-current-selected");
        if ($(this).attr('form-num') == 1) {
            $("#skill-share-with-form").slideUp(1);
            $("#skill-define-form").slideDown();
            $("#activate-define-skill-form").addClass("gb-current-selected");
            $("#gb-skill-form-back-btn").attr('form-num', 0);
            $("#gb-skill-form-next-btn").attr('form-num', 0);
        } else if ($(this).attr('form-num') == 2) {
            $("#skill-choose-mentors-form").slideUp(1);
            $("#skill-share-with-form").slideDown();
            $("#activate-share-skill-form").addClass("gb-current-selected");
            $("#gb-skill-form-back-btn").attr('form-num', 1);
            $("#gb-skill-form-next-btn").attr('form-num', 1);
        }
    });
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
    $("#gb-academic-form-back-btn").click(function() {
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