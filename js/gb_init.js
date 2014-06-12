// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````
var skillListChildForm = [
    "#skill-define-form",
    "#skill-share-with-form"];
var skillCommitmentChildForm = [
    "#academic-skill-bank-form",
    "#academic-define-skill-form",
    "#academic-share-skill-form"];

$(document).ready(function(e) {
    console.log("Loading gb_init.js....");
    dropDownHover();
    slideDownForm();
    slideUpForm();
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
        // $(".gb-panel-display").show("fast");
        targetForm.slideDown("slow");
        targetForm.find(".gb-panel-display").hide("slow");
        // $(this).closest(".panel").find(".alert").hide("slow");
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
/*function showPanelForm() {
 $("body").on("click", ".gb-form-show", function(e) {
 e.preventDefault();
 $(".gb-backdrop").show();
 var panel = $(this).closest(".gb-panel-form");
 // $(".gb-panel-display").show("fast");
 panel.find(".gb-panel-form").show("slow");
 panel.find(".gb-panel-display").hide("slow");
 // $(this).closest(".panel").find(".alert").hide("slow");
 });
 } */
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
function cancelPanelForm($parent) {
    $parent.find(".form-group input").val("");
    $parent.find(".form-group textarea").val("");
    $parent.hide("fast");
    $parent.closest(".panel").find(".gb-form-show").show("fast");
}
function clearForm(formItem) {
    var form = formItem.closest(".gb-panel-form");
    $(".gb-form-show").show("slow");
    $(".gb-panel-display").show("slow");
    $(".gb-backdrop").hide();
    $(".gb-form-slide-btn").each(function(e) {
        $(this).removeClass("gb-backdrop-escapee");
    });
    form.slideUp();
    form.find(".form-group input").val("");
    form.find(".form-group textarea").val("");
    form.find(".gb-error-box").hide();
    form.find(".errorMessage").hide();
    form.find("select option:first").each(function(e) {
        $(this).attr('selected', 'selected');
    });
    $(".gb-backdrop-visible").removeClass("gb-backdrop-escapee");
}
function sendFormHome(form) {
    $("#gb-forms-home").append(form);
}
function closePanelForm(child) {
    var panel = child.closest(".panel");
    panel.find(".gb-panel-form").hide("slow");
    panel.find(".gb-panel-display").show("slow");
    panel.find(".gb-form-show").show("slow");
}
function dropDownHover() {
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
    });
}

