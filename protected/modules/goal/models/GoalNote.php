<?php

/**
 * This is the model class for table "{{goal_note}}".
 *
 * The followings are the available columns in table '{{goal_note}}':
 * @property integer $id
 * @property integer $note_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Note $note
 */
class GoalNote extends CActiveRecord {

 public static function getGoalParentNote($childNoteId, $goalId) {
  $goalNoteCriteria = new CDbCriteria;
  $goalNoteCriteria->addCondition("note_id=" . $childNoteId);
  $goalNoteCriteria->addCondition("goal_id = " . $goalId);

  return GoalNote::Model()->find($goalNoteCriteria);
 }

 public static function getGoalParentNotes($goalId, $limit = null, $offset = null) {
  $goalNoteCriteria = new CDbCriteria;
  if ($limit) {
   $goalNoteCriteria->limit = $limit;
  }
  if ($offset) {
   $goalNoteCriteria->offset = $offset;
  }
  $goalNoteCriteria->with = array("note" => array("alias" => 'td'));
  $goalNoteCriteria->addCondition("td.parent_note_id is NULL");
  $goalNoteCriteria->addCondition("goal_id = " . $goalId);
  $goalNoteCriteria->order = "td.id desc";
  return GoalNote::Model()->findAll($goalNoteCriteria);
 }

 public static function getGoalParentNotesCount($goalId) {
  $goalNoteCriteria = new CDbCriteria;
  $goalNoteCriteria->with = array("note" => array("alias" => 'td'));
  $goalNoteCriteria->addCondition("td.parent_note_id is NULL");
  $goalNoteCriteria->addCondition("goal_id = " . $goalId);
  return GoalNote::Model()->count($goalNoteCriteria);
 }

 public static function getGoalChildrenNotes($noteParentId) {
  $goalNoteCriteria = new CDbCriteria;
  $goalNoteCriteria->with = array("note" => array("alias" => 'td'));
  $goalNoteCriteria->addCondition("td.parent_note_id=" . $noteParentId);
  $goalNoteCriteria->order = "td.id desc";
  return GoalNote::Model()->findAll($goalNoteCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return GoalNote the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal_note}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('note_id, goal_id', 'required'),
    array('note_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, note_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
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
    'note' => array(self::BELONGS_TO, 'Note', 'note_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'note_id' => 'Note',
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
  $criteria->compare('note_id', $this->note_id);
  $criteria->compare('goal_id', $this->goal_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
