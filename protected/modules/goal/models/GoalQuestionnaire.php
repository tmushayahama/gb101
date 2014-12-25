<?php

/**
 * This is the model class for table "{{goal_questionnaire}}".
 *
 * The followings are the available columns in table '{{goal_questionnaire}}':
 * @property integer $id
 * @property integer $questionnaire_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Questionnaire $questionnaire
 */
class GoalQuestionnaire extends CActiveRecord {

 public static function getGoalParentQuestionnaire($childQuestionnaireId, $goalId) {
  $goalQuestionnaireCriteria = new CDbCriteria;
  $goalQuestionnaireCriteria->addCondition("questionnaire_id=" . $childQuestionnaireId);
  $goalQuestionnaireCriteria->addCondition("goal_id = " . $goalId);

  return GoalQuestionnaire::Model()->find($goalQuestionnaireCriteria);
 }

 public static function getGoalParentQuestionnaires($goalId, $limit = null, $offset = null) {
  $goalQuestionnaireCriteria = new CDbCriteria;
  if ($limit) {
   $goalQuestionnaireCriteria->limit = $limit;
  }
  if ($offset) {
   $goalQuestionnaireCriteria->offset = $offset;
  }
  $goalQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $goalQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $goalQuestionnaireCriteria->addCondition("goal_id = " . $goalId);
  $goalQuestionnaireCriteria->order = "td.id desc";
  return GoalQuestionnaire::Model()->findAll($goalQuestionnaireCriteria);
 }

 public static function getGoalParentQuestionnairesCount($goalId) {
  $goalQuestionnaireCriteria = new CDbCriteria;
  $goalQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $goalQuestionnaireCriteria->addCondition("td.parent_questionnaire_id is NULL");
  $goalQuestionnaireCriteria->addCondition("goal_id = " . $goalId);
  return GoalQuestionnaire::Model()->count($goalQuestionnaireCriteria);
 }

 public static function getGoalChildrenQuestionnaires($questionnaireParentId) {
  $goalQuestionnaireCriteria = new CDbCriteria;
  $goalQuestionnaireCriteria->with = array("questionnaire" => array("alias" => 'td'));
  $goalQuestionnaireCriteria->addCondition("td.parent_questionnaire_id=" . $questionnaireParentId);
  $goalQuestionnaireCriteria->order = "td.id desc";
  return GoalQuestionnaire::Model()->findAll($goalQuestionnaireCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return GoalQuestionnaire the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal_questionnaire}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('questionnaire_id, goal_id', 'required'),
    array('questionnaire_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, questionnaire_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
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
    'goal_id' => 'Goal',
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
  $criteria->compare('goal_id', $this->goal_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
