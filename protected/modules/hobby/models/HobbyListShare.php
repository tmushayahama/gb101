<?php

/**
 * This is the model class for table "{{hobby_list_share}}".
 *
 * The followings are the available columns in table '{{hobby_list_share}}':
 * @property integer $id
 * @property integer $hobby_list_id
 * @property integer $shared_to_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property HobbyList $hobbyList
 * @property User $sharedTo
 */
class HobbyListShare extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HobbyListShare the static model class
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
		return '{{hobby_list_share}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hobby_list_id, shared_to_id', 'required'),
			array('hobby_list_id, shared_to_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, hobby_list_id, shared_to_id, status', 'safe', 'on'=>'search'),
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
			'hobbyList' => array(self::BELONGS_TO, 'HobbyList', 'hobby_list_id'),
			'sharedTo' => array(self::BELONGS_TO, 'User', 'shared_to_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'hobby_list_id' => 'Hobby List',
			'shared_to_id' => 'Shared To',
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
		$criteria->compare('hobby_list_id',$this->hobby_list_id);
		$criteria->compare('shared_to_id',$this->shared_to_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}