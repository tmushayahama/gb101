// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_authenticate.js....");
    addSearchEventHandlers();
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
function addSearchEventHandlers() {
    $("#gb-keyword-search-btn").click(function(e) {
        e.preventDefault();
        window.location.href = searchUrl;
    });
}