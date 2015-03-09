<?php

/**
 * This is the model class for table "{{mentorship_timeline}}".
 *
 * The followings are the available columns in table '{{mentorship_timeline}}':
 * @property integer $id
 * @property integer $timeline_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Timeline $timeline
 */
class MentorshipTimeline extends CActiveRecord {

 public static function getMentorshipParentTimeline($childTimelineId, $mentorshipId) {
  $mentorshipTimelineCriteria = new CDbCriteria;
  $mentorshipTimelineCriteria->addCondition("timeline_id=" . $childTimelineId);
  $mentorshipTimelineCriteria->addCondition("mentorship_id = " . $mentorshipId);

  return MentorshipTimeline::Model()->find($mentorshipTimelineCriteria);
 }

 public static function getMentorshipTimelineDays($mentorshipId, $limit = null, $offset = null) {
  $mentorshipTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipTimelineCriteria->offset = $offset;
  }
  $mentorshipTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$mentorshipTimelineCriteria->select = "td.day";
  $mentorshipTimelineCriteria->group = "td.day";
  $mentorshipTimelineCriteria->distinct = true;
  $mentorshipTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $mentorshipTimelineCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipTimelineCriteria->order = "td.day asc";
  return MentorshipTimeline::Model()->findAll($mentorshipTimelineCriteria);
 }

 public static function getMentorshipTimelineDaysCount($mentorshipId, $limit = null, $offset = null) {
  $mentorshipTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipTimelineCriteria->offset = $offset;
  }
  $mentorshipTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$mentorshipTimelineCriteria->select = "td.day";
  $mentorshipTimelineCriteria->group = "td.day";
  $mentorshipTimelineCriteria->distinct = true;
  $mentorshipTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $mentorshipTimelineCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipTimeline::Model()->count($mentorshipTimelineCriteria);
 }

 public static function getMentorshipParentTimelines($mentorshipId, $day = null, $limit = null, $offset = null) {
  $mentorshipTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipTimelineCriteria->offset = $offset;
  }
  $mentorshipTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $mentorshipTimelineCriteria->addCondition("td.day=" . $day);
  $mentorshipTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $mentorshipTimelineCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipTimelineCriteria->order = "td.day desc";
  return MentorshipTimeline::Model()->findAll($mentorshipTimelineCriteria);
 }

 public static function getMentorshipParentTimelinesCount($mentorshipId, $day = null) {
  $mentorshipTimelineCriteria = new CDbCriteria;
  $mentorshipTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $mentorshipTimelineCriteria->addCondition("td.day=" . $day);
  $mentorshipTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $mentorshipTimelineCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipTimeline::Model()->count($mentorshipTimelineCriteria);
 }

 public static function getMentorshipChildrenTimelines($timelineParentId) {
  $mentorshipTimelineCriteria = new CDbCriteria;
  $mentorshipTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $mentorshipTimelineCriteria->addCondition("td.parent_timeline_id=" . $timelineParentId);
  $mentorshipTimelineCriteria->order = "td.id desc";
  return MentorshipTimeline::Model()->findAll($mentorshipTimelineCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipTimeline the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_timeline}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('timeline_id, mentorship_id', 'required'),
    array('timeline_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, timeline_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
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
    'mentorship_id' => 'Mentorship',
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
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
