<?php

/**
 * This is the model class for table "{{questionnaire}}".
 *
 * The followings are the available columns in table '{{questionnaire}}':
 * @property integer $id
 * @property integer $parent_questionnaire_id
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $importance
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Questionnaire $parentQuestionnaire
 * @property Questionnaire[] $questionnaires
 * @property SkillQuestionnaire[] $skillQuestionnaires
 * @property TodoQuestionnaire[] $todoQuestionnaires
 */
class Questionnaire extends CActiveRecord {

 public static $QUESTIONNAIRES_PER_OVERVIEW_PAGE = 3;
 public static $QUESTIONNAIRES_PER_PAGE = 20;

 public static function deleteQuestionnaire($questionnaireId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_QUESTIONNAIRE);
  $postsCriteria->addCondition("source_id=" . $questionnaireId);
  Post::model()->deleteAll($postsCriteria);
  Questionnaire::model()->deleteByPk($questionnaireId);
 }

 public static function getChildrenQuestionnaires($questionnaireParentId, $limit = null) {
  $questionnaireCriteria = new CDbCriteria;
  if ($limit) {
   $questionnaireCriteria->limit = $limit;
  }
  $questionnaireCriteria->alias = "td";
  $questionnaireCriteria->addCondition("parent_questionnaire_id=" . $questionnaireParentId);
  $questionnaireCriteria->order = "td.id desc";
  return Questionnaire::Model()->findAll($questionnaireCriteria);
 }

 public static function getChildrenQuestionnairesCount($questionnaireParentId) {
  $questionnaireCriteria = new CDbCriteria;
  $questionnaireCriteria->addCondition("parent_questionnaire_id=" . $questionnaireParentId);
  return Questionnaire::Model()->count($questionnaireCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Questionnaire the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{questionnaire}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('description', 'required'),
    array('parent_questionnaire_id, creator_id, importance, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_questionnaire_id, creator_id, description, created_date, importance, status', 'safe', 'on' => 'search'),
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
    'parentQuestionnaire' => array(self::BELONGS_TO, 'Questionnaire', 'parent_questionnaire_id'),
    'questionnaires' => array(self::HAS_MANY, 'Questionnaire', 'parent_questionnaire_id'),
    'skillQuestionnaires' => array(self::HAS_MANY, 'SkillQuestionnaire', 'questionnaire_id'),
    'todoQuestionnaires' => array(self::HAS_MANY, 'TodoQuestionnaire', 'questionnaire_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_questionnaire_id' => 'Parent Questionnaire',
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
  $criteria->compare('parent_questionnaire_id', $this->parent_questionnaire_id);
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
