<?php

/**
 * This is the model class for table "{{goal}}".
 *
 * The followings are the available columns in table '{{goal}}':
 * @property integer $id
 * @property integer $parent_goal_id
 * @property integer $creator_id
 * @property integer $type_id
 * @property string $title
 * @property string $description
 * @property string $created_date
 * @property integer $level_id
 * @property integer $bank_id
 * @property integer $privacy
 * @property integer $order
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property AdvicePage[] $advicePages
 * @property AdvicePageGoal[] $advicePageGoals
 * @property Goal[] $goals
 * @property Hobby[] $hobbies
 * @property Journal[] $journals
 * @property Mentorship[] $mentorships
 * @property ProjectMentorship[] $projectMentorships
 * @property ProjectGoal[] $projectGoals
 * @property Promise[] $promises
 * @property Goal $parentGoal
 * @property Goal[] $goals
 * @property Level $level
 * @property Bank $bank
 * @property GoalType $type
 * @property User $creator
 * @property GoalComment[] $goalComments
 * @property GoalContributor[] $goalContributors
 * @property GoalDiscussion[] $goalDiscussions
 * @property GoalNote[] $goalNotes
 * @property GoalQuestion[] $goalQuestions
 * @property GoalTag[] $goalTags
 * @property GoalTimeline[] $goalTimelines
 * @property GoalTodo[] $goalTodos
 * @property GoalWeblink[] $goalWeblinks
 */
class Goal extends CActiveRecord {

 public static $GOALS_PER_PAGE = 30;
 public static $GOALS_PER_PREVIEW_PAGE = 10;
//SType
 public static $TYPE_GOAL = 1;
 public static $TYPE_PROMISE = 2;
 public static $SOURCE_GOAL = 1;
 public static $SOURCE_ADVICE_PAGE = 2;
//These are the types of displays for the post
 public static $GOAL_OWNER_GAINED = 1;
 public static $GOAL_OWNER_TO_IMPROVE = 2;
 public static $GOAL_OWNER_TO_LEARN = 3;
 public static $GOAL_OWNER_OF_INTEREST = 4;
 public static $GOAL_IS_FRIEND_GAINED = 5;
 public static $GOAL_IS_FRIEND_TO_IMPROVE = 6;
 public static $GOAL_IS_FRIEND_TO_LEARN = 7;
 public static $GOAL_IS_FRIEND_OF_INTEREST = 8;

