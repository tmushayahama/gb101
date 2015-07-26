<?php

/**
 * This is the model class for table "{{advice_weblink}}".
 *
 * The followings are the available columns in table '{{advice_weblink}}':
 * @property integer $id
 * @property integer $weblink_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Weblink $weblink
 */
class AdviceWeblink extends CActiveRecord {

 public static function getAdviceParentWeblink($childWeblinkId, $adviceId) {
  $adviceWeblinkCriteria = new CDbCriteria;
  $adviceWeblinkCriteria->addCondition("weblink_id=" . $childWeblinkId);
  $adviceWeblinkCriteria->addCondition("advice_id = " . $adviceId);

  return AdviceWeblink::Model()->find($adviceWeblinkCriteria);
 }

 public static function getAdviceParentWeblinks($adviceId, $limit = null, $offset = null) {
  $adviceWeblinkCriteria = new CDbCriteria;
  if ($limit) {
   $adviceWeblinkCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceWeblinkCriteria->offset = $offset;
  }
  $adviceWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $adviceWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $adviceWeblinkCriteria->addCondition("advice_id = " . $adviceId);
  $adviceWeblinkCriteria->order = "td.id desc";
  return AdviceWeblink::Model()->findAll($adviceWeblinkCriteria);
 }

 public static function getAdviceParentWeblinksCount($adviceId) {
  $adviceWeblinkCriteria = new CDbCriteria;
  $adviceWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $adviceWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $adviceWeblinkCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceWeblink::Model()->count($adviceWeblinkCriteria);
 }

 public static function getAdviceChildrenWeblinks($weblinkParentId) {
  $adviceWeblinkCriteria = new CDbCriteria;
  $adviceWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $adviceWeblinkCriteria->addCondition("td.parent_weblink_id=" . $weblinkParentId);
  $adviceWeblinkCriteria->order = "td.id desc";
  return AdviceWeblink::Model()->findAll($adviceWeblinkCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceWeblink the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_weblink}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('weblink_id, advice_id', 'required'),
    array('weblink_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, weblink_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('weblink_id', $this->weblink_id);
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
