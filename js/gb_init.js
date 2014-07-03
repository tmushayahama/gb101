// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````
var ACTION_NORMAL = 1;
var ACTION_EDIT = 2;
var ACTION_REDIRECTS = 3;

var shareWith = [
    "gb-skill-share-with",
    "gb-mentorship-share-with",
    "gb-page-share-with",
    "gb-select-mentorship-person"
];
var privacyText = [
    "Private",
    "Public",
    "Customize"
];
var deleteTarget = [
    "skill",
    "mentorship",
    "page"
];
var forms = [
    "gb-skill-list-form",
    "gb-mentorship-form",
    "gb-advice-page-form"
]
var FORM_SUBMIT_URLS = [
    addSkillListUrl,
    addMentorshipUrl,
    addAdvicePageUrl
];
var FORM_EDIT_URLS = [
    editSkillListUrl,
    editMentorshipUrl,
    editAdvicePageUrl
]

$(document).ready(function(e) {
    console.log("Loading gb_init.js....");
    dropDownHover();
    slideDownForm();
    slideUpForm();
    selectPersonHandler();
    deleteHandlers();
    $(".gb-nav-collapse-toggle").click(function(e) {
        $(".gb-nav-collapse").css("display", "visible!important");
        $(".gb-nav-collapse").toggle("slow");
    });
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
function submitFormSuccess(data, formIndex, action) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($("#" + forms[formIndex]), $("#" + forms[formIndex] + "-error-display"), data);
    } else {
        switch (action) {
            case ACTION_NORMAL:
                $("#gb-posts").prepend(data["_skill_list_post_row"]);
                $(".gb-list-preview[gb-level-id=" + data["skill_level_id"] + "]").find(".panel-body").prepend(data["_skill_preview_list_row"]);
                $("#gb-no-skill-notice").remove();
                clearForm($("#" + forms[formIndex]));
                break;
            case ACTION_EDIT:
                $("#gb-skill-modal").find(".modal-body").html($("#gb-skill-list-form"));
                $(".gb-skill-gained[goal-id='" + data['goal_list_id'] + "']").replaceWith(data["_skill_list_post_row"]);
                clearForm($("#" + forms[formIndex]));
                break;
            case ACTION_REDIRECTS:
                window.location.href = data["redirect_url"];
                break;
        }
    }
}
function deleteMeSuccess(data) {
    $(".gb-post-entry[gb-data-source=" + data["data_source"] + "][gb-source-pk-id=" + data["source_pk_id"] + "]").remove();
    $("#gb-delete-confirmation-modal").modal("hide");
}
function putFormErrors(form, errorDisplay, data) {
    errorBox = form.find(".gb-error-box");
    form.find(".errorMessage").hide();
    errorBox.fadeIn("slow");
    errorDisplay.empty();
    var count = 0;
    $.each(data, function(key, value) {
        if (count === 0) {
            var id = JSON.stringify("#" + key + "_em_").toString();
            id = id.substring(1, id.length - 1);
            $(id).show("slow");
            $(id).html(value);
        }
        errorDisplay.append(value + "<br>");
        count++;
    });
    setTimeout(function() { // this will automatically close the alert and remove this if the users doesnt close it in 5 secs
        errorBox.fadeOut();
    }, 8000);
}
function slideDownForm() {
    $("body").on("click", ".gb-submit-form", function(e) {
        e.preventDefault();
        var data = $(this).closest("form").serialize();
        var formIndex = $(this).closest("form").attr("gb-form-index");
        if ($(this).attr('gb-edit-btn') == 0) {
            var action;
            if ($(this).attr("gb-reditect") == 1) {
                action = ACTION_REDIRECTS;
            } else {
                action = ACTION_NORMAL;
            }
            ajaxCall(FORM_SUBMIT_URLS[formIndex],
                    data,
                    function(data) {
                        submitFormSuccess(data, formIndex, action);
                    });
        } else if ($(this).attr('gb-edit-btn') == 1) {
            var sourcePkId = $(this).closest(".gb-skill-gained").attr('gb-source-pk-id');
            ajaxCall(FORM_EDIT_URLS[formIndex] + "/sourcePkId/" + sourcePkId, data, function(data) {
                submitFormSuccess(data, formIndex, ACTION_EDIT);
            });
        }
    });
    $("body").on("click", ".gb-form-show", function(e) {
        e.preventDefault();
        var targetForm = $($(this).attr("gb-form-slide-target"));
        targetForm.html($($(this).attr("gb-form-target")));
        targetForm.find("[type='submit']").attr("gb-edit-btn", 0);
        $(".gb-backdrop-visible").removeClass("gb-backdrop-escapee");
        if ($(this).hasClass("gb-backdrop-visible")) {
            // alert(poo)
            $(this).addClass("gb-backdrop-escapee");
        }
        targetForm.slideDown("slow");
        targetForm.find(".gb-panel-display").hide("slow");
        // $(this).closest(".panel").find(".alert").hide("slow");
        if ($(this).hasClass("gb-advice-page-form-slide")) {
            addAdvicePageSpinner();
        }
        $(".gb-backdrop").hide().delay(500).fadeIn(600);
        $("#gb-mentorship-todo-form-due-date-input").datepicker({dateFormat: 'yy-dd-mm', minDate: -20, maxDate: "+1M +10D"});

    });
    $("body").on("click", ".gb-form-show-modal", function(e) {
        e.preventDefault();
        var targetForm = $($(this).attr("gb-form-slide-target"));
        targetForm.modal({backdrop: 'static', keyboard: false});
        targetForm.find(".modal-body").html($($(this).attr("gb-form-target")));
        targetForm.find("[type='submit']").attr("gb-edit-btn", 0);
        if ($(this).hasClass("gb-advice-page-form-slide")) {
            addAdvicePageSpinner();
        }
    });
    $("body").on("click", ".gb-edit-form-show", function(e) {
        e.preventDefault();
        var targetParentForm = $(this).closest(".panel");
        var targetForm = $($(this).attr("gb-form-target"));
        targetForm.find("[type='submit']").attr("gb-edit-btn", 1);
        targetParentForm.find(".gb-panel-form").html(targetForm);
        targetParentForm.find(".gb-panel-form").slideDown("slow");
        targetParentForm.find(".gb-display-attribute").each(function(e) {
            var gbFormAttribute = targetForm.find($(this).attr("gb-control-target"));
            if (gbFormAttribute.is("input") || gbFormAttribute.is("textarea")) {
                gbFormAttribute.val($(this).text().trim());
            }
            if (gbFormAttribute.is("select")) {
                gbFormAttribute.find("option[value=" + $(this).attr("gb-option-id") + "]").attr('selected', 'selected');
            }

        });
        $(".gb-backdrop").hide().delay(500).fadeIn(600);
        // $(".gb-panel-display").show("fast");
        targetParentForm.find(".gb-panel-display").hide("slow");
        // $(this).closest(".panel").find(".alert").hide("slow");
    });
}
function deleteHandlers() {
    $("body").on("click", ".gb-delete-me", function(e) {
        e.preventDefault();
        var parent = $(this).closest(".gb-post-entry");
        var dataSource = parent.attr("gb-data-source");
        var sourcePkId = parent.attr("gb-source-pk-id");
        $("#gb-delete-confirmation-modal").modal({backdrop: 'static', keyboard: false});
        $("#gb-delete-me-submit").attr("gb-data-source", dataSource);
        $("#gb-delete-me-submit").attr("gb-source-pk-id", sourcePkId);

        $("#gb-delete-confirmation-modal")
                .find(".gb-delete-message")
                .text("You are about to delete a " + deleteTarget[dataSource] + ". Are you sure?");
    });
    $("body").on("click", "#gb-delete-me-submit", function(e) {
        e.preventDefault();
        var dataSource = $(this).attr("gb-data-source");
        var sourcePkId = $(this).attr("gb-source-pk-id");
        var data = {source_pk_id: sourcePkId,
            data_source: dataSource};
        ajaxCall(deleteMeUrl, data, deleteMeSuccess);
    });

}
function showPanelFormInner() {
    $("body").on("click", ".gb-form-show-inner", function(e) {
        e.preventDefault();
        $(".gb-backdrop").show();
        $(this).addClass("gb-backdrop-escapee");
        var panel = $(this).closest(".panel");
        $(".gb-panel-form-inner").hide("fast");
        $(".gb-form-show-inner").show("fast");
        $(".gb-panel-display-inner").show("fast");
        $(this).hide("slow");
        panel.find(".gb-panel-form-inner").show("slow");
        panel.find(".gb-panel-display-inner").hide("slow");
        // $(this).closest(".panel").find(".alert").hide("slow");
    });
}
function slideUpForm() {
    $("body").on("click", ".gb-form-hide", function(e) {
        e.preventDefault();
        clearForm($(this));
        // $(this).closest(".panel").find(".alert").hide("slow");
    });
}
function clearForm(formItem) {
    var form = formItem.closest(".gb-panel-form");
    $(".gb-form-show").show("slow");
    $(".gb-panel-display").show("slow");
    $(".gb-backdrop").fadeOut(700);
    $(".gb-form-slide-btn").each(function(e) {
        $(this).removeClass("gb-backdrop-escapee");
    });
    form.slideUp();
    form.find(".form-group input").val("");
    form.find(".form-group textarea").val("");
    form.find(".gb-share-with-textboxes").empty();
    form.find(".gb-share-with-display").empty();
    form.find(".gb-error-box").hide();
    form.find(".errorMessage").hide();
    $(".gb-select-person-btn").removeClass("btn-success")
            .addClass("btn-info")
            .text("Select")
            .attr("gb-selected", 0);
    form.find("select option:first").each(function(e) {
        $(this).attr('selected', 'selected');
    });
    $(".gb-backdrop-visible").removeClass("gb-backdrop-escapee");
}
function sendFormHome(form) {
    $("#gb-forms-home").append(form);
}
function dropDownHover() {
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
    });
}
function selectPersonHandler() {
    $("body").on("click", ".gb-share-with-modal-trigger", function(e) {
        e.preventDefault();
        var shareWIthIndex = parseInt($(this).attr("gb-type"));
        $("#" + shareWith[shareWIthIndex] + "-modal").modal({backdrop: 'static', keyboard: false});
    });
    $("body").on("click", ".gb-select-sharing-type", function(e) {
        e.preventDefault();
        var parent = $(this).closest(".modal");
        var shareWIthIndex = parseInt(parent.attr("gb-type"));
        var privacy = parseInt($(this).attr("gb-type"));

        $("#" + shareWith[shareWIthIndex] + "-sharing-type").val(privacy);
        parent.find(".gb-select-sharing-type").removeClass("active");
        $(this).addClass("active");
        $("." + shareWith[shareWIthIndex] + "-privacy").text(privacyText[privacy]);
        if (privacy == 2) {
            parent.find(".gb-share-with-people-list").slideToggle("slow");
        } else {
            parent.find(".gb-share-with-people-list").slideUp("slow");
        }
    });
    $("body").on("click", ".gb-select-person-btn", function(e) {
        e.preventDefault();
        if ($(this).attr("gb-selected") == 0) {
            var chosenName = $(this).closest(".gb-person-badge").find(".gb-person-name").text().trim();
            var userId = $(this).closest(".gb-person-badge").attr("person-id");
            var selectedName = $(this).closest(".gb-person-badge").find(".gb-person-name").text().trim();
            var selectedUserId = $(this).closest(".gb-person-badge").attr("person-id");
            selectSharePerson(selectedName, selectedUserId, parseInt($(this).attr("gb-type")))
            $(this).removeClass("btn-info")
                    .addClass("btn-success")
                    .text("Unselect")
                    .attr("gb-selected", 1);
        } else if ($(this).attr("gb-selected") == 1) {
            $(this).removeClass("btn-success")
                    .addClass("btn-info")
                    .text("Select")
                    .attr("gb-selected", 0);
            var selectedUserId = $(this).closest(".gb-person-badge").attr("person-id");
            unselectSharePerson(selectedUserId, parseInt($(this).attr("gb-type")))
        }
    });
    $("body").on("click", ".gb-remove-selected-person", function(e) {
        var shareWIthIndex = parseInt($(this).attr("gb-type"));
        var userId = $(this).closest("." + shareWith[shareWIthIndex] + "-input").attr("value");
        var parent = $("#" + shareWith[shareWIthIndex] + "-modal");

        parent.find($(".gb-person-badge[person-id=" + userId + "]")
                .find(".gb-select-person-btn")).click();
    });
}
function selectSharePerson(name, userId, type) {
    var shareWIthIndex = type;
    if (type == 3) {
        $("#gb-select-mentor-input").val(name);
        $("#" + shareWith[shareWIthIndex] + "-modal").modal("hide");
        $("#" + shareWith[shareWIthIndex] + "-modal").find(".gb-select-person-btn").each(function(e) {
            $(this).removeClass("btn-success")
                    .addClass("btn-info")
                    .text("Select")
                    .attr("gb-selected", 0);
        });
        $("#gb-mentorship-form-mentorship-person-id-input").val(userId);
    } else {
        var shareTexboxes = $("#" + shareWith[shareWIthIndex] + "-textboxes");
        var shareDisplay = $("#" + shareWith[shareWIthIndex] + "-display");
        var inputClassName = shareWith[shareWIthIndex] + "-input";
        shareTexboxes
                .append($("<input type='text' value=" + userId + " name='" + shareWith[shareWIthIndex] + "[]' >")
                        .addClass(inputClassName));

        shareDisplay
                .append($("<div />")
                        .addClass(inputClassName + " pull-left")
                        .attr("value", userId)
                        .append($("<span />")
                                .text(name))
                        .append($("<span />")
                                .text("X")
                                .attr("gb-type", type)
                                .addClass("gb-remove-selected-person btn btn-default btn-xs")));
    }
}
function unselectSharePerson(userId, type) {
    var shareWIthIndex = type;
    $("." + shareWith[shareWIthIndex] + "-input[value=" + userId + "]").remove();
}