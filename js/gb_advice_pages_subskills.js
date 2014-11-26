// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_advice_page_skills.js....");

    advicePageEventHandlers();
});
function addAdvicePageSubskill(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-skill-form"), $("#gb-skill-form-error-display"), data);
    } else {
        $("#gb-advice-page-skills").prepend(data["_skill_post_row"]);
        clearForm($("#gb-skill-form"));
    }
}
function advicePageEventHandlers() {
    $("body").on("click", "#gb-advice-page-skill-btn", function(e) {
        e.preventDefault();
        var data = $("#gb-skill-form").serialize();
        if ($(this).attr('gb-edit-btn') == 0) {
            ajaxCall(addAdvicePageSubskillUrl, data, addAdvicePageSubskill);
        } else if ($(this).attr('gb-edit-btn') == 1) {
            var skillId = $(this).closest(".gb-skill-gained").attr('skill-id');
            ajaxCall(editAdvicePageSubskillUrl + "/skillId/" + skillId, data, editSkill);
        }
    });
}