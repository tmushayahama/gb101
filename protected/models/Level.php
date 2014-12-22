<?php

/**
 * This is the model class for table "{{level}}".
 *
 * The followings are the available columns in table '{{level}}':
 * @property integer $id
 * @property string $category
 * @property string $code
 * @property string $name
 * @property string $description
 *
 * The followings are the available model relations:
 * @property AdvicePage[] $advicePages
 * @property GoalList[] $goalLists
 * @property Group[] $groups
 * @property HobbyList[] $hobbyLists
 * @property Journal[] $journals
 * @property Mentorship[] $mentorships
 * @property MentorshipMonitor[] $mentorshipMonitors
 * @property PromiseList[] $promiseLists
 * @property Skill[] $skills
 * @property SkillMonitor[] $skillMonitors
 * @property Todo[] $todos
 */
class Level extends CActiveRecord {

 public static $LEVEL_CATEGORY_SKILL = 1;
 public static $LEVEL_CATEGORY_GOAL = 2;
 public static $LEVEL_CATEGORY_PROMISE = 3;
 public static $LEVEL_CATEGORY_HOBBY = 4;
 public static $LEVEL_CATEGORY_MENTORSHIP = 5;
 public static $LEVEL_CATEGORY_ADVICE_PAGE = 6;
 public static $LEVEL_CATEGORY_TODO_PRIORITY = 7;
 public static $LEVEL_CATEGORY_CONTRIBUTOR_TYPE = 8;
 //LL
 public static $NAME_SKILL_GAINED = 1;
 public static $LEVEL_SKILL_GAINED = 1;
 public static $LEVEL_SKILL_TO_IMPROVE = 2;
 public static $LEVEL_SKILL_TO_LEARN = 3;
 public static $LEVEL_SKILL_OF_INTEREST = 4;
 public static $LEVEL_SKILL_OTHER = 5;

 /*  * Get all the skills by type
  *
  */

 public static function getLevels($category) {
  $levelCriteria = new CDbCriteria;
  $levelCriteria->addCondition("category=" . $category);
  return Level::Model()->findAll($levelCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Level the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{level}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('category, code, name', 'required'),
    array('category, name', 'length', 'max' => 50),
    array('code', 'length', 'max' => 10),
    array('description', 'length', 'max' => 150),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, category, code, name, description', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'level_id'),
    'goalLists' => array(self::HAS_MANY, 'GoalList', 'level_id'),
    'groups' => array(self::HAS_MANY, 'Group', 'level_id'),
    'hobbyLists' => array(self::HAS_MANY, 'HobbyList', 'level_id'),
    'journals' => array(self::HAS_MANY, 'Journal', 'level_id'),
    'mentorships' => array(self::HAS_MANY, 'Mentorship', 'level_id'),
    'mentorshipMonitors' => array(self::HAS_MANY, 'MentorshipMonitor', 'level_id'),
    'promiseLists' => array(self::HAS_MANY, 'PromiseList', 'level_id'),
    'skills' => array(self::HAS_MANY, 'Skill', 'level_id'),
    'skillMonitors' => array(self::HAS_MANY, 'SkillMonitor', 'level_id'),
    'todos' => array(self::HAS_MANY, 'Todo', 'priority_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'category' => 'Category',
    'code' => 'Code',
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
  $criteria->compare('category', $this->category, true);
  $criteria->compare('code', $this->code, true);
  $criteria->compare('name', $this->name, true);
  $criteria->compare('description', $this->description, true);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
