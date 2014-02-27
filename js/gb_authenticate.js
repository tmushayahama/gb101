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
function search(data) {

}
function addSearchEventHandlers() {
    $("#gb-keyword-search-btn").click(function(e) {
        e.preventDefault();
        var keyword = $("#gb-keyword-search-input").val();
        if (keyword.trim() == "") {
            alert("Value cannot be blank")
        } else {
            window.location.href = searchUrl +"/"+ keyword;
        }
    });
}