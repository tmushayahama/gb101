// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_advice_page_subskills.js....");

    advicePageEventHandlers();
});
function addAdvicePageSubskill(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-skill-list-form"), $("#gb-skill-list-form-error-display"), data);
    } else {
        $("#gb-advice-page-subskills").prepend(data["_skill_list_post_row"]);
        clearForm($("#gb-skill-list-form"));
    }
}
function advicePageEventHandlers() {
    $("body").on("click", "#gb-advice-page-subskill-btn", function(e) {
        e.preventDefault();
        var data = $("#gb-skill-list-form").serialize();
        if ($(this).attr('gb-edit-btn') == 0) {
            ajaxCall(addAdvicePageSubskillUrl, data, addAdvicePageSubskill);
        } else if ($(this).attr('gb-edit-btn') == 1) {
            var skillListId = $(this).closest(".gb-skill-gained").attr('skill-id');
            ajaxCall(editAdvicePageSubskillUrl + "/skillListId/" + skillListId, data, editSkillList);
        }
    });
}