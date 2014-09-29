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
    $skillListModel = new SkillList;
    $skillListShare = new SkillListShare;
    $skillModel = new Skill;
    $connectionModel = new Connection;
    $connectionMemberModel = new ConnectionMember;

    $this->render('connections', array(
     'skillModel' => $skillModel,
     'skillListModel' => $skillListModel,
     'connectionMemberModel' => $connectionMemberModel,
     'connectionModel' => $connectionModel,
     'activeConnectionId' => $connectionId,
     'connection' => Connection::Model()->findByPk($connectionId),
     'skillTypes' => SkillType::Model()->findAll(),
     'skillListShare' => SkillListShare::getSkillListShared($connectionId, SkillList::$TYPE_SKILL, 10),
     'skillListShare' => $skillListShare,
     //'posts' => SkillCommitmentShare::getAllPostShared($connectionId),
     'nonConnectionMembers' => ConnectionMember::getNonConnectionMembers($connectionId, 6),
     'connectionMembers' => ConnectionMember::getConnectionMembers($connectionId, 4),
     'todos' => SkillAssignment::getTodos(),
    ));
  }

}
