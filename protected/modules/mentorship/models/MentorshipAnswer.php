<?php

/**
 * This is the model class for table "{{mentorship_answer}}".
 *
 * The followings are the available columns in table '{{mentorship_answer}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $question_answer_id
 * @property integer $mentorship_id
 * @property string $description
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property QuestionAnswerChoice $questionAnswer
 * @property Question $question
 */
class MentorshipAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MentorshipAnswer the static model class
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
		return '{{mentorship_answer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('question_id, question_answer_id, mentorship_id, description', 'required'),
			array('question_id, question_answer_id, mentorship_id, privacy, status', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, question_id, question_answer_id, mentorship_id, description, privacy, status', 'safe', 'on'=>'search'),
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
			'questionAnswer' => array(self::BELONGS_TO, 'QuestionAnswerChoice', 'question_answer_id'),
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
			'question_id' => 'Question',
			'question_answer_id' => 'Question Answer',
			'mentorship_id' => 'Mentorship',
			'description' => 'Description',
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
		$criteria->compare('question_id',$this->question_id);
		$criteria->compare('question_answer_id',$this->question_answer_id);
		$criteria->compare('mentorship_id',$this->mentorship_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}