<?php

/**
 * This is the model class for table "{{goal_request}}".
 *
 * The followings are the available columns in table '{{goal_request}}':
 * @property integer $id
 * @property integer $requester_id
 * @property integer $goal_id
 * @property string $message
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property User $requester
 */
class GoalRequest extends CActiveRecord {

  public static $TYPE_MENTOR = 1;
  public static $TYPE_MENTOR_ENROLLMENT = 2;

  public static function getGoalRequests($type = null) {
    $goalRequestCriteria = new CDbCriteria();
    $goalRequestCriteria->alias = "gR";
    $goalRequestCriteria->order = "gR.id desc";
    if ($type != null) {
      $goalRequestCriteria->addCondition("type=" . $type);
    }
    return GoalRequest::model()->findAll($goalRequestCriteria);
  }
  public static function getRequestMessage($type, $requesterId, $goalId) {
    $goalRequestCriteria = new CDbCriteria();
    $goalRequestCriteria->addCondition("type=".$type);
    $goalRequestCriteria->addCondition("requester_id=".$requesterId);
    $goalRequestCriteria->addCondition("goal_id=".$goalId);
    return GoalRequest::model()->find($goalRequestCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return GoalRequest the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{goal_request}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('requester_id, goal_id, type', 'required'),
     array('requester_id, goal_id, type, status', 'numerical', 'integerOnly' => true),
     array('message', 'length', 'max' => 250),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, requester_id, goal_id, message, type, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
     'requester' => array(self::BELONGS_TO, 'User', 'requester_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'requester_id' => 'Requester',
     'goal_id' => 'Goal',
     'message' => 'Message',
     'type' => 'Type',
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
    $criteria->compare('requester_id', $this->requester_id);
    $criteria->compare('goal_id', $this->goal_id);
    $criteria->compare('message', $this->message, true);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
