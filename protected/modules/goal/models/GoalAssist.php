<?php

/**
 * This is the model class for table "{{goal_assist}}".
 *
 * The followings are the available columns in table '{{goal_assist}}':
 * @property integer $id
 * @property integer $goal_commitment_id
 * @property integer $assist_id
 *
 * The followings are the available model relations:
 * @property User $assist
 * @property GoalCommitment $goalCommitment
 */
class GoalAssist extends CActiveRecord
{
  public $assistancesIdList;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalAssist the static model class
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
		return '{{goal_assist}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goal_commitment_id, assist_id', 'required'),
			array('goal_commitment_id, assist_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, goal_commitment_id, assist_id', 'safe', 'on'=>'search'),
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
			'assist' => array(self::BELONGS_TO, 'User', 'assist_id'),
			'goalCommitment' => array(self::BELONGS_TO, 'GoalCommitment', 'goal_commitment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'goal_commitment_id' => 'Goal Commitment',
			'assist_id' => 'Assist',
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
		$criteria->compare('goal_commitment_id',$this->goal_commitment_id);
		$criteria->compare('assist_id',$this->assist_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}