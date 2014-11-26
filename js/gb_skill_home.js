// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````

$(document).ready(function(e) {
    console.log("Loading gb_skill_home.js....");

    activateFirstTab();
    bankEventHandlers();
    addSkillEventHandlers();
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
function sendSkillContributionRequest(data) {
}

function appendMoreSkill(data) {
    $("#gb-skillbank-search-result").append(data["_skill_bank_list"]);
    var nextPage = parseInt($("#gb-load-more-skillbank").attr("next-page"));
    $("#gb-load-more-skillbank").attr("next-page", nextPage + 1);
}
function mentorshipEnrollRequest(data) {
    $("#gb-request-mentorship-enroll-modal").modal("hide");
    $("#gb-request-confirmation-modal").modal("show");
    $("#gb-request-message").val("");
    var $enrollTriggerBtn = $(".gb-commitment-post[mentorship-id='" + data["mentorship_id"] + "']")
            .find(".gb-mentorship-enroll-request-modal-trigger");
    $enrollTriggerBtn.text("Pending Request");
    $enrollTriggerBtn.attr("status", 0);
}
function acceptMentorshipEnrollment(data) {
    $(".gb-person-badge[mentee-id='" + data["mentee_id"] + "']")
            .replaceWith(data["mentee_badge"]);
    $(data["mentee_badge_small"]).insertAfter("#home-activity-stats h5");
}
function activateFirstTab() {
    $("#gb-skill-activity-nav li:nth-child(2) a").click();
    $("#gb-skill-activity-nav li:nth-child(2) a").click();
}



function addSkillEventHandlers() {

    $("body").on("click", ".gb-choose-person-remove", function(e) {
        e.preventDefault();
        selectPerson("", null);
        $(".gb-choose-person-name-display").hide();
    });

    $("body").on('click', '.gb-skill-contribute-request-modal-trigger', function(e) {
        e.preventDefault();
        $("#gb-skill-contribute-request-modal").modal({backdrop: 'static', keyboard: false});
    });
    $("body").on('click', '.gb-bank-list-modal-trigger', function(e) {
        e.preventDefault();
        $("#gb-bank-list-modal").modal({backdrop: 'static', keyboard: false});
    });
    $('#gb-skill-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-home-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-skill-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-skill-activity-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $('#gb-skill-bank-nav a, #gb-skill-bank-modal-nav a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $("body").on("click", ".gb-skill-bank-select-item", function(e) {
        $("#gb-bank-list-modal").modal("hide");
        var skillName = $(this).closest(".gb-skill-bank-item-row").find(".gb-skill-name").text();
        $(".gb-skill-bank-select-item").removeClass("btn-success");
        $(".gb-skill-bank-select-item").addClass("btn-primary");
        $(".gb-skill-bank-item-row").removeClass('gb-level-selection-active');
        $(this).closest(".gb-skill-bank-item-row").addClass('gb-level-selection-active');
        if ($(this).text() === "Select") {
            $(" .gb-skill-bank-select-item").text("Select");
            $(this).closest(".gb-skill-bank-item-row").addClass('gb-level-selection-active');
            $("#gb-skill-form-title-input").val(skillName);
            $(this).text("Selected");
            $(this).removeClass("btn-primary");
            $(this).addClass("btn-success");
        } else {
            $(this).closest(".gb-skill-bank-item-row").removeClass('gb-level-selection-active');
            $("#gb-skill-form-title-input").val("");
            $(this).text("Select");
            $(this).removeClass("btn-success");
            $(this).addClass("btn-primary");
        }
    });





    $('#skill-tab a').click(function(e) {
        e.preventDefault();
        $(this).tab('show');
    });
    $("#skill_commitment_begin_date, #skill_commitment_end_date, #academic-begin-date, #academic-end-date").datepicker({
        changeMonth: true,
        changeYear: true,
        timeFormat: "HH:mm:ss",
        dateFormat: "yy-mm-dd"
    });
    $("body").on("click", ".gb-edit-skill-post", function(e) {
        e.preventDefault();
        clearForm($("#gb-skill-form"));
        var parent = $(this).closest(".gb-skill-gained");
        parent.find(".gb-panel-form").html($("#gb-skill-form"));
        var title = parent.find(".skill-title").text().trim();
        var description = parent.find(".skill-description").text().trim();
        var levelId = parent.find(".skill-level").attr("skill-level-id");
        $("#gb-skill-form-title-input").val(title);
        $("#gb-skill-form-description-input").val(description);
        $("#gb-skill-form-level-input option[value=" + levelId + "]").attr('selected', 'selected');
        $("#skill-submit-skill").attr("gb-edit-btn", 1);
        $("#gb-advice-page-skill-btn").attr("gb-edit-btn", 1);
    });
}
function bankEventHandlers() {
    $("#gb-load-more-skillbank").click(function() {
        var data = {type: $(this).attr("type"),
            next_page: $(this).attr("next-page")};
        ajaxCall(appendMoreSkillUrl, data, appendMoreSkill);
    });
    $("body").on("click", ".gb-toggle-skill", function(e) {
        e.preventDefault();
        var isCollapse = $(this).text() === "collapse";
        $(this).text(isCollapse ? "expand" : "collapse");
        $(this).closest(".gb-skill-bank-item-row").find(".gb-skill").toggle("slow");
    });
}
