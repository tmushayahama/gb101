<?php

/**
 * This is the model class for table "{{advice_todo}}".
 *
 * The followings are the available columns in table '{{advice_todo}}':
 * @property integer $id
 * @property integer $todo_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Todo $todo
 */
class AdviceTodo extends CActiveRecord {

 public static function getAdviceParentTodo($childTodoId, $adviceId) {
  $adviceTodoCriteria = new CDbCriteria;
  $adviceTodoCriteria->addCondition("todo_id=" . $childTodoId);
  $adviceTodoCriteria->addCondition("advice_id = " . $adviceId);

  return AdviceTodo::Model()->find($adviceTodoCriteria);
 }

 public static function getAdviceParentTodos($adviceId, $limit = null, $offset = null) {
  $adviceTodoCriteria = new CDbCriteria;
  if ($limit) {
   $adviceTodoCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceTodoCriteria->offset = $offset;
  }
  $adviceTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $adviceTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $adviceTodoCriteria->addCondition("advice_id = " . $adviceId);
  $adviceTodoCriteria->order = "td.id desc";
  return AdviceTodo::Model()->findAll($adviceTodoCriteria);
 }

 public static function getAdviceParentTodosCount($adviceId) {
  $adviceTodoCriteria = new CDbCriteria;
  $adviceTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $adviceTodoCriteria->addCondition("td.parent_todo_id is NULL");
  $adviceTodoCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceTodo::Model()->count($adviceTodoCriteria);
 }

 public static function getAdviceChildrenTodos($todoParentId) {
  $adviceTodoCriteria = new CDbCriteria;
  $adviceTodoCriteria->with = array("todo" => array("alias" => 'td'));
  $adviceTodoCriteria->addCondition("td.parent_todo_id=" . $todoParentId);
  $adviceTodoCriteria->order = "td.id desc";
  return AdviceTodo::Model()->findAll($adviceTodoCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceTodo the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_todo}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('todo_id, advice_id', 'required'),
    array('todo_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, todo_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advice' => array(self::BELONGS_TO, 'Advice', 'advice_id'),
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
    'advice_id' => 'Advice',
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
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
