<?php

/**
 * This is the model class for table "{{question}}".
 *
 * The followings are the available columns in table '{{question}}':
 * @property integer $id
 * @property integer $parent_question_id
 * @property string $title
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property MentorshipQuestion[] $mentorshipQuestions
 * @property User $creator
 * @property Question $parentQuestion
 * @property Question[] $questions
 * @property SkillQuestion[] $skillQuestions
 * @property TodoQuestion[] $todoQuestions
 */
class Question extends CActiveRecord {

 public static $STATUS_GENERAL = 0;
 public static $STATUS_QUESTIONNAIRE = 1;
 public static $TYPE_FOR_MENTOR = 1;
 public static $TYPE_FOR_MENTEE = 2;
 public static $TYPE_MENTORSHIP_ASK = 3;
 public static $TYPE_FOR_QUESTIONNAIRE_MENTOR = 4;
 public static $TYPE_FOR_QUESTIONNAIRE_MENTEE = 5;

 public static function getQuestions($type) {
  $questionCriteria = new CDbCriteria();
  $questionCriteria->addCondition("type=" . $type);
  return question::model()->findAll($questionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Question the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{question}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('description', 'required'),
    array('parent_question_id, creator_id, type, status', 'numerical', 'integerOnly' => true),
    array('title', 'length', 'max' => 150),
    array('description', 'length', 'max' => 1000),
    array('created_date', 'safe'),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_question_id, title, creator_id, description, created_date, type, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'mentorshipQuestions' => array(self::HAS_MANY, 'MentorshipQuestion', 'question_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'parentQuestion' => array(self::BELONGS_TO, 'Question', 'parent_question_id'),
    'questions' => array(self::HAS_MANY, 'Question', 'parent_question_id'),
    'skillQuestions' => array(self::HAS_MANY, 'SkillQuestion', 'question_id'),
    'todoQuestions' => array(self::HAS_MANY, 'TodoQuestion', 'question_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_question_id' => 'Parent Question',
    'title' => 'Title',
    'creator_id' => 'Creator',
    'description' => 'Description',
    'created_date' => 'Created Date',
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
  $criteria->compare('parent_question_id', $this->parent_question_id);
  $criteria->compare('title', $this->title, true);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('type', $this->type);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
