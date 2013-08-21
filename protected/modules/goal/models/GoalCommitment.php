<?php

/**
 * This is the model class for table "{{goal_commitment}}".
 *
 * The followings are the available columns in table '{{goal_commitment}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $type_id
 * @property string $description
 * @property integer $points_pledged
 * @property string $assign_date
 * @property string $begin_date
 * @property string $end_date
 *
 * The followings are the available model relations:
 * @property GoalType $type
 * @property User $user
 * @property GoalCommitmentCircle[] $goalCommitmentCircles
 */
class GoalCommitment extends CActiveRecord
{
	public static function getAllPost() {
		return GoalCommitment::Model()->findAll();
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalCommitment the static model class
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
		return '{{goal_commitment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, type_id, assign_date, begin_date', 'required'),
			array('user_id, type_id, points_pledged', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>150),
			array('end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, type_id, description, points_pledged, assign_date, begin_date, end_date', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'GoalType', 'type_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'goalCommitmentCircles' => array(self::HAS_MANY, 'GoalCommitmentCircle', 'goal_commitment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'type_id' => 'Type',
			'description' => 'Description',
			'points_pledged' => 'Points Pledged',
			'assign_date' => 'Assign Date',
			'begin_date' => 'Begin Date',
			'end_date' => 'End Date',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('points_pledged',$this->points_pledged);
		$criteria->compare('assign_date',$this->assign_date,true);
		$criteria->compare('begin_date',$this->begin_date,true);
		$criteria->compare('end_date',$this->end_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}