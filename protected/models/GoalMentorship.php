<?php

/**
 * This is the model class for table "{{goal_mentorship}}".
 *
 * The followings are the available columns in table '{{goal_mentorship}}':
 * @property integer $id
 * @property integer $goal_commitment_id
 * @property integer $mentorship_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $mentorship
 * @property GoalCommitment $goalCommitment
 */
class GoalMentorship extends CActiveRecord {

  public $mentorshipsIdList;

  public static function getCanMentorshipList() {
    $goalCanMentorshipCriteria = new CDbCriteria;
    //$goalCanMentorshipCriteria->addCondition("goal_commitment_id=".Yii::app()->user->id);
    return Profile::Model()->findAll($goalCanMentorshipCriteria);
  }

  public static function getMentorships($goalCommitmentId) {
    $goalMentorshipCriteria = new CDbCriteria;
    $goalMentorshipCriteria->addCondition("goal_commitment_id=" . $goalCommitmentId);
    return GoalMentorship::Model()->findAll($goalMentorshipCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return GoalMentorship the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{goal_mentorship}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('goal_commitment_id, mentorship_id', 'required'),
     array('goal_commitment_id, mentorship_id, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, goal_commitment_id, mentorship_id, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'mentorship' => array(self::BELONGS_TO, 'User', 'mentorship_id'),
     'goalCommitment' => array(self::BELONGS_TO, 'GoalCommitment', 'goal_commitment_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'goal_commitment_id' => 'Goal Commitment',
     'mentorship_id' => 'Mentorship',
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
    $criteria->compare('goal_commitment_id', $this->goal_commitment_id);
    $criteria->compare('mentorship_id', $this->mentorship_id);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
