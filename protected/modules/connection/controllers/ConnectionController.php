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

    $this->render('connections', array(
     'skillModel' => $skillModel,
     'skillListModel' => $skillListModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'activeConnectionId' => $connectionId,
     'connection' => Connection::Model()->findByPk($connectionId),
     'skillTypes' => GoalType::Model()->findAll(),
     'skillList' => GoalListShare::getGoalListShared($connectionId, GoalList::$TYPE_SKILL, 10),
     'skillListShare' => $skillListShare,
     //'posts' => GoalCommitmentShare::getAllPostShared($connectionId),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers($connectionId, 6),
     'connectionMembers' => ConnectionMember::getConnectionMembers($connectionId, 4),
     'todos' => GoalAssignment::getTodos(),
    ));
  }

}
