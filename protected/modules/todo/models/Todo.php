<?php

/**
 * This is the model class for table "{{todo}}".
 *
 * The followings are the available columns in table '{{todo}}':
 * @property integer $id
 * @property integer $parent_todo_id
 * @property integer $priority_id
 * @property integer $creator_id
 * @property integer $assignee_id
 * @property string $created_date
 * @property string $due_date
 * @property string $todo_color
 * @property string $description
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property MentorshipTodo[] $mentorshipTodos
 * @property SkillTodo[] $skillTodos
 * @property Todo $todoParent
 * @property Todo[] $todos
 * @property User $creator
 * @property User $assignee
 * @property Level $priority
 * @property TodoChecklist[] $todoChecklists
 * @property TodoComment[] $todoComments
 * @property TodoContributor[] $todoContributors
 * @property TodoNote[] $todoNotes
 * @property Todoquestion[] $todoquestions
 * @property TodoTimeline[] $todoTimelines
 * @property TodoWeblink[] $todoWeblinks
 */
class Todo extends CActiveRecord {

 public static $TODOS_PER_OVERVIEW_PAGE = 3;
 public static $TODOS_PER_PAGE = 20;

 public static function deleteTodo($todoId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_COMMENT);
  $postsCriteria->addCondition("source_id=" . $todoId);
  Post::model()->deleteAll($postsCriteria);
  Todo::model()->deleteByPk($todoId);
 }

 public static function getChildrenTodos($todoParentId, $limit = null) {
  $todoCriteria = new CDbCriteria;
  $todoCriteria->addCondition("parent_todo_id=" . $todoParentId);
  $todoCriteria->alias = "td";
  if ($limit) {
   $todoCriteria->limit = $limit;
  }
  $todoCriteria->order = "td.id desc";
  return Todo::Model()->findAll($todoCriteria);
 }

 public static function getChildrenTodosCount($todoParentId) {
  $todoCriteria = new CDbCriteria;
  $todoCriteria->addCondition("parent_todo_id=" . $todoParentId);
  return Todo::Model()->count($todoCriteria);
 }

 public function getParentInfo($todoParent) {
  switch ($this->type) {
   case Type::$SOURCE_SKILL:
    return array("typeDisplay" => "Skill",
      "rootUrl" => Yii::app()->createUrl("skill/skill/skillManagement", array("skillId" => $todoParent->skill_id)),
      "rootUrlDisplay" => $todoParent->skill->title);
   default:
    return array("typeDisplay" => "General",
      "rootUrl" => "",
      "rootUrlDisplay" => "General");
  }
 }

 public function getContributors($type = null, $limit = null) {
  $todoContributorCriteria = new CDbCriteria;
  if ($type) {
   $todoContributorCriteria->addCondition("type=" . $type);
  }
  if ($limit) {
   $todoContributorCriteria->limit = $limit;
  }
  $todoContributorCriteria->addCondition("todo_id = " . $this->id);
  return TodoContributor::Model()->findAll($todoContributorCriteria);
 }

 public function getContributorsCount($type = null) {
  $todoContributorCriteria = new CDbCriteria;
  if ($type) {
   $todoContributorCriteria->addCondition("type=" . $type);
  }
  $todoContributorCriteria->addCondition("todo_id = " . $this->id);
  return TodoContributor::Model()->count($todoContributorCriteria);
 }

 public function getChecklists($limit = null, $status = null) {
  $todoChecklistCriteria = new CDbCriteria;
  if ($limit) {
   $todoChecklistCriteria->limit = $limit;
  }
  if ($status) {
   $todoChecklistCriteria->addCondition("status = " . $status);
  }
  $todoChecklistCriteria->alias = "c";
  $todoChecklistCriteria->addCondition("todo_id = " . $this->id);
  $todoChecklistCriteria->order = "c.id desc";
  return TodoChecklist::Model()->findAll($todoChecklistCriteria);
 }

 public function getChecklistsCount() {
  $todoChecklistCriteria = new CDbCriteria;
  $todoChecklistCriteria->addCondition("todo_id = " . $this->id);
  return TodoChecklist::Model()->count($todoChecklistCriteria);
 }

 public function getTodoParentComments($limit = null) {
  return TodoComment::getTodoParentComments($this->id, $limit);
 }

 public function getTodoParentCommentsCount() {
  return TodoComment::getTodoParentCommentsCount($this->id);
 }

 public function getTodoParentNotes($limit = null) {
  return TodoNote::getTodoParentNotes($this->id, $limit);
 }

 public function getTodoParentNotesCount() {
  return TodoNote::getTodoParentNotesCount($this->id);
 }

 public function getTodoParentWeblinks($limit = null) {
  return TodoWeblink::getTodoParentWeblinks($this->id, $limit);
 }

 public function getTodoParentWeblinksCount() {
  return TodoWeblink::getTodoParentWeblinksCount($this->id);
 }

 public function getProgress($checklistCount = null, $checklistItemId = null) {

  if ($checklistCount) {
   if ($checklistCount == 0) {
    return 0;
   }
   return round(Checklist::getChecklistsCount($this->id, Checklist::$CHECKLIST_STATUS_DONE) /
     $checklistCount * 100);
  } else {
   $checklistCount = $this->getChecklistsCount();
   if ($checklistCount == 0) {
    return 0;
   }
   return round(Checklist::getChecklistsCount($this->id, Checklist::$CHECKLIST_STATUS_DONE) /
     $this->getChecklistsCount() * 100);
  }
 }

 public function getContributorsStats() {
  return 0;
 }

 public function getActivitiesStats() {
  return 0;
 }

 public function getChecklistStats() {
  return 0;
 }

 public function getCommentsStats() {
  return 0;
 }

 public function getNotesStats() {
  return 0;
 }

 public function getWeblinksStats() {
  return 0;
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Todo the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{todo}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('description', 'required'),
    array('parent_todo_id, priority_id, creator_id, assignee_id, type, status', 'numerical', 'integerOnly' => true),
    array('todo_color', 'length', 'max' => 6),
    array('description', 'length', 'max' => 500),
    array('due_date', 'safe'),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_todo_id, priority_id, creator_id, assignee_id, created_date, due_date, todo_color, description, type, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'mentorshipTodos' => array(self::HAS_MANY, 'MentorshipTodo', 'todo_id'),
    'skillTodos' => array(self::HAS_MANY, 'SkillTodo', 'todo_id'),
    'todoParent' => array(self::BELONGS_TO, 'Todo', 'parent_todo_id'),
    'todos' => array(self::HAS_MANY, 'Todo', 'parent_todo_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'assignee' => array(self::BELONGS_TO, 'User', 'assignee_id'),
    'priority' => array(self::BELONGS_TO, 'Level', 'priority_id'),
    'todoChecklists' => array(self::HAS_MANY, 'TodoChecklist', 'todo_id'),
    'todoComments' => array(self::HAS_MANY, 'TodoComment', 'todo_id'),
    'todoContributors' => array(self::HAS_MANY, 'TodoContributor', 'todo_id'),
    'todoNotes' => array(self::HAS_MANY, 'TodoNote', 'todo_id'),
    'todoquestions' => array(self::HAS_MANY, 'Todoquestion', 'todo_id'),
    'todoTimelines' => array(self::HAS_MANY, 'TodoTimeline', 'todo_id'),
    'todoWeblinks' => array(self::HAS_MANY, 'TodoWeblink', 'todo_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_todo_id' => 'Todo Parent',
    'priority_id' => 'Priority',
    'creator_id' => 'Creator',
    'assignee_id' => 'Assignee',
    'created_date' => 'Created Date',
    'due_date' => 'Due Date',
    'todo_color' => 'Todo Color',
    'description' => 'Description',
    'type' => 'Type',
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
  $criteria->compare('parent_todo_id', $this->parent_todo_id);
  $criteria->compare('priority_id', $this->priority_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('assignee_id', $this->assignee_id);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('due_date', $this->due_date, true);
  $criteria->compare('todo_color', $this->todo_color, true);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('type', $this->type);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
