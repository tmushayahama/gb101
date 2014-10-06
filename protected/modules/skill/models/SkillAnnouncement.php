<?php

/**
 * This is the model class for table "{{skill_announcement}}".
 *
 * The followings are the available columns in table '{{skill_announcement}}':
 * @property integer $id
 * @property integer $announcement_id
 * @property integer $skill_id
 * @property integer $type
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Announcement $announcement
 * @property Skill $skill
 */
class SkillAnnouncement extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillAnnouncement the static model class
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
		return '{{skill_announcement}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('announcement_id, skill_id', 'required'),
			array('announcement_id, skill_id, type, privacy, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, announcement_id, skill_id, type, privacy, status', 'safe', 'on'=>'search'),
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
			'announcement' => array(self::BELONGS_TO, 'Announcement', 'announcement_id'),
			'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'announcement_id' => 'Announcement',
			'skill_id' => 'Skill',
			'type' => 'Type',
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
		$criteria->compare('announcement_id',$this->announcement_id);
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}