<?php

/**
 * This is the model class for table "{{goal_discussion}}".
 *
 * The followings are the available columns in table '{{goal_discussion}}':
 * @property integer $id
 * @property integer $discussion_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Discussion $discussion
 */
class GoalDiscussion extends CActiveRecord {

 public static function getGoalParentDiscussion($childDiscussionId, $goalId) {
  $goalDiscussionCriteria = new CDbCriteria;
  $goalDiscussionCriteria->addCondition("discussion_id=" . $childDiscussionId);
  $goalDiscussionCriteria->addCondition("goal_id = " . $goalId);

  return GoalDiscussion::Model()->find($goalDiscussionCriteria);
 }

 public static function getGoalParentDiscussions($goalId, $limit = null, $offset = null) {
  $goalDiscussionCriteria = new CDbCriteria;
  if ($limit) {
   $goalDiscussionCriteria->limit = $limit;
  }
  if ($offset) {
   $goalDiscussionCriteria->offset = $offset;
  }
  $goalDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $goalDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $goalDiscussionCriteria->addCondition("goal_id = " . $goalId);
  $goalDiscussionCriteria->order = "td.id desc";
  return GoalDiscussion::Model()->findAll($goalDiscussionCriteria);
 }

 public static function getGoalParentDiscussionsCount($goalId) {
  $goalDiscussionCriteria = new CDbCriteria;
  $goalDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $goalDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $goalDiscussionCriteria->addCondition("goal_id = " . $goalId);
  return GoalDiscussion::Model()->count($goalDiscussionCriteria);
 }

 public static function getGoalChildrenDiscussions($discussionParentId) {
  $goalDiscussionCriteria = new CDbCriteria;
  $goalDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $goalDiscussionCriteria->addCondition("td.parent_discussion_id=" . $discussionParentId);
  $goalDiscussionCriteria->order = "td.id desc";
  return GoalDiscussion::Model()->findAll($goalDiscussionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return GoalDiscussion the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal_discussion}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('discussion_id, goal_id', 'required'),
    array('discussion_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, discussion_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
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
    'discussion' => array(self::BELONGS_TO, 'Discussion', 'discussion_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'discussion_id' => 'Discussion',
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
  $criteria->compare('discussion_id', $this->discussion_id);
  $criteria->compare('goal_id', $this->goal_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
