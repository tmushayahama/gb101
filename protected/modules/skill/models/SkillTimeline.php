<?php

/**
 * This is the model class for table "{{skill_timeline}}".
 *
 * The followings are the available columns in table '{{skill_timeline}}':
 * @property integer $id
 * @property integer $timeline_id
 * @property integer $skill_id
 * @property integer $day
 * @property integer $type
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Timeline $timeline
 * @property Skill $skill
 */
class SkillTimeline extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillTimeline the static model class
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
		return '{{skill_timeline}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('timeline_id, skill_id, day', 'required'),
			array('timeline_id, skill_id, day, type, privacy, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, timeline_id, skill_id, day, type, privacy, status', 'safe', 'on'=>'search'),
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
			'timeline' => array(self::BELONGS_TO, 'Timeline', 'timeline_id'),
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
			'timeline_id' => 'Timeline',
			'skill_id' => 'Skill',
			'day' => 'Day',
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
		$criteria->compare('timeline_id',$this->timeline_id);
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('day',$this->day);
		$criteria->compare('type',$this->type);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}