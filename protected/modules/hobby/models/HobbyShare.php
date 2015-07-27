<?php

/**
 * This is the model class for table "{{hobby_share}}".
 *
 * The followings are the available columns in table '{{hobby_share}}':
 * @property integer $id
 * @property string $type
 * @property integer $share_to_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $shareTo
 */
class HobbyShare extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return HobbyShare the static model class
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
		return '{{hobby_share}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, share_to_id', 'required'),
			array('share_to_id, privacy, status', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>55),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type, share_to_id, privacy, status', 'safe', 'on'=>'search'),
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
			'shareTo' => array(self::BELONGS_TO, 'User', 'share_to_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'share_to_id' => 'Share To',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('share_to_id',$this->share_to_id);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}