<?php

/**
 * This is the model class for table "{{promise_todo}}".
 *
 * The followings are the available columns in table '{{promise_todo}}':
 * @property integer $id
 * @property integer $todo_id
 * @property integer $promise_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Todo $todo
 */
class PromiseTodo extends CActiveRecord {

 public static function getPromiseParentTodo($childTodoId, $promiseId) {
  $promiseTodoCriteria = new CDbCriteria;
  $promiseTodoCriteria->addCondition("todo_id=" . $childTodoId);
  $promiseTodoCriteria->addCondition("promise_id = " . $promiseId);

  return PromiseTodo::Model()->find($promiseTodoCriteria);
 }

 public static function getPromiseParentTodos($promiseId, $limit = null, $offset = null) {
  $promiseTodoCriteria = new CDbCriteria;
  if ($limit) {
   $promiseTodoCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseTodoCriteria->offset = $offset;
  }
  $promiseTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $promiseTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $promiseTodoCriteria->addCondition("promise_id = " . $promiseId);
  $promiseTodoCriteria->order = "td.id desc";
  return PromiseTodo::Model()->findAll($promiseTodoCriteria);
 }

 public static function getPromiseParentTodosCount($promiseId) {
  $promiseTodoCriteria = new CDbCriteria;
  $promiseTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $promiseTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $promiseTodoCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseTodo::Model()->count($promiseTodoCriteria);
 }

 public static function getPromiseChildrenTodos($todoParentId) {
  $promiseTodoCriteria = new CDbCriteria;
  $promiseTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $promiseTodoCriteria->addCondition("td.parent_todo_id=" . $todoParentId);
  $promiseTodoCriteria->order = "td.id desc";
  return PromiseTodo::Model()->findAll($promiseTodoCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return PromiseTodo the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise_todo}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('todo_id, promise_id', 'required'),
    array('todo_id, promise_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, todo_id, promise_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'promise' => array(self::BELONGS_TO, 'Promise', 'promise_id'),
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
    'promise_id' => 'Promise',
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
  $criteria->compare('promise_id', $this->promise_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
