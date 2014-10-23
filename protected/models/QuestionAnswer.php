<?php

/**
 * This is the model class for table "{{question_answer}}".
 *
 * The followings are the available columns in table '{{question_answer}}':
 * @property integer $id
 * @property integer $parent_question_answer_id
 * @property string $title
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property QuestionAnswer $parentQuestionAnswer
 * @property QuestionAnswer[] $questionAnswers
 * @property SkillQuestionAnswer[] $skillQuestionAnswers
 */
class QuestionAnswer extends CActiveRecord {

  public static $STATUS_GENERAL = 0;
  public static $STATUS_QUESTIONNAIRE = 1;
  public static $TYPE_FOR_MENTOR = 1;
  public static $TYPE_FOR_MENTEE = 2;
  public static $TYPE_MENTORSHIP_ASK = 3;
  public static $TYPE_FOR_QUESTIONNAIRE_MENTOR = 4;
  public static $TYPE_FOR_QUESTIONNAIRE_MENTEE = 5;

  public static function getQuestions($type) {
    $questionCriteria = new CDbCriteria();
    $questionCriteria->addCondition("parent_question_answer_id IS NULL");
    $questionCriteria->addCondition("type=" . $type);
    return QuestionAnswer::model()->findAll($questionCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return QuestionAnswer the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{question_answer}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('description', 'required'),
     array('parent_question_answer_id, creator_id, type, status', 'numerical', 'integerOnly' => true),
     array('title', 'length', 'max' => 150),
     array('description', 'length', 'max' => 1000),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, parent_question_answer_id, title, creator_id, description, created_date, type, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
     'parentQuestionAnswer' => array(self::BELONGS_TO, 'QuestionAnswer', 'parent_question_answer_id'),
     'questionAnswers' => array(self::HAS_MANY, 'QuestionAnswer', 'parent_question_answer_id'),
     'skillQuestionAnswers' => array(self::HAS_MANY, 'SkillQuestionAnswer', 'question_answer_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'parent_question_answer_id' => 'Parent Question Answer',
     'title' => 'Title',
     'creator_id' => 'Creator',
     'description' => 'Description',
     'created_date' => 'Created Date',
     'type' => 'Type',
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
    $criteria->compare('parent_question_answer_id', $this->parent_question_answer_id);
    $criteria->compare('title', $this->title, true);
    $criteria->compare('creator_id', $this->creator_id);
    $criteria->compare('description', $this->description, true);
    $criteria->compare('created_date', $this->created_date, true);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
