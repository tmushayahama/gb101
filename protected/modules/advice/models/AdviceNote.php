<?php

/**
 * This is the model class for table "{{advice_note}}".
 *
 * The followings are the available columns in table '{{advice_note}}':
 * @property integer $id
 * @property integer $note_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Note $note
 */
class AdviceNote extends CActiveRecord {

 public static function getAdviceParentNote($childNoteId, $adviceId) {
  $adviceNoteCriteria = new CDbCriteria;
  $adviceNoteCriteria->addCondition("note_id=" . $childNoteId);
  $adviceNoteCriteria->addCondition("advice_id = " . $adviceId);

  return AdviceNote::Model()->find($adviceNoteCriteria);
 }

 public static function getAdviceParentNotes($adviceId, $limit = null, $offset = null) {
  $adviceNoteCriteria = new CDbCriteria;
  if ($limit) {
   $adviceNoteCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceNoteCriteria->offset = $offset;
  }
  $adviceNoteCriteria->with = array("note" => array("alias" => 'td'));
  $adviceNoteCriteria->addCondition("td.parent_note_id is NULL");
  $adviceNoteCriteria->addCondition("advice_id = " . $adviceId);
  $adviceNoteCriteria->order = "td.id desc";
  return AdviceNote::Model()->findAll($adviceNoteCriteria);
 }

 public static function getAdviceParentNotesCount($adviceId) {
  $adviceNoteCriteria = new CDbCriteria;
  $adviceNoteCriteria->with = array("note" => array("alias" => 'td'));
  $adviceNoteCriteria->addCondition("td.parent_note_id is NULL");
  $adviceNoteCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceNote::Model()->count($adviceNoteCriteria);
 }

 public static function getAdviceChildrenNotes($noteParentId) {
  $adviceNoteCriteria = new CDbCriteria;
  $adviceNoteCriteria->with = array("note" => array("alias" => 'td'));
  $adviceNoteCriteria->addCondition("td.parent_note_id=" . $noteParentId);
  $adviceNoteCriteria->order = "td.id desc";
  return AdviceNote::Model()->findAll($adviceNoteCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceNote the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_note}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('note_id, advice_id', 'required'),
    array('note_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, note_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('note_id', $this->note_id);
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
