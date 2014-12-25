<?php

/**
 * This is the model class for table "{{hobby_discussion}}".
 *
 * The followings are the available columns in table '{{hobby_discussion}}':
 * @property integer $id
 * @property integer $discussion_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Discussion $discussion
 */
class HobbyDiscussion extends CActiveRecord {

 public static function getHobbyParentDiscussion($childDiscussionId, $hobbyId) {
  $hobbyDiscussionCriteria = new CDbCriteria;
  $hobbyDiscussionCriteria->addCondition("discussion_id=" . $childDiscussionId);
  $hobbyDiscussionCriteria->addCondition("hobby_id = " . $hobbyId);

  return HobbyDiscussion::Model()->find($hobbyDiscussionCriteria);
 }

 public static function getHobbyParentDiscussions($hobbyId, $limit = null, $offset = null) {
  $hobbyDiscussionCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyDiscussionCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyDiscussionCriteria->offset = $offset;
  }
  $hobbyDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $hobbyDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $hobbyDiscussionCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyDiscussionCriteria->order = "td.id desc";
  return HobbyDiscussion::Model()->findAll($hobbyDiscussionCriteria);
 }

 public static function getHobbyParentDiscussionsCount($hobbyId) {
  $hobbyDiscussionCriteria = new CDbCriteria;
  $hobbyDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $hobbyDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $hobbyDiscussionCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyDiscussion::Model()->count($hobbyDiscussionCriteria);
 }

 public static function getHobbyChildrenDiscussions($discussionParentId) {
  $hobbyDiscussionCriteria = new CDbCriteria;
  $hobbyDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $hobbyDiscussionCriteria->addCondition("td.parent_discussion_id=" . $discussionParentId);
  $hobbyDiscussionCriteria->order = "td.id desc";
  return HobbyDiscussion::Model()->findAll($hobbyDiscussionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return HobbyDiscussion the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby_discussion}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('discussion_id, hobby_id', 'required'),
    array('discussion_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, discussion_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('discussion_id', $this->discussion_id);
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
