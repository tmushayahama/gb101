// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_advice_page_subgoals.js....");

    advicePageEventHandlers();
});
function addAdvicePageSubgoal(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-skill-list-form"), $("#gb-skill-list-form-error-display"), data);
    } else {
        $("#gb-advice-page-subgoals").prepend(data["_skill_list_post_row"]);
        clearForm($("#gb-skill-list-form"));
    }
}
function advicePageEventHandlers() {
    $("body").on("click", "#gb-add-advice-page-subgoal-btn", function(e) {
        e.preventDefault();
        var data = $("#gb-skill-list-form").serialize();
        if ($(this).attr('gb-edit-btn') == 0) {
            ajaxCall(addAdvicePageSubgoalUrl, data, addAdvicePageSubgoal);
        } else if ($(this).attr('gb-edit-btn') == 1) {
            var goalListId = $(this).closest(".gb-skill-gained").attr('goal-id');
            ajaxCall(editAdvicePageSubgoalUrl + "/goalListId/" + goalListId, data, editSkillList);
        }
    });
}