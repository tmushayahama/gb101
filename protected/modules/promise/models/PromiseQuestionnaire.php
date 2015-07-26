<?php

/**
 * This is the model class for table "{{promise_questionnaire}}".
 *
 * The followings are the available columns in table '{{promise_questionnaire}}':
 * @property integer $id
 * @property integer $questionnaire_id
 * @property integer $promise_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Questionnaire $questionnaire
 */
class PromiseQuestionnaire extends CActiveRecord {

 public static function getPromiseParentQuestionnaire($childQuestionnaireId, $promiseId) {
  $promiseQuestionnaireCriteria = new CDbCriteria;
  $promiseQuestionnaireCriteria->addCondition("questionnaire_id=" . $childQuestionnaireId);
  $promiseQuestionnaireCriteria->addCondition("promise_id = " . $promiseId);

  return PromiseQuestionnaire::Model()->find($promiseQuestionnaireCriteria);
 }

 public static function getPromiseParentQuestionnaires($promiseId, $limit = null, $offset = null) {
  $promiseQuestionnaireCriteria = new CDbCriteria;
  if ($limit) {
   $promiseQuestionnaireCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseQuestionnaireCriteria->offset = $offset;
  }
  $promiseQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $promiseQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $promiseQuestionnaireCriteria->addCondition("promise_id = " . $promiseId);
  $promiseQuestionnaireCriteria->order = "td.id desc";
  return PromiseQuestionnaire::Model()->findAll($promiseQuestionnaireCriteria);
 }

 public static function getPromiseParentQuestionnairesCount($promiseId) {
  $promiseQuestionnaireCriteria = new CDbCriteria;
  $promiseQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $promiseQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $promiseQuestionnaireCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseQuestionnaire::Model()->count($promiseQuestionnaireCriteria);
 }

 public static function getPromiseChildrenQuestionnaires($questionnaireParentId) {
  $promiseQuestionnaireCriteria = new CDbCriteria;
  $promiseQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $promiseQuestionnaireCriteria->addCondition("td.parent_questionnaire_id=" . $questionnaireParentId);
  $promiseQuestionnaireCriteria->order = "td.id desc";
  return PromiseQuestionnaire::Model()->findAll($promiseQuestionnaireCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return PromiseQuestionnaire the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise_questionnaire}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('questionnaire_id, promise_id', 'required'),
    array('questionnaire_id, promise_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, questionnaire_id, promise_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'promise' => array(self::BELONGS_TO, 'Promise', 'promise_id'),
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
    'promise_id' => 'Promise',
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
  $criteria->compare('promise_id', $this->promise_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
