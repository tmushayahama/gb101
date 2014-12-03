<?php

class NoteController extends Controller {
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
      'actions' => array('index', 'notebank', 'notebankdetail', 'appendMoreNote'),
      'users' => array('*'),
    ),
    array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('addNoteReply'),
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

 public function actionAddNoteReply() {
  if (Yii::app()->request->isAjaxRequest) {
   if (isset($_POST['Note'])) {
    $noteModel = new Note();
    $noteModel->attributes = $_POST['Note'];
    if ($noteModel->validate()) {
     $noteModel->creator_id = Yii::app()->user->id;
     $cdate = new DateTime('now');
     $noteModel->created_date = $cdate->format('Y-m-d h:m:i');
     if ($noteModel->save(false)) {
      $postRow = $this->renderPartial('note.views.note.activity._note_child', array(
        "noteChild" => $noteModel,
        "noteChildCounter" => "new")
        , true);
     }
     echo CJSON::encode(array(
       "success" => true,
       "data_source" => Type::$SOURCE_TODO,
       "source_pk_id" => $noteModel->parent_note_id,
       "_post_row" => $postRow
     ));
    }
   } else {
    echo CActiveForm::validate($noteModel);
   }
  }

  Yii::app()->end();
 }

 public function actionAppendMoreNote() {
  if (Yii::app()->request->isAjaxRequest) {
   $nextPage = Yii::app()->request->getParam('next_page') * 100;
   $type = Yii::app()->request->getParam('type');
   $bankSearchCriteria = Bank::getBankSearchCriteria(NoteType::$CATEGORY_SKILL, null, 100, $nextPage);
   switch ($type) {
    case 1:
     echo CJSON::encode(array(
       '_note_bank_list' => $this->renderPartial('note.views.note._note_bank_list', array(
         'noteBank' => Bank::model()->findAll($bankSearchCriteria))
         , true
     )));
     break;
    case 2:
     echo CJSON::encode(array(
       '_note_bank_list' => $this->renderPartial('note.views.note._note_bank_list_1', array(
         'noteBank' => Bank::model()->findAll($bankSearchCriteria))
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
  $model = new Note('search');
  $model->unsetAttributes(); // clear any default values
  if (isset($_GET['Note']))
   $model->attributes = $_GET['Note'];

  $this->render('admin', array(
    'model' => $model,
  ));
 }

 /**
  * Returns the data model based on the primary key given in the GET variable.
  * If the data model is not found, an HTTP exception will be raised.
  * @param integer $id the ID of the model to be loaded
  * @return Note the loaded model
  * @throws CHttpException
  */
 public function loadModel($id) {
  $model = Note::model()->findByPk($id);
  if ($model === null)
   throw new CHttpException(404, 'The requested page does not exist.');
  return $model;
 }

 /**
  * Performs the AJAX validation.
  * @param Note $model the model to be validated
  */
 protected function performAjaxValidation($model) {
  if (isset($_POST['ajax']) && $_POST['ajax'] === 'note-form') {
   echo CActiveForm::validate($model);
   Yii::app()->end();
  }
 }

}
