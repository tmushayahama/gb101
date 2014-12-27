<?php

/**
 * This is the model class for table "{{mentorship_discussion}}".
 *
 * The followings are the available columns in table '{{mentorship_discussion}}':
 * @property integer $id
 * @property integer $discussion_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Discussion $discussion
 */
class MentorshipDiscussion extends CActiveRecord {

 public static function getMentorshipParentDiscussion($childDiscussionId, $mentorshipId) {
  $mentorshipDiscussionCriteria = new CDbCriteria;
  $mentorshipDiscussionCriteria->addCondition("discussion_id=" . $childDiscussionId);
  $mentorshipDiscussionCriteria->addCondition("mentorship_id = " . $mentorshipId);

  return MentorshipDiscussion::Model()->find($mentorshipDiscussionCriteria);
 }

 public static function getMentorshipParentDiscussions($mentorshipId, $limit = null, $offset = null) {
  $mentorshipDiscussionCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipDiscussionCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipDiscussionCriteria->offset = $offset;
  }
  $mentorshipDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $mentorshipDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $mentorshipDiscussionCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipDiscussionCriteria->order = "td.id desc";
  return MentorshipDiscussion::Model()->findAll($mentorshipDiscussionCriteria);
 }

 public static function getMentorshipParentDiscussionsCount($mentorshipId) {
  $mentorshipDiscussionCriteria = new CDbCriteria;
  $mentorshipDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $mentorshipDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $mentorshipDiscussionCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipDiscussion::Model()->count($mentorshipDiscussionCriteria);
 }

 public static function getMentorshipChildrenDiscussions($discussionParentId) {
  $mentorshipDiscussionCriteria = new CDbCriteria;
  $mentorshipDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $mentorshipDiscussionCriteria->addCondition("td.parent_discussion_id=" . $discussionParentId);
  $mentorshipDiscussionCriteria->order = "td.id desc";
  return MentorshipDiscussion::Model()->findAll($mentorshipDiscussionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipDiscussion the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_discussion}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('discussion_id, mentorship_id', 'required'),
    array('discussion_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, discussion_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('discussion_id', $this->discussion_id);
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
