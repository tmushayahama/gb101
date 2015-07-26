<?php

/**
 * This is the model class for table "{{advice_timeline}}".
 *
 * The followings are the available columns in table '{{advice_timeline}}':
 * @property integer $id
 * @property integer $timeline_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Timeline $timeline
 */
class AdviceTimeline extends CActiveRecord {

 public static function getAdviceParentTimeline($childTimelineId, $adviceId) {
  $adviceTimelineCriteria = new CDbCriteria;
  $adviceTimelineCriteria->addCondition("timeline_id=" . $childTimelineId);
  $adviceTimelineCriteria->addCondition("advice_id = " . $adviceId);

  return AdviceTimeline::Model()->find($adviceTimelineCriteria);
 }

 public static function getAdviceTimelineDays($adviceId, $limit = null, $offset = null) {
  $adviceTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $adviceTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceTimelineCriteria->offset = $offset;
  }
  $adviceTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$adviceTimelineCriteria->select = "td.day";
  $adviceTimelineCriteria->group = "td.day";
  $adviceTimelineCriteria->distinct = true;
  $adviceTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $adviceTimelineCriteria->addCondition("advice_id = " . $adviceId);
  $adviceTimelineCriteria->order = "td.day asc";
  return AdviceTimeline::Model()->findAll($adviceTimelineCriteria);
 }

 public static function getAdviceTimelineDaysCount($adviceId, $limit = null, $offset = null) {
  $adviceTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $adviceTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceTimelineCriteria->offset = $offset;
  }
  $adviceTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$adviceTimelineCriteria->select = "td.day";
  $adviceTimelineCriteria->group = "td.day";
  $adviceTimelineCriteria->distinct = true;
  $adviceTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $adviceTimelineCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceTimeline::Model()->count($adviceTimelineCriteria);
 }

 public static function getAdviceParentTimelines($adviceId, $day = null, $limit = null, $offset = null) {
  $adviceTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $adviceTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceTimelineCriteria->offset = $offset;
  }
  $adviceTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $adviceTimelineCriteria->addCondition("td.day=" . $day);
  $adviceTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $adviceTimelineCriteria->addCondition("advice_id = " . $adviceId);
  $adviceTimelineCriteria->order = "td.day desc";
  return AdviceTimeline::Model()->findAll($adviceTimelineCriteria);
 }

 public static function getAdviceParentTimelinesCount($adviceId, $day = null) {
  $adviceTimelineCriteria = new CDbCriteria;
  $adviceTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $adviceTimelineCriteria->addCondition("td.day=" . $day);
  $adviceTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $adviceTimelineCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceTimeline::Model()->count($adviceTimelineCriteria);
 }

 public static function getAdviceChildrenTimelines($timelineParentId) {
  $adviceTimelineCriteria = new CDbCriteria;
  $adviceTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $adviceTimelineCriteria->addCondition("td.parent_timeline_id=" . $timelineParentId);
  $adviceTimelineCriteria->order = "td.id desc";
  return AdviceTimeline::Model()->findAll($adviceTimelineCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceTimeline the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_timeline}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('timeline_id, advice_id', 'required'),
    array('timeline_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, timeline_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('timeline_id', $this->timeline_id);
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
