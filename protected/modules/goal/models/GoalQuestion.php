<?php

/**
 * This is the model class for table "{{goal_question}}".
 *
 * The followings are the available columns in table '{{goal_question}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $goal_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property Question $question
 */
class GoalQuestion extends CActiveRecord {

    public static function getGoalParentQuestion($childQuestionId, $goalId) {
        $goalQuestionCriteria = new CDbCriteria;
        $goalQuestionCriteria->addCondition("question_id=" . $childQuestionId);
        $goalQuestionCriteria->addCondition("goal_id = " . $goalId);

        return GoalQuestion::Model()->find($goalQuestionCriteria);
    }

    public static function getGoalParentQuestions($goalId, $limit = null) {
        $goalQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $goalQuestionCriteria->limit = $limit;
        }
        $goalQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $goalQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $goalQuestionCriteria->addCondition("goal_id = " . $goalId);
        $goalQuestionCriteria->order = "td.id desc";
        return GoalQuestion::Model()->findAll($goalQuestionCriteria);
    }

    public static function getGoalParentQuestionsCount($goalId) {
        $goalQuestionCriteria = new CDbCriteria;
        $goalQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $goalQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $goalQuestionCriteria->addCondition("goal_id = " . $goalId);
        return GoalQuestion::Model()->count($goalQuestionCriteria);
    }

    public static function getGoalChildrenQuestions($questionParentId, $goalId = null, $limit = null) {
        $goalQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $goalQuestionCriteria->limit = $limit;
        }
        if ($goalId) {
            $goalQuestionCriteria->addCondition("goal_id=" . $goalId);
        }
        $goalQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $goalQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        $goalQuestionCriteria->order = "td.id desc";
        return GoalQuestion::Model()->findAll($goalQuestionCriteria);
    }

    public static function getGoalChildrenQuestionsCount($questionParentId, $goalId = null) {
        $goalQuestionCriteria = new CDbCriteria;
        $goalQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $goalQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        if ($goalId) {
            $goalQuestionCriteria->addCondition("goal_id=" . $goalId);
        }
        return GoalQuestion::Model()->count($goalQuestionCriteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return GoalQuestion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{goal_question}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
          array('question_id, goal_id', 'required'),
          array('question_id, goal_id, privacy, status', 'numerical', 'integerOnly' => true),
          // The following rule is used by search().
          // Please remove those attributes that should not be searched.
          array('id, question_id, goal_id, privacy, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
          'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
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
          'goal_id' => 'Goal',
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
        $criteria->compare('goal_id', $this->goal_id);
        $criteria->compare('privacy', $this->privacy);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
          'criteria' => $criteria,
        ));
    }

}
