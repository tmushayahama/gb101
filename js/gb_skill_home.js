// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_home.js....");

    tourEventHandlers();
});
function tourEventHandlers() {

    $("#gb-start-tour-btn").click(function(e) {
        e.preventDefault();
        var tour = new Tour({
            backdrop: true,
            storage: false,
            steps: [
                {
                    element: "#gb-skill-skill-container",
                    title: "Skill Preview",
                    content: "A preview of skills you have added, categorized by their levels."
                },
                {
                    element: "#gb-post-input",
                    title: "Add More Skills",
                    content: "Add a skill and define it's level. You can add a skill from the skill bank provided.",
                    placement: "bottom"
                },
                {
                    element: "#skill-posts",
                    title: "My Skills",
                    content: "All the skills you have defined goes here.",
                    placement: "top"
                },
                {
                    element: "#gb-topbar-nav",
                    title: "Site Navigation",
                    content: "Navigate to other pages using this navbar.",
                    placement: "bottom",
                },
                {
                    element: "#gb-navbar-search",
                    title: "Skill Section Search",
                    content: "Search anything you want. First select the search type.",
                    placement: "bottom"
                }
            ]}
        );
        // Initialize the tour
        tour.init();
        //Start the tour
        tour.start();
    })
}
