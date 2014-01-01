<?php

/**
 * This is the model class for table "{{connection_member}}".
 *
 * The followings are the available columns in table '{{connection_member}}':
 * @property integer $id
 * @property integer $connection_id
 * @property integer $connection_member_id
 * @property string $added_date
 * @property integer $privilege
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Connection $connection
 * @property User $connectionMember
 */
class ConnectionMember extends CActiveRecord {

  public static $PENDING_REQUEST = 0;
  public static $ACCEPTED_REQUEST = 1;
  public static $OWNER = 1;
  public static $CAN_VIEW = 2;
  public static $STRANGER = 3;
  public $userIdList;

  public static function getUserRelationship($id) {
    //$id = User::encrypting($id);
   
    if ($id == Yii::app()->user->id) {
      return ConnectionMember::$OWNER;
    }
    /*$userRelationshipCriteria = new CDbCriteria;
    $userRelationshipCriteria->addCondition("status=" . Yii::app()->user->id);
    $userRelationshipCriteria->addCondition("connection_member_id=" . $id);
    if (ConnectionMember::Model()->count($userRelationshipCriteria) == 0) {
      return ConnectionMember::$STRANGER;
    } else {
      return 10;
    }*/
  }

  public static function getNonConnectionMembers($connectionId, $limit) {
    $nonConnectionMembers = new CDbCriteria;
    $nonConnectionMembers->addCondition("NOT user_id=1");
    $nonConnectionMembers->addCondition("NOT user_id=" . Yii::app()->user->id);

    if ($connectionId != 0) {
//		$nonConnectionMembers->addCondition("connection_id=" . $connectionId);
    }
    $nonConnectionMembers->limit = $limit;
    return Profile::Model()->findAll($nonConnectionMembers);
  }

  public static function getConnectionMembers($connectionId, $limit) {
    if ($connectionId == 0) {
      $connections = Connection::Model()->findAll();
      foreach ($connections as $connection) {
        $connectionMembers = new CDbCriteria;
        $connectionMembers->addCondition("status=" . ConnectionMember::$ACCEPTED_REQUEST);
        $connectionMembers->addCondition("connection_id=" . $connection->id);
      }
      $connectionMembers->group = "connection_member_id";
      $connectionMembers->distinct = true;
      $connectionMembers->limit = $limit;
      return ConnectionMember::Model()->findAll($connectionMembers);
    } else {
      $connectionMembers = new CDbCriteria;
      $connectionMembers->addCondition("status=" . ConnectionMember::$ACCEPTED_REQUEST);
      $connectionMembers->addCondition("connection_id=" . $connectionId);
      $connectionMembers->group = "connection_member_id_2";
      $connectionMembers->distinct = true;
      $connectionMembers->limit = $limit;
      return ConnectionMember::Model()->findAll($connectionMembers);
    }
  }

  public static function getMemberExistInConnection($newMemberId) {
    $newConnectionMembers = new CDbCriteria;
    $newConnectionMembers->addCondition("connection_member_id_1=" . Yii::app()->user->id);
    $newConnectionMembers->addCondition("connection_member_id_2=" . $newMemberId);
    $idArray = array();
    foreach (ConnectionMember::Model()->findAll($newConnectionMembers) as $member) {
      array_push($idArray, $member->connection->id);
    }
    return $idArray;
  }

  public static function acceptConnectionRequest($id) {
    $connectionMember_1 = ConnectionMember::Model()->findByPk($id);
    $connectionMember_1->status = ConnectionMember::$ACCEPTED_REQUEST;


    $connectionMemberCriteria_2 = new CDbCriteria;
    $connectionMemberCriteria_2->addCondition("connection_id=" . $connectionMember_1->connection_id);
    $connectionMemberCriteria_2->addCondition("connection_member_id_1=" . $connectionMember_1->connection_member_id_2);
    $connectionMemberCriteria_2->addCondition("connection_member_id_2=" . $connectionMember_1->connection_member_id_1);


    $connectionMember_2 = ConnectionMember::Model()->find($connectionMemberCriteria_2);
    $connectionMember_2->status = ConnectionMember::$ACCEPTED_REQUEST;
    if ($connectionMember_1->save(false) && $connectionMember_2->save(false)) {
      return true;
    } else {
      return false;
    }
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return ConnectionMember the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{connection_member}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
    return array(
     array('connection_id, connection_member_id, added_date, privilege', 'required'),
     array('connection_id, connection_member_id, privilege, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
// Please remove those attributes that should not be searched.
     array('id, connection_id, connection_member_id, added_date, privilege, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
    return array(
     'connection' => array(self::BELONGS_TO, 'Connection', 'connection_id'),
     'connectionMember' => array(self::BELONGS_TO, 'User', 'connection_member_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'connection_id' => 'Connection',
     'connection_member_id' => 'Connection Member',
     'added_date' => 'Added Date',
     'privilege' => 'Privilege',
     'status' => 'Status',
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
   */
  public function search() {
// Warning: Please modify the following code to remove attributes that
// should not be searched.

    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('connection_id', $this->connection_id);
    $criteria->compare('connection_member_id', $this->connection_member_id);
    $criteria->compare('added_date', $this->added_date, true);
    $criteria->compare('privilege', $this->privilege);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
