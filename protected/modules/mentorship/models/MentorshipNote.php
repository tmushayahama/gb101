<?php

/**
 * This is the model class for table "{{mentorship_note}}".
 *
 * The followings are the available columns in table '{{mentorship_note}}':
 * @property integer $id
 * @property integer $note_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Note $note
 */
class MentorshipNote extends CActiveRecord {

 public static function getMentorshipParentNote($childNoteId, $mentorshipId) {
  $mentorshipNoteCriteria = new CDbCriteria;
  $mentorshipNoteCriteria->addCondition("note_id=" . $childNoteId);
  $mentorshipNoteCriteria->addCondition("mentorship_id = " . $mentorshipId);

  return MentorshipNote::Model()->find($mentorshipNoteCriteria);
 }

 public static function getMentorshipParentNotes($mentorshipId, $limit = null, $offset = null) {
  $mentorshipNoteCriteria = new CDbCriteria;
  if ($limit) {
   $mentorshipNoteCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipNoteCriteria->offset = $offset;
  }
  $mentorshipNoteCriteria->with = array("note" => array("alias" => 'td'));
  $mentorshipNoteCriteria->addCondition("td.parent_note_id is NULL");
  $mentorshipNoteCriteria->addCondition("mentorship_id = " . $mentorshipId);
  $mentorshipNoteCriteria->order = "td.id desc";
  return MentorshipNote::Model()->findAll($mentorshipNoteCriteria);
 }

 public static function getMentorshipParentNotesCount($mentorshipId) {
  $mentorshipNoteCriteria = new CDbCriteria;
  $mentorshipNoteCriteria->with = array("note" => array("alias" => 'td'));
  $mentorshipNoteCriteria->addCondition("td.parent_note_id is NULL");
  $mentorshipNoteCriteria->addCondition("mentorship_id = " . $mentorshipId);
  return MentorshipNote::Model()->count($mentorshipNoteCriteria);
 }

 public static function getMentorshipChildrenNotes($noteParentId) {
  $mentorshipNoteCriteria = new CDbCriteria;
  $mentorshipNoteCriteria->with = array("note" => array("alias" => 'td'));
  $mentorshipNoteCriteria->addCondition("td.parent_note_id=" . $noteParentId);
  $mentorshipNoteCriteria->order = "td.id desc";
  return MentorshipNote::Model()->findAll($mentorshipNoteCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return MentorshipNote the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{mentorship_note}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('note_id, mentorship_id', 'required'),
    array('note_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, note_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
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
    'note' => array(self::BELONGS_TO, 'Note', 'note_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'note_id' => 'Note',
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
  $criteria->compare('note_id', $this->note_id);
  $criteria->compare('mentorship_id', $this->mentorship_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
