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
      'actions' => array('populateChecklist', 'checklistItemToggle', 'addChecklistComment',
       'addChecklistNote'),
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

  public function actionPopulateChecklist($checklistItemId) {
    if (Yii::app()->request->isAjaxRequest) {
      $checklistItem = Checklist::model()->findByPk($checklistItemId);
      echo CJSON::encode(array(
       '_populate_content' => $this->renderPartial('checklist.views.checklist.modals._checklist_modal_inner', array(
        'checklistItem' => $checklistItem,
        'checklistComments' => ChecklistComment::getChecklistParentComments($checklistItemId),
        'checklistCommentsCount' => ChecklistComment::getChecklistParentCommentsCount($checklistItemId),
        'checklistNotes' => ChecklistNote::getChecklistParentNotes($checklistItemId),
        'checklistNotesCount' => ChecklistNote::getChecklistParentNotesCount($checklistItemId),
         //'checklistWeblinks' => ChecklistWeblink::getChecklistParentWeblinks($checklistItemId),
         //'checklistWeblinksCount' => ChecklistWeblink::getChecklistParentWeblinksCount($checklistItemId),
         )
         , true)));

      Yii::app()->end();
    }
  }

  public function actionChecklistItemToggle($checklistItemId) {
    if (Yii::app()->request->isAjaxRequest) {
      $checklistItem = Checklist::model()->findByPk($checklistItemId);
      switch ($checklistItem->status) {
        case(Checklist::$CHECKLIST_STATUS_IN_PROGRESS):
          $checklistItem->status = Checklist::$CHECKLIST_STATUS_DONE;
          break;
        case (Checklist::$CHECKLIST_STATUS_DONE):
          $checklistItem->status = Checklist::$CHECKLIST_STATUS_IN_PROGRESS;

          break;
      }
      $checklistItem->save();
      echo CJSON::encode(array(
       "gb_status" => $checklistItem->status,
       "gb_checklist_id" => $checklistItemId,
      ));
    }

    Yii::app()->end();
  }

  function actionAddChecklistComment($checklistItemId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Comment'])) {
        $commentModel = new Comment();
        $commentModel->attributes = $_POST['Comment'];
        if ($commentModel->validate()) {
          $commentModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $commentModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($commentModel->save(false)) {
            $checklistCommentModel = new ChecklistComment();
            $checklistCommentModel->checklist_id = $checklistItemId;
            $checklistCommentModel->comment_id = $commentModel->id;
            $checklistCommentModel->save(false);
            $postRow;
            if ($commentModel->parent_comment_id) {
              $postRow = $this->renderPartial('checklist.views.checklist.activity.comment._checklist_comment', array(
               "checklistCommentParent" => ChecklistComment::getChecklistParentComment($commentModel->parent_comment_id, $checklistItemId))
                , true);
            } else {
              $postRow = $this->renderPartial('checklist.views.checklist.activity.comment._checklist_comment', array(
               "checklistCommentParent" => $checklistCommentModel)
                , true);
            }

            echo CJSON::encode(array(
             "success" => true,
             "data_source" => Type::$SOURCE_TODO,
             "source_pk_id" => $commentModel->parent_comment_id,
             "_post_row" => $postRow
            ));
          }
        } else {
          echo CActiveForm::validate($commentModel);
        }
      }

      Yii::app()->end();
    }
  }

  function actionAddChecklistNote($checklistItemId) {
    if (Yii::app()->request->isAjaxRequest) {
      if (isset($_POST['Note'])) {
        $noteModel = new Note();
        $noteModel->attributes = $_POST['Note'];
        if ($noteModel->validate()) {
          $noteModel->creator_id = Yii::app()->user->id;
          $cdate = new DateTime('now');
          $noteModel->created_date = $cdate->format('Y-m-d h:m:i');
          if ($noteModel->save(false)) {
            $checklistNoteModel = new ChecklistNote();
            $checklistNoteModel->checklist_id = $checklistItemId;
            $checklistNoteModel->note_id = $noteModel->id;
            $checklistNoteModel->save(false);
            $postRow;
            if ($noteModel->parent_note_id) {
              $postRow = $this->renderPartial('checklist.views.checklist.activity.note._checklist_note', array(
               "checklistNoteParent" => ChecklistNote::getChecklistParentNote($noteModel->parent_note_id, $checklistItemId))
                , true);
            } else {
              $postRow = $this->renderPartial('checklist.views.checklist.activity.note._checklist_note', array(
               "checklistNoteParent" => $checklistNoteModel)
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
  }

}
