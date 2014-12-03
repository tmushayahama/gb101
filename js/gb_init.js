// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````
var AJAX_RETURN_ACTION_NORMAL = 1;
var AJAX_RETURN_ACTION_EDIT = 2;
var AJAX_RETURN_ACTION_REDIRECTS = 3;
var AJAX_RETURN_ACTION_REPLACE = 4;

var privacyText = [
 "Private",
 "Public",
 "Customize"
];
var DELETE_MESSAGE = {
 COMMENT: "Delete Comment"
}
function ajaxCall(url, data, callback) {
 $.ajax({
  url: url,
  type: "POST",
  dataType: 'json',
  data: data,
  success: callback
 });
}
jQuery.fn.flash = function (backgroundColor, duration)
{
 var current = this.css('background-color');
 this.animate({backgroundColor: 'rgb(' + backgroundColor + ')'}, duration / 2);
 this.animate({backgroundColor: current}, duration / 2);
};

function reorderRows(parent) {
 var i = 1;
 parent.children(".gb-post-entry-row").each(function () {
  $(this).find(".gb-number").first().text(i++);
 });
}

$(document).ready(function (e) {
 console.log("Loading gb_init.js....");
 // dropDownHover();
 tabHandlers();
 formEvents();
 selectPersonHandler();
 deleteHandlers();
 notificationHandlers();
 postsHandlers();
 eventRedirects();
 toggleEvents();
});

function eventRedirects() {
 function redirectSuccess(data) {
  window.location.href = data["redirect_url"];
 }
 $("body").on("click", "a[gb-purpose='redirects']", function (e) {
  $($(this).attr("gb-target")).click();
 });
}

function tabHandlers() {
 function getTabSuccess(data, navBtn) {
  $(data["tab_pane_id"]).find(".gb-tab-pane-body").html(data["_post_row"]);
 }
 $("body").on("click", "a[data-toggle='tab']", function (e) {
  e.preventDefault();
  ajaxCall($(this).attr("gb-url"), {}, getTabSuccess);
 });
 $("body").on("click", "a[gb-data-toggle='gb-expandable-tab']", function (e) {
  e.preventDefault();
  var navBtn = $(this);
  navBtn.closest(".gb-nav-parent")
          .find("a[gb-data-toggle='gb-expandable-tab']").removeClass("active");
  navBtn.addClass("active");
  ajaxCall($(this).attr("gb-url"), {}, function (data) {
   getTabSuccess(data, navBtn);
  });
 });
}

function toggleEvents() {
 function checklistToggleSuccess(data, parent) {
  var checklistProgress = parent.find(".gb-checklist-item-progress")
  checklistProgress.attr("aria-valuenow", data["gb_progress"]);
  checklistProgress.attr("style", "width:" + data["gb_progress"] + "%");
  parent.find(".gb-stat-value").text(data["gb_progress"] + "%");
 }
 $(".gb-nav-collapse-toggle").click(function (e) {
  $(".gb-nav-collapse").css("display", "visible!important");
  $(".gb-nav-collapse").toggle("slow");
 });
 $("body").on("click", ".gb-toggle", function (e) {
  $($(this).attr("gb-target")).slideToggle("slow");
 });
 $('ul.nav li.dropdown').hover(function () {
  $(this).find('.dropdown-menu').stop(true, true).delay(200).slideDown();
 }, function () {
  $(this).find('.dropdown-menu').stop(true, true).delay(100).slideUp();
 });
 $("body").on("click", ".gb-dropdown-toggle", function (e) {
  e.stopPropagation();
  $('.gb-mega-dropdown').hide();
  var megaDropdown = $($(this).attr("gb-target"));
  if (megaDropdown.is(":visible")) {
   megaDropdown.slideUp();
  } else {
   megaDropdown.slideDown();
  }
 });
 $(document).click(function (e) {
  if (!$(e.target).closest('.gb-mega-dropdown').length) {
   if ($('.gb-mega-dropdown').is(":visible")) {
    $('.gb-mega-dropdown').hide();
   }
  }
 });
 $("body").on("click", "input[gb-purpose='gb-checklist-toggle']", function (e) {
  var parent = $(this).closest($(this).attr("gb-parent"));
  var data = {source: parent.attr("gb-source"),
   source_pk: parent.attr("data-gb-source-pk")};
  ajaxCall($(this).attr("gb-url"), data, function (data) {
   checklistToggleSuccess(data, parent);
  });
 });
}

