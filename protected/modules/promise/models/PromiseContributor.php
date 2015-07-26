<?php

/**
 * This is the model class for table "{{promise_contributor}}".
 *
 * The followings are the available columns in table '{{promise_contributor}}':
 * @property integer $id
 * @property integer $contributor_id
 * @property integer $promise_id
 * @property integer $type_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Contributor $contributor
 * @property Level $type
 */
class PromiseContributor extends CActiveRecord {

 public static function getPromiseParentContributor($childContributorId, $promiseId) {
  $promiseContributorCriteria = new CDbCriteria;
  $promiseContributorCriteria->addCondition("contributor_id=" . $childContributorId);
  $promiseContributorCriteria->addCondition("promise_id = " . $promiseId);

  return PromiseContributor::Model()->find($promiseContributorCriteria);
 }

 public static function getPromiseParentContributors($promiseId, $limit = null, $offset = null) {
  $promiseContributorCriteria = new CDbCriteria;
  if ($limit) {
   $promiseContributorCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseContributorCriteria->offset = $offset;
  }
  $promiseContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $promiseContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $promiseContributorCriteria->addCondition("promise_id = " . $promiseId);
  $promiseContributorCriteria->order = "td.id desc";
  return PromiseContributor::Model()->findAll($promiseContributorCriteria);
 }

 public static function getPromiseParentContributorsCount($promiseId) {
  $promiseContributorCriteria = new CDbCriteria;
  $promiseContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $promiseContributorCriteria->addCondition("td.parent_contributor_id is NULL");
  $promiseContributorCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseContributor::Model()->count($promiseContributorCriteria);
 }

 public static function getPromiseChildrenContributors($contributorParentId) {
  $promiseContributorCriteria = new CDbCriteria;
  $promiseContributorCriteria->with = array("contributor" => array("alias" => 'td'));
  $promiseContributorCriteria->addCondition("td.parent_contributor_id=" . $contributorParentId);
  $promiseContributorCriteria->order = "td.id desc";
  return PromiseContributor::Model()->findAll($promiseContributorCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return PromiseContributor the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise_contributor}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('contributor_id, promise_id, type_id', 'required'),
    array('contributor_id, promise_id, type_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, contributor_id, promise_id, type_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'promise' => array(self::BELONGS_TO, 'Promise', 'promise_id'),
    'contributor' => array(self::BELONGS_TO, 'Contributor', 'contributor_id'),
    'type' => array(self::BELONGS_TO, 'Level', 'type_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'contributor_id' => 'Contributor',
    'promise_id' => 'Promise',
    'type_id' => 'Type',
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
  $criteria->compare('promise_id', $this->promise_id);
  $criteria->compare('type_id', $this->type_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
