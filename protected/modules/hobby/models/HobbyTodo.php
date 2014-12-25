<?php

/**
 * This is the model class for table "{{hobby_todo}}".
 *
 * The followings are the available columns in table '{{hobby_todo}}':
 * @property integer $id
 * @property integer $todo_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Todo $todo
 */
class HobbyTodo extends CActiveRecord {

 public static function getHobbyParentTodo($childTodoId, $hobbyId) {
  $hobbyTodoCriteria = new CDbCriteria;
  $hobbyTodoCriteria->addCondition("todo_id=" . $childTodoId);
  $hobbyTodoCriteria->addCondition("hobby_id = " . $hobbyId);

  return HobbyTodo::Model()->find($hobbyTodoCriteria);
 }

 public static function getHobbyParentTodos($hobbyId, $limit = null, $offset = null) {
  $hobbyTodoCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyTodoCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyTodoCriteria->offset = $offset;
  }
  $hobbyTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $hobbyTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $hobbyTodoCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyTodoCriteria->order = "td.id desc";
  return HobbyTodo::Model()->findAll($hobbyTodoCriteria);
 }

 public static function getHobbyParentTodosCount($hobbyId) {
  $hobbyTodoCriteria = new CDbCriteria;
  $hobbyTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $hobbyTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $hobbyTodoCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyTodo::Model()->count($hobbyTodoCriteria);
 }

 public static function getHobbyChildrenTodos($todoParentId) {
  $hobbyTodoCriteria = new CDbCriteria;
  $hobbyTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $hobbyTodoCriteria->addCondition("td.parent_todo_id=" . $todoParentId);
  $hobbyTodoCriteria->order = "td.id desc";
  return HobbyTodo::Model()->findAll($hobbyTodoCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return HobbyTodo the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby_todo}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('todo_id, hobby_id', 'required'),
    array('todo_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, todo_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'hobby' => array(self::BELONGS_TO, 'Hobby', 'hobby_id'),
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
    'hobby_id' => 'Hobby',
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
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
