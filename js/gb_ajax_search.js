/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(e) {

    console.log("Loading ajax_search.js...");
    addSearchEventHandlers();
});
function ajaxSearch(data) {
    $("#gb-search-result").html(data["_search_result"]);
}
function addSearchEventHandlers() {
    $("#gb-keyword-search-btn").click(function(e) {
        e.preventDefault();
        var keyword = $("#gb-keyword-search-input").val();
        var type = $("#gb-post-type-btn").attr("search-type");
        var data = {keyword: keyword,
            type: type};
        ajaxCall(ajaxSearchUrl, data, ajaxSearch);
    });
    $(".gb-search-type").click(function(e) {
        e.preventDefault();
        $("#gb-post-type-btn").text($(this).text());
        $("#gb-post-type-btn").attr("search-type", $(this).attr("search-type"));
    });
}

