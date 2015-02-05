<?php

/**
 * This is the model class for table "{{bank}}".
 *
 * The followings are the available columns in table '{{bank}}':
 * @property integer $id
 * @property integer $source_id
 * @property integer $creator_id
 * @property integer $times_used
 * @property integer $views
 * @property integer $likes
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Goal[] $goals
 * @property Hobby[] $hobbies
 * @property Mentorship[] $mentorships
 * @property Promise[] $promises
 * @property Skill[] $skills
 */
class Bank extends CActiveRecord {

 public static $TYPE_SKILL_ACADEMIC = 1;
 public static $TYPE_SKILL_SELF_MANGEMENT = 2;
 public static $TYPE_SKILL_TRANSFERABLE = 3;
 public static $TYPE_SKILL_MISCELLANEOUS = 4;

 public static function getBank($typeCategory, $keyword = null, $type = null, $limit = null, $offset = null) {
  $bankCriteria = new CDbCriteria;
  $bankCriteria->alias = "lB";
  $bankCriteria->order = "name asc";
  $bankCriteria->group = "name";
  $bankCriteria->with = array("type" => array("alias" => 't2'));
  $bankCriteria->distinct = true;
  if ($type != null) {
   $bankCriteria->addCondition("type_id=" . $type);
  }
  if ($keyword != null) {
   $bankCriteria->compare("lB.name", $keyword, true, "OR");
   $bankCriteria->compare("lB.description", $keyword, true, "OR");
  } else {
   $bankCriteria->addCondition("t2.category='" . $typeCategory . "'");
  }
  if ($limit != null) {
   $bankCriteria->limit = $limit;
  }
  if ($offset != null) {
   $bankCriteria->offset = $offset;
  }
  return Bank::Model()->findAll($bankCriteria);
 }

 public static function getBankSearchCriteria($typeCategory, $type = null, $limit = null, $offset = null) {
  $bankCriteria = new CDbCriteria;
  $bankCriteria->order = "name asc";
  $bankCriteria->group = "name";
  $bankCriteria->with = array("type" => array("alias" => 't2'));
  $bankCriteria->distinct = true;
  $bankCriteria->addCondition("t2.category='" . $typeCategory . "'");
  if ($type != null) {
   $bankCriteria->addCondition("type_id=" . $type);
  }
  if ($limit != null) {
   $bankCriteria->limit = $limit;
  }
  if ($offset != null) {
   $bankCriteria->offset = $offset;
  }
  return $bankCriteria;
 }

 public static function getBankCount($typeCategory) {
  $bankCriteria = new CDbCriteria;
  $bankCriteria->with = array("type" => array("alias" => 't2'));
  $bankCriteria->distinct = true;
  $bankCriteria->addCondition("t2.category='" . $typeCategory . "'");

  return Bank::Model()->Count($bankCriteria);
 }

 public static function GetSublist($name) {
  $bankCriteria = new CDbCriteria;
  $bankCriteria->addCondition('name="' . $name . '"');
  $bankCriteria->addCondition('skill is not null');
  return Bank::Model()->findAll($bankCriteria);
 }

 public static function getBankKeywordSearchCriteria($keyword, $limit = null) {
  $bankCriteria = new CDbCriteria;
  $bankCriteria->order = "name asc";
  $bankCriteria->group = "name";
  $bankCriteria->with = array("type" => array("alias" => 't2'));
  $bankCriteria->distinct = true;
  $bankCriteria->compare("name", $keyword, true, "OR");
  $bankCriteria->compare("description", $keyword, true, "OR");
  $bankCriteria->compare("t2.category", $keyword, true, "OR");
  $bankCriteria->compare("t2.type", $keyword, true, "OR");
  $bankCriteria->compare("t2.description", $keyword, true, "OR");
  $bankCriteria->addCondition("not t2.type='" . SkillType::$TYPE_ACTION_WORDS . "'");

  if ($limit != null) {
   $bankCriteria->limit = $limit;
  }
  return $bankCriteria;
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Bank the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{bank}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('source_id, creator_id, times_used, views, likes', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, source_id, creator_id, times_used, views, likes', 'safe', 'on' => 'search'),
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
    'goals' => array(self::HAS_MANY, 'Goal', 'bank_id'),
    'hobbies' => array(self::HAS_MANY, 'Hobby', 'bank_id'),
    'mentorships' => array(self::HAS_MANY, 'Mentorship', 'bank_id'),
    'promises' => array(self::HAS_MANY, 'Promise', 'bank_id'),
    'skills' => array(self::HAS_MANY, 'Skill', 'bank_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'source_id' => 'Source',
    'creator_id' => 'Creator',
    'times_used' => 'Times Used',
    'views' => 'Views',
    'likes' => 'Likes',
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
  $criteria->compare('source_id', $this->source_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('times_used', $this->times_used);
  $criteria->compare('views', $this->views);
  $criteria->compare('likes', $this->likes);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
