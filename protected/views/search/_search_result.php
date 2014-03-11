<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
$count = 1;
foreach ($searchResults as $searchResult):
  switch ($searchType) {
    case Post::$TYPE_LIST_BANK:
      echo $this->renderPartial('skill.views.skill._skill_bank_item_row', array(
       'skillBankItem' => $searchResult,
       'count' => $count++));
      break;
    case Post::$TYPE_GOAL_LIST:
      echo $this->renderPartial('skill.views.skill._skill_list_post_row', array(
       'skillListItem' => $searchResult,
       'count' => $count++));
      break;
    case Post::$TYPE_MENTORSHIP:
      echo $this->renderPartial('mentorship.views.mentorship._mentorship_row', array(
       "mentorship" => $searchResult,
      ));
      break;
    case Post::$TYPE_MENTORSHIP_REQUEST:
      $mentorshipRequest = RequestNotification::model()->findByPk($post->source_id);
      if ($mentorshipRequest != null) {
        echo $this->renderPartial('mentorship.views.mentorship._mentorship_request_row', array(
         "mentorshipRequest" => $mentorshipRequest,
        ));
      }
      break;
    case Post::$TYPE_ADVICE_PAGE:
      echo $this->renderPartial('pages.views.pages._goal_page_row', array(
       "goalPage" => $searchResult,
      ));
      break;
  }
endforeach;
?>

