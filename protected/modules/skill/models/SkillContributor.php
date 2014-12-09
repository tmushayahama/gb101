<?php

/**
 * This is the model class for table "{{skill_contributor}}".
 *
 * The followings are the available columns in table '{{skill_contributor}}':
 * @property integer $id
 * @property integer $contributor_id
 * @property integer $skill_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property Contributor $contributor
 */
class SkillContributor extends CActiveRecord {

 public static function getSkillParentContributor($childContributorId, $skillId) {
  $skillContributorCriteria = new CDbCriteria;
  $skillContributorCriteria->addCondition("contributor_id=" . $childContributorId);
  $skillContributorCriteria->addCondition("skill_id = " . $skillId);

  return SkillContributor::Model()->find($skillContributorCriteria);
 }

 public static function getSkillParentContributors($skillId, $limit = null, $offset = null) {
  $skillContributorCriteria = new CDbCriteria;
  if ($limit) {
   $skillContributorCriteria->limit = $limit;
  }
  if ($offset) {
   $skillContributorCriteria->offset = $offset;
  }
  $skillContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $skillContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $skillContributorCriteria->addCondition("skill_id = " . $skillId);
  $skillContributorCriteria->order = "td.id desc";
  return SkillContributor::Model()->findAll($skillContributorCriteria);
 }

 public static function getSkillParentContributorsCount($skillId) {
  $skillContributorCriteria = new CDbCriteria;
  $skillContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $skillContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $skillContributorCriteria->addCondition("skill_id = " . $skillId);
  return SkillContributor::Model()->count($skillContributorCriteria);
 }

 public static function getSkillChildrenContributors($contributorParentId) {
  $skillContributorCriteria = new CDbCriteria;
  $skillContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $skillContributorCriteria->addCondition("td.parent_contributor_id=" . $contributorParentId);
  $skillContributorCriteria->order = "td.id desc";
  return SkillContributor::Model()->findAll($skillContributorCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return SkillContributor the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{skill_contributor}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('contributor_id, skill_id', 'required'),
    array('contributor_id, skill_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, contributor_id, skill_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('contributor_id', $this->contributor_id);
  $criteria->compare('skill_id', $this->skill_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
