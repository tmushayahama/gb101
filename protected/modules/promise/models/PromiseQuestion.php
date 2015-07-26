<?php

/**
 * This is the model class for table "{{promise_question}}".
 *
 * The followings are the available columns in table '{{promise_question}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $promise_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Question $question
 */
class PromiseQuestion extends CActiveRecord {

    public static function getPromiseParentQuestion($childQuestionId, $promiseId) {
        $promiseQuestionCriteria = new CDbCriteria;
        $promiseQuestionCriteria->addCondition("question_id=" . $childQuestionId);
        $promiseQuestionCriteria->addCondition("promise_id = " . $promiseId);

        return PromiseQuestion::Model()->find($promiseQuestionCriteria);
    }

    public static function getPromiseParentQuestions($promiseId, $limit = null) {
        $promiseQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $promiseQuestionCriteria->limit = $limit;
        }
        $promiseQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $promiseQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $promiseQuestionCriteria->addCondition("promise_id = " . $promiseId);
        $promiseQuestionCriteria->order = "td.id desc";
        return PromiseQuestion::Model()->findAll($promiseQuestionCriteria);
    }

    public static function getPromiseParentQuestionsCount($promiseId) {
        $promiseQuestionCriteria = new CDbCriteria;
        $promiseQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $promiseQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $promiseQuestionCriteria->addCondition("promise_id = " . $promiseId);
        return PromiseQuestion::Model()->count($promiseQuestionCriteria);
    }

    public static function getPromiseChildrenQuestions($questionParentId, $promiseId = null, $limit = null) {
        $promiseQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $promiseQuestionCriteria->limit = $limit;
        }
        if ($promiseId) {
            $promiseQuestionCriteria->addCondition("promise_id=" . $promiseId);
        }
        $promiseQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $promiseQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        $promiseQuestionCriteria->order = "td.id desc";
        return PromiseQuestion::Model()->findAll($promiseQuestionCriteria);
    }

    public static function getPromiseChildrenQuestionsCount($questionParentId, $promiseId = null) {
        $promiseQuestionCriteria = new CDbCriteria;
        $promiseQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $promiseQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        if ($promiseId) {
            $promiseQuestionCriteria->addCondition("promise_id=" . $promiseId);
        }
        return PromiseQuestion::Model()->count($promiseQuestionCriteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return PromiseQuestion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{promise_question}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
          array('question_id, promise_id', 'required'),
          array('question_id, promise_id, privacy, status', 'numerical', 'integerOnly' => true),
          // The following rule is used by search().
          // Please remove those attributes that should not be searched.
          array('id, question_id, promise_id, privacy, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
          'promise' => array(self::BELONGS_TO, 'Promise', 'promise_id'),
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
          'promise_id' => 'Promise',
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
        $criteria->compare('promise_id', $this->promise_id);
        $criteria->compare('privacy', $this->privacy);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
          'criteria' => $criteria,
        ));
    }

}
