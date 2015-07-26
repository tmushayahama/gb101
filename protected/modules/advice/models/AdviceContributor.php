<?php

/**
 * This is the model class for table "{{advice_contributor}}".
 *
 * The followings are the available columns in table '{{advice_contributor}}':
 * @property integer $id
 * @property integer $contributor_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Contributor $contributor
 */
class AdviceContributor extends CActiveRecord {

 public static function getAdviceParentContributor($childContributorId, $adviceId) {
  $adviceContributorCriteria = new CDbCriteria;
  $adviceContributorCriteria->addCondition("contributor_id=" . $childContributorId);
  $adviceContributorCriteria->addCondition("advice_id = " . $adviceId);

  return AdviceContributor::Model()->find($adviceContributorCriteria);
 }

 public static function getAdviceParentContributors($adviceId, $limit = null, $offset = null) {
  $adviceContributorCriteria = new CDbCriteria;
  if ($limit) {
   $adviceContributorCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceContributorCriteria->offset = $offset;
  }
  $adviceContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $adviceContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $adviceContributorCriteria->addCondition("advice_id = " . $adviceId);
  $adviceContributorCriteria->order = "td.id desc";
  return AdviceContributor::Model()->findAll($adviceContributorCriteria);
 }

 public static function getAdviceParentContributorsCount($adviceId) {
  $adviceContributorCriteria = new CDbCriteria;
  $adviceContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $adviceContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $adviceContributorCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceContributor::Model()->count($adviceContributorCriteria);
 }

 public static function getAdviceChildrenContributors($contributorParentId) {
  $adviceContributorCriteria = new CDbCriteria;
  $adviceContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $adviceContributorCriteria->addCondition("td.parent_contributor_id=" . $contributorParentId);
  $adviceContributorCriteria->order = "td.id desc";
  return AdviceContributor::Model()->findAll($adviceContributorCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceContributor the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_contributor}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('contributor_id, advice_id', 'required'),
    array('contributor_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, contributor_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advice' => array(self::BELONGS_TO, 'Advice', 'advice_id'),
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
    'advice_id' => 'Advice',
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
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
