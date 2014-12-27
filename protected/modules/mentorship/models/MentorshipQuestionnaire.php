<?php

/**
 * This is the model class for table "{{mentorship_questionnaire}}".
 *
 * The followings are the available columns in table '{{mentorship_questionnaire}}':
 * @property integer $id
 * @property integer $questionnaire_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Questionnaire $questionnaire
 */
class MentorshipQuestionnaire extends CActiveRecord {

 public static function getMentorshipParentQuestionnaire($childQuestionnaireId, $mentorshipId) {
  $mentorshipQuestionnaireCriteria = new CDbCriteria;
  $mentorshipQuestionnaireCriteria->addCondition("questionnaire_id=" . $childQuestionnaireId);
  $mentorshipQuestionnaireCriteria->addCondition("mentorship_id = " . $mentorshipId);

  return MentorshipQuestionnaire::Model()->find($mentorshipQuestionnaireCriteria);
 }

 public static function getMentorshipParentQuestionnaires($mentorshipId, $limit = null, $offset = null) {
  $mentorshipQuestionnaireCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipQuestionnaireCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipQuestionnaireCriteria->offset = $offset;
  }
  $mentorshipQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $mentorshipQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $mentorshipQuestionnaireCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipQuestionnaireCriteria->order = "td.id desc";
  return MentorshipQuestionnaire::Model()->findAll($mentorshipQuestionnaireCriteria);
 }

 public static function getMentorshipParentQuestionnairesCount($mentorshipId) {
  $mentorshipQuestionnaireCriteria = new CDbCriteria;
  $mentorshipQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $mentorshipQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $mentorshipQuestionnaireCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipQuestionnaire::Model()->count($mentorshipQuestionnaireCriteria);
 }

 public static function getMentorshipChildrenQuestionnaires($questionnaireParentId) {
  $mentorshipQuestionnaireCriteria = new CDbCriteria;
  $mentorshipQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $mentorshipQuestionnaireCriteria->addCondition("td.parent_questionnaire_id=" . $questionnaireParentId);
  $mentorshipQuestionnaireCriteria->order = "td.id desc";
  return MentorshipQuestionnaire::Model()->findAll($mentorshipQuestionnaireCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipQuestionnaire the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_questionnaire}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('questionnaire_id, mentorship_id', 'required'),
    array('questionnaire_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, questionnaire_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
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
    'mentorship_id' => 'Mentorship',
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
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
