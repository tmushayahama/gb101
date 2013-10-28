<?php

/**
 * This is the model class for table "{{goal_list_share}}".
 *
 * The followings are the available columns in table '{{goal_list_share}}':
 * @property integer $id
 * @property integer $goal_list_id
 * @property integer $connection_id
 *
 * The followings are the available model relations:
 * @property Connection $connection
 * @property GoalList $goalList
 */
class GoalListShare extends CActiveRecord
{
	public $connectionIdList;
	
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalListShare the static model class
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
		return '{{goal_list_share}}';
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
			array('goal_list_id, connection_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, goal_list_id, connection_id', 'safe', 'on'=>'search'),
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
		$criteria->compare('goal_list_id',$this->goal_list_id);
		$criteria->compare('connection_id',$this->connection_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}