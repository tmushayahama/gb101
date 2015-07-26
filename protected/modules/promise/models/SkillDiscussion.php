<?php

/**
 * This is the model class for table "{{skill_discussion}}".
 *
 * The followings are the available columns in table '{{skill_discussion}}':
 * @property integer $id
 * @property integer $discussion_id
 * @property integer $skill_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property Discussion $discussion
 */
class SkillDiscussion extends CActiveRecord {

 public static function getSkillParentDiscussion($childDiscussionId, $skillId) {
  $skillDiscussionCriteria = new CDbCriteria;
  $skillDiscussionCriteria->addCondition("discussion_id=" . $childDiscussionId);
  $skillDiscussionCriteria->addCondition("skill_id = " . $skillId);

  return SkillDiscussion::Model()->find($skillDiscussionCriteria);
 }

 public static function getSkillParentDiscussions($skillId, $limit = null, $offset = null) {
  $skillDiscussionCriteria = new CDbCriteria;
  if ($limit) {
   $skillDiscussionCriteria->limit = $limit;
  }
  if ($offset) {
   $skillDiscussionCriteria->offset = $offset;
  }
  $skillDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $skillDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $skillDiscussionCriteria->addCondition("skill_id = " . $skillId);
  $skillDiscussionCriteria->order = "td.id desc";
  return SkillDiscussion::Model()->findAll($skillDiscussionCriteria);
 }

 public static function getSkillParentDiscussionsCount($skillId) {
  $skillDiscussionCriteria = new CDbCriteria;
  $skillDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $skillDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $skillDiscussionCriteria->addCondition("skill_id = " . $skillId);
  return SkillDiscussion::Model()->count($skillDiscussionCriteria);
 }

 public static function getSkillChildrenDiscussions($discussionParentId) {
  $skillDiscussionCriteria = new CDbCriteria;
  $skillDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $skillDiscussionCriteria->addCondition("td.parent_discussion_id=" . $discussionParentId);
  $skillDiscussionCriteria->order = "td.id desc";
  return SkillDiscussion::Model()->findAll($skillDiscussionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return SkillDiscussion the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{skill_discussion}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('discussion_id, skill_id', 'required'),
    array('discussion_id, skill_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, discussion_id, skill_id, privacy, status', 'safe', 'on' => 'search'),
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
    'discussion' => array(self::BELONGS_TO, 'Discussion', 'discussion_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'discussion_id' => 'Discussion',
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
  $criteria->compare('discussion_id', $this->discussion_id);
  $criteria->compare('skill_id', $this->skill_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
