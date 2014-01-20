// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_management.js....");

    pagesFormActivityEventHandlers();
    dropDownHover();
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
function dropDownHover() {
    $('ul.nav li.dropdown').hover(function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
        // $(this).addClass('open');
    }, function() {
        $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
        //$(this).removeClass('open');
    });
}
function submitGoalPageEntry(data) {
    alert("yes");
}
function pagesFormActivityEventHandlers() {
    $("#gb-goal-number-selector").val(subgoalNumber);
    $("#goal-pages-submit-entry").click(function(e) {
        e.preventDefault();
        var goalTitle = $("#goal-pages-goal-title-input").val();
        var goalDescription = $("#goal-pages-goal-description-input").val();
        var data = {subgoal_entry_title: goalTitle,
            subgoal_entry_description: goalDescription};
        ajaxCall(submitGoalPageEntryUrl, data, submitGoalPageEntry)
    })

}