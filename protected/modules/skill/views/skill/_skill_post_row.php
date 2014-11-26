<?php

/* @var $this SkillItemController */
/* @var $model SkillCommitment */
/* @var $form CActiveForm */
?>
<?php
switch (Skill::getSkillViewType($skill)) {
  
  case Skill::$SKILL_OWNER_GAINED:
    echo $this->renderPartial('skill.views.skill.skill_row_views._skill_gained', array(
     'skill' => $skill,
     'source'=>$source));
    break;
  case Skill::$SKILL_OWNER_TO_IMPROVE:
    echo $this->renderPartial('skill.views.skill.skill_row_views._creator_to_improve', array(
     'skill' => $skill,
     'source'=>$source));
    break;
  case Skill::$SKILL_OWNER_TO_LEARN:
    echo $this->renderPartial('skill.views.skill.skill_row_views._creator_to_learn', array(
     'skill' => $skill,
     'source'=>$source));
    break;
  case Skill::$SKILL_OWNER_OF_INTEREST:
    echo $this->renderPartial('skill.views.skill.skill_row_views._creator_of_interest', array(
     'skill' => $skill,
     'source'=>$source));
    break;
  case Skill::$SKILL_IS_FRIEND_GAINED:
    echo $this->renderPartial('skill.views.skill.skill_row_views._friend_gained', array(
     'skill' => $skill,
     'source'=>$source));
    break;
  case Skill::$SKILL_IS_FRIEND_TO_IMPROVE:
    echo $this->renderPartial('skill.views.skill.skill_row_views._friend_to_improve', array(
     'skill' => $skill,
     'source'=>$source));
    break;
  case Skill::$SKILL_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('skill.views.skill.skill_row_views._friend_to_learn', array(
     'skill' => $skill,
     'source'=>$source));
    break;
  case Skill::$SKILL_IS_FRIEND_OF_INTEREST:
    echo $this->renderPartial('skill.views.skill.skill_row_views._friend_of_interest', array(
     'skill' => $skill,
     'source'=>$source));
    break;
}
?>
