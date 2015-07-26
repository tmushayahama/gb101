<?php

/**
 * This is the model class for table "{{advice_discussion}}".
 *
 * The followings are the available columns in table '{{advice_discussion}}':
 * @property integer $id
 * @property integer $discussion_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Discussion $discussion
 */
class AdviceDiscussion extends CActiveRecord {

 public static function getAdviceParentDiscussion($childDiscussionId, $adviceId) {
  $adviceDiscussionCriteria = new CDbCriteria;
  $adviceDiscussionCriteria->addCondition("discussion_id=" . $childDiscussionId);
  $adviceDiscussionCriteria->addCondition("advice_id = " . $adviceId);

  return AdviceDiscussion::Model()->find($adviceDiscussionCriteria);
 }

 public static function getAdviceParentDiscussions($adviceId, $limit = null, $offset = null) {
  $adviceDiscussionCriteria = new CDbCriteria;
  if ($limit) {
   $adviceDiscussionCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceDiscussionCriteria->offset = $offset;
  }
  $adviceDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $adviceDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $adviceDiscussionCriteria->addCondition("advice_id = " . $adviceId);
  $adviceDiscussionCriteria->order = "td.id desc";
  return AdviceDiscussion::Model()->findAll($adviceDiscussionCriteria);
 }

 public static function getAdviceParentDiscussionsCount($adviceId) {
  $adviceDiscussionCriteria = new CDbCriteria;
  $adviceDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $adviceDiscussionCriteria->addCondition("td.parent_discussion_id is NULL");
  $adviceDiscussionCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceDiscussion::Model()->count($adviceDiscussionCriteria);
 }

 public static function getAdviceChildrenDiscussions($discussionParentId) {
  $adviceDiscussionCriteria = new CDbCriteria;
  $adviceDiscussionCriteria->with = array("discussion" => array("alias" => 'td'));
  $adviceDiscussionCriteria->addCondition("td.parent_discussion_id=" . $discussionParentId);
  $adviceDiscussionCriteria->order = "td.id desc";
  return AdviceDiscussion::Model()->findAll($adviceDiscussionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceDiscussion the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_discussion}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('discussion_id, advice_id', 'required'),
    array('discussion_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, discussion_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('discussion_id', $this->discussion_id);
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
