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
                    element: "#gb-instruments-accordion-group",
                    title: "Instruments",
                    content: "Define you skills, goals and promises"
                },
                {
                    element: "#gb-applications-accordion-group",
                    title: "Applications",
                    content: "Apply your skills and goals using these apps"
                },
                {
                    element: "#gb-connections-accordion-group",
                    title: "Connections",
                    content: "Connect to people. Share with your friends,\n\
                        family, followers and the public"
                },
                {
                    element: "#gb-home-activity",
                    title: "Recent Activities",
                    content: "Recent activities of people in your connections or activities shared publicly",
                    placement: "top"
                },
                {
                    element: "#gb-add-people-box",
                    title: "Add More People",
                    content: "Add more people to your connections",
                    placement: "left"
                }
            ]}
        );
        // Initialize the tour
        tour.init();
        //Start the tour
        tour.start();
    })
}
