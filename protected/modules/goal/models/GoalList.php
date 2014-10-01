<?php

/**
 * This is the model class for table "{{goal_list}}".
 *
 * The followings are the available columns in table '{{goal_list}}':
 * @property integer $id
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $goal_id
 * @property integer $level_id
 * @property integer $list_bank_parent_id
 * @property integer $status
 * @property integer $privacy
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Level $level
 * @property ListBank $listBankParent
 * @property SkillType $type
 * @property User $user
 * @property GoalListShare[] $goalListShares
 */
class GoalList extends CActiveRecord
{
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
			array('type_id, user_id, goal_id, level_id', 'required'),
			array('type_id, user_id, goal_id, level_id, list_bank_parent_id, status, privacy, order', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, user_id, goal_id, level_id, list_bank_parent_id, status, privacy, order', 'safe', 'on'=>'search'),
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
			'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'listBankParent' => array(self::BELONGS_TO, 'ListBank', 'list_bank_parent_id'),
			'type' => array(self::BELONGS_TO, 'SkillType', 'type_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
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
			'type_id' => 'Type',
			'user_id' => 'User',
			'goal_id' => 'Goal',
			'level_id' => 'Level',
			'list_bank_parent_id' => 'List Bank Parent',
			'status' => 'Status',
			'privacy' => 'Privacy',
			'order' => 'Order',
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
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('goal_id',$this->goal_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('list_bank_parent_id',$this->list_bank_parent_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}