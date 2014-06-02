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
                    element: "#gb-home-add-nav",
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
                    element: "#gb-instruments-panel",
                    title: "Instruments",
                    content: "Navigate to pages for Skill Section's instruments. Goals and promises will be available soon.",
                    placement: "top"
                },
            ]}
        );
        // Initialize the tour
        tour.init();
        //Start the tour
        tour.start();
    });
}
