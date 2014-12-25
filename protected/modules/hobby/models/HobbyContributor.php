<?php

/**
 * This is the model class for table "{{hobby_contributor}}".
 *
 * The followings are the available columns in table '{{hobby_contributor}}':
 * @property integer $id
 * @property integer $contributor_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Contributor $contributor
 */
class HobbyContributor extends CActiveRecord {

 public static function getHobbyParentContributor($childContributorId, $hobbyId) {
  $hobbyContributorCriteria = new CDbCriteria;
  $hobbyContributorCriteria->addCondition("contributor_id=" . $childContributorId);
  $hobbyContributorCriteria->addCondition("hobby_id = " . $hobbyId);

  return HobbyContributor::Model()->find($hobbyContributorCriteria);
 }

 public static function getHobbyParentContributors($hobbyId, $limit = null, $offset = null) {
  $hobbyContributorCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyContributorCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyContributorCriteria->offset = $offset;
  }
  $hobbyContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $hobbyContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $hobbyContributorCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyContributorCriteria->order = "td.id desc";
  return HobbyContributor::Model()->findAll($hobbyContributorCriteria);
 }

 public static function getHobbyParentContributorsCount($hobbyId) {
  $hobbyContributorCriteria = new CDbCriteria;
  $hobbyContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $hobbyContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $hobbyContributorCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyContributor::Model()->count($hobbyContributorCriteria);
 }

 public static function getHobbyChildrenContributors($contributorParentId) {
  $hobbyContributorCriteria = new CDbCriteria;
  $hobbyContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $hobbyContributorCriteria->addCondition("td.parent_contributor_id=" . $contributorParentId);
  $hobbyContributorCriteria->order = "td.id desc";
  return HobbyContributor::Model()->findAll($hobbyContributorCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return HobbyContributor the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby_contributor}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('contributor_id, hobby_id', 'required'),
    array('contributor_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, contributor_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('contributor_id', $this->contributor_id);
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