function formEvents() {
 function submitFormSuccess(data, formId, prependTo, action) {
  if (data["success"] == null && typeof data == 'object') {
   putFormErrors($(formId), $(formId + "-error-display"), data);
  } else {
   var postRow = $(data["_post_row"]);
   var rowDisplay = postRow.find(".gb-row-display");
   switch (action) {
    case AJAX_RETURN_ACTION_NORMAL:
     prependTo.prepend(postRow);
     rowDisplay.flash('226,240,217', 5000);
     prependTo.find(".gb-no-information").remove();
     clearForm($(formId));
     reorderRows(prependTo);
     break;
    case AJAX_RETURN_ACTION_EDIT:
    case AJAX_RETURN_ACTION_REPLACE:
     var form = $(formId);
     var replaceTarget = $(".gb-post-entry-row[data-gb-source=" + data["data_source"] + "][data-gb-source-pk=" + data["source_pk_id"] + "]");
     clearForm(form);
     sendFormHome(form);
     if (replaceTarget.html()) {
      replaceTarget.replaceWith(postRow);
      rowDisplay.flash('226,240,217', 5000);
      reorderRows(prependTo);
     } else {
      prependTo.prepend(data["_post_row"]);
     }
     break;
    case AJAX_RETURN_ACTION_REDIRECTS:
     window.location.href = data["redirect_url"];
     break;
   }

  }
 }
 function putFormErrors(form, errorDisplay, data) {
  errorBox = form.find(".gb-error-box");
  form.find(".errorMessage").hide();
  errorBox.fadeIn("slow");
  errorDisplay.empty();
  var count = 0;
  $.each(data, function (key, value) {
   if (count === 0) {
    var id = JSON.stringify("#" + key + "_em_").toString();
    id = id.substring(1, id.length - 1);
    $(id).show("slow");
    $(id).html(value);
   }
   errorDisplay.append(value + "<br>");
   count++;
  });
  setTimeout(function () { // this will automatically close the alert and remove this if the users doesnt close it in 5 secs
   errorBox.fadeOut();
  }, 8000);
 }
 function clearForm(form) {
  var formParent = form.closest(".gb-panel-form");
  $(".gb-form-show").show("slow");
  $(".gb-panel-display").show("slow");
  $(".gb-backdrop").fadeOut(700);
  $(".gb-form-slide-btn").each(function (e) {
   $(this).removeClass("gb-backdrop-escapee");
  });
  formParent.slideUp();
  form.find(".form-group input").val("");
  form.find(".form-group input").attr("value", "");
  form.find(".form-group textarea").val("");
  form.find(".gb-share-with-textboxes").empty();
  form.find(".gb-share-with-display").empty();
  form.find(".gb-error-box").hide();
  form.find(".errorMessage").hide();
  $(".gb-select-person-btn").removeClass("btn-success")
          .addClass("btn-info")
          .text("Select")
          .attr("gb-selected", 0);
  form.find("select option:first").each(function (e) {
   $(this).attr('selected', 'selected');
  });
  $(".gb-backdrop-visible").removeClass("gb-backdrop-escapee");
  form.closest(".modal").modal("hide");
 }
 function sendFormHome(form) {
  $("#gb-forms-home").append(form);
 }
 $("body").on("click", ".gb-form-hide", function (e) {
  e.preventDefault();
  clearForm($(this));
 });
 $("body").on("click", ".gb-submit-form", function (e) {
  e.preventDefault();
  var form = $(this).closest("form");
  var data = form.serialize();
  var formId = "#" + form.attr("id");
  var prependTo = $(form.attr("gb-submit-prepend-to"));
  if ($(this).attr('gb-edit-btn') == 0) {
   var addUrl = $(this).closest("form").attr("gb-add-url");
   var action = parseInt($(this).attr("gb-ajax-return-action"));

   ajaxCall(addUrl,
           data,
           function (data) {
            submitFormSuccess(data, formId, prependTo, action);
           });
  } else if ($(this).attr('gb-edit-btn') == 1) {
   //var editUrl = form.attr("gb-edit-url");
   var dataSource = $(this).data('gb-source');
   var sourcePkId = $(this).data('gb-source-pk');
   ajaxCall(EDIT_ME_URL + "/dataSource/" + dataSource + "/sourcePkId/" + sourcePkId, data, function (data) {
    submitFormSuccess(data, formId, prependTo, AJAX_RETURN_ACTION_EDIT);
   });
  }
 });
 $("body").on("click", ".gb-form-show", function (e) {
  e.preventDefault();
  var targetFormParent = $($(this).attr("gb-form-slide-target"));
  var targetForm = $($(this).attr("gb-form-target"));
  targetFormParent.html(targetForm);
  targetFormParent.find("[type='submit']").attr("gb-edit-btn", 0);
  $(".gb-backdrop-visible").removeClass("gb-backdrop-escapee");
  if ($(this).hasClass("gb-backdrop-visible")) {
   $(this).addClass("gb-backdrop-escapee");
  }
  targetFormParent.slideDown("slow");
  targetFormParent.find(".gb-panel-display").hide("slow");

  if ($(this).attr("gb-is-child-form") == "1") {
   $($(this).attr("gb-form-parent-id-input")).val($(this).attr("gb-form-parent-id"));
   //targetForm.attr("gb-submit-prepend-to", $(this).attr("gb-nested-submit-prepend-to"));
   //targetForm.attr("gb-add-url", $(this).attr("gb-add-url"));
  }
  if ($(this).is("[gb-form-heading]")) {
   targetFormParent.find(".gb-form-heading").text($(this).attr("gb-form-heading"));
  }
  if ($(this).is("[gb-form-status]")) {
   $($(this).attr("gb-form-status-id-input")).val($(this).attr("gb-form-status"));
  }
  if ($(this).is("[gb-submit-prepend-to]")) {
   targetForm.attr("gb-submit-prepend-to", $(this).attr("gb-submit-prepend-to"));
  }

  if ($(this).hasClass("gb-advice-page-form-slide")) {
   addAdvicePageSpinner();
  }
  $(".gb-backdrop").hide().delay(500).fadeIn(600);

 });
 $("body").on("click", ".gb-modal-trigger", function (e) {
  e.preventDefault();
  var gbUrl = $(this).attr("gb-url");
  var targetModal = $($(this).attr("gb-modal-target"));
  var targetModalInner = targetModal.find(".gb-modal-inner");
  var data = {};
  targetModal.modal({backdrop: 'static', keyboard: false});
  ajaxCall(gbUrl, data, function (data) {
   populateSuccess(data, targetModalInner);
  });
 });
 $("body").on("click", ".gb-form-middleman-submit", function (e) {
  e.preventDefault();
  var parentMiddlemanForm = $(this).closest(".gb-form-middleman");
  var description = parentMiddlemanForm.find("textarea").val().trim();
  if (description) {
   var targetForm = $(parentMiddlemanForm.attr("gb-form-target"));
   var submitBtn = targetForm.find("[type='submit']");
   $(parentMiddlemanForm.attr("gb-form-description-input")).val(description);
   submitBtn.attr("gb-edit-btn", 0);

   if (parentMiddlemanForm.attr("gb-is-child-form") == "1") {
    $(parentMiddlemanForm.attr("gb-form-parent-id-input")).val(parentMiddlemanForm.attr("gb-form-parent-id"));
    //targetForm.attr("gb-submit-prepend-to", parentMiddlemanForm.attr("gb-nested-submit-prepend-to"));
    //targetForm.attr("gb-add-url", parentMiddlemanForm.attr("gb-add-url"));
   }
   if (parentMiddlemanForm.is("[gb-add-url]")) {
    targetForm.attr("gb-add-url", parentMiddlemanForm.attr("gb-add-url"));
   }
   if (parentMiddlemanForm.is("[gb-form-status]")) {
    $(parentMiddlemanForm.attr("gb-form-status-id-input")).val(parentMiddlemanForm.attr("gb-form-status"));
   }
   if (parentMiddlemanForm.is("[gb-submit-prepend-to]")) {
    targetForm.attr("gb-submit-prepend-to", parentMiddlemanForm.attr("gb-submit-prepend-to"));
   }

   if (parentMiddlemanForm.hasClass("gb-advice-page-form-slide")) {
    addAdvicePageSpinner();
   }
   //alert($("#gb-form-parent-id-input"));
   // alert($("#gb-todo-comment-form-description-input").val());
   submitBtn.click();

   parentMiddlemanForm.find("textarea").val("");
  }

 });
 $("body").on("click", ".gb-form-middleman-edit-submit", function (e) {
  e.preventDefault();
  var editBtn = $(this);
  var parent = editBtn.closest(".gb-post-entry-row");
  var middleManForm = editBtn.closest(".gb-form-middleman");
  var targetForm = $(middleManForm.data("gb-form-target"));
  middleManForm.find("[data-gb-control-target]").each(function (e) {
   var gbFormAttribute = $($(this).data("gb-control-target"));
   if (gbFormAttribute.is("input") || gbFormAttribute.is("textarea")) {
    gbFormAttribute.val($(this).val().trim());
   }
   if (gbFormAttribute.is("select")) {
    gbFormAttribute.find("option[value=" + $(this).attr("gb-option-id") + "]").attr('selected', 'selected');
   }
  });
  var submitBtn = targetForm.find("[type='submit']");
  submitBtn.data("gb-source", parent.data("gb-source"));
  submitBtn.data("gb-source-pk", parent.data("gb-source-pk"));
  submitBtn.attr("gb-edit-btn", 1);
  //alert($("#gb-form-parent-id-input"));
  // alert($("#gb-todo-comment-form-description-input").val());
  submitBtn.click();

 });
 $("body").on("click", ".gb-form-show-modal", function (e) {
  e.preventDefault();
  var targetForm = $($(this).attr("gb-form-slide-target"));
  targetForm.modal({backdrop: 'static', keyboard: false});
  targetForm.find(".modal-body").html($($(this).attr("gb-form-target")));
  targetForm.find("[type='submit']").attr("gb-edit-btn", 0);
  if ($(this).hasClass("gb-advice-page-form-slide")) {
   addAdvicePageSpinner();
  }
 });
 $("body").on("click", ".gb-show-more-btn", function (e) {
  e.preventDefault();
  var parent = $(this).closest($(this).attr("gb-closest-parent"));
  parent.find(".gb-show-more").slideToggle("slow");
 });
 $("body").on("click", ".gb-edit-form-show", function (e) {
  e.preventDefault();
  var editBtn = $(this);
  var parent = editBtn.closest(".gb-post-entry-row");
  var panelForm = parent.find(".gb-panel-form");
  parent.find(".gb-panel-display").hide("fast");
  panelForm.addClass("gb-backdrop-escapee")
          .slideDown("slow");

  parent.find(".gb-display-attribute").each(function (e) {
   var gbFormAttribute = panelForm.find("[data-gb-control-target='" + $(this).data("gb-control-target") + "']");
   if (gbFormAttribute.is("input") || gbFormAttribute.is("textarea")) {
    gbFormAttribute.val($(this).text().trim());
   }
   if (gbFormAttribute.is("select")) {
    gbFormAttribute.find("option[value=" + $(this).attr("gb-option-id") + "]").attr('selected', 'selected');
   }
  });
  $(".gb-backdrop").hide().delay(500).fadeIn(600);
 });
 $("body").on("click", ".gb-edit-form-hide", function (e) {
  e.preventDefault();
  var form = $(this).closest(".gb-panel-form");
  $(".gb-form-show").show("slow");
  $(".gb-panel-display").show("slow");
  $(".gb-backdrop").fadeOut(700);
  $(".gb-form-slide-btn").each(function (e) {
   $(this).removeClass("gb-backdrop-escapee");
  });
  form.slideUp();
  form.find(".form-group input").val("");
  form.find(".form-group textarea").val("");
  form.find(".gb-share-with-textboxes").empty();
  form.find(".gb-share-with-display").empty();
  form.find(".gb-error-box").hide();
  form.find(".errorMessage").hide();
  $(".gb-select-person-btn").removeClass("btn-success")
          .addClass("btn-info")
          .text("Select")
          .attr("gb-selected", 0);
  form.find("select option:first").each(function (e) {
   $(this).attr('selected', 'selected');
  });
  $(".gb-backdrop-visible").removeClass("gb-backdrop-escapee");
 });
}

