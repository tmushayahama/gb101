<?php

/**
 * This is the model class for table "{{checklist_note}}".
 *
 * The followings are the available columns in table '{{checklist_note}}':
 * @property integer $id
 * @property integer $note_id
 * @property integer $checklist_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Checklist $checklist
 * @property Note $note
 */
class ChecklistNote extends CActiveRecord
{
   public static function getChecklistParentComment($childCommentId, $checklistId) {
    $checklistCommentCriteria = new CDbCriteria;
    $checklistCommentCriteria->addCondition("comment_id=" . $childCommentId);
    $checklistCommentCriteria->addCondition("checklist_id = " . $checklistId);

    return ChecklistComment::Model()->find($checklistCommentCriteria);
  }

  public static function getChecklistParentComments($checklistId, $limit = null) {
    $checklistCommentCriteria = new CDbCriteria;
    if ($limit) {
      $checklistCommentCriteria->limit = $limit;
    }
    $checklistCommentCriteria->with = array("comment" => array("alias" => 'td'));
    $checklistCommentCriteria->addCondition("td.parent_comment_id is NULL");
    $checklistCommentCriteria->addCondition("checklist_id = " . $checklistId);
    $checklistCommentCriteria->order = "td.id desc";
    return ChecklistComment::Model()->findAll($checklistCommentCriteria);
  }

  public static function getChecklistParentCommentsCount($checklistId) {
    $checklistCommentCriteria = new CDbCriteria;
    $checklistCommentCriteria->with = array("comment" => array("alias" => 'td'));
    $checklistCommentCriteria->addCondition("td.parent_comment_id is NULL");
    $checklistCommentCriteria->addCondition("checklist_id = " . $checklistId);
    return ChecklistComment::Model()->count($checklistCommentCriteria);
  }

  public static function getChecklistChildrenComments($commentParentId, $limit = null) {
    $checklistCommentCriteria = new CDbCriteria;
    if ($limit) {
      $checklistCommentCriteria->limit = $limit;
    }
    $checklistCommentCriteria->with = array("comment" => array("alias" => 'td'));
    $checklistCommentCriteria->addCondition("td.parent_comment_id=" . $commentParentId);
    $checklistCommentCriteria->order = "td.id desc";
    return ChecklistComment::Model()->findAll($checklistCommentCriteria);
  }

  public static function getChecklistChildrenCommentsCount($commentParentId, $limit = null) {
    $checklistCommentCriteria = new CDbCriteria;
    $checklistCommentCriteria->with = array("comment" => array("alias" => 'td'));
    $checklistCommentCriteria->addCondition("td.parent_comment_id=" . $commentParentId);
    return ChecklistComment::Model()->count($checklistCommentCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChecklistNote the static model class
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
		return '{{checklist_note}}';
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
			array('note_id, checklist_id, privacy, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, note_id, checklist_id, privacy, status', 'safe', 'on'=>'search'),
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
			'checklist' => array(self::BELONGS_TO, 'Checklist', 'checklist_id'),
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
			'checklist_id' => 'Checklist',
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
		$criteria->compare('checklist_id',$this->checklist_id);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}