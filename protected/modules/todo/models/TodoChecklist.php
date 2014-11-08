<?php

/**
 * This is the model class for table "{{todo_checklist}}".
 *
 * The followings are the available columns in table '{{todo_checklist}}':
 * @property integer $id
 * @property integer $checklist_id
 * @property integer $todo_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Checklist $checklist
 * @property Todo $todo
 */
class TodoChecklist extends CActiveRecord {

  public static function getTodoParentChecklist($childChecklistId, $todoId) {
    $todoChecklistCriteria = new CDbCriteria;
    $todoChecklistCriteria->addCondition("checklist_id=" . $childChecklistId);
    $todoChecklistCriteria->addCondition("todo_id = " . $todoId);

    return TodoChecklist::Model()->find($todoChecklistCriteria);
  }

  public static function getTodoParentChecklists($todoId, $limit = null) {
    $todoChecklistCriteria = new CDbCriteria;
    if ($limit) {
      $todoChecklistCriteria->limit = $limit;
    }
    $todoChecklistCriteria->with = array("checklist" => array("alias" => 'td'));
    $todoChecklistCriteria->addCondition("td.parent_checklist_id is NULL");
    $todoChecklistCriteria->addCondition("todo_id = " . $todoId);
    $todoChecklistCriteria->order = "td.id desc";
    return TodoChecklist::Model()->findAll($todoChecklistCriteria);
  }

  public static function getTodoParentChecklistsCount($todoId) {
    $todoChecklistCriteria = new CDbCriteria;
    $todoChecklistCriteria->with = array("checklist" => array("alias" => 'td'));
    $todoChecklistCriteria->addCondition("td.parent_checklist_id is NULL");
    $todoChecklistCriteria->addCondition("todo_id = " . $todoId);
    return TodoChecklist::Model()->count($todoChecklistCriteria);
  }

  public static function getTodoChildrenChecklists($checklistParentId, $limit = null) {
    $todoChecklistCriteria = new CDbCriteria;
    if ($limit) {
      $todoChecklistCriteria->limit = $limit;
    }
    $todoChecklistCriteria->with = array("checklist" => array("alias" => 'td'));
    $todoChecklistCriteria->addCondition("td.parent_checklist_id=" . $checklistParentId);
    $todoChecklistCriteria->order = "td.id desc";
    return TodoChecklist::Model()->findAll($todoChecklistCriteria);
  }

  public static function getTodoChildrenChecklistsCount($checklistParentId, $limit = null) {
    $todoChecklistCriteria = new CDbCriteria;
    $todoChecklistCriteria->with = array("checklist" => array("alias" => 'td'));
    $todoChecklistCriteria->addCondition("td.parent_checklist_id=" . $checklistParentId);
    return TodoChecklist::Model()->count($todoChecklistCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return TodoChecklist the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{todo_checklist}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('', 'required'),
     array('checklist_id, todo_id, privacy, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, checklist_id, todo_id, privacy, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'checklist' => array(self::BELONGS_TO, 'Checklist', 'checklist_id'),
     'todo' => array(self::BELONGS_TO, 'Todo', 'todo_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'checklist_id' => 'Checklist',
     'todo_id' => 'Todo',
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
    $criteria->compare('checklist_id', $this->checklist_id);
    $criteria->compare('todo_id', $this->todo_id);
    $criteria->compare('privacy', $this->privacy);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
