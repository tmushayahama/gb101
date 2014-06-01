<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
if (Yii::app()->user->isGuest) {
  $count = 1;
  switch ($searchType) {
    case Post::$TYPE_LIST_BANK:
      echo '<div class="row gb-bottom-border-grey-3">
          <h4 class="pull-left">Search Results - Skill Bank</h4>
        </div>
        <br>';
      foreach ($searchResults as $searchResult):
        echo $this->renderPartial('skill.views.skill._skill_bank_item_row_guest', array(
         'skillBankItem' => $searchResult,
         'count' => $count++));
      endforeach;
      break;
    case Post::$TYPE_GOAL_LIST:
      echo '<div class="row gb-bottom-border-grey-3">
          <h4 class="pull-left">Search Results - Skill Bank</h4>
        </div>
        <br>';
      foreach ($searchResults as $searchResult):
        echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
         'skillListItem' => $searchResult,
         'count' => $count++));
      endforeach;
      break;
    case Post::$TYPE_MENTORSHIP:
      echo '<div class="row gb-bottom-border-grey-3">
          <h4 class="pull-left">Search Results - Mentorships</h4>
        </div>
        <br>';
      foreach ($searchResults as $searchResult):
        echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
         "mentorship" => $searchResult,
        ));
      endforeach;
      break;
    case Post::$TYPE_MENTORSHIP_REQUEST:
      echo '<div class="row gb-bottom-border-grey-3">
          <h4 class="pull-left">Search Results - Mentorship Requests</h4>
        </div>
        <br>';
      $mentorshipRequest = RequestNotification::model()->findByPk($post->source_id);
      foreach ($searchResults as $searchResult):
        if ($mentorshipRequest != null) {
          echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
           "mentorshipRequest" => $mentorshipRequest,
          ));
        }
      endforeach;
      break;
    case Post::$TYPE_ADVICE_PAGE:
      echo '<div class="row gb-bottom-border-grey-3">
          <h4 class="pull-left">Search Results - Advice Pages</h4>
        </div>
        <br>';
      foreach ($searchResults as $searchResult):
        echo $this->renderPartial('pages.views.pages._goal_page_row', array(
         "advicePage" => $searchResult,
        ));
      endforeach;
      break;
    case Post::$TYPE_PEOPLE:
      echo '<h2 class="sub-heading-9">Search Results - People</h2>';
      $count = 0;
      foreach ($searchResults as $searchResult) :
        if ($count % 2 == 0) :
          ?>
          <div class="row-fluid">
            <?php
          endif;
          echo $this->renderPartial('application.views.people._person_badge', array(
           'person' => $searchResult));
          $count++;
          if ($count % 2 == 0) :
            ?>
          </div>
          <?php
        endif;
      endforeach;
      break;
  }
} else {
  $count = 1;
  switch ($searchType) {
    case Post::$TYPE_LIST_BANK:
      echo '<h2 class="sub-heading-9">Search Results - Mentorships</h2>';
      foreach ($searchResults as $searchResult):
        echo $this->renderPartial('skill.views.skill._skill_bank_item_row_guest', array(
         'skillBankItem' => $searchResult,
         'count' => $count++));
      endforeach;
      break;
    case Post::$TYPE_GOAL_LIST:
      echo '<h2 class="sub-heading-9">Search Results - Skill Bank</h2>';
      foreach ($searchResults as $searchResult):
        echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
         'skillListItem' => $searchResult,
         'count' => $count++));
      endforeach;
      break;
    case Post::$TYPE_MENTORSHIP:
      echo '<h2 class="sub-heading-9">Search Results - Mentorships</h2>';
      foreach ($searchResults as $searchResult):
        echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
         "mentorship" => $searchResult,
        ));
      endforeach;
      break;
    case Post::$TYPE_MENTORSHIP_REQUEST:
      $mentorshipRequest = RequestNotification::model()->findByPk($post->source_id);
      foreach ($searchResults as $searchResult):
        if ($mentorshipRequest != null) {
          echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
           "mentorshipRequest" => $mentorshipRequest,
          ));
        }
      endforeach;
      break;
    case Post::$TYPE_ADVICE_PAGE:
      echo '<h2 class="sub-heading-9">Search Results - Advice Pages</h2>';
      foreach ($searchResults as $searchResult):
        echo $this->renderPartial('pages.views.pages._goal_page_row', array(
         "advicePage" => $searchResult,
        ));
      endforeach;
      break;
    case Post::$TYPE_PEOPLE:
      echo '<h2 class="sub-heading-9">Search Results - People</h2>';
      $count = 0;
      foreach ($searchResults as $searchResult) :
        if ($count % 2 == 0) :
          ?>
          <div class="row-fluid">
            <?php
          endif;
          echo $this->renderPartial('application.views.people._person_badge', array(
           'person' => $searchResult));
          $count++;
          if ($count % 2 == 0) :
            ?>
          </div>
          <?php
        endif;
      endforeach;
      break;
  }
}
?>

