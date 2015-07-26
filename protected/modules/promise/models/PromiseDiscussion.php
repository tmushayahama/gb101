<?php

/**
 * This is the model class for table "{{promise_discussion}}".
 *
 * The followings are the available columns in table '{{promise_discussion}}':
 * @property integer $id
 * @property integer $discussion_id
 * @property integer $promise_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Discussion $discussion
 */
class PromiseDiscussion extends CActiveRecord {

 public static function getPromiseParentDiscussion($childDiscussionId, $promiseId) {
  $promiseDiscussionCriteria = new CDbCriteria;
  $promiseDiscussionCriteria->addCondition("discussion_id=" . $childDiscussionId);
  $promiseDiscussionCriteria->addCondition("promise_id = " . $promiseId);

  return PromiseDiscussion::Model()->find($promiseDiscussionCriteria);
 }

 public static function getPromiseParentDiscussions($promiseId, $limit = null, $offset = null) {
  $promiseDiscussionCriteria = new CDbCriteria;
  if ($limit) {
   $promiseDiscussionCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseDiscussionCriteria->offset = $offset;
  }
  $promiseDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $promiseDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $promiseDiscussionCriteria->addCondition("promise_id = " . $promiseId);
  $promiseDiscussionCriteria->order = "td.id desc";
  return PromiseDiscussion::Model()->findAll($promiseDiscussionCriteria);
 }

 public static function getPromiseParentDiscussionsCount($promiseId) {
  $promiseDiscussionCriteria = new CDbCriteria;
  $promiseDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $promiseDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $promiseDiscussionCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseDiscussion::Model()->count($promiseDiscussionCriteria);
 }

 public static function getPromiseChildrenDiscussions($discussionParentId) {
  $promiseDiscussionCriteria = new CDbCriteria;
  $promiseDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $promiseDiscussionCriteria->addCondition("td.parent_discussion_id=" . $discussionParentId);
  $promiseDiscussionCriteria->order = "td.id desc";
  return PromiseDiscussion::Model()->findAll($promiseDiscussionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return PromiseDiscussion the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise_discussion}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('discussion_id, promise_id', 'required'),
    array('discussion_id, promise_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, discussion_id, promise_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('discussion_id', $this->discussion_id);
  $criteria->compare('promise_id', $this->promise_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
