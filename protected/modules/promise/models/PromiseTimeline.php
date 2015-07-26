<?php

/**
 * This is the model class for table "{{promise_timeline}}".
 *
 * The followings are the available columns in table '{{promise_timeline}}':
 * @property integer $id
 * @property integer $timeline_id
 * @property integer $promise_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Timeline $timeline
 */
class PromiseTimeline extends CActiveRecord {

 public static function getPromiseParentTimeline($childTimelineId, $promiseId) {
  $promiseTimelineCriteria = new CDbCriteria;
  $promiseTimelineCriteria->addCondition("timeline_id=" . $childTimelineId);
  $promiseTimelineCriteria->addCondition("promise_id = " . $promiseId);

  return PromiseTimeline::Model()->find($promiseTimelineCriteria);
 }

 public static function getPromiseTimelineDays($promiseId, $limit = null, $offset = null) {
  $promiseTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $promiseTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseTimelineCriteria->offset = $offset;
  }
  $promiseTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$promiseTimelineCriteria->select = "td.day";
  $promiseTimelineCriteria->group = "td.day";
  $promiseTimelineCriteria->distinct = true;
  $promiseTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $promiseTimelineCriteria->addCondition("promise_id = " . $promiseId);
  $promiseTimelineCriteria->order = "td.day asc";
  return PromiseTimeline::Model()->findAll($promiseTimelineCriteria);
 }

 public static function getPromiseTimelineDaysCount($promiseId, $limit = null, $offset = null) {
  $promiseTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $promiseTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseTimelineCriteria->offset = $offset;
  }
  $promiseTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$promiseTimelineCriteria->select = "td.day";
  $promiseTimelineCriteria->group = "td.day";
  $promiseTimelineCriteria->distinct = true;
  $promiseTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $promiseTimelineCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseTimeline::Model()->count($promiseTimelineCriteria);
 }

 public static function getPromiseParentTimelines($promiseId, $day = null, $limit = null, $offset = null) {
  $promiseTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $promiseTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseTimelineCriteria->offset = $offset;
  }
  $promiseTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $promiseTimelineCriteria->addCondition("td.day=" . $day);
  $promiseTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $promiseTimelineCriteria->addCondition("promise_id = " . $promiseId);
  $promiseTimelineCriteria->order = "td.day desc";
  return PromiseTimeline::Model()->findAll($promiseTimelineCriteria);
 }

 public static function getPromiseParentTimelinesCount($promiseId, $day = null) {
  $promiseTimelineCriteria = new CDbCriteria;
  $promiseTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $promiseTimelineCriteria->addCondition("td.day=" . $day);
  $promiseTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $promiseTimelineCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseTimeline::Model()->count($promiseTimelineCriteria);
 }

 public static function getPromiseChildrenTimelines($timelineParentId) {
  $promiseTimelineCriteria = new CDbCriteria;
  $promiseTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $promiseTimelineCriteria->addCondition("td.parent_timeline_id=" . $timelineParentId);
  $promiseTimelineCriteria->order = "td.id desc";
  return PromiseTimeline::Model()->findAll($promiseTimelineCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return PromiseTimeline the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise_timeline}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('timeline_id, promise_id', 'required'),
    array('timeline_id, promise_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, timeline_id, promise_id, privacy, status', 'safe', 'on' => 'search'),
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
    'timeline' => array(self::BELONGS_TO, 'Timeline', 'timeline_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'timeline_id' => 'Timeline',
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
  $criteria->compare('timeline_id', $this->timeline_id);
  $criteria->compare('promise_id', $this->promise_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