function deleteHandlers() {
 function deleteMeSuccess(data, deleteType, reorderParent) {
  $("#gb-delete-confirmation-modal").modal("hide");
  if (deleteType == DEL_TYPE_REMOVE) {
   $(".gb-post-entry-row[data-gb-source=" + data["data_source"] + "][data-gb-source-pk=" + data["source_pk_id"] + "]").fadeTo("slow", 0.01, function () { //fade
    $(this).slideUp("slow", function () { //slide up
     $(this).remove(); //then remove from the DOM
     reorderRows(reorderParent);
    });
   });
  } else if (deleteType == DEL_TYPE_REPLACE) {
   $(".gb-post-entry-row[data-gb-source=" + data["data_source"] + "][data-gb-source-pk='0']").html(data["_replace_with_row"]);
  }
 }
 $("body").on("click", ".gb-delete-me", function (e) {
  e.preventDefault();
  var deleteBtn = $(this);
  var parent = deleteBtn.closest(".gb-post-entry-row");
  var dataSource = parent.data("gb-source");
  var sourcePkId = parent.data("gb-source-pk");
  var deleteType = deleteBtn.data("gb-del-type");
  $("#gb-delete-confirmation-modal").modal({backdrop: 'static', keyboard: false});
  $("#gb-delete-me-submit")
          .data("gb-source", dataSource)
          .data("gb-source-pk", sourcePkId)
          .data("gb-del-type", deleteType)
          .data("gb-reorder-parent", parent.parent().attr("id"));
  $("#gb-delete-confirmation-modal")
          .find(".gb-delete-message")
          .text(DELETE_MESSAGE[parent.data("gb-del-message-key")]);
  //sendFormHome(parent.find("form"));
 });
 $("body").on("click", "#gb-delete-me-submit", function (e) {
  e.preventDefault();
  var reorderParent = $("#" + $(this).data("gb-reorder-parent"));
  var dataSource = $(this).data("gb-source");
  var sourcePkId = $(this).data("gb-source-pk");
  var deleteType = $(this).data("gb-del-type");
  var data = {source_pk_id: sourcePkId,
   data_source: dataSource};
  ajaxCall(DELETE_ME_URL, data, function (data) {
   deleteMeSuccess(data, deleteType, reorderParent);
  });
 });
}


