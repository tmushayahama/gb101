<?php

/* @var $this PromiseController */
/* @var $model PromiseCommitment */
/* @var $form CActiveForm */
?>
<?php
switch (Promise::getPromiseViewType($promise)) {
  
  case Promise::$PROMISE_OWNER_GAINED:
    echo $this->renderPartial('promise.views.promise.promise_row_views._promise_gained', array(
     'promise' => $promise,
     'source'=>$source));
    break;
  case Promise::$PROMISE_OWNER_TO_IMPROVE:
    echo $this->renderPartial('promise.views.promise.promise_row_views._promise_to_improve', array(
     'promise' => $promise,
     'source'=>$source));
    break;
  case Promise::$PROMISE_OWNER_TO_LEARN:
    echo $this->renderPartial('promise.views.promise.promise_row_views._promise_to_learn', array(
     'promise' => $promise,
     'source'=>$source));
    break;
  case Promise::$PROMISE_OWNER_OF_INTEREST:
    echo $this->renderPartial('promise.views.promise.promise_row_views._promise_of_interest', array(
     'promise' => $promise,
     'source'=>$source));
    break;
  case Promise::$PROMISE_IS_FRIEND_GAINED:
    echo $this->renderPartial('promise.views.promise.promise_row_views._friend_gained', array(
     'promise' => $promise,
     'source'=>$source));
    break;
  case Promise::$PROMISE_IS_FRIEND_TO_IMPROVE:
    echo $this->renderPartial('promise.views.promise.promise_row_views._friend_to_improve', array(
     'promise' => $promise,
     'source'=>$source));
    break;
  case Promise::$PROMISE_IS_FRIEND_TO_LEARN:
    echo $this->renderPartial('promise.views.promise.promise_row_views._friend_to_learn', array(
     'promise' => $promise,
     'source'=>$source));
    break;
  case Promise::$PROMISE_IS_FRIEND_OF_INTEREST:
    echo $this->renderPartial('promise.views.promise.promise_row_views._friend_of_interest', array(
     'promise' => $promise,
     'source'=>$source));
    break;
}
?>
