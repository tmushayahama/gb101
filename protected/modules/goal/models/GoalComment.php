<?php

/**
 * This is the model class for table "{{goal_comment}}".
 *
 * The followings are the available columns in table '{{goal_comment}}':
 * @property integer $id
 * @property integer $comment_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Comment $comment
 */
class GoalComment extends CActiveRecord {

 public static function getGoalParentComment($childCommentId, $goalId) {
  $goalCommentCriteria = new CDbCriteria;
  $goalCommentCriteria->addCondition("comment_id=" . $childCommentId);
  $goalCommentCriteria->addCondition("goal_id = " . $goalId);

  return GoalComment::Model()->find($goalCommentCriteria);
 }

 public static function getGoalParentComments($goalId, $limit = null, $offset = null) {
  $goalCommentCriteria = new CDbCriteria;
  if ($limit) {
   $goalCommentCriteria->limit = $limit;
  }
  if ($offset) {
   $goalCommentCriteria->offset = $offset;
  }
  $goalCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $goalCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $goalCommentCriteria->addCondition("goal_id = " . $goalId);
  $goalCommentCriteria->order = "td.id desc";
  return GoalComment::Model()->findAll($goalCommentCriteria);
 }

 public static function getGoalParentCommentsCount($goalId) {
  $goalCommentCriteria = new CDbCriteria;
  $goalCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $goalCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $goalCommentCriteria->addCondition("goal_id = " . $goalId);
  return GoalComment::Model()->count($goalCommentCriteria);
 }

 public static function getGoalChildrenComments($commentParentId) {
  $goalCommentCriteria = new CDbCriteria;
  $goalCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $goalCommentCriteria->addCondition("td.parent_comment_id=" . $commentParentId);
  $goalCommentCriteria->order = "td.id desc";
  return GoalComment::Model()->findAll($goalCommentCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return GoalComment the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal_comment}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('comment_id, goal_id', 'required'),
    array('comment_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, comment_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
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
    'comment' => array(self::BELONGS_TO, 'Comment', 'comment_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'comment_id' => 'Comment',
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
  $criteria->compare('comment_id', $this->comment_id);
  $criteria->compare('goal_id', $this->goal_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
