<?php

/**
 * This is the model class for table "{{goal_weblink}}".
 *
 * The followings are the available columns in table '{{goal_weblink}}':
 * @property integer $id
 * @property integer $weblink_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Weblink $weblink
 */
class GoalWeblink extends CActiveRecord {

 public static function getGoalParentWeblink($childWeblinkId, $goalId) {
  $goalWeblinkCriteria = new CDbCriteria;
  $goalWeblinkCriteria->addCondition("weblink_id=" . $childWeblinkId);
  $goalWeblinkCriteria->addCondition("goal_id = " . $goalId);

  return GoalWeblink::Model()->find($goalWeblinkCriteria);
 }

 public static function getGoalParentWeblinks($goalId, $limit = null, $offset = null) {
  $goalWeblinkCriteria = new CDbCriteria;
  if ($limit) {
   $goalWeblinkCriteria->limit = $limit;
  }
  if ($offset) {
   $goalWeblinkCriteria->offset = $offset;
  }
  $goalWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $goalWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $goalWeblinkCriteria->addCondition("goal_id = " . $goalId);
  $goalWeblinkCriteria->order = "td.id desc";
  return GoalWeblink::Model()->findAll($goalWeblinkCriteria);
 }

 public static function getGoalParentWeblinksCount($goalId) {
  $goalWeblinkCriteria = new CDbCriteria;
  $goalWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $goalWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $goalWeblinkCriteria->addCondition("goal_id = " . $goalId);
  return GoalWeblink::Model()->count($goalWeblinkCriteria);
 }

 public static function getGoalChildrenWeblinks($weblinkParentId) {
  $goalWeblinkCriteria = new CDbCriteria;
  $goalWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $goalWeblinkCriteria->addCondition("td.parent_weblink_id=" . $weblinkParentId);
  $goalWeblinkCriteria->order = "td.id desc";
  return GoalWeblink::Model()->findAll($goalWeblinkCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return GoalWeblink the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal_weblink}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('weblink_id, goal_id', 'required'),
    array('weblink_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, weblink_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
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
    'weblink' => array(self::BELONGS_TO, 'Weblink', 'weblink_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'weblink_id' => 'Weblink',
    'goal_id' => 'Goal',
    'privacy' => 'Privacy',
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
  $criteria->compare('weblink_id', $this->weblink_id);
  $criteria->compare('goal_id', $this->goal_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
