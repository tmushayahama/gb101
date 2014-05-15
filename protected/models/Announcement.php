<?php

/**
 * This is the model class for table "{{announcement}}".
 *
 * The followings are the available columns in table '{{announcement}}':
 * @property integer $id
 * @property integer $announcer_id
 * @property integer $receiver_id
 * @property string $title
 * @property string $description
 *
 * The followings are the available model relations:
 * @property User $announcer
 * @property User $receiver
 * @property MentorshipAnnouncement[] $mentorshipAnnouncements
 */
class Announcement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Announcement the static model class
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
		return '{{announcement}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('announcer_id, title, description', 'required'),
			array('announcer_id, receiver_id', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, announcer_id, receiver_id, title, description', 'safe', 'on'=>'search'),
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
			'announcer' => array(self::BELONGS_TO, 'User', 'announcer_id'),
			'receiver' => array(self::BELONGS_TO, 'User', 'receiver_id'),
			'mentorshipAnnouncements' => array(self::HAS_MANY, 'MentorshipAnnouncement', 'announcement_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'announcer_id' => 'Announcer',
			'receiver_id' => 'Receiver',
			'title' => 'Title',
			'description' => 'Description',
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
		$criteria->compare('announcer_id',$this->announcer_id);
		$criteria->compare('receiver_id',$this->receiver_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}