<?php

/**
 * This is the model class for table "{{skill_question}}".
 *
 * The followings are the available columns in table '{{skill_question}}':
 * @property integer $id
 * @property integer $question_id
 * @property integer $skill_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property Question $question
 */
class SkillQuestion extends CActiveRecord {

  public static function getSkillParentQuestion($childQuestionId, $skillId) {
    $skillQuestionCriteria = new CDbCriteria;
    $skillQuestionCriteria->addCondition("question_id=" . $childQuestionId);
    $skillQuestionCriteria->addCondition("skill_id = " . $skillId);

    return SkillQuestion::Model()->find($skillQuestionCriteria);
  }

  public static function getSkillParentQuestions($skillId, $limit = null) {
    $skillQuestionCriteria = new CDbCriteria;
    if ($limit) {
      $skillQuestionCriteria->limit = $limit;
    }
    $skillQuestionCriteria->with = array("question" => array("alias" => 'td'));
    $skillQuestionCriteria->addCondition("td.parent_question_id is NULL");
    $skillQuestionCriteria->addCondition("skill_id = " . $skillId);
    $skillQuestionCriteria->order = "td.id desc";
    return SkillQuestion::Model()->findAll($skillQuestionCriteria);
  }

  public static function getSkillParentQuestionsCount($skillId) {
    $skillQuestionCriteria = new CDbCriteria;
    $skillQuestionCriteria->with = array("question" => array("alias" => 'td'));
    $skillQuestionCriteria->addCondition("td.parent_question_id is NULL");
    $skillQuestionCriteria->addCondition("skill_id = " . $skillId);
    return SkillQuestion::Model()->count($skillQuestionCriteria);
  }

  public static function getSkillChildrenQuestions($questionParentId, $skillId = null, $limit = null) {
    $skillQuestionCriteria = new CDbCriteria;
    if ($limit) {
      $skillQuestionCriteria->limit = $limit;
    }
    if ($skillId) {
      $skillQuestionCriteria->addCondition("skill_id=" . $skillId);
    }
    $skillQuestionCriteria->with = array("question" => array("alias" => 'td'));
    $skillQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
    $skillQuestionCriteria->order = "td.id desc";
    return SkillQuestion::Model()->findAll($skillQuestionCriteria);
  }

  public static function getSkillChildrenQuestionsCount($questionParentId, $limit = null) {
    $skillQuestionCriteria = new CDbCriteria;
    $skillQuestionCriteria->with = array("question" => array("alias" => 'td'));
    $skillQuestionCriteria->addCondition("td.parent_question_id=" . $questionParentId);
    return SkillQuestion::Model()->count($skillQuestionCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return SkillQuestion the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{skill_question}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('question_id, skill_id', 'required'),
     array('question_id, skill_id, privacy, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, question_id, skill_id, privacy, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
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
     'skill_id' => 'Skill',
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
    $criteria->compare('skill_id', $this->skill_id);
    $criteria->compare('privacy', $this->privacy);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
