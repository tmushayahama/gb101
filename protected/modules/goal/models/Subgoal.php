<?php

/**
 * This is the model class for table "{{subgoal}}".
 *
 * The followings are the available columns in table '{{subgoal}}':
 * @property integer $id
 * @property integer $goal_id
 * @property integer $subgoal_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $subgoal
 * @property Goal $goal
 */
class Subgoal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Subgoal the static model class
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
		return '{{subgoal}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goal_id, subgoal_id', 'required'),
			array('goal_id, subgoal_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, goal_id, subgoal_id, status', 'safe', 'on'=>'search'),
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
			'subgoal' => array(self::BELONGS_TO, 'Goal', 'subgoal_id'),
			'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'goal_id' => 'Goal',
			'subgoal_id' => 'Subgoal',
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
		$criteria->compare('goal_id',$this->goal_id);
		$criteria->compare('subgoal_id',$this->subgoal_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}