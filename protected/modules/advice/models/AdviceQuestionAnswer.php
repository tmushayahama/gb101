<?php

/**
 * This is the model class for table "{{advice_question_answer}}".
 *
 * The followings are the available columns in table '{{advice_question_answer}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $question_answer_id
 * @property integer $advice_id
 * @property string $created_date
 * @property string $description
 * @property integer $user_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property QuestionAnswerChoice $questionAnswer
 * @property Question $question
 * @property User $user
 */
class AdviceQuestionAnswer extends CActiveRecord {

 public static function getAdviceQuestionAnswers($adviceId, $questionId) {
  $adviceQuestionAnswerCriteria = new CDbCriteria;
  //$adviceQuestionAnswerCriteria->with = array("question" => array("alias" => 'td'));
  $adviceQuestionAnswerCriteria->addCondition("advice_id=" . $adviceId);
  $adviceQuestionAnswerCriteria->addCondition("question_id=" . $questionId);
  return AdviceQuestionAnswer::Model()->findAll($adviceQuestionAnswerCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceQuestionAnswer the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_question_answer}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('question_id, description', 'required'),
    array('question_id, question_answer_id, advice_id, user_id, privacy, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, question_id, question_answer_id, advice_id, created_date, description, user_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advice' => array(self::BELONGS_TO, 'Advice', 'advice_id'),
    'questionAnswer' => array(self::BELONGS_TO, 'QuestionAnswerChoice', 'question_answer_id'),
    'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'question_id' => 'Question',
    'question_answer_id' => 'Question Answer',
    'advice_id' => 'Advice',
    'created_date' => 'Created Date',
    'description' => 'Description',
    'user_id' => 'User',
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
  $criteria->compare('question_id', $this->question_id);
  $criteria->compare('question_answer_id', $this->question_answer_id);
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('user_id', $this->user_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
