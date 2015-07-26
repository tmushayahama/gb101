<?php

/**
 * This is the model class for table "{{goal_timeline}}".
 *
 * The followings are the available columns in table '{{goal_timeline}}':
 * @property integer $id
 * @property integer $timeline_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Timeline $timeline
 */
class GoalTimeline extends CActiveRecord {

 public static function getGoalParentTimeline($childTimelineId, $goalId) {
  $goalTimelineCriteria = new CDbCriteria;
  $goalTimelineCriteria->addCondition("timeline_id=" . $childTimelineId);
  $goalTimelineCriteria->addCondition("goal_id = " . $goalId);

  return GoalTimeline::Model()->find($goalTimelineCriteria);
 }

 public static function getGoalTimelineDays($goalId, $limit = null, $offset = null) {
  $goalTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $goalTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $goalTimelineCriteria->offset = $offset;
  }
  $goalTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$goalTimelineCriteria->select = "td.day";
  $goalTimelineCriteria->group = "td.day";
  $goalTimelineCriteria->distinct = true;
  $goalTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $goalTimelineCriteria->addCondition("goal_id = " . $goalId);
  $goalTimelineCriteria->order = "td.day asc";
  return GoalTimeline::Model()->findAll($goalTimelineCriteria);
 }

 public static function getGoalTimelineDaysCount($goalId, $limit = null, $offset = null) {
  $goalTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $goalTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $goalTimelineCriteria->offset = $offset;
  }
  $goalTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$goalTimelineCriteria->select = "td.day";
  $goalTimelineCriteria->group = "td.day";
  $goalTimelineCriteria->distinct = true;
  $goalTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $goalTimelineCriteria->addCondition("goal_id = " . $goalId);
  return GoalTimeline::Model()->count($goalTimelineCriteria);
 }

 public static function getGoalParentTimelines($goalId, $day = null, $limit = null, $offset = null) {
  $goalTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $goalTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $goalTimelineCriteria->offset = $offset;
  }
  $goalTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $goalTimelineCriteria->addCondition("td.day=" . $day);
  $goalTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $goalTimelineCriteria->addCondition("goal_id = " . $goalId);
  $goalTimelineCriteria->order = "td.day desc";
  return GoalTimeline::Model()->findAll($goalTimelineCriteria);
 }

 public static function getGoalParentTimelinesCount($goalId, $day = null) {
  $goalTimelineCriteria = new CDbCriteria;
  $goalTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $goalTimelineCriteria->addCondition("td.day=" . $day);
  $goalTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $goalTimelineCriteria->addCondition("goal_id = " . $goalId);
  return GoalTimeline::Model()->count($goalTimelineCriteria);
 }

 public static function getGoalChildrenTimelines($timelineParentId) {
  $goalTimelineCriteria = new CDbCriteria;
  $goalTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $goalTimelineCriteria->addCondition("td.parent_timeline_id=" . $timelineParentId);
  $goalTimelineCriteria->order = "td.id desc";
  return GoalTimeline::Model()->findAll($goalTimelineCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return GoalTimeline the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal_timeline}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('timeline_id, goal_id', 'required'),
    array('timeline_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, timeline_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
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
    'timeline' => array(self::BELONGS_TO, 'Timeline', 'timeline_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'timeline_id' => 'Timeline',
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
  $criteria->compare('timeline_id', $this->timeline_id);
  $criteria->compare('goal_id', $this->goal_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
