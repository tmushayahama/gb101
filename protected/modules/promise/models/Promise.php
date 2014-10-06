<?php

/**
 * This is the model class for table "{{promise}}".
 *
 * The followings are the available columns in table '{{promise}}':
 * @property integer $id
 * @property integer $skill_id
 * @property integer $type_id
 * @property string $title
 * @property string $description
 * @property integer $points_pledged
 * @property string $assign_date
 * @property string $begin_date
 * @property string $end_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SkillType $type
 * @property Skill $skill
 * @property PromiseList[] $promiseLists
 */
class Promise extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Promise the static model class
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
		return '{{promise}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description', 'required'),
			array('skill_id, type_id, points_pledged, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('description', 'length', 'max'=>500),
			array('begin_date, end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, skill_id, type_id, title, description, points_pledged, assign_date, begin_date, end_date, status', 'safe', 'on'=>'search'),
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
			'type' => array(self::BELONGS_TO, 'SkillType', 'type_id'),
			'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
			'promiseLists' => array(self::HAS_MANY, 'PromiseList', 'promise_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'skill_id' => 'Skill',
			'type_id' => 'Type',
			'title' => 'Title',
			'description' => 'Description',
			'points_pledged' => 'Points Pledged',
			'assign_date' => 'Assign Date',
			'begin_date' => 'Begin Date',
			'end_date' => 'End Date',
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
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('points_pledged',$this->points_pledged);
		$criteria->compare('assign_date',$this->assign_date,true);
		$criteria->compare('begin_date',$this->begin_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}