function selectPersonHandler() {
 function populateSuccess(data, modalInner) {
  $(modalInner).html(data["_populate_content"]);
 }
 function getSelectPeopleList(data, parent) {
  parent.find(".gb-people-list-selector").html(data["_post_row"]);
 }
 function selectSharePerson(name, userId, type, inputParent, displayParent, inputClassName) {
  var shareWIthIndex = type;
  //var shareTexboxes = $("#" + shareWith[shareWIthIndex] + "-textboxes");
  //var shareDisplay = $("#" + shareWith[shareWIthIndex] + "-display");
  inputParent
          .append($("<input type='text' value=" + userId + " name='" + inputClassName + "[]' >")
                  .addClass(inputClassName));
  displayParent
          .append($("<div />")
                  .addClass(inputClassName + " pull-left")
                  .attr("value", userId)
                  .append($("<span />")
                          .text(name))
                  .append($("<span />")
                          .text("X")
                          .attr("gb-type", type)
                          .addClass("gb-remove-selected-person btn btn-default btn-xs")));
 }
 function unselectSharePerson(userId, type, inputClassName) {
  $("." + inputClassName + "[value=" + userId + "]").remove();
 }

 $("body").on("click", ".gb-share-with-modal-trigger", function (e) {
  e.preventDefault();
  var shareWIthIndex = parseInt($(this).attr("gb-type"));
  $("#" + shareWith[shareWIthIndex] + "-modal").modal({backdrop: 'static', keyboard: false});
 });
 $("body").on("click", ".gb-select-sharing-type", function (e) {
  e.preventDefault();
  var parent = $(this).closest(".modal");
  var shareWIthIndex = parseInt(parent.attr("gb-type"));
  var privacy = parseInt($(this).attr("gb-type"));
  $("#" + shareWith[shareWIthIndex] + "-sharing-type").val(privacy);
  parent.find(".gb-select-sharing-type").removeClass("active");
  $(this).addClass("active");
  $("." + shareWith[shareWIthIndex] + "-privacy").text(privacyText[privacy]);
  if (privacy == 2) {
   parent.find(".gb-share-with-people-list").slideToggle("slow");
  } else {
   parent.find(".gb-share-with-people-list").slideUp("slow");
  }
 });
 $("body").on("click", ".gb-select-person-btn", function (e) {
  e.preventDefault();
  var parent = $(this).closest(".modal");
  var selectionType = parent.attr("gb-selection-type");
  if (selectionType === "multiple") {
   var selectedIdsParent = $(parent.attr("gb-selected-id-array"));
   var selectedDisplayParent = $(parent.attr("gb-selected-display"));
   var selectedIdsInputName = parent.attr("gb-selected-input-name");
   if ($(this).attr("gb-selected") == 0) {
    var selectedName = $(this).closest(".gb-person-badge").find(".gb-person-name").text().trim();
    var selectedUserId = $(this).closest(".gb-person-badge").attr("person-id");
    // selectSharePerson(selectedName, selectedUserId, parseInt($(this).attr("gb-type")))
    $(this).removeClass("btn-info")
            .addClass("btn-success")
            .text("Unselect")
            .attr("gb-selected", 1);
    selectSharePerson(selectedName, selectedUserId,
            parseInt($(this).attr("gb-type")),
            selectedIdsParent,
            selectedDisplayParent,
            selectedIdsInputName);
   } else if ($(this).attr("gb-selected") == 1) {
    $(this).removeClass("btn-success")
            .addClass("btn-info")
            .text("Select")
            .attr("gb-selected", 0);
    var selectedUserId = $(this).closest(".gb-person-badge").attr("person-id");
    unselectSharePerson(selectedUserId, parseInt($(this).attr("gb-type")), selectedIdsInputName);
   }
  }
 });
 $("body").on("click", ".gb-remove-selected-person", function (e) {
  var shareWIthIndex = parseInt($(this).attr("gb-type"));
  var userId = $(this).closest("." + shareWith[shareWIthIndex] + "-input").attr("value");
  var parent = $("#" + shareWith[shareWIthIndex] + "-modal");
  parent.find($(".gb-person-badge[person-id=" + userId + "]")
          .find(".gb-select-person-btn")).click();
 });
}

