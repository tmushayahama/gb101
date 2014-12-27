<?php

/**
 * This is the model class for table "{{mentorship_question}}".
 *
 * The followings are the available columns in table '{{mentorship_question}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $mentorship_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Question $question
 */
class MentorshipQuestion extends CActiveRecord {

    public static function getMentorshipParentQuestion($childQuestionId, $mentorshipId) {
        $mentorshipQuestionCriteria = new CDbCriteria;
        $mentorshipQuestionCriteria->addCondition("question_id=" . $childQuestionId);
        $mentorshipQuestionCriteria->addCondition("mentorship_id = " . $mentorshipId);

        return MentorshipQuestion::Model()->find($mentorshipQuestionCriteria);
    }

    public static function getMentorshipParentQuestions($mentorshipId, $limit = null) {
        $mentorshipQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $mentorshipQuestionCriteria->limit = $limit;
        }
        $mentorshipQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $mentorshipQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $mentorshipQuestionCriteria->addCondition("mentorship_id = " . $mentorshipId);
        $mentorshipQuestionCriteria->order = "td.id desc";
        return MentorshipQuestion::Model()->findAll($mentorshipQuestionCriteria);
    }

    public static function getMentorshipParentQuestionsCount($mentorshipId) {
        $mentorshipQuestionCriteria = new CDbCriteria;
        $mentorshipQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $mentorshipQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $mentorshipQuestionCriteria->addCondition("mentorship_id = " . $mentorshipId);
        return MentorshipQuestion::Model()->count($mentorshipQuestionCriteria);
    }

    public static function getMentorshipChildrenQuestions($questionParentId, $mentorshipId = null, $limit = null) {
        $mentorshipQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $mentorshipQuestionCriteria->limit = $limit;
        }
        if ($mentorshipId) {
            $mentorshipQuestionCriteria->addCondition("mentorship_id=" . $mentorshipId);
        }
        $mentorshipQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $mentorshipQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        $mentorshipQuestionCriteria->order = "td.id desc";
        return MentorshipQuestion::Model()->findAll($mentorshipQuestionCriteria);
    }

    public static function getMentorshipChildrenQuestionsCount($questionParentId, $mentorshipId = null) {
        $mentorshipQuestionCriteria = new CDbCriteria;
        $mentorshipQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $mentorshipQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        if ($mentorshipId) {
            $mentorshipQuestionCriteria->addCondition("mentorship_id=" . $mentorshipId);
        }
        return MentorshipQuestion::Model()->count($mentorshipQuestionCriteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return MentorshipQuestion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{mentorship_question}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
          array('question_id, mentorship_id', 'required'),
          array('question_id, mentorship_id, privacy, status', 'numerical', 'integerOnly' => true),
          // The following rule is used by search().
          // Please remove those attributes that should not be searched.
          array('id, question_id, mentorship_id, privacy, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
          'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
          'question' => array(self::BELONGS_TO, 'Question', 'question_id'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
          'id' => 'ID',
          'question_id' => 'Question',
          'mentorship_id' => 'Mentorship',
          'privacy' => 'Privacy',
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
        $criteria->compare('question_id', $this->question_id);
        $criteria->compare('mentorship_id', $this->mentorship_id);
        $criteria->compare('privacy', $this->privacy);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
          'criteria' => $criteria,
        ));
    }

}
