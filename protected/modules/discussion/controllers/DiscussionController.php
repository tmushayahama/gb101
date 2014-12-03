<?php

class DiscussionController extends Controller {
 /**
  * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
  * using two-column layout. See 'protected/views/layouts/column2.php'.
  */

 /**
  * @return array action filters
  */
 public function filters() {
  return array(
    'accessControl', // perform access control for CRUD operations
    'postOnly + delete', // we only allow deletion via POST request
  );
 }

 /**
  * Specifies the access control rules.
  * This method is used by the 'accessControl' filter.
  * @return array access control rules
  */
 public function accessRules() {
  return array(
    array('allow', // allow all users to perform 'index' and 'view' actions
      'actions' => array('index', 'discussionbank', 'discussionbankdetail', 'appendMoreDiscussion'),
      'users' => array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('addDiscussionReply'),
      'users' => array('@'),
    ),
    array('allow', // allow admin user to perform 'admin' and 'delete' actions
      'actions' => array('admin', 'delete'),
      'users' => array('admin'),
    ),
    array('deny', // deny all users
      'users' => array('*'),
    ),
  );
 }

 public function actionAddDiscussionReply() {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Discussion'])) {
    $discussionModel = new Discussion();
    $discussionModel->attributes = $_POST['Discussion'];
    if ($discussionModel->validate()) {
     $discussionModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $discussionModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($discussionModel->save(false)) {
      $postRow = $this->renderPartial('discussion.views.discussion.activity._discussion_child', array(
        "discussionChild" => $discussionModel,
        "discussionChildCounter" => "new")
        , true);
     }
     echo CJSON::encode(array(
       "success" => true,
       "data_source" => Type::$SOURCE_TODO,
       "source_pk_id" => $discussionModel->parent_discussion_id,
       "_post_row" => $postRow
     ));
    }
   } else {
    echo CActiveForm::validate($discussionModel);
   }
  }

  Yii::app()->end();
 }

 public function actionAppendMoreDiscussion() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam('next_page') * 100;
   $type = Yii::app()->request->getParam('type');
   $bankSearchCriteria = Bank::getBankSearchCriteria(DiscussionType::$CATEGORY_SKILL, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       '_discussion_bank_list' => $this->renderPartial('discussion.views.discussion._discussion_bank_list', array(
         'discussionBank' => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       '_discussion_bank_list' => $this->renderPartial('discussion.views.discussion._discussion_bank_list_1', array(
         'discussionBank' => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
   }
   Yii::app()->end();
  }
 }

 /**
  * Manages all models.
  */
 public function actionAdmin() {
  $model = new Discussion('search');
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET['Discussion']))
   $model->attributes = $_GET['Discussion'];

  $this->render('admin', array(
    'model' => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Discussion the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Discussion::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, 'The requested page does not exist.');
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Discussion $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST['ajax']) && $_POST['ajax'] === 'discussion-form') {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