 public static function deleteGoal($goalId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_GOAL);
  $postsCriteria->addCondition("source_id=" . $goalId);
  Post::model()->deleteAll($postsCriteria);
  Goal::model()->deleteByPk($goalId);
 }

 public static function getGoals($levelId = null, $limit = null, $offset = null) {
  $goalCriteria = new CDbCriteria;
  if ($levelId || $levelId != 0) {
   $goalCriteria->addCondition("level_id=" . $levelId);
  }
  if ($limit) {
   $goalCriteria->limit = $limit;
  }
  if ($offset) {
   $goalCriteria->offset = $offset;
  }
  $goalCriteria->alias = 's';
  $goalCriteria->order = "s.id desc";
  return Goal::Model()->findAll($goalCriteria);
 }

 public static function getGoalsCount($levelId = null, $offset = null) {
  $goalCriteria = new CDbCriteria;
  if ($levelId) {
   $goalCriteria->addCondition("level_id=" . $levelId);
  }
  if ($offset) {
   $goalCriteria->offset = $offset;
  }
  return Goal::Model()->count($goalCriteria);
 }

 /**
  * This is the function to get the preview to display according to
  * one's goal level and privilege
  * @param type $goal the goal list entry
  */
 public static function getGoalViewType($goal) {
  switch ($goal->level->code) {
   case Level::$LEVEL_GOAL_GAINED:
    if ($goal->creator_id == Yii::app()->user->id) {
     return Goal::$GOAL_OWNER_GAINED;
    } else {
     return Goal::$GOAL_IS_FRIEND_GAINED;
    }
    break;
   case Level::$LEVEL_GOAL_TO_IMPROVE:
    if ($goal->creator_id == Yii::app()->user->id) {
     return Goal::$GOAL_OWNER_TO_IMPROVE;
    } else {
     return Goal::$GOAL_IS_FRIEND_TO_IMPROVE;
    }
    break;
   case Level::$LEVEL_GOAL_TO_LEARN:
    if ($goal->creator_id == Yii::app()->user->id) {
     return Goal::$GOAL_OWNER_TO_LEARN;
    } else {
     return Goal::$GOAL_IS_FRIEND_TO_LEARN;
    }
    break;
  }
 }

 public static function getGoal($levelCategory = null, $creatorId = null, $connectionId = null, $levelIds = null, $limit = null) {
  $goalCriteria = new CDbCriteria;
  $goalCriteria->alias = "gList";
  $goalCriteria->with = array("level" => array("alias" => 'level'));
  if ($creatorId != null) {
   //$goalCriteria->addCondition("creator_id=" . $creatorId);
  }
  if ($levelCategory != null) {
   //$goalCriteria->addCondition("level.category=" . $levelCategory);
  }
  if ($levelIds != null) {
   $levelIdArray = [];
   foreach ($levelIds as $levelId) {
    array_push($levelIdArray, $levelId);
   }
   //$goalCriteria->addInCondition("level_id", $levelIdArray);
  }
  $goalCriteria->order = "gList.id desc";
  if ($connectionId != null) {
//$goalCriteria->addCondition("connection_id=" . $connectionId);
  }
  if ($limit != null) {
   $goalCriteria->limit = $limit;
  }
  return Goal::Model()->findAll($goalCriteria);
 }

 public static function getGoalCount($levelCategory, $levelId, $creatorId) {
  $goalCriteria = new CDbCriteria;
  $goalCriteria->with = array("level" => array("alias" => 'level'));
  $goalCriteria->addCondition("level.category=" . $levelCategory);
  if ($levelId) {
   $goalCriteria->addCondition("level_id=" . $levelId);
  }
  if ($creatorId) {
   $goalCriteria->addCondition("creator_id=" . $creatorId);
  }
  return Goal::Model()->count($goalCriteria);
 }

 public function getGoalParentComments($limit = null) {
  return GoalComment::getGoalParentComments($this->id, $limit);
 }

 public function getGoalParentCommentsCount() {
  return GoalComment::getGoalParentCommentsCount($this->id);
 }

 public function getGoalParentContributors($limit = null) {
  return GoalContributor::getGoalParentContributors($this->id, $limit);
 }

 public function getGoalParentContributorsCount() {
  return GoalContributor::getGoalParentContributorsCount($this->id);
 }

 public function getGoalParentTodos($limit = null) {
  return GoalTodo::getGoalParentTodos($this->id, $limit);
 }

 public function getGoalParentTodosCount() {
  return GoalTodo::getGoalParentTodosCount($this->id);
 }

 public function getGoalParentNotes($limit = null) {
  return GoalNote::getGoalParentNotes($this->id, $limit);
 }

 public function getGoalParentNotesCount() {
  return GoalNote::getGoalParentNotesCount($this->id);
 }

 public function getGoalParentDiscussions($limit = null) {
  return GoalDiscussion::getGoalParentDiscussions($this->id, $limit);
 }

 public function getGoalParentDiscussionsCount() {
  return GoalDiscussion::getGoalParentDiscussionsCount($this->id);
 }

 public function getGoalParentQuestionnaires($limit = null) {
  return GoalQuestionnaire::getGoalParentQuestionnaires($this->id, $limit);
 }

 public function getGoalParentQuestionnairesCount() {
  return GoalQuestionnaire::getGoalParentQuestionnairesCount($this->id);
 }

 public function getGoalParentWeblinks($limit = null) {
  return GoalWeblink::getGoalParentWeblinks($this->id, $limit);
 }

 public function getGoalParentWeblinksCount() {
  return GoalWeblink::getGoalParentWeblinksCount($this->id);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Goal the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{goal}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('title, level_id', 'required'),
    array('parent_goal_id, creator_id, type_id, level_id, bank_id, privacy, order, status', 'numerical', 'integerOnly' => true),
    array('title', 'length', 'max' => 100),
    array('description', 'length', 'max' => 500),
    array('created_date', 'safe'),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_goal_id, creator_id, type_id, title, description, created_date, level_id, bank_id, privacy, order, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'goal_id'),
    'advicePageGoals' => array(self::HAS_MANY, 'AdvicePageGoal', 'goal_id'),
    'goals' => array(self::HAS_MANY, 'Goal', 'goal_id'),
    'hobbies' => array(self::HAS_MANY, 'Hobby', 'goal_id'),
    'journals' => array(self::HAS_MANY, 'Journal', 'goal_id'),
    'mentorships' => array(self::HAS_MANY, 'Mentorship', 'goal_id'),
    'projectMentorships' => array(self::HAS_MANY, 'ProjectMentorship', 'mentorship_id'),
    'projectGoals' => array(self::HAS_MANY, 'ProjectGoal', 'goal_id'),
    'promises' => array(self::HAS_MANY, 'Promise', 'goal_id'),
    'parentGoal' => array(self::BELONGS_TO, 'Goal', 'parent_goal_id'),
    'goals' => array(self::HAS_MANY, 'Goal', 'parent_goal_id'),
    'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
    'bank' => array(self::BELONGS_TO, 'Bank', 'bank_id'),
    'type' => array(self::BELONGS_TO, 'GoalType', 'type_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'goalComments' => array(self::HAS_MANY, 'GoalComment', 'goal_id'),
    'goalContributors' => array(self::HAS_MANY, 'GoalContributor', 'goal_id'),
    'goalDiscussions' => array(self::HAS_MANY, 'GoalDiscussion', 'goal_id'),
    'goalNotes' => array(self::HAS_MANY, 'GoalNote', 'goal_id'),
    'goalQuestions' => array(self::HAS_MANY, 'GoalQuestion', 'goal_id'),
    'goalTags' => array(self::HAS_MANY, 'GoalTag', 'goal_id'),
    'goalTimelines' => array(self::HAS_MANY, 'GoalTimeline', 'goal_id'),
    'goalTodos' => array(self::HAS_MANY, 'GoalTodo', 'goal_id'),
    'goalWeblinks' => array(self::HAS_MANY, 'GoalWeblink', 'goal_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_goal_id' => 'Parent Goal',
    'creator_id' => 'Creator',
    'type_id' => 'Type',
    'title' => 'Title',
    'description' => 'Description',
    'created_date' => 'Created Date',
    'level_id' => 'Level',
    'bank_id' => 'Bank',
    'privacy' => 'Privacy',
    'order' => 'Order',
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
  $criteria->compare('parent_goal_id', $this->parent_goal_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('type_id', $this->type_id);
  $criteria->compare('title', $this->title, true);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('level_id', $this->level_id);
  $criteria->compare('bank_id', $this->bank_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('order', $this->order);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
