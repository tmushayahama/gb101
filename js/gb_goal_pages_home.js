// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_management.js....");

    pagesActivityEventHandlers();
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
function pagesActivityEventHandlers() {

    $("#gb-start-writing-page-btn").click(function(e) {
        e.preventDefault();
        var subgoalNumber = $("#gb-goal-number-selector").val();
        var goalTitle = $("#gb-goal-input").val();
        var fullUrl = goalPagesFormUrl+"/goalTitle/"+goalTitle+"/subgoalNumber/"+subgoalNumber;
        window.open(fullUrl);
    });
}