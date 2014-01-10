// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_management.js....");

    monitorEventHandlers();
    skillActivityEventHandlers();
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
function addGoalCommitmentWebLink(data) {
    $("#gb-skill-management-web-links").prepend(data["web_link_row"]);
    $("#gb-add-weblink-modal").modal("hide");
}
function monitorEventHandlers() {
    $('#gb-skill-management-nav a').click(function(e) {
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
function skillActivityEventHandlers() {
    $("#gb-add-weblink-modal-trigger").click(function() {
        $("#gb-add-weblink-modal").modal("show");
        var skillId = $(this).attr("skill-id");
         $("input[name='GoalCommitmentWebLink[goal_commitment_id]']").val(skillId);
 
    });
    $("#add-weblink-submit-btn").click(function(e) {
        e.preventDefault();
       
        var data = $("#gb-skill-commitment-weblink-form").serialize();
        ajaxCall(addGoalCommitmentWebLinkUrl, data, addGoalCommitmentWebLink);
    });
}