// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_management.js....");
    pagesActivityEventHandlers();
});
function addAdvicePage(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-add-advice-page-form"), $("#gb-add-advice-page-form-error-display"), data);
    } else {
         window.location.href = advicePageDetailUrl + "/advicePageId/" + data["advicePageId"];
    }
}
function pagesActivityEventHandlers() {

    $("#gb-add-advice-page-btn").click(function(e) {
        e.preventDefault();
        var data = $("#gb-add-advice-page-form").serialize();
        ajaxCall(addAdvicePageUrl, data, addAdvicePage);
    });
    
    $('.gb-update-mentorship-cancel-btn').click(function(e) {
        e.preventDefault();
        $("#gb-edit-mentorship-form").hide("fast");
        $("#gb-edit-mentorship-form").prev().show("slow");
        $("#gb-edit-mentorship-form").closest(".panel").find(".panel-footer").show("fast");
    });

    $("#gb-start-writing-page-btn").click(function(e) {
        e.preventDefault();
        var subgoalNumber = $("#gb-goal-number-selector").val();
        var goalTitle = $("#gb-goal-input").val();
        var fullUrl = goalPagesFormUrl + "/goalTitle/" + goalTitle + "/subgoalNumber/" + subgoalNumber;
        window.location.href = fullUrl;
    });
}