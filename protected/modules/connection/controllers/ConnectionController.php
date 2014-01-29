<?php

class ConnectionController extends Controller {
  /**
   * Declares class-based actions.
   */

  /**
   * This is the default 'index' action that is invoked
   * when an action is not explicitly requested by users.
   */
  public function actionConnection($connectionId) {
    $skillListModel = new GoalList;
    $skillListShare = new GoalListShare;
    $skillModel = new Goal;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;
    $academicModel = new SkillAcademic;

    /* if (isset($_POST['Connection'])) {
      $connectionModel->attributes = $_POST['Connection'];
      $connectionModel->created_date = date("Y-m-d");
      if ($connectionModel->save()) {
      $connectionMemberModel = new ConnectionMember;
      $connectionMemberModel->connection_member_id = Yii::app()->user->id;
      $connectionMemberModel->connection_id = $connectionModel->id;
      $connectionMemberModel->privilege = ConnectionMember::$OWNER;
      $connectionMemberModel->added_date = date("Y-m-d");
      $connectionMemberModel->save(false);
      }
      } */

    if (isset($_POST['Goal']) && isset($_POST['SkillAcademic'])) {
      $skillModel->attributes = $_POST['Goal'];
      $academicModel->attributes = $_POST['SkillAcademic'];
      $skillModel->type_id = 1;
      $skillModel->assign_date = date("Y-m-d");
      $skillModel->save(false);
      if ($connectionId == 0) {
        GoalCommitment::saveToAllCrcles($skillModel->id);
      } else {
        $skillCommitmentModel = new GoalCommitment;
        $skillCommitmentModel->owner_id = Yii::app()->user->id;
        $skillCommitmentModel->goal_id = $skillModel->id;
        $skillCommitmentModel->save();
      }
      $academicModel->goal_id = $skillModel->id;
      $academicModel->save();
    }

    $this->render('connections', array(
     'skillModel' => $skillModel,
     'skillListModel' => $skillListModel,
     'academicModel' => $academicModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'activeConnectionId' => $connectionId,
     'connection' => Connection::Model()->findByPk($connectionId),
     'skillTypes' => GoalType::Model()->findAll(),
     'skillList' => GoalListShare::getGoalListShared($connectionId, GoalList::$TYPE_SKILL, 10),
   'skillListShare' => $skillListShare,
    'posts' => GoalCommitmentShare::getAllPostShared($connectionId),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers($connectionId, 6),
     'connectionMembers' => ConnectionMember::getConnectionMembers($connectionId, 4),
     'todos' => GoalAssignment::getTodos(),
    ));
  }

}
