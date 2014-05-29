// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_advice_page_subgoals.js....");

    advicePageEventHandlers();
});
function addAdvicePageSubgoal(data) {
   if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-add-advice-page-subgoal-form"), $("#gb-add-advice-page-subgoal-form-error-display"), data);
    } else {
        $("#gb-advice-page-subgoals").append(data["_advice_page_subgoal_row"]);
    }
}
function advicePageEventHandlers() {
    $("#gb-add-advice-page-subgoal-btn").click(function(e) {
        e.preventDefault();
        var data = $("#gb-add-advice-page-subgoal-form").serialize();
        ajaxCall(addAdvicePageSubgoalUrl, data, addAdvicePageSubgoal);
    });
}