<?php

/**
 * This is the model class for table "{{mentorship_weblink}}".
 *
 * The followings are the available columns in table '{{mentorship_weblink}}':
 * @property integer $id
 * @property integer $weblink_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Weblink $weblink
 */
class MentorshipWeblink extends CActiveRecord {

 public static function getMentorshipParentWeblink($childWeblinkId, $mentorshipId) {
  $mentorshipWeblinkCriteria = new CDbCriteria;
  $mentorshipWeblinkCriteria->addCondition("weblink_id=" . $childWeblinkId);
  $mentorshipWeblinkCriteria->addCondition("mentorship_id = " . $mentorshipId);

  return MentorshipWeblink::Model()->find($mentorshipWeblinkCriteria);
 }

 public static function getMentorshipParentWeblinks($mentorshipId, $limit = null, $offset = null) {
  $mentorshipWeblinkCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipWeblinkCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipWeblinkCriteria->offset = $offset;
  }
  $mentorshipWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $mentorshipWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $mentorshipWeblinkCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipWeblinkCriteria->order = "td.id desc";
  return MentorshipWeblink::Model()->findAll($mentorshipWeblinkCriteria);
 }

 public static function getMentorshipParentWeblinksCount($mentorshipId) {
  $mentorshipWeblinkCriteria = new CDbCriteria;
  $mentorshipWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $mentorshipWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
  $mentorshipWeblinkCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipWeblink::Model()->count($mentorshipWeblinkCriteria);
 }

 public static function getMentorshipChildrenWeblinks($weblinkParentId) {
  $mentorshipWeblinkCriteria = new CDbCriteria;
  $mentorshipWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
  $mentorshipWeblinkCriteria->addCondition("td.parent_weblink_id=" . $weblinkParentId);
  $mentorshipWeblinkCriteria->order = "td.id desc";
  return MentorshipWeblink::Model()->findAll($mentorshipWeblinkCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipWeblink the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_weblink}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('weblink_id, mentorship_id', 'required'),
    array('weblink_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, weblink_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
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
    'weblink' => array(self::BELONGS_TO, 'Weblink', 'weblink_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'weblink_id' => 'Weblink',
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
  $criteria->compare('weblink_id', $this->weblink_id);
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
