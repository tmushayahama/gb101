<?php

/**
 * This is the model class for table "{{hobby_weblink}}".
 *
 * The followings are the available columns in table '{{hobby_weblink}}':
 * @property integer $id
 * @property integer $weblink_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Weblink $weblink
 */
class HobbyWeblink extends CActiveRecord {

 public static function getHobbyParentWeblink($childWeblinkId, $hobbyId) {
  $hobbyWeblinkCriteria = new CDbCriteria;
  $hobbyWeblinkCriteria->addCondition("weblink_id=" . $childWeblinkId);
  $hobbyWeblinkCriteria->addCondition("hobby_id = " . $hobbyId);

  return HobbyWeblink::Model()->find($hobbyWeblinkCriteria);
 }

 public static function getHobbyParentWeblinks($hobbyId, $limit = null, $offset = null) {
  $hobbyWeblinkCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyWeblinkCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyWeblinkCriteria->offset = $offset;
  }
  $hobbyWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $hobbyWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $hobbyWeblinkCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyWeblinkCriteria->order = "td.id desc";
  return HobbyWeblink::Model()->findAll($hobbyWeblinkCriteria);
 }

 public static function getHobbyParentWeblinksCount($hobbyId) {
  $hobbyWeblinkCriteria = new CDbCriteria;
  $hobbyWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $hobbyWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $hobbyWeblinkCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyWeblink::Model()->count($hobbyWeblinkCriteria);
 }

 public static function getHobbyChildrenWeblinks($weblinkParentId) {
  $hobbyWeblinkCriteria = new CDbCriteria;
  $hobbyWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $hobbyWeblinkCriteria->addCondition("td.parent_weblink_id=" . $weblinkParentId);
  $hobbyWeblinkCriteria->order = "td.id desc";
  return HobbyWeblink::Model()->findAll($hobbyWeblinkCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return HobbyWeblink the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby_weblink}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('weblink_id, hobby_id', 'required'),
    array('weblink_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, weblink_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
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
    'weblink' => array(self::BELONGS_TO, 'Weblink', 'weblink_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'weblink_id' => 'Weblink',
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
  $criteria->compare('weblink_id', $this->weblink_id);
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
