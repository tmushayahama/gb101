<?php

class DiscussionController extends Controller {

  public function actionAddNewDiscussionPost($goalId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['DiscussionTitle']) && isset($_POST['Discussion'])) {
        $discussionTitleModel = new DiscussionTitle();
        $discussionTitleModel->attributes = $_POST['DiscussionTitle'];
        $discussionTitleModel->created_date = date("Y-m-d");
        $discussionTitleModel->goal_id = $goalId;
        $discussionTitleModel->creator_id = Yii::app()->user->id;
        if ($discussionTitleModel->save(false)) {
          $discussionModel = new Discussion();
          $discussionModel->attributes = $_POST['Discussion'];
          $discussionModel->created_date = date("Y-m-d");
          $discussionModel->title_id = $discussionTitleModel->id;
          $discussionModel->creator_id = Yii::app()->user->id;
          $discussionModel->save(false);
        }
      }
      echo CJSON::encode(array(
       '_discussion' => $this->renderPartial('discussion.views.discussion._discussion', array(
        'discussionTitle' => $discussionTitleModel)
         , true)));
      Yii::app()->end();
    }
  }
   public function actionGetDiscussionPosts($goalId) {
    if (Yii::app()->request->isAjaxRequest) {
     $discussionTitleId= Yii::app()->request->getParam('discussion_title_id');
     $discussions = Discussion::getDiscussion($discussionTitleId);
      echo CJSON::encode(array(
       "discussion_title_id" => $discussionTitleId,
       '_discussion_posts' => $this->renderPartial('discussion.views.discussion._discussion_posts', array(
        'discussions' => $discussions)
         , true)));
      Yii::app()->end();
    }
  }

  // Uncomment the following methods and override them if needed
  /*
    public function filters()
    {
    // return the filter configuration for this controller, e.g.:
    return array(
    'inlineFilterName',
    array(
    'class'=>'path.to.FilterClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }

    public function actions()
    {
    // return external action classes, e.g.:
    return array(
    'action1'=>'path.to.ActionClass',
    'action2'=>array(
    'class'=>'path.to.AnotherActionClass',
    'propertyName'=>'propertyValue',
    ),
    );
    }
   */
}
