<?php

/**
 * This is the model class for table "{{hobby_question}}".
 *
 * The followings are the available columns in table '{{hobby_question}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Question $question
 */
class HobbyQuestion extends CActiveRecord {

    public static function getHobbyParentQuestion($childQuestionId, $hobbyId) {
        $hobbyQuestionCriteria = new CDbCriteria;
        $hobbyQuestionCriteria->addCondition("question_id=" . $childQuestionId);
        $hobbyQuestionCriteria->addCondition("hobby_id = " . $hobbyId);

        return HobbyQuestion::Model()->find($hobbyQuestionCriteria);
    }

    public static function getHobbyParentQuestions($hobbyId, $limit = null) {
        $hobbyQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $hobbyQuestionCriteria->limit = $limit;
        }
        $hobbyQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $hobbyQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $hobbyQuestionCriteria->addCondition("hobby_id = " . $hobbyId);
        $hobbyQuestionCriteria->order = "td.id desc";
        return HobbyQuestion::Model()->findAll($hobbyQuestionCriteria);
    }

    public static function getHobbyParentQuestionsCount($hobbyId) {
        $hobbyQuestionCriteria = new CDbCriteria;
        $hobbyQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $hobbyQuestionCriteria->addCondition("td.parent_question_id is NULL");
        $hobbyQuestionCriteria->addCondition("hobby_id = " . $hobbyId);
        return HobbyQuestion::Model()->count($hobbyQuestionCriteria);
    }

    public static function getHobbyChildrenQuestions($questionParentId, $hobbyId = null, $limit = null) {
        $hobbyQuestionCriteria = new CDbCriteria;
        if ($limit) {
            $hobbyQuestionCriteria->limit = $limit;
        }
        if ($hobbyId) {
            $hobbyQuestionCriteria->addCondition("hobby_id=" . $hobbyId);
        }
        $hobbyQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $hobbyQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        $hobbyQuestionCriteria->order = "td.id desc";
        return HobbyQuestion::Model()->findAll($hobbyQuestionCriteria);
    }

    public static function getHobbyChildrenQuestionsCount($questionParentId, $hobbyId = null) {
        $hobbyQuestionCriteria = new CDbCriteria;
        $hobbyQuestionCriteria->with = array("question" => array("alias" => 'td'));
        $hobbyQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
        if ($hobbyId) {
            $hobbyQuestionCriteria->addCondition("hobby_id=" . $hobbyId);
        }
        return HobbyQuestion::Model()->count($hobbyQuestionCriteria);
    }

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return HobbyQuestion the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{hobby_question}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
          array('question_id, hobby_id', 'required'),
          array('question_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
          // The following rule is used by search().
          // Please remove those attributes that should not be searched.
          array('id, question_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
          'hobby' => array(self::BELONGS_TO, 'Hobby', 'hobby_id'),
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
          'hobby_id' => 'Hobby',
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
        $criteria->compare('hobby_id', $this->hobby_id);
        $criteria->compare('privacy', $this->privacy);
        $criteria->compare('status', $this->status);

        return new CActiveDataProvider($this, array(
          'criteria' => $criteria,
        ));
    }

}
