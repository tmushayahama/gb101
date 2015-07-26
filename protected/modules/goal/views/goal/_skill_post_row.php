<?php

/* @var $this GoalController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php
switch (Goal::getGoalViewType($goal)) {
  
  case Goal::$GOAL_OWNER_GAINED:
    echo $this->renderPartial('goal.views.goal.goal_row_views._goal_gained', array(
     'goal' => $goal,
     'source'=>$source));
    break;
  case Goal::$GOAL_OWNER_TO_IMPROVE:
    echo $this->renderPartial('goal.views.goal.goal_row_views._goal_to_improve', array(
     'goal' => $goal,
     'source'=>$source));
    break;
  case Goal::$GOAL_OWNER_TO_LEARN:
    echo $this->renderPartial('goal.views.goal.goal_row_views._goal_to_learn', array(
     'goal' => $goal,
     'source'=>$source));
    break;
  case Goal::$GOAL_OWNER_OF_INTEREST:
    echo $this->renderPartial('goal.views.goal.goal_row_views._goal_of_interest', array(
     'goal' => $goal,
     'source'=>$source));
    break;
  case Goal::$GOAL_IS_FRIEND_GAINED:
    echo $this->renderPartial('goal.views.goal.goal_row_views._friend_gained', array(
     'goal' => $goal,
     'source'=>$source));
    break;
  case Goal::$GOAL_IS_FRIEND_TO_IMPROVE:
    echo $this->renderPartial('goal.views.goal.goal_row_views._friend_to_improve', array(
     'goal' => $goal,
     'source'=>$source));
    break;
  case Goal::$GOAL_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('goal.views.goal.goal_row_views._friend_to_learn', array(
     'goal' => $goal,
     'source'=>$source));
    break;
  case Goal::$GOAL_IS_FRIEND_OF_INTEREST:
    echo $this->renderPartial('goal.views.goal.goal_row_views._friend_of_interest', array(
     'goal' => $goal,
     'source'=>$source));
    break;
}
?>
