<?php

/**
 * This is the model class for table "{{question_answer_choice}}".
 *
 * The followings are the available columns in table '{{question_answer_choice}}':
 * @property integer $id
 * @property integer $question_id
 * @property string $answer
 * @property string $description
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Question $question
 * @property UserQuestionAnswer[] $userQuestionAnswers
 */
class QuestionAnswerChoice extends CActiveRecord {

 public static function getQuestionAnswerChoices($questionId) {
  $questionAnswerChoiceCriteria = new CDbCriteria();
  $questionAnswerChoiceCriteria->addCondition("question_id=" . $questionId);
  return QuestionAnswerChoice::model()->findAll($questionAnswerChoiceCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return QuestionAnswerChoice the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{question_answer_choice}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('question_id', 'required'),
    array('question_id, type, status', 'numerical', 'integerOnly' => true),
    array('answer', 'length', 'max' => 150),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, question_id, answer, description, type, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
    'userQuestionAnswers' => array(self::HAS_MANY, 'UserQuestionAnswer', 'question_answer_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'question_id' => 'Question',
    'answer' => 'Answer',
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
  $criteria->compare('question_id', $this->question_id);
  $criteria->compare('answer', $this->answer, true);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('type', $this->type);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
