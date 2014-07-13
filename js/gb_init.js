// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````
var AJAX_RETURN_ACTION_NORMAL = 1;
var AJAX_RETURN_ACTION_EDIT = 2;
var AJAX_RETURN_ACTION_REDIRECTS = 3;
var AJAX_RETURN_ACTION_REPLACE = 4;

var shareWith = [
    "gb-skill-share-with",
    "gb-mentorship-share-with",
    "gb-page-share-with",
    "gb-send-request"
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

$(document).ready(function(e) {
    console.log("Loading gb_init.js....");
    // dropDownHover();
    slideDownForm();
    slideUpForm();
    selectPersonHandler();
    deleteHandlers();
    notificationHandlers();
    $(".gb-nav-collapse-toggle").click(function(e) {
        $(".gb-nav-collapse").css("display", "visible!important");
        $(".gb-nav-collapse").toggle("slow");
    });
    toggleEvents();
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
function toggleEvents() {
    $("body").on("click", ".gb-toggle", function(e) {
        e.preventDefault();
        $($(this).attr("gb-target")).slideToggle("slow");
    });
}

function submitFormSuccess(data, formId, prependTo, action) {
    if (data["success"] == null && typeof data == 'object') {
        putFormErrors($(formId), $(formId + "-error-display"), data);
    } else {
        switch (action) {
            case AJAX_RETURN_ACTION_NORMAL:
                $(prependTo).prepend(data["_post_row"]);
                $(".gb-list-preview[gb-level-id=" + data["skill_level_id"] + "]").find(".panel-body").prepend(data["_skill_preview_list_row"]);
                $("#gb-no-skill-notice").remove();
                clearForm($(formId));
                break;
            case AJAX_RETURN_ACTION_EDIT:
            case AJAX_RETURN_ACTION_REPLACE:
                var form = $(formId);
                clearForm(form);
                sendFormHome(form);
                $(".gb-post-entry[gb-data-source=" + data["data_source"] + "][gb-source-pk-id=" + data["source_pk_id"] + "]")
                        .replaceWith(data["_post_row"]);
                break;
            case AJAX_RETURN_ACTION_REDIRECTS:
                window.location.href = data["redirect_url"];
                break;
        }

    }
}
function deleteMeSuccess(data, deleteType) {
    switch (deleteType) {
        case DEL_TYPE_REMOVE:
            $(".gb-post-entry[gb-data-source=" + data["data_source"] + "][gb-source-pk-id=" + data["source_pk_id"] + "]").remove();
            break;
        case DEL_TYPE_REPLACE:
            $(".gb-post-entry[gb-data-source=" + data["data_source"] + "][gb-source-pk-id='0']").html(data["_replace_with_row"]);
            break;
    }
    $("#gb-delete-confirmation-modal").modal("hide");
}
function getSelectPeopleList(data, form) {
    var parent = form.closest(".modal");
    parent.find(".gb-share-with-people-list").html(data["_post_row"]);
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
        var form = $(this).closest("form");
        var data = form.serialize();
        var formId = "#" + form.attr("id");
        if ($(this).attr('gb-edit-btn') == 0) {
            var prependTo = form.attr("gb-submit-prepend-to");
            var addUrl = $(this).closest("form").attr("gb-add-url");
            var action = parseInt($(this).attr("gb-ajax-return-action"));

            ajaxCall(addUrl,
                    data,
                    function(data) {
                        submitFormSuccess(data, formId, prependTo, action);
                    });
        } else if ($(this).attr('gb-edit-btn') == 1) {
            //var editUrl = form.attr("gb-edit-url");
            var dataSource = $(this).attr('gb-data-source');
            var sourcePkId = $(this).attr('gb-source-pk-id');
            ajaxCall(editMeUrl + "/dataSource/" + dataSource + "/sourcePkId/" + sourcePkId, data, function(data) {
                submitFormSuccess(data, formId, null, AJAX_RETURN_ACTION_EDIT);
            });
        }
    });
    $("body").on("click", ".gb-form-show", function(e) {
        e.preventDefault();
        var targetFormParent = $($(this).attr("gb-form-slide-target"));
        var targetForm = $($(this).attr("gb-form-target"));
        targetFormParent.html(targetForm);
        targetFormParent.find("[type='submit']").attr("gb-edit-btn", 0);
        $(".gb-backdrop-visible").removeClass("gb-backdrop-escapee");
        if ($(this).hasClass("gb-backdrop-visible")) {
            $(this).addClass("gb-backdrop-escapee");
        }
        targetFormParent.slideDown("slow");
        targetFormParent.find(".gb-panel-display").hide("slow");

        if ($(this).attr("gb-nested") == "1") {
            targetForm.attr("gb-submit-prepend-to", $(this).attr("gb-nested-submit-prepend-to"));
            targetForm.attr("gb-add-url", $(this).attr("gb-add-url"));
        }

        if ($(this).hasClass("gb-advice-page-form-slide")) {
            addAdvicePageSpinner();
        }
        $(".gb-backdrop").hide().delay(500).fadeIn(600);

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
        var parent = $(this).closest(".gb-post-entry");

        var dataSource = parent.attr("gb-data-source");
        var sourcePkId = parent.attr("gb-source-pk-id");
        var targetPostEntry = $(this).closest(".gb-post-entry");
        var targetForm = $($(this).attr("gb-form-target"));
        var submitBtn = targetForm.find("[type='submit']");
        submitBtn
                .attr("gb-data-source", dataSource)
                .attr("gb-source-pk-id", sourcePkId)
                .attr("gb-edit-btn", 1);

        targetPostEntry.find(".gb-panel-form").html(targetForm);
        targetPostEntry.find(".gb-panel-form").slideDown("slow");
        targetPostEntry.find(".gb-display-attribute").each(function(e) {
            var gbFormAttribute = targetForm.find($(this).attr("gb-control-target"));
            if (gbFormAttribute.is("input") || gbFormAttribute.is("textarea")) {
                gbFormAttribute.val($(this).text().trim());
            }
            if (gbFormAttribute.is("select")) {
                gbFormAttribute.find("option[value=" + $(this).attr("gb-option-id") + "]").attr('selected', 'selected');
            }

        });
        $(".gb-backdrop").hide().delay(500).fadeIn(600);
        parent.find(".gb-panel-display").hide("slow");
    });
}
function deleteHandlers() {
    $("body").on("click", ".gb-delete-me", function(e) {
        e.preventDefault();
        var parent = $(this).closest(".gb-post-entry");
        var dataSource = parent.attr("gb-data-source");
        var sourcePkId = parent.attr("gb-source-pk-id");
        var deleteType = $(this).attr("gb-del-type");
        $("#gb-delete-confirmation-modal").modal({backdrop: 'static', keyboard: false});
        $("#gb-delete-me-submit")
                .attr("gb-data-source", dataSource)
                .attr("gb-source-pk-id", sourcePkId)
                .attr("gb-del-type", deleteType);
        $("#gb-delete-confirmation-modal")
                .find(".gb-delete-message")
                .text("You are about to delete a " + deleteTarget[dataSource] + ". Are you sure?");
        sendFormHome(parent.find("form"));
    });
    $("body").on("click", "#gb-delete-me-submit", function(e) {
        e.preventDefault();
        var dataSource = $(this).attr("gb-data-source");
        var sourcePkId = $(this).attr("gb-source-pk-id");
        var deleteType = $(this).attr("gb-del-type");
        var data = {source_pk_id: sourcePkId,
            data_source: dataSource};

        ajaxCall(deleteMeUrl, data, function(data) {
            deleteMeSuccess(data, deleteType);
        });
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
    });
}
function slideUpForm() {
    $("body").on("click", ".gb-form-hide", function(e) {
        e.preventDefault();
        clearForm($(this));
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
    formItem.closest(".modal").modal("hide");
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
function unselectSharePerson(userId, type) {
    var shareWIthIndex = type;
    $("." + shareWith[shareWIthIndex] + "-input[value=" + userId + "]").remove();
}
function notificationHandlers() {
    $("body").on("click", ".gb-send-request-modal-trigger", function(e) {
        e.preventDefault();
        var sourceId = $(this).attr("gb-source-id");
        var type = $(this).attr("gb-type");
        var form = $("#gb-request-form-source-id-input").closest("form");
        $("#gb-request-form-source-id-input").val(sourceId);
        $("#gb-request-form-type-input").val(type);
        $("#gb-request-form-status-input").val($(this).attr("gb-status"));
        $("#gb-send-request-modal").modal({backdrop: 'static', keyboard: false});
        var data = {source_id: sourceId,
            type: type};

        ajaxCall(getSelectPeopleListUrl, data, function(data) {
            getSelectPeopleList(data, form);
        });
    });
    $("body").on("click", '.gb-notifications-nav .dropdown-menu', function(e) {
        e.stopPropagation();
    });
}