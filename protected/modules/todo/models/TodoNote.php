<?php

/**
 * This is the model class for table "{{todo_note}}".
 *
 * The followings are the available columns in table '{{todo_note}}':
 * @property integer $id
 * @property integer $note_id
 * @property integer $todo_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Todo $todo
 * @property Note $note
 */
class TodoNote extends CActiveRecord
{
   public static function getTodoParentNote($childNoteId, $todoId) {
    $todoNoteCriteria = new CDbCriteria;
    $todoNoteCriteria->addCondition("note_id=" . $childNoteId);
    $todoNoteCriteria->addCondition("todo_id = " . $todoId);

    return TodoNote::Model()->find($todoNoteCriteria);
  }

  public static function getTodoParentNotes($todoId, $limit = null) {
    $todoNoteCriteria = new CDbCriteria;
    if ($limit) {
      $todoNoteCriteria->limit = $limit;
    }
    $todoNoteCriteria->with = array("note" => array("alias" => 'td'));
    $todoNoteCriteria->addCondition("td.parent_note_id is NULL");
    $todoNoteCriteria->addCondition("todo_id = " . $todoId);
    $todoNoteCriteria->order = "td.id desc";
    return TodoNote::Model()->findAll($todoNoteCriteria);
  }

  public static function getTodoParentNotesCount($todoId) {
    $todoNoteCriteria = new CDbCriteria;
    $todoNoteCriteria->with = array("note" => array("alias" => 'td'));
    $todoNoteCriteria->addCondition("td.parent_note_id is NULL");
    $todoNoteCriteria->addCondition("todo_id = " . $todoId);
    return TodoNote::Model()->count($todoNoteCriteria);
  }

  public static function getTodoChildrenNotes($noteParentId, $limit = null) {
    $todoNoteCriteria = new CDbCriteria;
    if ($limit) {
      $todoNoteCriteria->limit = $limit;
    }
    $todoNoteCriteria->with = array("note" => array("alias" => 'td'));
    $todoNoteCriteria->addCondition("td.parent_note_id=" . $noteParentId);
    $todoNoteCriteria->order = "td.id desc";
    return TodoNote::Model()->findAll($todoNoteCriteria);
  }

  public static function getTodoChildrenNotesCount($noteParentId, $limit = null) {
    $todoNoteCriteria = new CDbCriteria;
    $todoNoteCriteria->with = array("note" => array("alias" => 'td'));
    $todoNoteCriteria->addCondition("td.parent_note_id=" . $noteParentId);
    return TodoNote::Model()->count($todoNoteCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TodoNote the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{todo_note}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('note_id, todo_id, privacy, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, note_id, todo_id, privacy, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'todo' => array(self::BELONGS_TO, 'Todo', 'todo_id'),
			'note' => array(self::BELONGS_TO, 'Note', 'note_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'note_id' => 'Note',
			'todo_id' => 'Todo',
			'privacy' => 'Privacy',
			'status' => 'Status',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('note_id',$this->note_id);
		$criteria->compare('todo_id',$this->todo_id);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}