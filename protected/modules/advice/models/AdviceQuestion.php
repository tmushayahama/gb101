<?php

/**
 * This is the model class for table "{{advice_question}}".
 *
 * The followings are the available columns in table '{{advice_question}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Question $question
 */
class AdviceQuestion extends CActiveRecord {

    public static function getAdviceParentQuestion($childQuestionId, $adviceId) {
        $adviceQuestionCriteria = new CDbCriteria;
        $adviceQuestionCriteria->addCondition("question_id=" . $childQuestionId);
        $adviceQuestionCriteria->addCondition("advice_id = " . $adviceId);

        return AdviceQuestion::Model()->find($adviceQuestionCriteria);
    }

    public static function getAdviceParentQuestions($adviceId, $limit = null) {
        $adviceQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $adviceQuestionCriteria->limit = $limit;
        }
        $adviceQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $adviceQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $adviceQuestionCriteria->addCondition("advice_id = " . $adviceId);
        $adviceQuestionCriteria->order = "td.id desc";
        return AdviceQuestion::Model()->findAll($adviceQuestionCriteria);
    }

    public static function getAdviceParentQuestionsCount($adviceId) {
        $adviceQuestionCriteria = new CDbCriteria;
        $adviceQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $adviceQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $adviceQuestionCriteria->addCondition("advice_id = " . $adviceId);
        return AdviceQuestion::Model()->count($adviceQuestionCriteria);
    }

    public static function getAdviceChildrenQuestions($questionParentId, $adviceId = null, $limit = null) {
        $adviceQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $adviceQuestionCriteria->limit = $limit;
        }
        if ($adviceId) {
            $adviceQuestionCriteria->addCondition("advice_id=" . $adviceId);
        }
        $adviceQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $adviceQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        $adviceQuestionCriteria->order = "td.id desc";
        return AdviceQuestion::Model()->findAll($adviceQuestionCriteria);
    }

    public static function getAdviceChildrenQuestionsCount($questionParentId, $adviceId = null) {
        $adviceQuestionCriteria = new CDbCriteria;
        $adviceQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $adviceQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        if ($adviceId) {
            $adviceQuestionCriteria->addCondition("advice_id=" . $adviceId);
        }
        return AdviceQuestion::Model()->count($adviceQuestionCriteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return AdviceQuestion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{advice_question}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
          array('question_id, advice_id', 'required'),
          array('question_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
          // The following rule is used by search().
          // Please remove those attributes that should not be searched.
          array('id, question_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
          'advice' => array(self::BELONGS_TO, 'Advice', 'advice_id'),
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
          'advice_id' => 'Advice',
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
        $criteria->compare('advice_id', $this->advice_id);
        $criteria->compare('privacy', $this->privacy);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
          'criteria' => $criteria,
        ));
    }

}
