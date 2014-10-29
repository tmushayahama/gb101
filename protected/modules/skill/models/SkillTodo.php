<?php

/**
 * This is the model class for table "{{skill_todo}}".
 *
 * The followings are the available columns in table '{{skill_todo}}':
 * @property integer $id
 * @property integer $todo_id
 * @property integer $skill_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property Todo $todo
 */
class SkillTodo extends CActiveRecord {

  public static function getSkillParentTodo($childTodoId, $skillId) {
    $skillTodoCriteria = new CDbCriteria;
    $skillTodoCriteria->addCondition("todo_id=" . $childTodoId);
    $skillTodoCriteria->addCondition("skill_id = " . $skillId);

    return SkillTodo::Model()->find($skillTodoCriteria);
  }

  public static function getSkillParentTodos($skillId=null) {
    $skillTodoCriteria = new CDbCriteria;
    $skillTodoCriteria->with = array("todo" => array("alias" => 'td'));
    $skillTodoCriteria->addCondition("td.parent_todo_id is NULL");
    if ($skillId) {
      $skillTodoCriteria->addCondition("skill_id = " . $skillId);
    }
    $skillTodoCriteria->order = "td.id desc";
    return SkillTodo::Model()->findAll($skillTodoCriteria);
  }

  public static function getSkillChildrenTodos($todoParentId) {
    $skillTodoCriteria = new CDbCriteria;
    $skillTodoCriteria->with = array("todo" => array("alias" => 'td'));
    $skillTodoCriteria->addCondition("td.parent_todo_id=" . $todoParentId);
    $skillTodoCriteria->order = "td.id desc";
    return SkillTodo::Model()->findAll($skillTodoCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return SkillTodo the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{skill_todo}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('todo_id, skill_id', 'required'),
     array('todo_id, skill_id, privacy, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, todo_id, skill_id, privacy, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
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
     'skill_id' => 'Skill',
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
    $criteria->compare('skill_id', $this->skill_id);
    $criteria->compare('privacy', $this->privacy);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
