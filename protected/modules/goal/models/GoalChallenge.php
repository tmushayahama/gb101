<?php

/**
 * This is the model class for table "{{goal_challenge}}".
 *
 * The followings are the available columns in table '{{goal_challenge}}':
 * @property integer $id
 * @property integer $assigner_id
 * @property integer $challenger_id
 * @property integer $goal_assignment_id
 * @property integer $connection_id
 *
 * The followings are the available model relations:
 * @property Connection $connection
 * @property User $challenger
 * @property User $assigner
 * @property Goal $goalAssignment
 */
class GoalChallenge extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalChallenge the static model class
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
		return '{{goal_challenge}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('assigner_id, challenger_id, goal_assignment_id', 'required'),
			array('assigner_id, challenger_id, goal_assignment_id, connection_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, assigner_id, challenger_id, goal_assignment_id, connection_id', 'safe', 'on'=>'search'),
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
			'connection' => array(self::BELONGS_TO, 'Connection', 'connection_id'),
			'challenger' => array(self::BELONGS_TO, 'User', 'challenger_id'),
			'assigner' => array(self::BELONGS_TO, 'User', 'assigner_id'),
			'goalAssignment' => array(self::BELONGS_TO, 'Goal', 'goal_assignment_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'assigner_id' => 'Assigner',
			'challenger_id' => 'Challenger',
			'goal_assignment_id' => 'Goal Assignment',
			'connection_id' => 'Connection',
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
		$criteria->compare('assigner_id',$this->assigner_id);
		$criteria->compare('challenger_id',$this->challenger_id);
		$criteria->compare('goal_assignment_id',$this->goal_assignment_id);
		$criteria->compare('connection_id',$this->connection_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}