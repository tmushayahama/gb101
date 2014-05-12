// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_demo.js....");
    demoEvents();
   // addSearchEventHandlers();
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
function search(data) {

}
function demoEvents() {
    $(".gb-demo-trigger-btn").click(function(e) {
        $("#gb-demo-modal").modal("show");
    });
}
function addSearchEventHandlers() {
    $("#gb-keyword-search-btn").click(function(e) {
        e.preventDefault();
        var keyword = $("#gb-keyword-search-input").val();
        var type = $("#gb-post-type-btn").attr("search-type");
        window.location.href = searchUrl + "/type/" + type + "/keyword/" + keyword;
    });
    $(".gb-search-type").click(function(e) {
        e.preventDefault();
        $("#gb-post-type-btn").text($(this).text());
        $("#gb-post-type-btn").attr("search-type", $(this).attr("search-type"));
    });
}