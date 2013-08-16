// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
	console.log("Loading rm.js...");

// This function will be executed when the user scrolls the page.
	$(window).scroll(function(e) {
		// Get the position of the location where the scroller starts.
		var scroller_anchor = $(".scroller_anchor").offset().top;

		// Check if the user has scrolled and the current position is after the scroller's start location and if its not already fixed at the top 
		if ($(this).scrollTop() >= scroller_anchor && $('.scroller').css('position') != 'fixed')
		{    // Change the CSS of the scroller to hilight it and fix it at the top of the screen.
			$('.scroller').css({
				'background': '#CCC',
				'border': '1px solid #000',
				'position': 'fixed',
				'top': '0px'
			});
			// Changing the height of the scroller anchor to that of scroller so that there is no change in the overall height of the page.
			$('.scroller_anchor').css('height', '50px');
		}
		else if ($(this).scrollTop() < scroller_anchor && $('.scroller').css('position') != 'relative')
		{    // If the user has scrolled back to the location above the scroller anchor place it back into the content.

			// Change the height of the scroller anchor to 0 and now we will be adding the scroller back to the content.
			$('.scroller_anchor').css('height', '0px');

			// Change the CSS and put it back to its original position.
			$('.scroller').css({
				'background': '#FFF',
				'border': '1px solid #CCC',
				'position': 'relative'
			});
		}
	});
});
/*function populateRecentCommitments() {
 for(var i=0; i<goals.length; i++) {
 addPost("#gb-recent-posts-home", true, goals[i]["task_name"], "Tremayne Mushayahama", "tmtrigga@gmail.com");
 }
 }
 function populateSuggestedFriends() {
 for(var i=0; i<suggestedFriends.length; i++) {
 addSuggestedFriend("#gb-suggested-friends", suggestedFriends[i]["username"], suggestedFriends[i]["first_name"], suggestedFriends[i]["last_name"]);
 }
 }
 function populateGoals () {
 for(var i=0; i<goals.length; i++) {
 $("#rm-goals-home")
 .append($("<li/>")
 .append($("<a/>")
 .text(goals[i]["task_name"])));
 }
 }
 function populateFriends () {
 for(var i=0; i<friends.length; i++) {
 $("#rm-friends-selector-home")
 .append($("<label/>")
 .addClass("checkbox")
 .text(friends[i]["first_name"] + " " + friends[i]["last_name"])
 .append($("<input/>")
 
 .attr("type", "checkbox")));
 }
 }
 function goalCommit(e) {
 e.preventDefault();
 $.post("commit/", $('#rm-commit-form').serialize(), function(data) {
 console.log(data);
 console.log(data["commitment"]);
 console.log(data["taskee_name"])
 addPost("#gb-recent-posts-home", false,  data["commitment"], data["taskee_name"], "tmtrigga@gmail.com");
 $("#rm-goals-home")
 .prepend($("<li/>")
 .append($("<a/>")
 .text(data["commitment"])));
 }, "json");
 }
 function addEventHandlers() {
 $('#rm-post-tab a').click(function (e) {
 console.log("tab clicked");
 e.preventDefault();
 $(this).tab('show');
 });
 $('.rm-stop-propagation').click(function (e) {
 e.stopPropagation();
 });
 $( "#rm-post-start-dp" ).datepicker({
 changeMonth: true,
 changeYear: true
 });
 $( "#rm-post-end-dp" ).datepicker({
 changeMonth: true,
 changeYear: true
 });
 $("#rm-commit-post-home").click(function(e) {
 goalCommit(e);
 });
 }
 */