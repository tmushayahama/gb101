<?php

/**
 * This is the model class for table "{{goal_commitment_share}}".
 *
 * The followings are the available columns in table '{{goal_commitment_share}}':
 * @property integer $id
 * @property integer $goal_commitment_id
 * @property integer $connection_id
 *
 * The followings are the available model relations:
 * @property Connection $connection
 * @property GoalCommitment $goalCommitment
 */
class GoalCommitmentShare extends CActiveRecord {

  public $connectionIdList;

  public static function getAllPostShared($connectionId) {

    $connectionMemberCriteria = new CDbCriteria;
    $connectionMemberCriteria->addCondition("status=" . ConnectionMember::$ACCEPTED_REQUEST);
    $connectionMemberCriteria->addCondition("connection_id=" . $connectionId);
    $connectionMemberCriteria->addCondition("connection_member_id_1=" . Yii::app()->user->id);
    $connectionMembers = ConnectionMember::Model()->findAll($connectionMemberCriteria);

    $goalCommitmentSharedCriteria = new CDbCriteria;
    $goalCommitmentSharedCriteria->addCondition("connection_id=" . $connectionId);
    $goalCommitmentSharedCriteria->group = "goal_commitment_id";
    $goalCommitmentSharedCriteria->alias = "t1";
    $goalCommitmentSharedCriteria->with = array
     ("goalCommitment" => array("alias" => "t2")); //array("select"=>array("addCondition"=>"t1.goalList.type=".$goalType)));

    $goalCommitmentSharedMembersCriteria = new CDbCriteria;
    if (count($connectionMembers) == 0) {
      $goalCommitmentSharedCriteria->addCondition("t2.owner_id=" . Yii::app()->user->id);
    } else {
      $goalCommitmentSharedMembersCriteria->addCondition("t2.owner_id=" . Yii::app()->user->id, "OR");
      foreach ($connectionMembers as $connectionMember) {
        $goalCommitmentSharedMembersCriteria->addCondition("t2.owner_id=" . $connectionMember->connection_member_id_2, "OR");
      }
      $goalCommitmentSharedCriteria->mergeWith($goalCommitmentSharedMembersCriteria, "AND");
      $goalCommitmentSharedCriteria->order = "t1.id desc";
      $goalCommitmentSharedCriteria->distinct = true;
    }
    return GoalCommitmentShare::Model()->findAll($goalCommitmentSharedCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return GoalCommitmentShare the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{goal_commitment_share}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('goal_commitment_id', 'required'),
     array('goal_commitment_id, connection_id', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, goal_commitment_id, connection_id', 'safe', 'on' => 'search'),
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
     'goalCommitment' => array(self::BELONGS_TO, 'GoalCommitment', 'goal_commitment_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'goal_commitment_id' => 'Goal Commitment',
     'connection_id' => 'Connection',
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
    $criteria->compare('goal_commitment_id', $this->goal_commitment_id);
    $criteria->compare('connection_id', $this->connection_id);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
