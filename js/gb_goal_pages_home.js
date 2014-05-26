// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_management.js....");
    pagesActivityEventHandlers();
});
function pagesActivityEventHandlers() {

    $("#gb-start-writing-page-btn").click(function(e) {
        e.preventDefault();
        var subgoalNumber = $("#gb-goal-number-selector").val();
        var goalTitle = $("#gb-goal-input").val();
        var fullUrl = goalPagesFormUrl+"/goalTitle/"+goalTitle+"/subgoalNumber/"+subgoalNumber;
        window.location.href=fullUrl;
    });
}