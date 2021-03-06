<?php

/**
 * This is the model class for table "{{skill_note}}".
 *
 * The followings are the available columns in table '{{skill_note}}':
 * @property integer $id
 * @property integer $note_id
 * @property integer $skill_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property Note $note
 */
class SkillNote extends CActiveRecord {

 public static function getSkillParentNote($childNoteId, $skillId) {
  $skillNoteCriteria = new CDbCriteria;
  $skillNoteCriteria->addCondition("note_id=" . $childNoteId);
  $skillNoteCriteria->addCondition("skill_id = " . $skillId);

  return SkillNote::Model()->find($skillNoteCriteria);
 }

 public static function getSkillParentNotes($skillId, $limit = null, $offset = null) {
  $skillNoteCriteria = new CDbCriteria;
  if ($limit) {
   $skillNoteCriteria->limit = $limit;
  }
  if ($offset) {
   $skillNoteCriteria->offset = $offset;
  }
  $skillNoteCriteria->with = array("note" => array("alias" => 'td'));
  $skillNoteCriteria->addCondition("td.parent_note_id is NULL");
  $skillNoteCriteria->addCondition("skill_id = " . $skillId);
  $skillNoteCriteria->order = "td.id desc";
  return SkillNote::Model()->findAll($skillNoteCriteria);
 }

 public static function getSkillParentNotesCount($skillId) {
  $skillNoteCriteria = new CDbCriteria;
  $skillNoteCriteria->with = array("note" => array("alias" => 'td'));
  $skillNoteCriteria->addCondition("td.parent_note_id is NULL");
  $skillNoteCriteria->addCondition("skill_id = " . $skillId);
  return SkillNote::Model()->count($skillNoteCriteria);
 }

 public static function getSkillChildrenNotes($noteParentId) {
  $skillNoteCriteria = new CDbCriteria;
  $skillNoteCriteria->with = array("note" => array("alias" => 'td'));
  $skillNoteCriteria->addCondition("td.parent_note_id=" . $noteParentId);
  $skillNoteCriteria->order = "td.id desc";
  return SkillNote::Model()->findAll($skillNoteCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return SkillNote the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{skill_note}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('note_id, skill_id', 'required'),
    array('note_id, skill_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, note_id, skill_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('note_id', $this->note_id);
  $criteria->compare('skill_id', $this->skill_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
