<?php

/**
 * This is the model class for table "{{mentorship_answer}}".
 *
 * The followings are the available columns in table '{{mentorship_answer}}':
 * @property integer $id
 * @property integer $questionee_id
 * @property integer $mentorship_id
 * @property integer $mentorship_question_id
 * @property integer $goal_id
 * @property string $mentorship_answer
 * @property integer $level
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $questionee
 * @property Mentorship $mentorship
 * @property MentorshipQuestion $mentorshipQuestion
 * @property Goal $goal
 */
class MentorshipAnswer extends CActiveRecord {
  
  public static function deleteMentorshipAnswer($mentorshipAnswerId) {
    MentorshipAnswer::model()->deleteByPk($mentorshipAnswerId);
  }
  
  public static function getAnswers($mentorshipId, $questionId, $isMentor) {
    $mentorshipAnswerCriteria = new CDbCriteria;
    $mentorshipAnswerCriteria->alias = "mA";
    $mentorshipAnswerCriteria->addCondition("mA.mentorship_id=" . $mentorshipId);
    $mentorshipAnswerCriteria->with = array("mentorshipQuestion" => array("alias" => "mQ"));
    $mentorshipAnswerCriteria->addCondition("mQ.question_id=" . $questionId);
    return MentorshipAnswer::model()->findAll($mentorshipAnswerCriteria);
  }
  public static function getAnswersCount($mentorshipId, $questionId) {
    $mentorshipAnswerCriteria = new CDbCriteria;
    $mentorshipAnswerCriteria->alias = "mA";
    $mentorshipAnswerCriteria->addCondition("mA.mentorship_id=" . $mentorshipId);
    $mentorshipAnswerCriteria->with = array("mentorshipQuestion" => array("alias" => "mQ"));
    $mentorshipAnswerCriteria->addCondition("mQ.question_id=" . $questionId);
    return MentorshipAnswer::model()->count($mentorshipAnswerCriteria);
  }
  

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return MentorshipAnswer the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{mentorship_answer}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('mentorship_answer', 'required'),
     array('questionee_id, mentorship_id, mentorship_question_id, goal_id, level, status', 'numerical', 'integerOnly' => true),
     array('mentorship_answer', 'length', 'max' => 1000),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, questionee_id, mentorship_id, mentorship_question_id, goal_id, mentorship_answer, level, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'questionee' => array(self::BELONGS_TO, 'User', 'questionee_id'),
     'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
     'mentorshipQuestion' => array(self::BELONGS_TO, 'MentorshipQuestion', 'mentorship_question_id'),
     'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'questionee_id' => 'Questionee',
     'mentorship_id' => 'Mentorship',
     'mentorship_question_id' => 'Mentorship Question',
     'goal_id' => 'Goal',
     'mentorship_answer' => 'Mentorship Answer',
     'level' => 'Level',
     'status' => 'Status',
    );
  }

  /**
   * Retrieves a list of models based on the current search/filter conditions.
   * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
   */
  public function search() {
    // Warning: Please modify the following code to remove attributes that
    // should not be searched.

    $criteria = new CDbCriteria;

    $criteria->compare('id', $this->id);
    $criteria->compare('questionee_id', $this->questionee_id);
    $criteria->compare('mentorship_id', $this->mentorship_id);
    $criteria->compare('mentorship_question_id', $this->mentorship_question_id);
    $criteria->compare('goal_id', $this->goal_id);
    $criteria->compare('mentorship_answer', $this->mentorship_answer, true);
    $criteria->compare('level', $this->level);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
