<?php

/**
 * This is the model class for table "{{contributor}}".
 *
 * The followings are the available columns in table '{{contributor}}':
 * @property integer $id
 * @property integer $parent_contributor_id
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $type_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Level $type
 * @property Contributor $parentContributor
 * @property Contributor[] $contributors
 * @property SkillContributor[] $skillContributors
 */
class Contributor extends CActiveRecord {

 public static $CONTRIBUTORS_PER_OVERVIEW_PAGE = 3;
 public static $CONTRIBUTORS_PER_PAGE = 20;

 public static function deleteContributor($contributorId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_CONTRIBUTOR);
  $postsCriteria->addCondition("source_id=" . $contributorId);
  Post::model()->deleteAll($postsCriteria);
  Contributor::model()->deleteByPk($contributorId);
 }

 public static function getChildrenContributors($contributorParentId, $limit = null) {
  $contributorCriteria = new CDbCriteria;
  if ($limit) {
   $contributorCriteria->limit = $limit;
  }
  $contributorCriteria->alias = "td";
  $contributorCriteria->addCondition("parent_contributor_id=" . $contributorParentId);
  $contributorCriteria->order = "td.id desc";
  return Contributor::Model()->findAll($contributorCriteria);
 }

 public static function getChildrenContributorsCount($contributorParentId) {
  $contributorCriteria = new CDbCriteria;
  $contributorCriteria->addCondition("parent_contributor_id=" . $contributorParentId);
  return Contributor::Model()->count($contributorCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Contributor the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{contributor}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('type_id', 'required'),
    array('parent_contributor_id, creator_id, type_id, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_contributor_id, creator_id, description, created_date, type_id, status', 'safe', 'on' => 'search'),
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
    'type' => array(self::BELONGS_TO, 'Level', 'type_id'),
    'parentContributor' => array(self::BELONGS_TO, 'Contributor', 'parent_contributor_id'),
    'contributors' => array(self::HAS_MANY, 'Contributor', 'parent_contributor_id'),
    'skillContributors' => array(self::HAS_MANY, 'SkillContributor', 'contributor_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_contributor_id' => 'Parent Contributor',
    'creator_id' => 'Creator',
    'description' => 'Description',
    'created_date' => 'Created Date',
    'type_id' => 'Type',
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
  $criteria->compare('parent_contributor_id', $this->parent_contributor_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('type_id', $this->type_id);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
