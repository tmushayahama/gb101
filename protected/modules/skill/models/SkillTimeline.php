<?php

/**
 * This is the model class for table "{{skill_timeline}}".
 *
 * The followings are the available columns in table '{{skill_timeline}}':
 * @property integer $id
 * @property integer $timeline_id
 * @property integer $skill_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property Timeline $timeline
 */
class SkillTimeline extends CActiveRecord {

 public static function getSkillParentTimeline($childTimelineId, $skillId) {
  $skillTimelineCriteria = new CDbCriteria;
  $skillTimelineCriteria->addCondition("timeline_id=" . $childTimelineId);
  $skillTimelineCriteria->addCondition("skill_id = " . $skillId);

  return SkillTimeline::Model()->find($skillTimelineCriteria);
 }

 public static function getSkillTimelineDays($skillId, $limit = null, $offset = null) {
  $skillTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $skillTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $skillTimelineCriteria->offset = $offset;
  }
  $skillTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$skillTimelineCriteria->select = "td.day";
  $skillTimelineCriteria->group = "td.day";
  $skillTimelineCriteria->distinct = true;
  $skillTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $skillTimelineCriteria->addCondition("skill_id = " . $skillId);
  $skillTimelineCriteria->order = "td.day asc";
  return SkillTimeline::Model()->findAll($skillTimelineCriteria);
 }

 public static function getSkillTimelineDaysCount($skillId, $limit = null, $offset = null) {
  $skillTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $skillTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $skillTimelineCriteria->offset = $offset;
  }
  $skillTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  //$skillTimelineCriteria->select = "td.day";
  $skillTimelineCriteria->group = "td.day";
  $skillTimelineCriteria->distinct = true;
  $skillTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $skillTimelineCriteria->addCondition("skill_id = " . $skillId);
  return SkillTimeline::Model()->count($skillTimelineCriteria);
 }

 public static function getSkillParentTimelines($skillId, $day = null, $limit = null, $offset = null) {
  $skillTimelineCriteria = new CDbCriteria;
  if ($limit) {
   $skillTimelineCriteria->limit = $limit;
  }
  if ($offset) {
   $skillTimelineCriteria->offset = $offset;
  }
  $skillTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $skillTimelineCriteria->addCondition("td.day=" . $day);
  $skillTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $skillTimelineCriteria->addCondition("skill_id = " . $skillId);
  $skillTimelineCriteria->order = "td.day desc";
  return SkillTimeline::Model()->findAll($skillTimelineCriteria);
 }

 public static function getSkillParentTimelinesCount($skillId, $day = null) {
  $skillTimelineCriteria = new CDbCriteria;
  $skillTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $skillTimelineCriteria->addCondition("td.day=" . $day);
  $skillTimelineCriteria->addCondition("td.parent_timeline_id is NULL");
  $skillTimelineCriteria->addCondition("skill_id = " . $skillId);
  return SkillTimeline::Model()->count($skillTimelineCriteria);
 }

 public static function getSkillChildrenTimelines($timelineParentId) {
  $skillTimelineCriteria = new CDbCriteria;
  $skillTimelineCriteria->with = array("timeline" => array("alias" => 'td'));
  $skillTimelineCriteria->addCondition("td.parent_timeline_id=" . $timelineParentId);
  $skillTimelineCriteria->order = "td.id desc";
  return SkillTimeline::Model()->findAll($skillTimelineCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return SkillTimeline the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{skill_timeline}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('timeline_id, skill_id', 'required'),
    array('timeline_id, skill_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, timeline_id, skill_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
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
    'skill_id' => 'Skill',
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
  $criteria->compare('skill_id', $this->skill_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
