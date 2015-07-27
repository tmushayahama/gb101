<?php

/* @var $this HobbyController */
/* @var $model HobbyCommitment */
/* @var $form CActiveForm */
?>
<?php
switch (Hobby::getHobbyViewType($hobby)) {
  
  case Hobby::$HOBBY_OWNER_GAINED:
    echo $this->renderPartial('hobby.views.hobby.hobby_row_views._hobby_gained', array(
     'hobby' => $hobby,
     'source'=>$source));
    break;
  case Hobby::$HOBBY_OWNER_TO_IMPROVE:
    echo $this->renderPartial('hobby.views.hobby.hobby_row_views._hobby_to_improve', array(
     'hobby' => $hobby,
     'source'=>$source));
    break;
  case Hobby::$HOBBY_OWNER_TO_LEARN:
    echo $this->renderPartial('hobby.views.hobby.hobby_row_views._hobby_to_learn', array(
     'hobby' => $hobby,
     'source'=>$source));
    break;
  case Hobby::$HOBBY_OWNER_OF_INTEREST:
    echo $this->renderPartial('hobby.views.hobby.hobby_row_views._hobby_of_interest', array(
     'hobby' => $hobby,
     'source'=>$source));
    break;
  case Hobby::$HOBBY_IS_FRIEND_GAINED:
    echo $this->renderPartial('hobby.views.hobby.hobby_row_views._friend_gained', array(
     'hobby' => $hobby,
     'source'=>$source));
    break;
  case Hobby::$HOBBY_IS_FRIEND_TO_IMPROVE:
    echo $this->renderPartial('hobby.views.hobby.hobby_row_views._friend_to_improve', array(
     'hobby' => $hobby,
     'source'=>$source));
    break;
  case Hobby::$HOBBY_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('hobby.views.hobby.hobby_row_views._friend_to_learn', array(
     'hobby' => $hobby,
     'source'=>$source));
    break;
  case Hobby::$HOBBY_IS_FRIEND_OF_INTEREST:
    echo $this->renderPartial('hobby.views.hobby.hobby_row_views._friend_of_interest', array(
     'hobby' => $hobby,
     'source'=>$source));
    break;
}
?>
