<?php

class ChecklistController extends Controller {

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
      'actions' => array(),
      'users' => array('*'),
     ),
     array('allow', // allow authenticated user to perform 'create' and 'update' actions
      'actions' => array('populateChecklist'),
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

  public function actionPopulateChecklist($checklistId) {
    if (Yii::app()->request->isAjaxRequest) {
      $checklistItem = Checklist::model()->findByPk($checklistId);
      echo CJSON::encode(array(
       '_populate_content' => $this->renderPartial('checklist.views.checklist.modals._checklist_modal_inner', array(
        'checklistItem' => $checklistItem)
         , true)));

      Yii::app()->end();
    }
  }

}
