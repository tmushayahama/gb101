<?php

/**
 * This is the model class for table "{{promise_play_answer}}".
 *
 * The followings are the available columns in table '{{promise_play_answer}}':
 * @property integer $id
 * @property integer $promise_id
 * @property integer $creator_id
 * @property integer $promise_modified_id
 * @property integer $promise_play_answer
 * @property string $description
 * @property string $created_date
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Promise $promise
 * @property Promise $promiseModified
 */
class PromisePlayAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PromisePlayAnswer the static model class
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
		return '{{promise_play_answer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('promise_id, creator_id, promise_play_answer, created_date', 'required'),
			array('promise_id, creator_id, promise_modified_id, promise_play_answer, privacy, status', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, promise_id, creator_id, promise_modified_id, promise_play_answer, description, created_date, privacy, status', 'safe', 'on'=>'search'),
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
			'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
			'promise' => array(self::BELONGS_TO, 'Promise', 'promise_id'),
			'promiseModified' => array(self::BELONGS_TO, 'Promise', 'promise_modified_id'),
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
			'creator_id' => 'Creator',
			'promise_modified_id' => 'Promise Modified',
			'promise_play_answer' => 'Promise Play Answer',
			'description' => 'Description',
			'created_date' => 'Created Date',
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
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('promise_modified_id',$this->promise_modified_id);
		$criteria->compare('promise_play_answer',$this->promise_play_answer);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}