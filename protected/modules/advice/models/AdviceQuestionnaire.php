<?php

/**
 * This is the model class for table "{{advice_questionnaire}}".
 *
 * The followings are the available columns in table '{{advice_questionnaire}}':
 * @property integer $id
 * @property integer $questionnaire_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Questionnaire $questionnaire
 */
class AdviceQuestionnaire extends CActiveRecord {

 public static function getAdviceParentQuestionnaire($childQuestionnaireId, $adviceId) {
  $adviceQuestionnaireCriteria = new CDbCriteria;
  $adviceQuestionnaireCriteria->addCondition("questionnaire_id=" . $childQuestionnaireId);
  $adviceQuestionnaireCriteria->addCondition("advice_id = " . $adviceId);

  return AdviceQuestionnaire::Model()->find($adviceQuestionnaireCriteria);
 }

 public static function getAdviceParentQuestionnaires($adviceId, $limit = null, $offset = null) {
  $adviceQuestionnaireCriteria = new CDbCriteria;
  if ($limit) {
   $adviceQuestionnaireCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceQuestionnaireCriteria->offset = $offset;
  }
  $adviceQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $adviceQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $adviceQuestionnaireCriteria->addCondition("advice_id = " . $adviceId);
  $adviceQuestionnaireCriteria->order = "td.id desc";
  return AdviceQuestionnaire::Model()->findAll($adviceQuestionnaireCriteria);
 }

 public static function getAdviceParentQuestionnairesCount($adviceId) {
  $adviceQuestionnaireCriteria = new CDbCriteria;
  $adviceQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $adviceQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $adviceQuestionnaireCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceQuestionnaire::Model()->count($adviceQuestionnaireCriteria);
 }

 public static function getAdviceChildrenQuestionnaires($questionnaireParentId) {
  $adviceQuestionnaireCriteria = new CDbCriteria;
  $adviceQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $adviceQuestionnaireCriteria->addCondition("td.parent_questionnaire_id=" . $questionnaireParentId);
  $adviceQuestionnaireCriteria->order = "td.id desc";
  return AdviceQuestionnaire::Model()->findAll($adviceQuestionnaireCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceQuestionnaire the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_questionnaire}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('questionnaire_id, advice_id', 'required'),
    array('questionnaire_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, questionnaire_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
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
    'questionnaire' => array(self::BELONGS_TO, 'Questionnaire', 'questionnaire_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'questionnaire_id' => 'Questionnaire',
    'advice_id' => 'Advice',
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
  $criteria->compare('questionnaire_id', $this->questionnaire_id);
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
