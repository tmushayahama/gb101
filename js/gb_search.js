/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(e) {
    console.log("Loading search.js...");
    addSearchEventHandlers();
});
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
