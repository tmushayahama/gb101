<?php

/**
 * This is the model class for table "{{list_bank}}".
 *
 * The followings are the available columns in table '{{list_bank}}':
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 * @property string $description
 *
 * The followings are the available model relations:
 * @property GoalType $type
 */
class ListBank extends CActiveRecord {

  public static $TYPE_SKILL_ACADEMIC = 1;
  public static $TYPE_SKILL_SELF_MANGEMENT = 2;
  public static $TYPE_SKILL_TRANSFERABLE = 3;
  public static $TYPE_SKILL_MISCELLANEOUS = 4;

  public static function getListBank($typeCategory, $keyword = null, $type = null, $limit = null) {
    $listBankCriteria = new CDbCriteria;
    $listBankCriteria->alias = "lB";
    $listBankCriteria->order = "name asc";
    $listBankCriteria->group = "name";
    $listBankCriteria->with = array("type" => array("alias" => 't2'));
    $listBankCriteria->distinct = true;
    if ($type != null) {
      $listBankCriteria->addCondition("type_id=" . $type);
    }
    if ($keyword != null) {
      $listBankCriteria->compare("lB.name", $keyword, true, "OR");
      $listBankCriteria->compare("lB.description", $keyword, true, "OR");
    } else {
      $listBankCriteria->addCondition("not t2.type='" . GoalType::$TYPE_ACTION_WORDS . "'");
      $listBankCriteria->addCondition("t2.category='" . $typeCategory . "'");
    }
    if ($limit != null) {
      $listBankCriteria->limit = $limit;
    }
    return ListBank::Model()->findAll($listBankCriteria);
  }

  public static function getListBankSearchCriteria($typeCategory, $type = null, $limit = null) {
    $listBankCriteria = new CDbCriteria;
    $listBankCriteria->order = "name asc";
    $listBankCriteria->group = "name";
    $listBankCriteria->with = array("type" => array("alias" => 't2'));
    $listBankCriteria->distinct = true;
    $listBankCriteria->addCondition("t2.category='" . $typeCategory . "'");
    $listBankCriteria->addCondition("not t2.type='" . GoalType::$TYPE_ACTION_WORDS . "'");
    if ($type != null) {
      $listBankCriteria->addCondition("type_id=" . $type);
    }
    if ($limit != null) {
      $listBankCriteria->limit = $limit;
    }
    return $listBankCriteria;
  }

  public static function getListBankCount($typeCategory) {
    $listBankCriteria = new CDbCriteria;
    $listBankCriteria->with = array("type" => array("alias" => 't2'));
    $listBankCriteria->distinct = true;
    $listBankCriteria->addCondition("t2.category='" . $typeCategory . "'");

    return ListBank::Model()->Count($listBankCriteria);
  }

  public static function GetSublist($name) {
    $listBankCriteria = new CDbCriteria;
    $listBankCriteria->addCondition('name="' . $name . '"');
    $listBankCriteria->addCondition('subgoal is not null');
    return ListBank::Model()->findAll($listBankCriteria);
  }

  public static function getListBankKeywordSearchCriteria($keyword, $limit = null) {
    $listBankCriteria = new CDbCriteria;
    $listBankCriteria->order = "name asc";
    $listBankCriteria->group = "name";
    $listBankCriteria->with = array("type" => array("alias" => 't2'));
    $listBankCriteria->distinct = true;
    $listBankCriteria->compare("name", $keyword, true, "OR");
    $listBankCriteria->compare("description", $keyword, true, "OR");
    $listBankCriteria->compare("t2.category", $keyword, true, "OR");
    $listBankCriteria->compare("t2.type", $keyword, true, "OR");
    $listBankCriteria->compare("t2.description", $keyword, true, "OR");
    $listBankCriteria->addCondition("not t2.type='" . GoalType::$TYPE_ACTION_WORDS . "'");

    if ($limit != null) {
      $listBankCriteria->limit = $limit;
    }
    return $listBankCriteria;
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return ListBank the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{list_bank}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('name', 'required'),
     array('type_id', 'numerical', 'integerOnly' => true),
     array('name', 'length', 'max' => 50),
     array('description', 'length', 'max' => 150),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, type_id, name, description', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'type' => array(self::BELONGS_TO, 'GoalType', 'type_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'type_id' => 'Type',
     'name' => 'Name',
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
    $criteria->compare('type_id', $this->type_id);
    $criteria->compare('name', $this->name, true);
    $criteria->compare('description', $this->description, true);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