function postsHandlers() {
 function appendMoreSuccess(data, oldMoreBtn) {
  var postRow = data["_post_row"];
  var appendTo = $(oldMoreBtn.data("gb-parent"));
  appendTo.append(postRow);
  oldMoreBtn.remove();
  appendTo.find(".gb-no-information").remove();
  reorderRows(appendTo);
 }
 $("body").on("click", ".gb-more-btn", function (e) {
  e.preventDefault();
  var moreBtn = $(this);
  var data = {
   data_source: moreBtn.data('gb-source'),
   source_pk_id: moreBtn.data('gb-source-pk'),
   offset: moreBtn.data("gb-offset")
  };
  ajaxCall(APPEND_MORE_URL, data, function (data) {
   appendMoreSuccess(data, moreBtn);
  });
 });
 $("body").on("click", ".gb-post-tabs li a", function (e) {
  e.preventDefault();
  var postType = $(this).attr("gb-post-type");
  var creatorId = $(this).attr("gb-creator-id");
  var appendTo = $(this).attr("href");
  var data = {post_type: postType,
   creator_id: creatorId};
  $("#gb-send-request-modal").find(".gb-requester-creator").show();
  ajaxCall(getPostsUrl, data, function (data) {
   getPostsSuccess(data, appendTo);
  });
 });
}

