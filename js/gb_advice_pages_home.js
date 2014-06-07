// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_page_home.js....");
    pagesActivityEventHandlers();
});
function addAdvicePage(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-add-advice-page-form"), $("#gb-add-advice-page-form-error-display"), data);
    } else {
        window.location.href = advicePageDetailUrl + "/advicePageId/" + data["advicePageId"];
    }
}
function editAdvicePage(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-add-advice-page-form"), $("#gb-add-advice-page-form-error-display"), data);
    } else {
        closePanelForm($("#gb-add-advice-page-form"));
        $(".gb-advice-page-title").text(data["title"]);
        $(".gb-advice-page-description").text(data["description"]);
    }
}
function pagesActivityEventHandlers() {
    $("body").on("click", ".gb-add-advice-modal-trigger", function() {
        $("#gb-add-advice-modal").modal({backdrop: 'static', keyboard: false});
        var $parent = $(this).closest(".gb-skill-gained");
        var title = $parent.find('.goal-title').text().trim();
        var description = $parent.find('.goal-description').text().trim();
        $("#gb-add-advice-page-form-title").val(title);
        $("#gb-add-advice-page-form-description").val(description);
    });
    $('.gb-add-advice-form-slide').click(function(e) {
        clearForm($("#gb-add-advice-page-form"));
        $(".gb-panel-form").hide();
        $("#gb-add-advice-page-form-container").html($("#gb-add-advice-page-form"));
        $(".gb-backdrop").show();
        $("#gb-add-advice-page-form-container").slideDown("slow");
        $("#gb-add-advice-page-form").attr("gb-edit-btn", 0);
    });
    $("#gb-add-advice-page-btn").click(function(e) {
        e.preventDefault();
        var data = $("#gb-add-advice-page-form").serialize();
        ajaxCall(addAdvicePageUrl, data, addAdvicePage);
    });
    $("body").on('click', '.gb-add-advice-form-cancel-btn', function(e) {
        e.preventDefault();
        clearForm($("#gb-add-advice-page-form"));

    });
    $("#edit-advice-page-btn").click(function(e) {
        e.preventDefault();
        var data = $("#gb-add-advice-page-form").serialize();
        ajaxCall(editAdvicePageUrl, data, editAdvicePage);
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
        var fullUrl = advicePagesFormUrl + "/goalTitle/" + goalTitle + "/subgoalNumber/" + subgoalNumber;
        window.location.href = fullUrl;
    });
}