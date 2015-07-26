<?php

/**
 * This is the model class for table "{{promise_weblink}}".
 *
 * The followings are the available columns in table '{{promise_weblink}}':
 * @property integer $id
 * @property integer $weblink_id
 * @property integer $promise_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Weblink $weblink
 */
class PromiseWeblink extends CActiveRecord {

 public static function getPromiseParentWeblink($childWeblinkId, $promiseId) {
  $promiseWeblinkCriteria = new CDbCriteria;
  $promiseWeblinkCriteria->addCondition("weblink_id=" . $childWeblinkId);
  $promiseWeblinkCriteria->addCondition("promise_id = " . $promiseId);

  return PromiseWeblink::Model()->find($promiseWeblinkCriteria);
 }

 public static function getPromiseParentWeblinks($promiseId, $limit = null, $offset = null) {
  $promiseWeblinkCriteria = new CDbCriteria;
  if ($limit) {
   $promiseWeblinkCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseWeblinkCriteria->offset = $offset;
  }
  $promiseWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $promiseWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $promiseWeblinkCriteria->addCondition("promise_id = " . $promiseId);
  $promiseWeblinkCriteria->order = "td.id desc";
  return PromiseWeblink::Model()->findAll($promiseWeblinkCriteria);
 }

 public static function getPromiseParentWeblinksCount($promiseId) {
  $promiseWeblinkCriteria = new CDbCriteria;
  $promiseWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $promiseWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $promiseWeblinkCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseWeblink::Model()->count($promiseWeblinkCriteria);
 }

 public static function getPromiseChildrenWeblinks($weblinkParentId) {
  $promiseWeblinkCriteria = new CDbCriteria;
  $promiseWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $promiseWeblinkCriteria->addCondition("td.parent_weblink_id=" . $weblinkParentId);
  $promiseWeblinkCriteria->order = "td.id desc";
  return PromiseWeblink::Model()->findAll($promiseWeblinkCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return PromiseWeblink the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise_weblink}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('weblink_id, promise_id', 'required'),
    array('weblink_id, promise_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, weblink_id, promise_id, privacy, status', 'safe', 'on' => 'search'),
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
    'promise_id' => 'Promise',
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
  $criteria->compare('promise_id', $this->promise_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
