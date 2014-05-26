// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_goal_management.js....");
    monitorEventHandlers();
    goalActivityEventHandlers();
});
function addGoalWebLink(data) {
    $("#gb-goal-management-web-links").prepend(data["web_link_row"]);
    $("#gb-add-weblink-modal").modal("hide");
}
function monitorEventHandlers() {
    $('#gb-goal-management-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('.gb-monitor-dropdown-menu-btns').click(function(e) {
        e.preventDefault();
        $("#gb-monitor-dropdown-btn").text($(this).text());
    });
    $('.gb-mentorship-dropdown-menu-btns').click(function(e) {
        e.preventDefault();
        $("#gb-mentorship-dropdown-btn").text($(this).text());
    });
}
function goalActivityEventHandlers() {
    $("#gb-add-weblink-modal-trigger").click(function() {
        $("#gb-add-weblink-modal").modal("show");
        var goalId = $(this).attr("goal-id");
         $("input[name='GoalWebLink[goal_commitment_id]']").val(goalId);
 
    });
    $("#add-weblink-submit-btn").click(function(e) {
        e.preventDefault();
       
        var data = $("#gb-goal-weblink-form").serialize();
        ajaxCall(addGoalWebLinkUrl, data, addGoalWebLink);
    });
}