// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_mentoring.js....");

    mentorshipActivityEventHandlers()
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
function activateTabs() {
    $('#gb-mentorship-nav a, #gb-mentorship-all-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
}
function mentorshipActivityEventHandlers() {

    $("#gb-start-mentorship-btn").click(function(e) {
        e.preventDefault();
        var mentoringLevel = $("#gb-mentoring-level-selector").val();
        var goalId = $("#gb-mentoring-goal-selector").find(":selected").attr("value");
        var fullUrl = goalMentorshipDetailUrl+"/mentoringLevel/"+mentoringLevel+"/goalId/"+goalId;
        window.location.href=fullUrl;
    });
}