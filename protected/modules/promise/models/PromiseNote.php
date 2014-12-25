<?php

/**
 * This is the model class for table "{{promise_note}}".
 *
 * The followings are the available columns in table '{{promise_note}}':
 * @property integer $id
 * @property integer $note_id
 * @property integer $promise_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Note $note
 */
class PromiseNote extends CActiveRecord {

 public static function getPromiseParentNote($childNoteId, $promiseId) {
  $promiseNoteCriteria = new CDbCriteria;
  $promiseNoteCriteria->addCondition("note_id=" . $childNoteId);
  $promiseNoteCriteria->addCondition("promise_id = " . $promiseId);

  return PromiseNote::Model()->find($promiseNoteCriteria);
 }

 public static function getPromiseParentNotes($promiseId, $limit = null, $offset = null) {
  $promiseNoteCriteria = new CDbCriteria;
  if ($limit) {
   $promiseNoteCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseNoteCriteria->offset = $offset;
  }
  $promiseNoteCriteria->with = array("note" => array("alias" => 'td'));
  $promiseNoteCriteria->addCondition("td.parent_note_id is NULL");
  $promiseNoteCriteria->addCondition("promise_id = " . $promiseId);
  $promiseNoteCriteria->order = "td.id desc";
  return PromiseNote::Model()->findAll($promiseNoteCriteria);
 }

 public static function getPromiseParentNotesCount($promiseId) {
  $promiseNoteCriteria = new CDbCriteria;
  $promiseNoteCriteria->with = array("note" => array("alias" => 'td'));
  $promiseNoteCriteria->addCondition("td.parent_note_id is NULL");
  $promiseNoteCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseNote::Model()->count($promiseNoteCriteria);
 }

 public static function getPromiseChildrenNotes($noteParentId) {
  $promiseNoteCriteria = new CDbCriteria;
  $promiseNoteCriteria->with = array("note" => array("alias" => 'td'));
  $promiseNoteCriteria->addCondition("td.parent_note_id=" . $noteParentId);
  $promiseNoteCriteria->order = "td.id desc";
  return PromiseNote::Model()->findAll($promiseNoteCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return PromiseNote the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise_note}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('note_id, promise_id', 'required'),
    array('note_id, promise_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, note_id, promise_id, privacy, status', 'safe', 'on' => 'search'),
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
  $criteria->compare('note_id', $this->note_id);
  $criteria->compare('promise_id', $this->promise_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
