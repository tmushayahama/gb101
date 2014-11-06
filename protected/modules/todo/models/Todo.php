<?php

/**
 * This is the model class for table "{{todo}}".
 *
 * The followings are the available columns in table '{{todo}}':
 * @property integer $id
 * @property integer $todo_parent_id
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
 * @property TodoComment[] $todoComments
 * @property TodoJudge[] $todoJudges
 * @property TodoNote[] $todoNotes
 * @property TodoObserver[] $todoObservers
 * @property TodoQuestionAnswer[] $todoQuestionAnswers
 * @property TodoTimeline[] $todoTimelines
 * @property TodoWeblink[] $todoWeblinks
 */
class Todo extends CActiveRecord {

  public static function deleteTodo($todoId) {
    Todo::model()->deleteByPk($todoId);
  }

  public static function getChildrenTodos($todoParentId) {
    $todoCriteria = new CDbCriteria;
    $todoCriteria->addCondition("todo_parent_id=" . $todoParentId);
    return Todo::Model()->findAll($todoCriteria);
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
     array('todo_parent_id, priority_id, creator_id, assignee_id, type, status', 'numerical', 'integerOnly' => true),
     array('todo_color', 'length', 'max' => 6),
     array('description', 'length', 'max' => 500),
     array('due_date', 'safe'),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, todo_parent_id, priority_id, creator_id, assignee_id, created_date, due_date, todo_color, description, type, status', 'safe', 'on' => 'search'),
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
     'todoParent' => array(self::BELONGS_TO, 'Todo', 'todo_parent_id'),
     'todos' => array(self::HAS_MANY, 'Todo', 'todo_parent_id'),
     'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
     'assignee' => array(self::BELONGS_TO, 'User', 'assignee_id'),
     'priority' => array(self::BELONGS_TO, 'Level', 'priority_id'),
     'todoComments' => array(self::HAS_MANY, 'TodoComment', 'todo_id'),
     'todoJudges' => array(self::HAS_MANY, 'TodoJudge', 'todo_id'),
     'todoNotes' => array(self::HAS_MANY, 'TodoNote', 'todo_id'),
     'todoObservers' => array(self::HAS_MANY, 'TodoObserver', 'todo_id'),
     'todoQuestionAnswers' => array(self::HAS_MANY, 'TodoQuestionAnswer', 'todo_id'),
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
     'todo_parent_id' => 'Parent Todo',
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
    $criteria->compare('todo_parent_id', $this->todo_parent_id);
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
