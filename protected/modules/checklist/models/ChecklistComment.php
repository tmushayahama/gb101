<?php

/**
 * This is the model class for table "{{checklist_comment}}".
 *
 * The followings are the available columns in table '{{checklist_comment}}':
 * @property integer $id
 * @property integer $comment_id
 * @property integer $checklist_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Checklist $checklist
 * @property Comment $comment
 */
class ChecklistComment extends CActiveRecord
{
   public static function getChecklistParentComment($childCommentId, $checklistItemId) {
    $checklistCommentCriteria = new CDbCriteria;
    $checklistCommentCriteria->addCondition("comment_id=" . $childCommentId);
    $checklistCommentCriteria->addCondition("checklist_id = " . $checklistItemId);

    return ChecklistComment::Model()->find($checklistCommentCriteria);
  }

  public static function getChecklistParentComments($checklistItemId, $limit = null) {
    $checklistCommentCriteria = new CDbCriteria;
    if ($limit) {
      $checklistCommentCriteria->limit = $limit;
    }
    $checklistCommentCriteria->with = array("comment" => array("alias" => 'td'));
    $checklistCommentCriteria->addCondition("td.parent_comment_id is NULL");
    $checklistCommentCriteria->addCondition("checklist_id = " . $checklistItemId);
    $checklistCommentCriteria->order = "td.id desc";
    return ChecklistComment::Model()->findAll($checklistCommentCriteria);
  }

  public static function getChecklistParentCommentsCount($checklistItemId) {
    $checklistCommentCriteria = new CDbCriteria;
    $checklistCommentCriteria->with = array("comment" => array("alias" => 'td'));
    $checklistCommentCriteria->addCondition("td.parent_comment_id is NULL");
    $checklistCommentCriteria->addCondition("checklist_id = " . $checklistItemId);
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
	 * @return ChecklistComment the static model class
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
		return '{{checklist_comment}}';
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
			array('comment_id, checklist_id, privacy, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, comment_id, checklist_id, privacy, status', 'safe', 'on'=>'search'),
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
			'comment' => array(self::BELONGS_TO, 'Comment', 'comment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'comment_id' => 'Comment',
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
		$criteria->compare('comment_id',$this->comment_id);
		$criteria->compare('checklist_id',$this->checklist_id);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}