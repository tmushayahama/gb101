<?php

/**
 * This is the model class for table "{{skill_academic}}".
 *
 * The followings are the available columns in table '{{skill_academic}}':
 * @property integer $id
 * @property integer $skill_id
 * @property string $school
 * @property string $major
 * @property string $extra_info
 *
 * The followings are the available model relations:
 * @property Goal $skill
 */
class SkillAcademic extends CActiveRecord
{
	public $description;
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillAcademic the static model class
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
		return '{{skill_academic}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skill_id', 'required'),
			array('skill_id', 'numerical', 'integerOnly'=>true),
			array('school, major, extra_info', 'length', 'max'=>255),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, skill_id, school, major, extra_info', 'safe', 'on'=>'search'),
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
			'skill' => array(self::BELONGS_TO, 'Goal', 'skill_id'),
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
			'school' => 'School',
			'major' => 'Major',
			'extra_info' => 'Extra Info',
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
		$criteria->compare('school',$this->school,true);
		$criteria->compare('major',$this->major,true);
		$criteria->compare('extra_info',$this->extra_info,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}