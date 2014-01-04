<?php

/**
 * This is the model class for table "{{goal_list}}".
 *
 * The followings are the available columns in table '{{goal_list}}':
 * @property integer $id
 * @property integer $type
 * @property integer $user_id
 * @property integer $goal_id
 * @property integer $skill_level_id
 * @property integer $list_bank_parent_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property ListBank $listBankParent
 * @property Goal $goal
 * @property GoalLevel $skillLevel
 * @property User $user
 * @property GoalListMentor[] $goalListMentors
 * @property GoalListShare[] $goalListShares
 */
class GoalList extends CActiveRecord
{
  
  public static $TYPE_SKILL = 1;
  public static $TYPE_PROMISE = 2;
  public static $TYPE_GOAL = 3;
  public $title;
  public $description;

  public static function getGoalList($connectionId, $goalLevelId, $limit = null) {
    $goalListCriteria = new CDbCriteria;
    $goalListCriteria->condition = "user_id=" . Yii::app()->user->id;
    if ($goalLevelId != 0) {
      $goalListCriteria->addCondition("skill_level_id=" . $goalLevelId);
    }
    $goalListCriteria->order = "id desc";
    if ($connectionId != 0) {
      //$goalListCriteria->addCondition("connection_id=" . $connectionId);
    }
    if ($limit != null) {
      $goalListCriteria->limit = $limit;
    }
    return GoalList::Model()->findAll($goalListCriteria);
  }
  public static function getGoalListCount($connectionId, $goalLevelId) {
    $goalListCriteria = new CDbCriteria;
    $goalListCriteria->condition = "user_id=" . Yii::app()->user->id;
    if ($goalLevelId != 0) {
      $goalListCriteria->addCondition("skill_level_id=" . $goalLevelId);
    }
    if ($connectionId != 0) {
      //$goalListCriteria->addCondition("connection_id=" . $connectionId);
    }
    return GoalList::Model()->count($goalListCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalList the static model class
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
		return '{{goal_list}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, user_id, goal_id', 'required'),
			array('type, user_id, goal_id, skill_level_id, list_bank_parent_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, user_id, goal_id, skill_level_id, list_bank_parent_id, status', 'safe', 'on'=>'search'),
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
			'listBankParent' => array(self::BELONGS_TO, 'ListBank', 'list_bank_parent_id'),
			'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
			'skillLevel' => array(self::BELONGS_TO, 'GoalLevel', 'skill_level_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'goalListMentors' => array(self::HAS_MANY, 'GoalListMentor', 'goal_list_id'),
			'goalListShares' => array(self::HAS_MANY, 'GoalListShare', 'goal_list_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'user_id' => 'User',
			'goal_id' => 'Goal',
			'skill_level_id' => 'Skill Level',
			'list_bank_parent_id' => 'List Bank Parent',
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
		$criteria->compare('type',$this->type);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('goal_id',$this->goal_id);
		$criteria->compare('skill_level_id',$this->skill_level_id);
		$criteria->compare('list_bank_parent_id',$this->list_bank_parent_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}