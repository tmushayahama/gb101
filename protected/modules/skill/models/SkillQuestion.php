<?php

/**
 * This is the model class for table "{{skill_question}}".
 *
 * The followings are the available columns in table '{{skill_question}}':
 * @property integer $id
 * @property integer $skill_id
 * @property integer $question_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SkillAnswer[] $skillAnswers
 * @property Skill $skill
 * @property Question $question
 */
class SkillQuestion extends CActiveRecord
{
  public static function getSkillQuestions($skillId) {
    $skillQuestionCriteria = new CDbCriteria;
    $skillQuestionCriteria->with = array("question" => array("alias" => "q"));
    $skillQuestionCriteria->addCondition("skill_id=" . $skillId);
    $skillQuestionCriteria->addCondition("q.type=" . Question::$TYPE_MENTORSHIP_ASK);
    return SkillQuestion::model()->findAll($skillQuestionCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillQuestion the static model class
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
		return '{{skill_question}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skill_id, question_id', 'required'),
			array('skill_id, question_id, privacy, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, skill_id, question_id, privacy, status', 'safe', 'on'=>'search'),
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
			'skillAnswers' => array(self::HAS_MANY, 'SkillAnswer', 'skill_question_id'),
			'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
			'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
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
			'question_id' => 'Question',
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
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}