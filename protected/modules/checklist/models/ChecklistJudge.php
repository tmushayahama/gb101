<?php

/**
 * This is the model class for table "{{checklist_judge}}".
 *
 * The followings are the available columns in table '{{checklist_judge}}':
 * @property integer $id
 * @property integer $judge_id
 * @property integer $checklist_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Checklist $checklist
 * @property User $judge
 */
class ChecklistJudge extends CActiveRecord
{
   public static function getChecklistParentJudge($childJudgeId, $checklistItemId) {
    $checklistJudgeCriteria = new CDbCriteria;
    $checklistJudgeCriteria->addCondition("judge_id=" . $childJudgeId);
    $checklistJudgeCriteria->addCondition("checklist_id = " . $checklistItemId);

    return ChecklistJudge::Model()->find($checklistJudgeCriteria);
  }

  public static function getChecklistParentJudges($checklistItemId, $limit = null) {
    $checklistJudgeCriteria = new CDbCriteria;
    if ($limit) {
      $checklistJudgeCriteria->limit = $limit;
    }
    $checklistJudgeCriteria->with = array("judge" => array("alias" => 'td'));
    $checklistJudgeCriteria->addCondition("td.parent_judge_id is NULL");
    $checklistJudgeCriteria->addCondition("checklist_id = " . $checklistItemId);
    $checklistJudgeCriteria->order = "td.id desc";
    return ChecklistJudge::Model()->findAll($checklistJudgeCriteria);
  }

  public static function getChecklistParentJudgesCount($checklistItemId) {
    $checklistJudgeCriteria = new CDbCriteria;
    $checklistJudgeCriteria->with = array("judge" => array("alias" => 'td'));
    $checklistJudgeCriteria->addCondition("td.parent_judge_id is NULL");
    $checklistJudgeCriteria->addCondition("checklist_id = " . $checklistItemId);
    return ChecklistJudge::Model()->count($checklistJudgeCriteria);
  }

  public static function getChecklistChildrenJudges($judgeParentId, $limit = null) {
    $checklistJudgeCriteria = new CDbCriteria;
    if ($limit) {
      $checklistJudgeCriteria->limit = $limit;
    }
    $checklistJudgeCriteria->with = array("judge" => array("alias" => 'td'));
    $checklistJudgeCriteria->addCondition("td.parent_judge_id=" . $judgeParentId);
    $checklistJudgeCriteria->order = "td.id desc";
    return ChecklistJudge::Model()->findAll($checklistJudgeCriteria);
  }

  public static function getChecklistChildrenJudgesCount($judgeParentId, $limit = null) {
    $checklistJudgeCriteria = new CDbCriteria;
    $checklistJudgeCriteria->with = array("judge" => array("alias" => 'td'));
    $checklistJudgeCriteria->addCondition("td.parent_judge_id=" . $judgeParentId);
    return ChecklistJudge::Model()->count($checklistJudgeCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChecklistJudge the static model class
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
		return '{{checklist_judge}}';
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
			array('judge_id, checklist_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, judge_id, checklist_id, status', 'safe', 'on'=>'search'),
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
			'judge' => array(self::BELONGS_TO, 'User', 'judge_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'judge_id' => 'Judge',
			'checklist_id' => 'Checklist',
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
		$criteria->compare('judge_id',$this->judge_id);
		$criteria->compare('checklist_id',$this->checklist_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}