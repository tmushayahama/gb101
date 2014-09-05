// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_home.js....");

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
                    element: "#gb-navbar",
                    title: "Site Navigation",
                    content: "Easy to use navbar. Navigate to other pages.",
                    placement: "bottom",
                    position: "fixed"
                },
                {
                    element: "#gb-primary-apps-panel",
                    title: "Primary Apps",
                    content: "Skill apps that can be combined to make a useful range of secondary and tertiary apps.",
                    placement: "top"
                },
                {
                    element: "#gb-secondary-apps-panel",
                    title: "Secondary Apps",
                    content: "Skill apps that are usually made from combining primary apps.",
                    placement: "top"
                },
                 {
                    element: "#gb-tertiary-apps-panel",
                    title: "Tertiary Apps",
                    content: "Skill apps that are usually involve a group of people to make use of primary and secondary apps.",
                    placement: "top"
                }
            ]}
        );
        // Initialize the tour
        tour.init();
        //Start the tour
        tour.start();
    });

    $("#gb-start-skill-tour-btn").click(function(e) {
        e.preventDefault();
        var tour = new Tour({
            backdrop: true,
            storage: false,
            steps: [
                {
                    element: "#gb-tour-skill-1",
                    title: "Option 1: Adding a skill using Quickbar",
                    content: "Add a skill to your list. Define whether you have\n\
gained the skill or if you want to improve the skill or if you want to learn the skill.",
                    placement: "bottom"
                },
                {
                    element: "#gb-tour-skill-2",
                    title: "Option 2: Access 'My Skills' page using the sidebar",
                    content: "Click here to navigate to 'My Skills' page where you will have more\n\
features for handling your skills.",
                    placement: "bottom"
                },
                {
                    element: "#gb-tour-skill-3",
                    title: "Option 3: Access 'My Skills' page using the topbar",
                    content: "Click here to navigate to 'My Skills' page where you will have more\n\
features for handling your skills.",
                    placement: "bottom"
                },
            ]}
        );
        // Initialize the tour
        tour.init();
        //Start the tour
        tour.start();
    });


    $("#gb-explore-tour-btn").click(function(e) {
        e.preventDefault();
        var tour = new Tour({
            backdrop: true,
            storage: false,
            steps: [
                {
                    element: "#gb-posts",
                    title: "See what others are doing",
                    content: "What are some skills and activities are others doing?",
placement: "top"
                },
                {
                    element: "#gb-tour-explore-2",
                    title: "Check out the Skill Bank",
                    content: "",
                    placement: "bottom"
                }
            ]}
        );
        // Initialize the tour
        tour.init();
        //Start the tour
        tour.start();
    });

}
