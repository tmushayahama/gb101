<?php

/**
 * This is the model class for table "{{question}}".
 *
 * The followings are the available columns in table '{{question}}':
 * @property integer $id
 * @property integer $questioner_id
 * @property string $question
 * @property string $description
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property MentorshipAnswer[] $mentorshipAnswers
 * @property User $questioner
 */
class Question extends CActiveRecord {

  public static $TYPE_FOR_MENTOR = 1;

  public static function getQuestions($type) {
    $questionCriteria = new CDbCriteria;
    $questionCriteria->addCondition("type=" . $type);
    return Question::model()->findAll($questionCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Question the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{question}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('question', 'required'),
     array('questioner_id, type, status', 'numerical', 'integerOnly' => true),
     array('question', 'length', 'max' => 200),
     array('description', 'length', 'max' => 1000),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, questioner_id, question, description, type, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'mentorshipAnswers' => array(self::HAS_MANY, 'MentorshipAnswer', 'question_id'),
     'questioner' => array(self::BELONGS_TO, 'User', 'questioner_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'questioner_id' => 'Questioner',
     'question' => 'Question',
     'description' => 'Description',
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
    $criteria->compare('questioner_id', $this->questioner_id);
    $criteria->compare('question', $this->question, true);
    $criteria->compare('description', $this->description, true);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
