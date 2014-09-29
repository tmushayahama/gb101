<?php

/* @var $this SkillListItemController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<?php

switch (SkillList::getSkillViewType($skillListItem)) {
  case SkillList::$SKILL_OWNER_GAINED:
    echo $this->renderPartial('skill.views.skill.skill_row_views._owner_gained', array(
     'skillListItem' => $skillListItem,
     'source'=>$source));
    break;
  case SkillList::$SKILL_OWNER_TO_IMPROVE:
    echo $this->renderPartial('skill.views.skill.skill_row_views._owner_to_improve', array(
     'skillListItem' => $skillListItem,
     'source'=>$source));
    break;
  case SkillList::$SKILL_OWNER_TO_LEARN:
    echo $this->renderPartial('skill.views.skill.skill_row_views._owner_to_learn', array(
     'skillListItem' => $skillListItem,
     'source'=>$source));
    break;
  case SkillList::$SKILL_OWNER_OF_INTEREST:
    echo $this->renderPartial('skill.views.skill.skill_row_views._owner_of_interest', array(
     'skillListItem' => $skillListItem,
     'source'=>$source));
    break;
  case SkillList::$SKILL_IS_FRIEND_GAINED:
    echo $this->renderPartial('skill.views.skill.skill_row_views._friend_gained', array(
     'skillListItem' => $skillListItem,
     'source'=>$source));
    break;
  case SkillList::$SKILL_IS_FRIEND_TO_IMPROVE:
    echo $this->renderPartial('skill.views.skill.skill_row_views._friend_to_improve', array(
     'skillListItem' => $skillListItem,
     'source'=>$source));
    break;
  case SkillList::$SKILL_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('skill.views.skill.skill_row_views._friend_to_learn', array(
     'skillListItem' => $skillListItem,
     'source'=>$source));
    break;
  case SkillList::$SKILL_IS_FRIEND_OF_INTEREST:
    echo $this->renderPartial('skill.views.skill.skill_row_views._friend_of_interest', array(
     'skillListItem' => $skillListItem,
     'source'=>$source));
    break;
}
?>
