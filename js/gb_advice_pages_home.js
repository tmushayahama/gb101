// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_page_home.js....");
    pagesActivityEventHandlers();
});
function addAdvicePageSpinner() {
    $("#gb-advice-page-skills-input").spinner({
        create: $("#gb-advice-page-skills-input").removeClass("ui-spinner-input"),
        spin: function(event, ui) {
            //$("#gb-advice-page-skills-input").removeClass("ui-spinner-input");
            if (ui.value > 10) {
                $(this).spinner("value", 2);
                return false;
            } else if (ui.value < 2) {
                $(this).spinner("value", 10);
                return false;
            }
        }
    });
    $("#gb-advice-page-skills-input").removeClass("ui-spinner-input");
    $("#gb-advice-page-skills-input").parent().removeClass("ui-widget-content");
    $("#gb-advice-page-skills-input").parent().removeClass("ui-corner-all");
    $("#gb-advice-page-skills-input").parent().css('margin-right', '10px');
    $("#gb-advice-page-skills-input").css('background-color', 'white');
    $("#gb-advice-page-skills-input").css('cursor', 'text');
}

function editAdvicePage(data) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#gb-advice-page-form"), $("#gb-advice-page-form-error-display"), data);
    } else {
        closePanelForm($("#gb-advice-page-form"));
        $(".gb-advice-page-title").text(data["title"]);
        $(".gb-advice-page-description").text(data["description"]);
    }
}
function pagesActivityEventHandlers() {
    $("body").on("click", ".gb-advice-modal-trigger", function() {
        $("#gb-advice-modal").modal({backdrop: 'static', keyboard: false});
        var $parent = $(this).closest(".gb-skill-gained");
        var title = $parent.find('.skill-title').text().trim();
        var description = $parent.find('.skill-description').text().trim();
        $("#gb-advice-page-form-title").val(title);
        $("#gb-advice-page-form-description").val(description);
    });
    $('.gb-advice-form-slide').click(function(e) {
        addAdvicePageSpinner();
    });
   
    $("body").on('click', '.gb-advice-form-cancel-btn', function(e) {
        e.preventDefault();
        clearForm($("#gb-advice-page-form"));

    });
    $("#edit-advice-page-btn").click(function(e) {
        e.preventDefault();
        var data = $("#gb-advice-page-form").serialize();
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
        var skillNumber = $("#gb-skill-number-selector").val();
        var skillTitle = $("#gb-skill-input").val();
        var fullUrl = advicePagesFormUrl + "/skillTitle/" + skillTitle + "/skillNumber/" + skillNumber;
        window.location.href = fullUrl;
    });
}