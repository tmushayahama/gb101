<?php

/**
 * This is the model class for table "{{questionnaire_question}}".
 *
 * The followings are the available columns in table '{{questionnaire_question}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $questionnaire_id
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $importance
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Question $question
 * @property QuestionnaireQuestion $questionnaire
 * @property QuestionnaireQuestion[] $questionnaireQuestions
 */
class QuestionnaireQuestion extends CActiveRecord {

 public static $QUESTIONNAIRESQUESTIONS_PER_PAGE = 10;

 public static function getQuestionnaireQuestions($questionnaireId, $limit = null, $offset = null) {
  $questionnaireQuestionCriteria = new CDbCriteria;
  if ($limit) {
   $questionnaireQuestionCriteria->limit = $limit;
  }
  if ($offset) {
   $questionnaireQuestionCriteria->offset = $offset;
  }
  //$userQuestionnaireCriteria->with = array("comment" => array("alias" => 'td'));
  //$userQuestionnaireCriteria->addCondition("td.parent_comment_id is NULL");
  $questionnaireQuestionCriteria->addCondition("questionnaire_id = " . $questionnaireId);
  //$questionnaireQuestionCriteria->order = "td.id desc";
  return QuestionnaireQuestion::Model()->findAll($questionnaireQuestionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return QuestionnaireQuestion the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{questionnaire_question}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('creator_id, created_date', 'required'),
    array('question_id, questionnaire_id, creator_id, importance, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, question_id, questionnaire_id, creator_id, description, created_date, importance, status', 'safe', 'on' => 'search'),
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
    'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
    'questionnaire' => array(self::BELONGS_TO, 'QuestionnaireQuestion', 'questionnaire_id'),
    'questionnaireQuestions' => array(self::HAS_MANY, 'QuestionnaireQuestion', 'questionnaire_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'question_id' => 'Question',
    'questionnaire_id' => 'Questionnaire',
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
  $criteria->compare('question_id', $this->question_id);
  $criteria->compare('questionnaire_id', $this->questionnaire_id);
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
