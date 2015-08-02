<?php

/**
 * This is the model class for table "{{mentorship_hobby}}".
 *
 * The followings are the available columns in table '{{mentorship_hobby}}':
 * @property integer $id
 * @property integer $hobby_id
 * @property integer $mentorship_id
 * @property integer $creator_id
 * @property string $created_date
 * @property integer $type
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property User $creator
 * @property Mentorship $mentorship
 */
class MentorshipHobby extends CActiveRecord {

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipHobby the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 public static function CreateMentorshipHobby($mentorshipParent, $hobbyId, $requesteeId) {
  $mentorshipChild = new Mentorship();
  $mentorshipChild->parent_mentorship_id = $mentorshipParent->id;
  $mentorshipChild->mentor_id = Yii::app()->user->id;
  $mentorshipChild->mentee_id = $requesteeId;
  $mentorshipChild->creator_id = $mentorshipParent->creator_id;
  $mentorshipChild->title = $mentorshipParent->title;
  $mentorshipChild->description = $mentorshipParent->description;
  $mentorshipChild->level_id = $mentorshipParent->level_id;
  $mentorshipChild->status = 1;
  if ($mentorshipChild->save(false)) {
   $mentorshipHobby = new MentorshipHobby();
   $mentorshipHobby->hobby_id = $hobbyId;
   $mentorshipHobby->mentorship_id = $mentorshipChild->id;
   $mentorshipHobby->creator_id = Yii::app()->user->id;
   return $mentorshipHobby->save(false);
  }
  return false;
 }

 public static function getMentorshipHobbys($hobbyId, $limit = null, $offset = null) {
  $mentorshipHobbyCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipHobbyCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipHobbyCriteria->offset = $offset;
  }
  //$mentorshipHobbyCriteria->with = array("mentorship" => array("alias" => 'm'));
  $mentorshipHobbyCriteria->addCondition("hobby_id = " . $hobbyId);
  //$mentorshipHobbyCriteria->order = "m.id desc";
  return MentorshipHobby::Model()->findAll($mentorshipHobbyCriteria);
 }

 public static function getMentorshipHobbysCount($hobbyId) {
  $mentorshipHobbyCriteria = new CDbCriteria;
  //$mentorshipHobbyCriteria->with = array("mentorship" => array("alias" => 'm'));
  $mentorshipHobbyCriteria->addCondition("hobby_id = " . $hobbyId);
  return MentorshipHobby::Model()->count($mentorshipHobbyCriteria);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_hobby}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('hobby_id, mentorship_id, creator_id, created_date', 'required'),
    array('hobby_id, mentorship_id, creator_id, type, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, hobby_id, mentorship_id, creator_id, created_date, type, privacy, status', 'safe', 'on' => 'search'),
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
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'hobby_id' => 'Hobby',
    'mentorship_id' => 'Mentorship',
    'creator_id' => 'Creator',
    'created_date' => 'Created Date',
    'type' => 'Type',
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
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('type', $this->type);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
