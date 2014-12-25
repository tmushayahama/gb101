<?php

/**
 * This is the model class for table "{{hobby_questionnaire}}".
 *
 * The followings are the available columns in table '{{hobby_questionnaire}}':
 * @property integer $id
 * @property integer $questionnaire_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Questionnaire $questionnaire
 */
class HobbyQuestionnaire extends CActiveRecord {

 public static function getHobbyParentQuestionnaire($childQuestionnaireId, $hobbyId) {
  $hobbyQuestionnaireCriteria = new CDbCriteria;
  $hobbyQuestionnaireCriteria->addCondition("questionnaire_id=" . $childQuestionnaireId);
  $hobbyQuestionnaireCriteria->addCondition("hobby_id = " . $hobbyId);

  return HobbyQuestionnaire::Model()->find($hobbyQuestionnaireCriteria);
 }

 public static function getHobbyParentQuestionnaires($hobbyId, $limit = null, $offset = null) {
  $hobbyQuestionnaireCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyQuestionnaireCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyQuestionnaireCriteria->offset = $offset;
  }
  $hobbyQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $hobbyQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $hobbyQuestionnaireCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyQuestionnaireCriteria->order = "td.id desc";
  return HobbyQuestionnaire::Model()->findAll($hobbyQuestionnaireCriteria);
 }

 public static function getHobbyParentQuestionnairesCount($hobbyId) {
  $hobbyQuestionnaireCriteria = new CDbCriteria;
  $hobbyQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $hobbyQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $hobbyQuestionnaireCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyQuestionnaire::Model()->count($hobbyQuestionnaireCriteria);
 }

 public static function getHobbyChildrenQuestionnaires($questionnaireParentId) {
  $hobbyQuestionnaireCriteria = new CDbCriteria;
  $hobbyQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $hobbyQuestionnaireCriteria->addCondition("td.parent_questionnaire_id=" . $questionnaireParentId);
  $hobbyQuestionnaireCriteria->order = "td.id desc";
  return HobbyQuestionnaire::Model()->findAll($hobbyQuestionnaireCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return HobbyQuestionnaire the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby_questionnaire}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('questionnaire_id, hobby_id', 'required'),
    array('questionnaire_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, questionnaire_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'hobby' => array(self::BELONGS_TO, 'Hobby', 'hobby_id'),
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
    'hobby_id' => 'Hobby',
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
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
