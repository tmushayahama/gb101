<?php

/* @var $this AdviceController */
/* @var $model AdviceCommitment */
/* @var $form CActiveForm */
?>
<?php
switch (Advice::getAdviceViewType($advice)) {
  
  case Advice::$ADVICE_OWNER_GAINED:
    echo $this->renderPartial('advice.views.advice.advice_row_views._advice_gained', array(
     'advice' => $advice,
     'source'=>$source));
    break;
  case Advice::$ADVICE_OWNER_TO_IMPROVE:
    echo $this->renderPartial('advice.views.advice.advice_row_views._advice_to_improve', array(
     'advice' => $advice,
     'source'=>$source));
    break;
  case Advice::$ADVICE_OWNER_TO_LEARN:
    echo $this->renderPartial('advice.views.advice.advice_row_views._advice_to_learn', array(
     'advice' => $advice,
     'source'=>$source));
    break;
  case Advice::$ADVICE_OWNER_OF_INTEREST:
    echo $this->renderPartial('advice.views.advice.advice_row_views._advice_of_interest', array(
     'advice' => $advice,
     'source'=>$source));
    break;
  case Advice::$ADVICE_IS_FRIEND_GAINED:
    echo $this->renderPartial('advice.views.advice.advice_row_views._friend_gained', array(
     'advice' => $advice,
     'source'=>$source));
    break;
  case Advice::$ADVICE_IS_FRIEND_TO_IMPROVE:
    echo $this->renderPartial('advice.views.advice.advice_row_views._friend_to_improve', array(
     'advice' => $advice,
     'source'=>$source));
    break;
  case Advice::$ADVICE_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('advice.views.advice.advice_row_views._friend_to_learn', array(
     'advice' => $advice,
     'source'=>$source));
    break;
  case Advice::$ADVICE_IS_FRIEND_OF_INTEREST:
    echo $this->renderPartial('advice.views.advice.advice_row_views._friend_of_interest', array(
     'advice' => $advice,
     'source'=>$source));
    break;
}
?>
