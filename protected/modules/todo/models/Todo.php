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
 * @property string $title
 * @property string $todo_color
 * @property string $description
 *
 * The followings are the available model relations:
 * @property MentorshipTodo[] $mentorshipTodos
 * @property TodoTodo[] $todoTodos
 * @property Todo $parentTodo
 * @property Todo[] $todos
 * @property User $creator
 * @property User $assignee
 * @property Level $priority
 */
class Todo extends CActiveRecord {

  public static function deleteTodo($todoId) {
    Todo::model()->deleteByPk($todoId);
  }
  
  public static function getChildrenTasks($todoParentId) {
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
     array('parent_todo_id, priority_id, creator_id, assignee_id', 'numerical', 'integerOnly' => true),
     array('title', 'length', 'max' => 200),
     array('todo_color', 'length', 'max' => 6),
     array('description', 'length', 'max' => 1000),
     array('due_date', 'safe'),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, parent_todo_id, priority_id, creator_id, assignee_id, created_date, due_date, title, todo_color, description', 'safe', 'on' => 'search'),
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
     'todoTodos' => array(self::HAS_MANY, 'TodoTodo', 'todo_id'),
     'parentTodo' => array(self::BELONGS_TO, 'Todo', 'parent_todo_id'),
     'todos' => array(self::HAS_MANY, 'Todo', 'parent_todo_id'),
     'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
     'assignee' => array(self::BELONGS_TO, 'User', 'assignee_id'),
     'priority' => array(self::BELONGS_TO, 'Level', 'priority_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'parent_todo_id' => 'Parent Todo',
     'priority_id' => 'Priority',
     'creator_id' => 'creator',
     'assignee_id' => 'Assignee',
     'created_date' => 'Assigned Date',
     'due_date' => 'Due Date',
     'title' => 'Title',
     'todo_color' => 'Todo Color',
     'description' => 'Description',
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
    $criteria->compare('title', $this->title, true);
    $criteria->compare('todo_color', $this->todo_color, true);
    $criteria->compare('description', $this->description, true);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
