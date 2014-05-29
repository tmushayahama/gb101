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
    hidePanelForm();
    showPanelForm();
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
function showPanelForm() {
    $("body").on("click", ".gb-form-show", function(e) {
        e.preventDefault();
        $(".gb-panel-form").hide("fast");
        $(".gb-form-toggle").show("fast");
        $(".gb-panel-display").show("fast");
        $(this).hide("slow");
        $(this).closest(".panel").find(".gb-panel-form").show("slow");
        $(this).closest(".panel").find(".gb-panel-display").hide("slow");
       // $(this).closest(".panel").find(".alert").hide("slow");
    });
}
function hidePanelForm() {
    $("body").on("click", ".gb-form-hide", function(e) {
        e.preventDefault();
        $(this).closest(".panel").find(".gb-panel-form").hide("slow");
        $(this).closest(".panel").find(".gb-panel-display").show("slow");
         $(this).closest(".panel").find(".gb-form-show").show("slow");
       // $(this).closest(".panel").find(".alert").hide("slow");
    });
}
function cancelPanelForm($parent) {
    $parent.find(".form-group input").val("");
    $parent.find(".form-group textarea").val("");
    $parent.hide("fast");
    $parent.closest(".panel").find(".gb-form-toggle").show("fast");
}
function clearForm(form) {
    form.find(".form-group input").val("");
    form.find(".form-group textarea").val("");
    form.find(".gb-error-box").hide();
    form.find(".errorMessage").hide();
}
function dropDownHover() {
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
        // $(this).addClass('open');
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
        //$(this).removeClass('open');
    });
}
