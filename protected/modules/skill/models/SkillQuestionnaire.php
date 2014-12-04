<?php

/**
 * This is the model class for table "{{skill_questionnaire}}".
 *
 * The followings are the available columns in table '{{skill_questionnaire}}':
 * @property integer $id
 * @property integer $questionnaire_id
 * @property integer $skill_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property Questionnaire $questionnaire
 */
class SkillQuestionnaire extends CActiveRecord {

 public static function getSkillParentQuestionnaire($childQuestionnaireId, $skillId) {
  $skillQuestionnaireCriteria = new CDbCriteria;
  $skillQuestionnaireCriteria->addCondition("questionnaire_id=" . $childQuestionnaireId);
  $skillQuestionnaireCriteria->addCondition("skill_id = " . $skillId);

  return SkillQuestionnaire::Model()->find($skillQuestionnaireCriteria);
 }

 public static function getSkillParentQuestionnaires($skillId, $limit = null, $offset = null) {
  $skillQuestionnaireCriteria = new CDbCriteria;
  if ($limit) {
   $skillQuestionnaireCriteria->limit = $limit;
  }
  if ($offset) {
   $skillQuestionnaireCriteria->offset = $offset;
  }
  $skillQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $skillQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $skillQuestionnaireCriteria->addCondition("skill_id = " . $skillId);
  $skillQuestionnaireCriteria->order = "td.id desc";
  return SkillQuestionnaire::Model()->findAll($skillQuestionnaireCriteria);
 }

 public static function getSkillParentQuestionnairesCount($skillId) {
  $skillQuestionnaireCriteria = new CDbCriteria;
  $skillQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $skillQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $skillQuestionnaireCriteria->addCondition("skill_id = " . $skillId);
  return SkillQuestionnaire::Model()->count($skillQuestionnaireCriteria);
 }

 public static function getSkillChildrenQuestionnaires($questionnaireParentId) {
  $skillQuestionnaireCriteria = new CDbCriteria;
  $skillQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $skillQuestionnaireCriteria->addCondition("td.parent_questionnaire_id=" . $questionnaireParentId);
  $skillQuestionnaireCriteria->order = "td.id desc";
  return SkillQuestionnaire::Model()->findAll($skillQuestionnaireCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return SkillQuestionnaire the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{skill_questionnaire}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('questionnaire_id, skill_id', 'required'),
    array('questionnaire_id, skill_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, questionnaire_id, skill_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
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
    'skill_id' => 'Skill',
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
  $criteria->compare('skill_id', $this->skill_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
