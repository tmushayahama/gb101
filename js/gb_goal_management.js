// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_goal_management.js....");

    monitorEventHandlers();
    goalActivityEventHandlers();
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
function dropDownHover() {
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
        // $(this).addClass('open');
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
        //$(this).removeClass('open');
    });
}
function addGoalCommitmentWebLink(data) {
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
         $("input[name='GoalCommitmentWebLink[goal_commitment_id]']").val(goalId);
 
    });
    $("#add-weblink-submit-btn").click(function(e) {
        e.preventDefault();
       
        var data = $("#gb-goal-commitment-weblink-form").serialize();
        ajaxCall(addGoalCommitmentWebLinkUrl, data, addGoalCommitmentWebLink);
    });
}