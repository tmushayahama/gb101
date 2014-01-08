// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
	console.log("Loading rm.js...");
	$.ajaxSetup({traditional: true});
	populateGoals();
});
function populateGoals() {
	for (var i = 0; i < skills.length; i++) {
		$("#rm-skills-home")
						.append($("<li/>")
						.append($("<a/>")
						.text(skills[i]["task_name"])));
	}
}
