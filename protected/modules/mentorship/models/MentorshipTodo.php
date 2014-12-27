<?php

/**
 * This is the model class for table "{{mentorship_todo}}".
 *
 * The followings are the available columns in table '{{mentorship_todo}}':
 * @property integer $id
 * @property integer $todo_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Todo $todo
 */
class MentorshipTodo extends CActiveRecord {

 public static function getMentorshipParentTodo($childTodoId, $mentorshipId) {
  $mentorshipTodoCriteria = new CDbCriteria;
  $mentorshipTodoCriteria->addCondition("todo_id=" . $childTodoId);
  $mentorshipTodoCriteria->addCondition("mentorship_id = " . $mentorshipId);

  return MentorshipTodo::Model()->find($mentorshipTodoCriteria);
 }

 public static function getMentorshipParentTodos($mentorshipId, $limit = null, $offset = null) {
  $mentorshipTodoCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipTodoCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipTodoCriteria->offset = $offset;
  }
  $mentorshipTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $mentorshipTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $mentorshipTodoCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipTodoCriteria->order = "td.id desc";
  return MentorshipTodo::Model()->findAll($mentorshipTodoCriteria);
 }

 public static function getMentorshipParentTodosCount($mentorshipId) {
  $mentorshipTodoCriteria = new CDbCriteria;
  $mentorshipTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $mentorshipTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $mentorshipTodoCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipTodo::Model()->count($mentorshipTodoCriteria);
 }

 public static function getMentorshipChildrenTodos($todoParentId) {
  $mentorshipTodoCriteria = new CDbCriteria;
  $mentorshipTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $mentorshipTodoCriteria->addCondition("td.parent_todo_id=" . $todoParentId);
  $mentorshipTodoCriteria->order = "td.id desc";
  return MentorshipTodo::Model()->findAll($mentorshipTodoCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipTodo the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_todo}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('todo_id, mentorship_id', 'required'),
    array('todo_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, todo_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
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
    'mentorship_id' => 'Mentorship',
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
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
