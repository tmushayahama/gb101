// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_goal_management.js....");

    monitorEventHandlers();
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
function monitorEventHandlers() {
    $('#gb-skill-management-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });

}