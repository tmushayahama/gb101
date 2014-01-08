<?php

/**
 * This is the model class for table "{{goal_list_mentor}}".
 *
 * The followings are the available columns in table '{{goal_list_mentor}}':
 * @property integer $id
 * @property integer $goal_list_id
 * @property integer $mentor_id
 *
 * The followings are the available model relations:
 * @property User $mentor
 * @property GoalList $goalList
 */
class GoalListMentor extends CActiveRecord
{
	public $userIdList;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalListMentor the static model class
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
		return '{{goal_list_mentor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goal_list_id', 'required'),
			array('goal_list_id, mentor_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, goal_list_id, mentor_id', 'safe', 'on'=>'search'),
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
			'mentor' => array(self::BELONGS_TO, 'User', 'mentor_id'),
			'goalList' => array(self::BELONGS_TO, 'GoalList', 'goal_list_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'goal_list_id' => 'Goal List',
			'mentor_id' => 'Mentor',
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
		$criteria->compare('goal_list_id',$this->goal_list_id);
		$criteria->compare('mentor_id',$this->mentor_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}