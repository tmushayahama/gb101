//  _______________________________________________________________
// |                                                               |
// |                        INITIALIZATIONS                        |
// |_______________________________________________________________|

$(document).ready(function(e) {
	console.log("Loading gb_profile.js...");
	skillEventHandlers();
});

function skillEventHandlers() {
    $('#gb-skill-nav a:first').tab('show'); // Select first tab
}