<?php

/**
 * This is the model class for table "{{mentorship}}".
 *
 * The followings are the available columns in table '{{mentorship}}':
 * @property integer $id
 * @property integer $owner_id
 * @property integer $goal_id
 * @property string $title
 * @property string $description
 * @property integer $mentoring_level
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property User $owner
 * @property MentorshipEnrolled[] $mentorshipEnrolleds
 */
class Mentorship extends CActiveRecord {

  public static $OPTION_LEVEL = ["I am still learning this goal",
   "I am a beginner in mentoring",
   "I have mentored this goal before",
   "I am an expert in mentoring this goal"];
  public static $IS_OWNER = 1;
  public static $IS_ENROLLED = 2;
  public static $IS_NOT_ENROLLED = 3;

  public static function getOwnerMentorships($owner_id, $goalId = null) {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->addCondition("owner_id=" . $owner_id);
    if ($goalId != null) {
      $mentorshipCriteria->addCondition("goal_id=" . $goalId);
    }
    return Mentorship::model()->findAll($mentorshipCriteria);
  }

  public static function getGoalMentorshipCount($goalId) {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->addCondition("goal_id=" . $goalId);
    return Mentorship::model()->count($mentorshipCriteria);
  }

  public static function viewerPrivilege($mentorshipId, $viewerId) {
    $mentorship = Mentorship::model()->findByPk($mentorshipId);
//$mentorshipCriteria = new CDbCriteria();
    if ($mentorship->owner_id == Yii::app()->user->id) {
      return Mentorship::$IS_OWNER;
    } else {
      $mentorshipEnrollmentCriteria = new CDbCriteria();
      $mentorshipEnrollmentCriteria->addCondition("mentorship_id=" . $mentorshipId);
      $mentorshipEnrollmentCriteria->addCondition("mentorship_id=" . $mentorshipId);
      if (MentorshipEnrolled::model()->count($mentorshipEnrollmentCriteria) > 0) {
        return Mentorship::$IS_ENROLLED;
      }
    }
    return Mentorship::$IS_NOT_ENROLLED;
  }

  public static function getAllMentorshipList($keyword = null, $limit = null) {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->alias = "m";
    if ($keyword != null) {
      $mentorshipCriteria->compare("m.title", $keyword, true, "OR");
      $mentorshipCriteria->compare("m.description", $keyword, true, "OR");
    }
    if ($limit != null) {
      $mentorshipCriteria->limit = $limit;
    }
    return Mentorship::model()->findAll($mentorshipCriteria);
  }

  public static function getMentorshipEnrolledList() {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->with = array("mentorshipEnrolleds" => array("alias" => "mE"));
    $mentorshipCriteria->addCondition("mE.mentee_id=" . Yii::app()->user->id);
    return Mentorship::model()->findAll($mentorshipCriteria);
  }

  public static function getMentoringList($goalId = null) {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->addCondition("owner_id=" . Yii::app()->user->id);
    if ($goalId != null) {
      $mentorshipCriteria->addCondition("goal_id=" . $goalId);
    }
    return Mentorship::model()->findAll($mentorshipCriteria);
  }

  public static function getAllMentorshipListCount() {
    return Mentorship::model()->count();
  }

  public static function getOtherMentoringList($ownerId, $exceptMentorshipId) {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->addCondition("owner_id=" . $ownerId);
    $mentorshipCriteria->addCondition("NOT id=" . $exceptMentorshipId);
    return Mentorship::model()->findAll($mentorshipCriteria);
  }

  public static function getMentorshipEnrolledListCount() {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->with = array("mentorshipEnrolleds" => array("alias" => "mE"));
    $mentorshipCriteria->addCondition("mE.mentee_id=" . Yii::app()->user->id);
    return Mentorship::model()->count($mentorshipCriteria);
  }

  public static function getMentoringListCount() {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->addCondition("owner_id=" . Yii::app()->user->id);
    return Mentorship::model()->count($mentorshipCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Mentorship the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{mentorship}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
    return array(
     array('owner_id, goal_id, title', 'required'),
     array('owner_id, goal_id, mentoring_level, type, status', 'numerical', 'integerOnly' => true),
     array('title', 'length', 'max' => 200),
     array('description', 'length', 'max' => 1000),
     // The following rule is used by search().
// Please remove those attributes that should not be searched.
     array('id, owner_id, goal_id, title, description, mentoring_level, type, status', 'safe', 'on' => 'search'),
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
     'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
     'mentorshipEnrolleds' => array(self::HAS_MANY, 'MentorshipEnrolled', 'mentorship_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'owner_id' => 'Owner',
     'goal_id' => 'Goal',
     'title' => 'Title',
     'description' => 'Description',
     'mentoring_level' => 'Mentoring Level',
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
    $criteria->compare('owner_id', $this->owner_id);
    $criteria->compare('goal_id', $this->goal_id);
    $criteria->compare('title', $this->title, true);
    $criteria->compare('description', $this->description, true);
    $criteria->compare('mentoring_level', $this->mentoring_level);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
