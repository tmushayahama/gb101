<?php

/**
 * This is the model class for table "{{mentorship_enrolled}}".
 *
 * The followings are the available columns in table '{{mentorship_enrolled}}':
 * @property integer $id
 * @property integer $mentee_id
 * @property integer $mentorship_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property User $mentee
 */
class MentorshipEnrolled extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MentorshipEnrolled the static model class
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
		return '{{mentorship_enrolled}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mentee_id, mentorship_id', 'required'),
			array('mentee_id, mentorship_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mentee_id, mentorship_id, status', 'safe', 'on'=>'search'),
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
			'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
			'mentee' => array(self::BELONGS_TO, 'User', 'mentee_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'mentee_id' => 'Mentee',
			'mentorship_id' => 'Mentorship',
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
		$criteria->compare('mentee_id',$this->mentee_id);
		$criteria->compare('mentorship_id',$this->mentorship_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}