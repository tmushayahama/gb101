<?php

/**
 * This is the model class for table "{{mentorship_contributor}}".
 *
 * The followings are the available columns in table '{{mentorship_contributor}}':
 * @property integer $id
 * @property integer $contributor_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Contributor $contributor
 */
class MentorshipContributor extends CActiveRecord {

 public static function getMentorshipParentContributor($childContributorId, $mentorshipId) {
  $mentorshipContributorCriteria = new CDbCriteria;
  $mentorshipContributorCriteria->addCondition("contributor_id=" . $childContributorId);
  $mentorshipContributorCriteria->addCondition("mentorship_id = " . $mentorshipId);

  return MentorshipContributor::Model()->find($mentorshipContributorCriteria);
 }

 public static function getMentorshipParentContributors($mentorshipId, $limit = null, $offset = null) {
  $mentorshipContributorCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipContributorCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipContributorCriteria->offset = $offset;
  }
  $mentorshipContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $mentorshipContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $mentorshipContributorCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipContributorCriteria->order = "td.id desc";
  return MentorshipContributor::Model()->findAll($mentorshipContributorCriteria);
 }

 public static function getMentorshipParentContributorsCount($mentorshipId) {
  $mentorshipContributorCriteria = new CDbCriteria;
  $mentorshipContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $mentorshipContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $mentorshipContributorCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipContributor::Model()->count($mentorshipContributorCriteria);
 }

 public static function getMentorshipChildrenContributors($contributorParentId) {
  $mentorshipContributorCriteria = new CDbCriteria;
  $mentorshipContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $mentorshipContributorCriteria->addCondition("td.parent_contributor_id=" . $contributorParentId);
  $mentorshipContributorCriteria->order = "td.id desc";
  return MentorshipContributor::Model()->findAll($mentorshipContributorCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipContributor the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_contributor}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('contributor_id, mentorship_id', 'required'),
    array('contributor_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, contributor_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('contributor_id', $this->contributor_id);
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
