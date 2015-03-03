<?php

/**
 * This is the model class for table "{{user_question_answer}}".
 *
 * The followings are the available columns in table '{{user_question_answer}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $question_answer_id
 * @property string $created_date
 * @property string $description
 * @property integer $user_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Question $question
 * @property QuestionChoice $questionAnswer
 */
class UserQuestionAnswer extends CActiveRecord {

 public static $USER_QUESTION_ANSWERS_PER_PAGE = 10;

 public static function getUserQuestionAnswers($userId, $limit = null, $offset = null) {
  $userQuestionAnswerCriteria = new CDbCriteria;
  if ($limit) {
   $userQuestionAnswerCriteria->limit = $limit;
  }
  if ($offset) {
   $userQuestionAnswerCriteria->offset = $offset;
  }
  //$userQuestionAnswerCriteria->with = array("comment" => array("alias" => 'td'));
  //$userQuestionAnswerCriteria->addCondition("td.parent_comment_id is NULL");
  $userQuestionAnswerCriteria->addCondition("user_id = " . $userId);
  //$userQuestionAnswerCriteria->order = "td.id desc";
  return UserQuestionAnswer::Model()->findAll($userQuestionAnswerCriteria);
 }

 public static function getUserQuestionAnswersCount($userId, $offset = null) {
  $userQuestionAnswerCriteria = new CDbCriteria;
  if ($offset) {
   $userQuestionAnswerCriteria->offset = $offset;
  }
  //$userQuestionAnswerCriteria->with = array("comment" => array("alias" => 'td'));
  //$userQuestionAnswerCriteria->addCondition("td.parent_comment_id is NULL");
  $userQuestionAnswerCriteria->addCondition("user_id = " . $userId);
  return UserQuestionAnswer::Model()->count($userQuestionAnswerCriteria);
 }

 public static function getRandomUserQuestion($userId) {
  $userQuestionAnswerCriteria = new CDbCriteria;

  //$userQuestionAnswerCriteria->with = array("comment" => array("alias" => 'td'));
  //$userQuestionAnswerCriteria->addCondition("td.parent_comment_id is NULL");
  $userQuestionAnswerCriteria->addCondition("user_id = " . $userId);
  $answeredQuestions = UserQuestionAnswer::Model()->findAll($userQuestionAnswerCriteria);
  $answeredQuestionIds = array();
  foreach ($answeredQuestions as $answeredQuestion) {
   array_push($answeredQuestionIds, $answeredQuestion->question_id);
  }
  //$userQuestionAnswerCriteria->order = "td.id desc";

  $questionCriteria = new CDbCriteria;
  $questionCriteria->addNotInCondition('id', $answeredQuestionIds);
  $questionCriteria->order = 'RAND()';
  return Question::Model()->find($questionCriteria);
 }

 public static function getUserQuestionAnswer($userId, $questionId) {
  $userQuestionAnswerCriteria = new CDbCriteria;
  $userQuestionAnswerCriteria->addCondition("user_id = " . $userId);
  $userQuestionAnswerCriteria->addCondition("question_id = " . $questionId);
  return UserQuestionAnswer::Model()->find($userQuestionAnswerCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return UserQuestionAnswer the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{user_question_answer}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('question_id', 'required'),
    array('question_id, question_answer_id, user_id, privacy, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, question_id, question_answer_id, created_date, description, user_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
    'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
    'questionAnswerChoice' => array(self::BELONGS_TO, 'QuestionAnswerChoice', 'question_answer_id'),
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
