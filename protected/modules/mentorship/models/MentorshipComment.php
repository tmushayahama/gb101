<?php

/**
 * This is the model class for table "{{mentorship_comment}}".
 *
 * The followings are the available columns in table '{{mentorship_comment}}':
 * @property integer $id
 * @property integer $comment_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Comment $comment
 */
class MentorshipComment extends CActiveRecord {

 public static function getMentorshipParentComment($childCommentId, $mentorshipId) {
  $mentorshipCommentCriteria = new CDbCriteria;
  $mentorshipCommentCriteria->addCondition("comment_id=" . $childCommentId);
  $mentorshipCommentCriteria->addCondition("mentorship_id = " . $mentorshipId);

  return MentorshipComment::Model()->find($mentorshipCommentCriteria);
 }

 public static function getMentorshipParentComments($mentorshipId, $limit = null, $offset = null) {
  $mentorshipCommentCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipCommentCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipCommentCriteria->offset = $offset;
  }
  $mentorshipCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $mentorshipCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $mentorshipCommentCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipCommentCriteria->order = "td.id desc";
  return MentorshipComment::Model()->findAll($mentorshipCommentCriteria);
 }

 public static function getMentorshipParentCommentsCount($mentorshipId) {
  $mentorshipCommentCriteria = new CDbCriteria;
  $mentorshipCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $mentorshipCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $mentorshipCommentCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipComment::Model()->count($mentorshipCommentCriteria);
 }

 public static function getMentorshipChildrenComments($commentParentId) {
  $mentorshipCommentCriteria = new CDbCriteria;
  $mentorshipCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $mentorshipCommentCriteria->addCondition("td.parent_comment_id=" . $commentParentId);
  $mentorshipCommentCriteria->order = "td.id desc";
  return MentorshipComment::Model()->findAll($mentorshipCommentCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipComment the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_comment}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('comment_id, mentorship_id', 'required'),
    array('comment_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, comment_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
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
    'comment' => array(self::BELONGS_TO, 'Comment', 'comment_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'comment_id' => 'Comment',
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
  $criteria->compare('comment_id', $this->comment_id);
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
