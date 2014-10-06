<?php

/**
 * This is the model class for table "{{skill_answer}}".
 *
 * The followings are the available columns in table '{{skill_answer}}':
 * @property integer $id
 * @property integer $questionee_id
 * @property integer $skill_id
 * @property integer $skill_question_id
 * @property string $skill_answer
 * @property integer $level
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $questionee
 * @property SkillQuestion $skillQuestion
 * @property Skill $skill
 */
class SkillAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillAnswer the static model class
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
		return '{{skill_answer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('questionee_id, skill_id, skill_question_id, skill_answer', 'required'),
			array('questionee_id, skill_id, skill_question_id, level, privacy, status', 'numerical', 'integerOnly'=>true),
			array('skill_answer', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, questionee_id, skill_id, skill_question_id, skill_answer, level, privacy, status', 'safe', 'on'=>'search'),
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
			'questionee' => array(self::BELONGS_TO, 'User', 'questionee_id'),
			'skillQuestion' => array(self::BELONGS_TO, 'SkillQuestion', 'skill_question_id'),
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
			'questionee_id' => 'Questionee',
			'skill_id' => 'Skill',
			'skill_question_id' => 'Skill Question',
			'skill_answer' => 'Skill Answer',
			'level' => 'Level',
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
		$criteria->compare('questionee_id',$this->questionee_id);
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('skill_question_id',$this->skill_question_id);
		$criteria->compare('skill_answer',$this->skill_answer,true);
		$criteria->compare('level',$this->level);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}