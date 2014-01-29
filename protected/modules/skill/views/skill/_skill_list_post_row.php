<?php

/* @var $this GoalListItemController */
/* @var $model GoalCommitment */
/* @var $form CActiveForm */
?>
<?php

switch (GoalList::getSkillViewType($skillListItem)) {
  case GoalList::$SKILL_OWNER_GAINED:
    echo $this->renderPartial('skill_row_views/_owner_gained', array(
     'skillListItem' => $skillListItem));
    break;
  case GoalList::$SKILL_OWNER_TO_LEARN:
    echo $this->renderPartial('skill_row_views/_owner_to_learn', array(
     'skillListItem' => $skillListItem,));
    break;
  case GoalList::$SKILL_IS_FRIEND_GAINED:
    echo $this->renderPartial('skill_row_views/_friend_gained', array(
     'skillListItem' => $skillListItem,));
    break;
  case GoalList::$SKILL_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('skill_row_views/_friend_to_learn', array(
     'skillListItem' => $skillListItem,));
    break;
}
?>
