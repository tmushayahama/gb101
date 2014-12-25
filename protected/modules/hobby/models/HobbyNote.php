<?php

/**
 * This is the model class for table "{{hobby_note}}".
 *
 * The followings are the available columns in table '{{hobby_note}}':
 * @property integer $id
 * @property integer $note_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Note $note
 */
class HobbyNote extends CActiveRecord {

 public static function getHobbyParentNote($childNoteId, $hobbyId) {
  $hobbyNoteCriteria = new CDbCriteria;
  $hobbyNoteCriteria->addCondition("note_id=" . $childNoteId);
  $hobbyNoteCriteria->addCondition("hobby_id = " . $hobbyId);

  return HobbyNote::Model()->find($hobbyNoteCriteria);
 }

 public static function getHobbyParentNotes($hobbyId, $limit = null, $offset = null) {
  $hobbyNoteCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyNoteCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyNoteCriteria->offset = $offset;
  }
  $hobbyNoteCriteria->with = array("note" => array("alias" => 'td'));
  $hobbyNoteCriteria->addCondition("td.parent_note_id is NULL");
  $hobbyNoteCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyNoteCriteria->order = "td.id desc";
  return HobbyNote::Model()->findAll($hobbyNoteCriteria);
 }

 public static function getHobbyParentNotesCount($hobbyId) {
  $hobbyNoteCriteria = new CDbCriteria;
  $hobbyNoteCriteria->with = array("note" => array("alias" => 'td'));
  $hobbyNoteCriteria->addCondition("td.parent_note_id is NULL");
  $hobbyNoteCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyNote::Model()->count($hobbyNoteCriteria);
 }

 public static function getHobbyChildrenNotes($noteParentId) {
  $hobbyNoteCriteria = new CDbCriteria;
  $hobbyNoteCriteria->with = array("note" => array("alias" => 'td'));
  $hobbyNoteCriteria->addCondition("td.parent_note_id=" . $noteParentId);
  $hobbyNoteCriteria->order = "td.id desc";
  return HobbyNote::Model()->findAll($hobbyNoteCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return HobbyNote the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby_note}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('note_id, hobby_id', 'required'),
    array('note_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, note_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('note_id', $this->note_id);
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
