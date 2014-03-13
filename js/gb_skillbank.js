/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

$(document).ready(function(e) {

    console.log("Loading skillbank.js...");
    addSkillbankSearchEventHandlers();
});
function ajaxSearch(data) {
    $("#gb-skillbank-search-result").html(data["_search_result"]);
}
function addSkillbankSearchEventHandlers() {
    $("#gb-skillbank-keyword-search-btn").click(function(e) {
        e.preventDefault();
        var keyword = $("#gb-skillbank-keyword-search-input").val();
        var data = {keyword: keyword,
            type: skillBankType};
        ajaxCall(ajaxSearchUrl, data, ajaxSearch);
    });
}

