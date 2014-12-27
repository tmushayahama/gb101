<?php

/* @var $this MentorshipController */
/* @var $model MentorshipCommitment */
/* @var $form CActiveForm */
?>
<?php
switch (Mentorship::getMentorshipViewType($mentorship)) {
  
  case Mentorship::$MENTORSHIP_OWNER_GAINED:
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_row_views._mentorship_gained', array(
     'mentorship' => $mentorship,
     'source'=>$source));
    break;
  case Mentorship::$MENTORSHIP_OWNER_TO_IMPROVE:
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_row_views._mentorship_to_improve', array(
     'mentorship' => $mentorship,
     'source'=>$source));
    break;
  case Mentorship::$MENTORSHIP_OWNER_TO_LEARN:
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_row_views._mentorship_to_learn', array(
     'mentorship' => $mentorship,
     'source'=>$source));
    break;
  case Mentorship::$MENTORSHIP_OWNER_OF_INTEREST:
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_row_views._mentorship_of_interest', array(
     'mentorship' => $mentorship,
     'source'=>$source));
    break;
  case Mentorship::$MENTORSHIP_IS_FRIEND_GAINED:
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_row_views._friend_gained', array(
     'mentorship' => $mentorship,
     'source'=>$source));
    break;
  case Mentorship::$MENTORSHIP_IS_FRIEND_TO_IMPROVE:
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_row_views._friend_to_improve', array(
     'mentorship' => $mentorship,
     'source'=>$source));
    break;
  case Mentorship::$MENTORSHIP_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_row_views._friend_to_learn', array(
     'mentorship' => $mentorship,
     'source'=>$source));
    break;
  case Mentorship::$MENTORSHIP_IS_FRIEND_OF_INTEREST:
    echo $this->renderPartial('mentorship.views.mentorship.mentorship_row_views._friend_of_interest', array(
     'mentorship' => $mentorship,
     'source'=>$source));
    break;
}
?>
