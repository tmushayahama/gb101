<?php

/**
 * This is the model class for table "{{checklist}}".
 *
 * The followings are the available columns in table '{{checklist}}':
 * @property integer $id
 * @property integer $parent_checklist_id
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $importance
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Checklist $parentChecklist
 * @property Checklist[] $checklists
 * @property TodoChecklist[] $todoChecklists
 */
class Checklist extends CActiveRecord {

  public static $CHECKLIST_STATUS_IN_PROGRESS = 0;
  public static $CHECKLIST_STATUS_DONE = 1;
  public static $CHECKLISTS_PER_OVERVIEW_PAGE = 5;
  public static $CHECKLISTS_PER_PAGE = 50;

  public function getChecklistsCount($todoId, $status = null) {
    $checklistCriteria = new CDbCriteria;
    $checklistCriteria->alias = "c";
    $checklistCriteria->with = array("todoChecklists" => array("alias" => "tc"));
    $checklistCriteria->addCondition("tc.todo_id = " . $todoId);
    if ($status) {
      $checklistCriteria->addCondition("c.status = " . $status);
    }
    return Checklist::Model()->count($checklistCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Checklist the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{checklist}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('description', 'required'),
     array('parent_checklist_id, creator_id, importance, status', 'numerical', 'integerOnly' => true),
     array('description', 'length', 'max' => 1000),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, parent_checklist_id, creator_id, description, created_date, importance, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
     'parentChecklist' => array(self::BELONGS_TO, 'Checklist', 'parent_checklist_id'),
     'checklists' => array(self::HAS_MANY, 'Checklist', 'parent_checklist_id'),
     'todoChecklists' => array(self::HAS_MANY, 'TodoChecklist', 'checklist_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'parent_checklist_id' => 'Parent Checklist',
     'creator_id' => 'Creator',
     'description' => 'Description',
     'created_date' => 'Created Date',
     'importance' => 'Importance',
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
    $criteria->compare('parent_checklist_id', $this->parent_checklist_id);
    $criteria->compare('creator_id', $this->creator_id);
    $criteria->compare('description', $this->description, true);
    $criteria->compare('created_date', $this->created_date, true);
    $criteria->compare('importance', $this->importance);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
