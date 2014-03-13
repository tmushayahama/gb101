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
                    content: "A Preview of skill level you have added"
                },
                {
                    element: "#gb-post-input",
                    title: "Add more skills",
                    content: "Add skill and define the level of the skill. You can add from the skill bank"
                }
            ]}
        );
        // Initialize the tour
        tour.init();
        //Start the tour
        tour.start();
    })
}
