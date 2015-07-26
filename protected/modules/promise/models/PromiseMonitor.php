<?php

/**
 * This is the model class for table "{{promise_monitor}}".
 *
 * The followings are the available columns in table '{{promise_monitor}}':
 * @property integer $id
 * @property integer $promise_id
 * @property integer $monitor_id
 * @property integer $level_id
 * @property integer $type_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property User $monitor
 * @property Level $level
 */
class PromiseMonitor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PromiseMonitor the static model class
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
		return '{{promise_monitor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promise_id, monitor_id, level_id', 'required'),
			array('promise_id, monitor_id, level_id, type_id, privacy, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, promise_id, monitor_id, level_id, type_id, privacy, status', 'safe', 'on'=>'search'),
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
			'promise' => array(self::BELONGS_TO, 'Promise', 'promise_id'),
			'monitor' => array(self::BELONGS_TO, 'User', 'monitor_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'promise_id' => 'Promise',
			'monitor_id' => 'Monitor',
			'level_id' => 'Level',
			'type_id' => 'Type',
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
		$criteria->compare('promise_id',$this->promise_id);
		$criteria->compare('monitor_id',$this->monitor_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}