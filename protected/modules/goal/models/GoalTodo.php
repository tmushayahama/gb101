<?php

/**
 * This is the model class for table "{{goal_todo}}".
 *
 * The followings are the available columns in table '{{goal_todo}}':
 * @property integer $id
 * @property integer $todo_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Todo $todo
 */
class GoalTodo extends CActiveRecord {

 public static function getGoalParentTodo($childTodoId, $goalId) {
  $goalTodoCriteria = new CDbCriteria;
  $goalTodoCriteria->addCondition("todo_id=" . $childTodoId);
  $goalTodoCriteria->addCondition("goal_id = " . $goalId);

  return GoalTodo::Model()->find($goalTodoCriteria);
 }

 public static function getGoalParentTodos($goalId, $limit = null, $offset = null) {
  $goalTodoCriteria = new CDbCriteria;
  if ($limit) {
   $goalTodoCriteria->limit = $limit;
  }
  if ($offset) {
   $goalTodoCriteria->offset = $offset;
  }
  $goalTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $goalTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $goalTodoCriteria->addCondition("goal_id = " . $goalId);
  $goalTodoCriteria->order = "td.id desc";
  return GoalTodo::Model()->findAll($goalTodoCriteria);
 }

 public static function getGoalParentTodosCount($goalId) {
  $goalTodoCriteria = new CDbCriteria;
  $goalTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $goalTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $goalTodoCriteria->addCondition("goal_id = " . $goalId);
  return GoalTodo::Model()->count($goalTodoCriteria);
 }

 public static function getGoalChildrenTodos($todoParentId) {
  $goalTodoCriteria = new CDbCriteria;
  $goalTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $goalTodoCriteria->addCondition("td.parent_todo_id=" . $todoParentId);
  $goalTodoCriteria->order = "td.id desc";
  return GoalTodo::Model()->findAll($goalTodoCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return GoalTodo the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal_todo}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('todo_id, goal_id', 'required'),
    array('todo_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, todo_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
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
    'todo' => array(self::BELONGS_TO, 'Todo', 'todo_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'todo_id' => 'Todo',
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
  $criteria->compare('todo_id', $this->todo_id);
  $criteria->compare('goal_id', $this->goal_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}