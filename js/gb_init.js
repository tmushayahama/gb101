// ________________________________________________________________
// |-------------------------INITIALIZATIONS-----------------------|
// `````````````````````````````````````````````````````````````````
var AJAX_RETURN_ACTION_NORMAL = 1;
var AJAX_RETURN_ACTION_EDIT = 2;
var AJAX_RETURN_ACTION_REDIRECTS = 3;
var AJAX_RETURN_ACTION_REPLACE = 4;
var AJAX_RETURN_ACTION_NOTIFY = 5;

var privacyText = [
 "Private",
 "Public",
 "Customize"
];
var DELETE_MESSAGE = {
 COMMENT: "You are about to delete a comment. Are you sure?",
 NOTE: "You are about to delete a note. Are you sure?",
 NOTIFICATION: "You are about to delete a notification. Are you sure?",
 TODO_LIST: "You are about to delete todo list. Are you sure?",
 TODO: "You are about to delete a to-do. Are you sure?"
};

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
 parent.children(".gb-block").each(function () {
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
  $(data["tab_pane_id"]).html(data["_post_row"]);
  if (!(data["css_theme_url"] == null && typeof data == 'object')) {
   $('#gb-theme').attr('href', data["css_theme_url"]);
  }
  history.pushState("", "", data["selected_tab_url"]);
  var pageUrl = navBtn.attr("gb-url");
  if (pageUrl != window.location) {
   // window.history.pushState({path: pageUrl}, '', pageUrl);
  }
//stop refreshing to the page given in
  // return false;
 }
 /*
  function getTabSuccessPopstate(data) {
  $(data["tab_pane_id"]).html(data["_post_row"]);
  }

  $(window).bind('popstate', function () {
  ajaxCall(location.pathname, {}, function (data) {
  getTabSuccessPopstate(data);
  });
  });*/

 $("body").on("click", "a[data-toggle='tab']", function (e) {
  e.preventDefault();
  ajaxCall($(this).attr("gb-url"), {}, getTabSuccess);
 });
 $("body").on("click", ".gb-link", function (e) {
  e.preventDefault();
  var navBtn = $(this);
  ajaxCall($(this).attr("gb-url"), {}, function (data) {
   getTabSuccess(data, navBtn);
  });

 });
 $("body").on("click", "a[gb-data-toggle='gb-expandable-tab']", function (e) {
  e.preventDefault();
  var navBtn = $(this);
  navBtn.closest(".gb-nav-parent")
          .find("a[gb-data-toggle='gb-expandable-tab']").removeClass("active");
  navBtn.addClass("active");

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
 $("body").on("click", "a[gb-purpose='gb-more-toggle']", function (e) {
  var toggleBtn = $(this);
  var parent = toggleBtn.closest(toggleBtn.data("gb-parent"));
  parent.find(".gb-more-target").slideToggle("slow");

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

     var replaceTarget = $(".gb-block[data-gb-source=" + data["data_source"] + "][data-gb-source-pk=" + data["source_pk_id"] + "]");
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
    case AJAX_RETURN_ACTION_NOTIFY:
     clearForm($(formId));
     $("#gb-notify-modal-title").text(data["notify_title"])
     $("#gb-notify-modal-description").text(data["notify_description"])
     $("#gb-notify-modal").modal({backdrop: 'static', keyboard: false});
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

 function nextFormLoad(data, formId) {
  var form = $(formId);
  form.replaceWith(data["next_form"]);
  form.flash('226,240,217', 5000);
 }

 function clearForm(form) {
  var formParent = form.closest(".gb-panel-form");
  var block = form.closest(".gb-block");
  block.find(".gb-form-show").show();
  formParent.hide();
  block.find(".gb-panel-display").fadeIn("slow");
  //$(".gb-backdrop").fadeOut(700);
  //$(".gb-form-slide-btn").each(function (e) {
  //$(this).removeClass("gb-backdrop-escapee");
  // });

  form.find(".form-group input").val("");
  form.find(".form-group input").attr("value", "");
  form.find(".form-group textarea").val("");
  form.find(".gb-selected-people-display").empty();
  form.find(".gb-selected-people-ids").empty();
  form.find(".gb-error-box").hide();
  form.find(".errorMessage").hide();
  form.find("select option:first").each(function (e) {
   $(this).attr('selected', 'selected');
  });
  form.closest(".modal").modal("hide");
 }
 function sendFormHome(form) {
  $("#gb-forms-home").append(form);
 }

 $("body").on("click", ".gb-form-hide", function (e) {
  e.preventDefault();
  clearForm($(this));
 });

 $("body").on("click", ".gb-form-next", function (e) {
  e.preventDefault();
  var formLocationUrl = $(this).data("gb-url");
  var formId = "#" + $(this).closest("form").attr("id");
  ajaxCall(formLocationUrl, {}, function (data) {
   nextFormLoad(data, formId);
  });
 });

 $("body").on("click", ".gb-submit-form", function (e) {
  e.preventDefault();

  var submitBtn = $(this);
  var form = submitBtn.closest("form");
  var data = form.serialize();
  var formId = "#" + form.attr("id");
  var prependTo = $(form.data("gb-prepend-to"));
  var action = parseInt($(this).data("gb-action"));
  var actionUrl = $(this).closest("form").data("gb-url");

  switch (action) {
   case AJAX_RETURN_ACTION_NORMAL:
   case AJAX_RETURN_ACTION_NOTIFY:
   case AJAX_RETURN_ACTION_REPLACE:
    ajaxCall(actionUrl, data, function (data) {
     submitFormSuccess(data, formId, prependTo, action);
    });
    break;
   case AJAX_RETURN_ACTION_EDIT:
    var dataSource = form.data('gb-source');
    var sourcePk = form.data('gb-source-pk');
    var sourceType = form.data('gb-source-type');
    ajaxCall(EDIT_ME_URL + "/dataSource/" + dataSource + "/sourcePk/" + sourcePk + "/sourceType/" + sourceType, data, function (data) {
     submitFormSuccess(data, formId, prependTo, AJAX_RETURN_ACTION_EDIT);
    });
    break;
  }
 });

 $("body").on("click", ".gb-form-show", function (e) {
  e.preventDefault();
  var formShowBtn = $(this);
  var targetFormParent = $(formShowBtn.data("gb-target-container"));
  var targetForm = $(formShowBtn.data("gb-target"));
  targetFormParent.html(targetForm);
  $(".gb-backdrop-visible").removeClass("gb-backdrop-escapee");
  // if (formShowBtn.hasClass("gb-backdrop-visible")) {
  // formShowBtn.addClass("gb-backdrop-escapee");
  //}
  if (formShowBtn.hasClass("gb-backdrop-disappear")) {
   formShowBtn.slideUp();
  }
  targetFormParent.slideDown("slow");
  targetFormParent.find(".gb-panel-display").hide("slow");

  if (formShowBtn.attr("gb-is-child-form") == "1") {
   $(formShowBtn.attr("gb-form-parent-id-input")).val(formShowBtn.attr("gb-form-parent-id"));
   //targetForm.attr("data-gb-prepend-to", $(this).attr("gb-nested-submit-prepend-to"));
   //targetForm.attr("data-gb-url", $(this).attr("data-gb-url"));
  }
  if (formShowBtn.is("[gb-form-heading]")) {
   targetFormParent.find(".gb-form-heading").text(formShowBtn.attr("gb-form-heading"));
  }
  if (formShowBtn.is("[gb-form-status]")) {
   $(formShowBtn.attr("gb-form-status-id-input")).val(formShowBtn.attr("gb-form-status"));
  }
  if (formShowBtn.is("[data-gb-url]")) {
   targetForm.attr("data-gb-url", formShowBtn.attr("data-gb-url"));
  }
  if (formShowBtn.is("[data-gb-prepend-to]")) {
   targetForm.attr("data-gb-prepend-to", formShowBtn.attr("data-gb-prepend-to"));
  }

  if (formShowBtn.hasClass("gb-advice-page-form-slide")) {
   addAdvicePageSpinner();
  }
  //$(".gb-backdrop").hide().delay(500).fadeIn(600);

 });

 $("body").on("click", ".gb-form-modal-trigger", function (e) {
  e.preventDefault();
  var targetModal = $($(this).data("gb-modal-target"));
  targetModal.modal({backdrop: 'static', keyboard: false});
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

 $("body").on("click", ".gb-show-more-btn", function (e) {
  e.preventDefault();
  var parent = $(this).closest($(this).attr("gb-closest-parent"));
  parent.find(".gb-show-more").slideToggle("slow");
 });
 $("body").on("click", ".gb-edit-form-show", function (e) {
  e.preventDefault();
  var editBtn = $(this);
  var parent = editBtn.closest(".gb-block");
  var panelForm = parent.find(".gb-panel-form")
          .not(parent.find(".gb-block .gb-panel-form"));
  parent.find(".gb-panel-display")
          .not(parent.find(".gb-block .gb-panel-display")).hide("fast");
  panelForm.fadeIn("slow");
  //$(".gb-backdrop").hide().delay(500).fadeIn(600);
 });

 $("body").on("click", ".gb-edit-form-hide", function (e) {
  e.preventDefault();
  var form = $(this).closest(".gb-panel-form");
  $(".gb-form-show").show("slow");
  $(".gb-panel-display").show("slow");
  //(".gb-backdrop").fadeOut(700);
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
   $(".gb-block[data-gb-source=" + data["data_source"] + "][data-gb-source-pk=" + data["source_pk_id"] + "]").fadeTo("slow", 0.01, function () { //fade
    $(this).slideUp("slow", function () { //slide up
     $(this).remove(); //then remove from the DOM
     reorderRows(reorderParent);
    });
   });
  } else if (deleteType == DEL_TYPE_REPLACE) {
   $(".gb-block[data-gb-source=" + data["data_source"] + "][data-gb-source-pk='0']").html(data["_replace_with_row"]);
  }
 }
 $("body").on("click", ".gb-delete-me", function (e) {
  e.preventDefault();
  var deleteBtn = $(this);
  var parent = deleteBtn.closest(".gb-block");
  var dataSource = parent.data("gb-source");
  var sourcePk = parent.data("gb-source-pk");
  var deleteType = deleteBtn.data("gb-del-type");
  $("#gb-delete-confirmation-modal").modal({backdrop: 'static', keyboard: false});
  $("#gb-delete-me-submit")
          .data("gb-source", dataSource)
          .data("gb-source-pk", sourcePk)
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
  var sourcePk = $(this).data("gb-source-pk");
  var deleteType = $(this).data("gb-del-type");
  var data = {source_pk_id: sourcePk,
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

 function selectSharePerson(name, userId, peopleListParentId, inputParent, displayParent, inputClassName) {
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
                          .data("gb-parent", "." + inputClassName)
                          .data("gb-people-list-parent", "#" + peopleListParentId)
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
  var selectedBtn = $(this);
  var peopleListParent = selectedBtn.closest(".gb-people-list");
  var selectionType = peopleListParent.data("gb-selection-type");
  if (selectionType == "multiple") {
   var selectedUserId = selectedBtn.closest(".gb-user-badge").data("gb-source-pk");
   var selectedIdsParent = $(peopleListParent.data("gb-selected-ids-container"));
   var selectedDisplayParent = $(peopleListParent.data("gb-selected-display-container"));
   var selectedIdsInputName = peopleListParent.data("gb-selected-input-name");
   if (selectedBtn.data("gb-selected") == 0) {
    var selectedName = selectedBtn.closest(".gb-user-badge").find(".gb-person-name").text().trim();
    // selectSharePerson(selectedName, selectedUserId, parseInt($(this).attr("gb-type")))
    selectedBtn.html($('<i class="text-danger glyphicon glyphicon-minus"></i>'))
            .data("gb-selected", 1);
    selectSharePerson(selectedName,
            selectedUserId,
            peopleListParent.attr("id"),
            selectedIdsParent,
            selectedDisplayParent,
            selectedIdsInputName);
   } else if (selectedBtn.data("gb-selected") == 1) {
    selectedBtn.html($('<i class="text-success glyphicon glyphicon-plus"></i>'))
            .data("gb-selected", 0);
    unselectSharePerson(selectedUserId, parseInt($(this).attr("gb-type")), selectedIdsInputName);
   }
  }
 });
 $("body").on("click", ".gb-remove-selected-person", function (e) {
  var removeSelectedBtn = $(this);
  var userId = removeSelectedBtn.closest(removeSelectedBtn.data("gb-parent")).attr("value");
  var peopleListParent = $(removeSelectedBtn.data("gb-people-list-parent"));
  peopleListParent.find($(".gb-user-badge[data-gb-source-pk=" + userId + "]")
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
 function populateData(data, target) {
  target.html(data["_post_row"]);
 }
 function getSelectPeopleList(data, target) {
  target.html(data["_post_row"]);
 }

 $("body").on("click", ".gb-prepopulate-selected-people-list", function (e) {
  e.preventDefault();
  var populateTarget = $($(this).data("gb-list-target"));
  var sourcePk = $(this).data("gb-source-pk");
  var source = $(this).data("gb-source");
  var data = {source_pk_id: sourcePk,
   source: source};
  //alert(data.source + " " + data.source_pk_id);
  ajaxCall(getSelectPeopleListUrl, data, function (data) {
   getSelectPeopleList(data, populateTarget);
  });
 });

 $("body").on("click", ".gb-request-notification-viewer", function (e) {
  e.preventDefault();
  var populateTarget = $($(this).data("gb-target"));
  var populateParentType = $(this).data("gb-type").trim();
  if (populateParentType == "gb-modal") {
   populateTarget.closest(".modal").modal("show");
   $($(this).data("gb-target-heading")).text($(this).data("gb-heading-text"));
  } else if (populateParentType == "gb-slide") {
   populateTarget.slideToggle("slow");
  }
 });

 $("body").on("click", ".gb-request-notification-close", function (e) {
  e.preventDefault();
  var populateTargetHeading = $($(this).data("gb-target-heading"));
  var populateTargetBody = $($(this).data("gb-target-body"));
  populateTargetHeading.text("");
  populateTargetBody.empty();
 });

 $("body").on("click", ".gb-populate", function (e) {
  e.preventDefault();
  var populateTarget = $($(this).data("gb-target"));
  var sourcePk = $(this).data("gb-source-pk");
  var source = $(this).data("gb-source");
  var data = {
   source_pk: sourcePk,
   source: source};
  ajaxCall(POPULATE_DATA_URL, data, function (data) {
   populateData(data, populateTarget);
  });
 });

 $("body").on("click", ".gb-send-request-modal-trigger", function (e) {
  e.preventDefault();
  var requestModal = $("#gb-send-request-modal");
  var dataSource = $(this).attr("data-gb-source");
  var sourcePk = $(this).attr("data-gb-source-pk");
  var type = $(this).attr("gb-type");
  var requesterType = parseInt($(this).attr("gb-requester-type"));
  requestModal.attr("gb-selected-id-array", $(this).attr("gb-selected-id-array"));
  requestModal.attr("gb-selected-display", $(this).attr("gb-selected-display"));
  requestModal.attr("gb-selected-input-name", $(this).attr("gb-selected-input-name"));
  $("#gb-request-form-data-source-input").val(dataSource);
  $("#gb-request-form-source-id-input").val(sourcePk);
  $("#gb-request-form-type-input").val(type);
  $("#gb-request-form-status-input").val($(this).attr("gb-status"));
  // if (requesterType == REQUEST_FROM_OWNER) {
  $("#gb-send-request-modal").find(".gb-requester-creator").show();
  requestModal.modal({backdrop: 'static', keyboard: false});
 });


 $("body").on("click", ".gb-accept-request-btn", function (e) {
  e.preventDefault();
  var notificationId = $(this).data("gb-notification-id");
  var data = {notification_id: notificationId};
  ajaxCall(acceptRequestUrl, data, function (data) {
   redirectSuccess(data);
  });
 });
 $("body").on("click", '.gb-notifications-nav .dropdown-menu', function (e) {
  e.stopPropagation();
 });
}