<?php

/**
 * This is the model class for table "{{message_receipient}}".
 *
 * The followings are the available columns in table '{{message_receipient}}':
 * @property integer $id
 * @property integer $message_id
 * @property integer $receipient_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Message $message
 * @property User $receipient
 * @property MessageReceipientSkill[] $messageReceipientSkills
 */
class MessageReceipient extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MessageReceipient the static model class
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
		return '{{message_receipient}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('message_id, receipient_id', 'required'),
			array('message_id, receipient_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, message_id, receipient_id, status', 'safe', 'on'=>'search'),
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
			'message' => array(self::BELONGS_TO, 'Message', 'message_id'),
			'receipient' => array(self::BELONGS_TO, 'User', 'receipient_id'),
			'messageReceipientSkills' => array(self::HAS_MANY, 'MessageReceipientSkill', 'message_receipient_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'message_id' => 'Message',
			'receipient_id' => 'Receipient',
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
		$criteria->compare('message_id',$this->message_id);
		$criteria->compare('receipient_id',$this->receipient_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}