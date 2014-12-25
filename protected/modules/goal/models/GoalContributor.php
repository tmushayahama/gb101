<?php

/**
 * This is the model class for table "{{goal_contributor}}".
 *
 * The followings are the available columns in table '{{goal_contributor}}':
 * @property integer $id
 * @property integer $contributor_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Contributor $contributor
 */
class GoalContributor extends CActiveRecord {

 public static function getGoalParentContributor($childContributorId, $goalId) {
  $goalContributorCriteria = new CDbCriteria;
  $goalContributorCriteria->addCondition("contributor_id=" . $childContributorId);
  $goalContributorCriteria->addCondition("goal_id = " . $goalId);

  return GoalContributor::Model()->find($goalContributorCriteria);
 }

 public static function getGoalParentContributors($goalId, $limit = null, $offset = null) {
  $goalContributorCriteria = new CDbCriteria;
  if ($limit) {
   $goalContributorCriteria->limit = $limit;
  }
  if ($offset) {
   $goalContributorCriteria->offset = $offset;
  }
  $goalContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $goalContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $goalContributorCriteria->addCondition("goal_id = " . $goalId);
  $goalContributorCriteria->order = "td.id desc";
  return GoalContributor::Model()->findAll($goalContributorCriteria);
 }

 public static function getGoalParentContributorsCount($goalId) {
  $goalContributorCriteria = new CDbCriteria;
  $goalContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $goalContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $goalContributorCriteria->addCondition("goal_id = " . $goalId);
  return GoalContributor::Model()->count($goalContributorCriteria);
 }

 public static function getGoalChildrenContributors($contributorParentId) {
  $goalContributorCriteria = new CDbCriteria;
  $goalContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $goalContributorCriteria->addCondition("td.parent_contributor_id=" . $contributorParentId);
  $goalContributorCriteria->order = "td.id desc";
  return GoalContributor::Model()->findAll($goalContributorCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return GoalContributor the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal_contributor}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('contributor_id, goal_id', 'required'),
    array('contributor_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, contributor_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
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
    'contributor' => array(self::BELONGS_TO, 'Contributor', 'contributor_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'contributor_id' => 'Contributor',
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
  $criteria->compare('contributor_id', $this->contributor_id);
  $criteria->compare('goal_id', $this->goal_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