function notificationHandlers() {
 $("body").on("click", ".gb-request-trigger-btn", function (e) {
  e.preventDefault();
  var type = parseInt($(this).attr("gb-type"));
  switch (type) {
   case REQUEST_TYPE.MENTORSHIP_MENTOR:
    $("#gb-request-to-trigger").text("Choose Mentor(s)");
    $("#gb-request-modal-heading").text("Choose Mentor(s)");
    break;
   case REQUEST_TYPE.MENTORSHIP_MENTE:
    $("#gb-request-to-trigger").text("Choose Mentee(s)");
    $("#gb-request-modal-heading").text("Choose Mentee(s)");
    break;
   case REQUEST_TYPE.MENTOR_ASSIGN:
    $("#gb-request-to-trigger").text("Assign Mentor(s)");
    $("#gb-request-modal-heading").text("Assign Mentor(s)");
    break;
   case REQUEST_TYPE.PROJECT_MEMBER:
    $("#gb-request-to-trigger").text("Choose Member(s)");
    $("#gb-request-modal-heading").text("Choose Member(s)");
    break;
   case REQUEST_TYPE.SKILL_ASSIGN:
    $("#gb-request-to-trigger").text("Choose Skill Member(s)");
    $("#gb-request-modal-heading").text("Choose Skilled Member(s)");
    break;
   case REQUEST_TYPE.OBSERVER:
    $("#gb-request-to-trigger").text("Choose Observer(s)");
    $("#gb-request-modal-heading").text("Choose Observer(s)");
    break;
   case REQUEST_TYPE.JUDGE:
    $("#gb-request-to-trigger").text("Choose Contributor(s)");
    $("#gb-request-modal-heading").text("Choose Contributor(s)");
    break;
  }

  $("#gb-request-to-trigger").attr("gb-type", $(this).attr("gb-type"));
  $("#gb-request-to-trigger").attr("data-gb-source-pk", $(this).attr("data-gb-source-pk"));
  $("#gb-request-to-trigger").attr("gb-target-modal", $(this).attr("gb-target-modal"));
  $("#gb-request-to-trigger").attr("data-gb-source", $(this).attr("data-gb-source"));
  $("#gb-request-form-title-input").attr("placeholder", $(this).attr("gb-request-title-placeholder"));
  $("#gb-request-form-title-input").val($(this).attr("gb-request-title"));
  $("#gb-send-request-modal").attr("gb-selection-type", "multiple");
  $($(this).attr("gb-form-target")).attr("gb-submit-prepend-to", $(this).attr("gb-submit-prepend-to"));
  $("#gb-send-request-modal").attr("gb-single-target-display", $(this).attr("gb-single-target-display"));
 });
 $("body").on("click", ".gb-prepopulate-selected-people-list", function (e) {
  e.preventDefault();
  var requestModal = $($(this).attr("gb-target-modal"));
  var sourcePkId = $(this).attr("data-gb-source-pk");
  var type = $(this).attr("gb-type");
  var data = {source_id: sourcePkId,
   type: type};
  ajaxCall(getSelectPeopleListUrl, data, function (data) {
   getSelectPeopleList(data, requestModal);
  });
 });
 $("body").on("click", ".gb-send-request-modal-trigger", function (e) {
  e.preventDefault();
  var requestModal = $("#gb-send-request-modal");
  var dataSource = $(this).attr("data-gb-source");
  var sourcePkId = $(this).attr("data-gb-source-pk");
  var type = $(this).attr("gb-type");
  var requesterType = parseInt($(this).attr("gb-requester-type"));
  requestModal.attr("gb-selected-id-array", $(this).attr("gb-selected-id-array"));
  requestModal.attr("gb-selected-display", $(this).attr("gb-selected-display"));
  requestModal.attr("gb-selected-input-name", $(this).attr("gb-selected-input-name"));
  $("#gb-request-form-data-source-input").val(dataSource);
  $("#gb-request-form-source-id-input").val(sourcePkId);
  $("#gb-request-form-type-input").val(type);
  $("#gb-request-form-status-input").val($(this).attr("gb-status"));
  // if (requesterType == REQUEST_FROM_OWNER) {
  $("#gb-send-request-modal").find(".gb-requester-creator").show();
  requestModal.modal({backdrop: 'static', keyboard: false});
 });
 $("body").on("click", ".gb-accept-request-btn", function (e) {
  e.preventDefault();
  var notificationId = $(this).attr("gb-notification-id");
  var data = {notification_id: notificationId};
  ajaxCall(acceptRequestUrl, data, function (data) {
   redirectSuccess(data);
  });
 });
 $("body").on("click", '.gb-notifications-nav .dropdown-menu', function (e) {
  e.stopPropagation();
 });
}