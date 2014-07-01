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
                    element: "#gb-topbar",
                    title: "Site Navigation",
                    content: "Easy to use navbar. Navigate to other pages.",
                    placement: "bottom",
                    position: "fixed"
                },
                {
                    element: "#gb-instruments-panel",
                    title: "Instruments",
                    content: "Navigate to pages for Skill Section's instruments. Goals and promises will be available soon.",
                    placement: "top"
                },
                {
                    element: "#gb-applications-panel",
                    title: "Applications",
                    content: "Navigate to pages for Skill Section's Applications.",
                    placement: "top"
                },
                {
                    element: "#gb-home-nav",
                    title: "Home Page Toolbar",
                    content: "A quick toolbar access to add skills and use applications. For more detailed uses, go to the respctive pages",
                    placement: "bottom"
                },
                {
                    element: "#gb-home-activity",
                    title: "Recent Activities",
                    content: "Recent activities of people in your connections or activities shared publicly",
                    placement: "top"
                },
                {
                    element: "#gb-connections-panel",
                    title: "Connections",
                    content: "Connect to people. Share with your friends,\n\
                        family, followers and the public. Will be available soon.",
                    placement: "bottom"
                },
                {
                    element: "#gb-navbar-search",
                    title: "Skill Section Search",
                    content: "Search anything you want. First select the search type.",
                    placement: "bottom"
                },
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
