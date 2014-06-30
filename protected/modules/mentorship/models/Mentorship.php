<?php

/**
 * This is the model class for table "{{mentorship}}".
 *
 * The followings are the available columns in table '{{mentorship}}':
 * @property integer $id
 * @property integer $owner_id
 * @property integer $mentor_id
 * @property integer $mentee_id
 * @property integer $goal_list_id
 * @property string $title
 * @property string $description
 * @property integer $level_id
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property GoalList $goalList
 * @property User $owner
 * @property Level $level
 * @property User $mentor
 * @property User $mentee
 * @property MentorshipAnnouncement[] $mentorshipAnnouncements
 * @property MentorshipAnswer[] $mentorshipAnswers
 * @property MentorshipDiscussionTitle[] $mentorshipDiscussionTitles
 * @property MentorshipQuestion[] $mentorshipQuestions
 * @property MentorshipTimeline[] $mentorshipTimelines
 * @property MentorshipTodo[] $mentorshipTodos
 * @property MentorshipWebLink[] $mentorshipWebLinks
 */
class Mentorship extends CActiveRecord {

  public static $IS_OWNER = 1;
  public static $IS_ENROLLED = 2;
  public static $IS_NOT_ENROLLED = 3;
  public static $TYPE_MENTOR = 1;
  public static $TYPE_MENTORSHIP_REQUEST = 2;
  public static $NOT_REQUESTED = -1;
  public static $PENDING_REQUEST_MENTOR = 1;
  public static $PENDING_REQUEST_MENTEE = 2;
  public static $ENROLLED_MENTOR = 3;
  public static $ENROLLED_MENTEE = 4;
  public static $BANNED_FROM_REQUEST = 5;
  public $goal_title;
  public $person_chosen_id; //nothing selected

  
  public static function getEnrollStatus($mentorship) {
    return $mentorship->status;
  }
  public static function getOwnerMentorships($owner_id) {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->addCondition("owner_id=" . $owner_id);
    return Mentorship::model()->findAll($mentorshipCriteria);
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

  public static function getMentoringList() {
    $mentorshipCriteria = new CDbCriteria();
    $mentorshipCriteria->addCondition("owner_id=" . Yii::app()->user->id);
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

  /** @requires that oal_title is not null
   * 
   */
  public function setMentorshipGoalList() {
    $skill = new Goal();
    $skill->title = $this->goal_title;
    $skill->description = "";
    if ($skill->save(false)) {
      $skillList = new GoalList();
      $skillList->user_id = Yii::app()->user->id;
      $skillList->goal_id = $skill->id;
      $skillList->level_id = Level::$LEVEL_SKILL_OTHER;
      $skillList->type_id = 1;
      if ($skillList->save(false)) {
        $this->goal_list_id = $skillList->id;
      }
    }
  }

  public function setRequestMentorship() {
    switch ($this->type) {
      case self::$TYPE_MENTOR;
        $this->mentor_id = Yii::app()->user->id;
        $this->mentee_id = $this->person_chosen_id;
        $this->status = Mentorship::$PENDING_REQUEST_MENTOR;
        break;
      case self::$TYPE_MENTORSHIP_REQUEST;
        $this->mentor_id = $this->person_chosen_id;
        $this->mentee_id = Yii::app()->user->id;
        $this->status = Mentorship::$PENDING_REQUEST_MENTEE;
        break;
    }
    $this->save(false);
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
     array('type, goal_title, title, description, level_id', 'required'),
     array('owner_id, mentor_id, mentee_id, goal_list_id, level_id, type, status', 'numerical', 'integerOnly' => true),
     array('title', 'length', 'max' => 200),
     array('description', 'length', 'max' => 1000),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, owner_id, mentor_id, mentee_id, goal_list_id, title, description, level_id, type, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'goalList' => array(self::BELONGS_TO, 'GoalList', 'goal_list_id'),
     'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
     'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
     'mentor' => array(self::BELONGS_TO, 'User', 'mentor_id'),
     'mentee' => array(self::BELONGS_TO, 'User', 'mentee_id'),
     'mentorshipAnnouncements' => array(self::HAS_MANY, 'MentorshipAnnouncement', 'mentorship_id'),
     'mentorshipAnswers' => array(self::HAS_MANY, 'MentorshipAnswer', 'mentorship_id'),
     'mentorshipDiscussionTitles' => array(self::HAS_MANY, 'MentorshipDiscussionTitle', 'mentorship_id'),
     'mentorshipQuestions' => array(self::HAS_MANY, 'MentorshipQuestion', 'mentorship_id'),
     'mentorshipTimelines' => array(self::HAS_MANY, 'MentorshipTimeline', 'mentorship_id'),
     'mentorshipTodos' => array(self::HAS_MANY, 'MentorshipTodo', 'mentorship_id'),
     'mentorshipWebLinks' => array(self::HAS_MANY, 'MentorshipWebLink', 'mentorship_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'owner_id' => 'Owner',
     'mentor_id' => 'Mentor',
     'mentee_id' => 'Mentee',
     'goal_list_id' => 'Goal List',
     'title' => 'Title',
     'description' => 'Description',
     'level_id' => 'Level',
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
    $criteria->compare('mentor_id', $this->mentor_id);
    $criteria->compare('mentee_id', $this->mentee_id);
    $criteria->compare('goal_list_id', $this->goal_list_id);
    $criteria->compare('title', $this->title, true);
    $criteria->compare('description', $this->description, true);
    $criteria->compare('level_id', $this->level_id);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
