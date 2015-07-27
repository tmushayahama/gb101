<?php

/**
 * This is the model class for table "{{hobby_timeline}}".
 *
 * The followings are the available columns in table '{{hobby_timeline}}':
 * @property integer $id
 * @property integer $timeline_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Timeline $timeline
 */
class HobbyTimeline extends CActiveRecord {

 public static function getHobbyParentTimeline($childTimelineId, $hobbyId) {
  $hobbyTimelineCriteria = new CDbCriteria;
  $hobbyTimelineCriteria->addCondition("timeline_id=" . $childTimelineId);
  $hobbyTimelineCriteria->addCondition("hobby_id = " . $hobbyId);

  return HobbyTimeline::Model()->find($hobbyTimelineCriteria);
 }

 public static function getHobbyTimelineDays($hobbyId, $limit = null, $offset = null) {
  $hobbyTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyTimelineCriteria->offset = $offset;
  }
  $hobbyTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$hobbyTimelineCriteria->select = "td.day";
  $hobbyTimelineCriteria->group = "td.day";
  $hobbyTimelineCriteria->distinct = true;
  $hobbyTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $hobbyTimelineCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyTimelineCriteria->order = "td.day asc";
  return HobbyTimeline::Model()->findAll($hobbyTimelineCriteria);
 }

 public static function getHobbyTimelineDaysCount($hobbyId, $limit = null, $offset = null) {
  $hobbyTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyTimelineCriteria->offset = $offset;
  }
  $hobbyTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$hobbyTimelineCriteria->select = "td.day";
  $hobbyTimelineCriteria->group = "td.day";
  $hobbyTimelineCriteria->distinct = true;
  $hobbyTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $hobbyTimelineCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyTimeline::Model()->count($hobbyTimelineCriteria);
 }

 public static function getHobbyParentTimelines($hobbyId, $day = null, $limit = null, $offset = null) {
  $hobbyTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyTimelineCriteria->offset = $offset;
  }
  $hobbyTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $hobbyTimelineCriteria->addCondition("td.day=" . $day);
  $hobbyTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $hobbyTimelineCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyTimelineCriteria->order = "td.day desc";
  return HobbyTimeline::Model()->findAll($hobbyTimelineCriteria);
 }

 public static function getHobbyParentTimelinesCount($hobbyId, $day = null) {
  $hobbyTimelineCriteria = new CDbCriteria;
  $hobbyTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $hobbyTimelineCriteria->addCondition("td.day=" . $day);
  $hobbyTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $hobbyTimelineCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyTimeline::Model()->count($hobbyTimelineCriteria);
 }

 public static function getHobbyChildrenTimelines($timelineParentId) {
  $hobbyTimelineCriteria = new CDbCriteria;
  $hobbyTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $hobbyTimelineCriteria->addCondition("td.parent_timeline_id=" . $timelineParentId);
  $hobbyTimelineCriteria->order = "td.id desc";
  return HobbyTimeline::Model()->findAll($hobbyTimelineCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return HobbyTimeline the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby_timeline}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('timeline_id, hobby_id', 'required'),
    array('timeline_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, timeline_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('timeline_id', $this->timeline_id);
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
