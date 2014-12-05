<?php

/**
 * This is the model class for table "{{skill}}".
 *
 * The followings are the available columns in table '{{skill}}':
 * @property integer $id
 * @property integer $parent_skill_id
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
 * @property AdvicePageSkill[] $advicePageSkills
 * @property Goal[] $goals
 * @property Hobby[] $hobbies
 * @property Journal[] $journals
 * @property Mentorship[] $mentorships
 * @property ProjectMentorship[] $projectMentorships
 * @property ProjectSkill[] $projectSkills
 * @property Promise[] $promises
 * @property Skill $parentSkill
 * @property Skill[] $skills
 * @property Level $level
 * @property Bank $bank
 * @property SkillType $type
 * @property User $creator
 * @property SkillAnnouncement[] $skillAnnouncements
 * @property SkillComment[] $skillComments
 * @property SkillContributor[] $skillContributors
 * @property SkillDiscussion[] $skillDiscussions
 * @property SkillNote[] $skillNotes
 * @property SkillQuestion[] $skillQuestions
 * @property SkillTag[] $skillTags
 * @property SkillTimeline[] $skillTimelines
 * @property SkillTodo[] $skillTodos
 * @property SkillWeblink[] $skillWeblinks
 */
class Skill extends CActiveRecord {

 public static $TYPE_SKILL = 1;
 public static $TYPE_PROMISE = 2;
 public static $TYPE_GOAL = 3;
 public static $SOURCE_SKILL = 1;
 public static $SOURCE_ADVICE_PAGE = 2;
//These are the types of displays for the post
 public static $SKILL_OWNER_GAINED = 1;
 public static $SKILL_OWNER_TO_IMPROVE = 2;
 public static $SKILL_OWNER_TO_LEARN = 3;
 public static $SKILL_OWNER_OF_INTEREST = 4;
 public static $SKILL_IS_FRIEND_GAINED = 5;
 public static $SKILL_IS_FRIEND_TO_IMPROVE = 6;
 public static $SKILL_IS_FRIEND_TO_LEARN = 7;
 public static $SKILL_IS_FRIEND_OF_INTEREST = 8;

 public static function deleteSkill($skillId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_SKILL);
  $postsCriteria->addCondition("source_id=" . $skillId);
  Post::model()->deleteAll($postsCriteria);
  Skill::model()->deleteByPk($skillId);
 }

 /**
  * This is the function to get the preview to display according to
  * one's skill level and privilege
  * @param type $skill the skill list entry
  */
 public static function getSkillViewType($skill) {
  switch ($skill->level->code) {
   case Level::$LEVEL_SKILL_GAINED:
    if ($skill->creator_id == Yii::app()->user->id) {
     return Skill::$SKILL_OWNER_GAINED;
    } else {
     return Skill::$SKILL_IS_FRIEND_GAINED;
    }
    break;
   case Level::$LEVEL_SKILL_TO_IMPROVE:
    if ($skill->creator_id == Yii::app()->user->id) {
     return Skill::$SKILL_OWNER_TO_IMPROVE;
    } else {
     return Skill::$SKILL_IS_FRIEND_TO_IMPROVE;
    }
    break;
   case Level::$LEVEL_SKILL_TO_LEARN:
    if ($skill->creator_id == Yii::app()->user->id) {
     return Skill::$SKILL_OWNER_TO_LEARN;
    } else {
     return Skill::$SKILL_IS_FRIEND_TO_LEARN;
    }
    break;
   case Level::$LEVEL_SKILL_OF_INTEREST:
   case Level::$LEVEL_SKILL_OTHER:
    if ($skill->creator_id == Yii::app()->user->id) {
     return Skill::$SKILL_OWNER_OF_INTEREST;
    } else {
     return Skill::$SKILL_IS_FRIEND_OF_INTEREST;
    }
    break;
  }
 }

 public static function getSkill($levelCategory = null, $creatorId = null, $connectionId = null, $levelIds = null, $limit = null) {
  $skillCriteria = new CDbCriteria;
  $skillCriteria->alias = "gList";
  $skillCriteria->with = array("level" => array("alias" => 'level'));
  if ($creatorId != null) {
   //$skillCriteria->addCondition("creator_id=" . $creatorId);
  }
  if ($levelCategory != null) {
   //$skillCriteria->addCondition("level.category=" . $levelCategory);
  }
  if ($levelIds != null) {
   $levelIdArray = [];
   foreach ($levelIds as $levelId) {
    array_push($levelIdArray, $levelId);
   }
   //$skillCriteria->addInCondition("level_id", $levelIdArray);
  }
  $skillCriteria->order = "gList.id desc";
  if ($connectionId != null) {
//$skillCriteria->addCondition("connection_id=" . $connectionId);
  }
  if ($limit != null) {
   $skillCriteria->limit = $limit;
  }
  return Skill::Model()->findAll($skillCriteria);
 }

 public static function getSkillCount($levelCategory, $levelId, $creatorId) {
  $skillCriteria = new CDbCriteria;
  $skillCriteria->with = array("level" => array("alias" => 'level'));
  $skillCriteria->addCondition("level.category=" . $levelCategory);
  if ($levelId) {
   $skillCriteria->addCondition("level_id=" . $levelId);
  }
  if ($creatorId) {
   $skillCriteria->addCondition("creator_id=" . $creatorId);
  }
  return Skill::Model()->count($skillCriteria);
 }

 public function getSkillParentComments($limit = null) {
  return SkillComment::getSkillParentComments($this->id, $limit);
 }

 public function getSkillParentCommentsCount() {
  return SkillComment::getSkillParentCommentsCount($this->id);
 }

 public function getSkillParentTodos($limit = null) {
  return SkillTodo::getSkillParentTodos($this->id, $limit);
 }

 public function getSkillParentTodosCount() {
  return SkillTodo::getSkillParentTodosCount($this->id);
 }

 public function getSkillParentNotes($limit = null) {
  return SkillNote::getSkillParentNotes($this->id, $limit);
 }

 public function getSkillParentNotesCount() {
  return SkillNote::getSkillParentNotesCount($this->id);
 }

 public function getSkillParentDiscussions($limit = null) {
  return SkillDiscussion::getSkillParentDiscussions($this->id, $limit);
 }

 public function getSkillParentDiscussionsCount() {
  return SkillDiscussion::getSkillParentDiscussionsCount($this->id);
 }

 public function getSkillParentQuestionnaires($limit = null) {
  return SkillQuestionnaire::getSkillParentQuestionnaires($this->id, $limit);
 }

 public function getSkillParentQuestionnairesCount() {
  return SkillQuestionnaire::getSkillParentQuestionnairesCount($this->id);
 }

 public function getSkillParentWeblinks($limit = null) {
  return SkillWeblink::getSkillParentWeblinks($this->id, $limit);
 }

 public function getSkillParentWeblinksCount() {
  return SkillWeblink::getSkillParentWeblinksCount($this->id);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Skill the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{skill}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('title, level_id', 'required'),
    array('parent_skill_id, creator_id, type_id, level_id, bank_id, privacy, order, status', 'numerical', 'integerOnly' => true),
    array('title', 'length', 'max' => 100),
    array('description', 'length', 'max' => 500),
    array('created_date', 'safe'),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_skill_id, creator_id, type_id, title, description, created_date, level_id, bank_id, privacy, order, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'skill_id'),
    'advicePageSkills' => array(self::HAS_MANY, 'AdvicePageSkill', 'skill_id'),
    'goals' => array(self::HAS_MANY, 'Goal', 'skill_id'),
    'hobbies' => array(self::HAS_MANY, 'Hobby', 'skill_id'),
    'journals' => array(self::HAS_MANY, 'Journal', 'skill_id'),
    'mentorships' => array(self::HAS_MANY, 'Mentorship', 'skill_id'),
    'projectMentorships' => array(self::HAS_MANY, 'ProjectMentorship', 'mentorship_id'),
    'projectSkills' => array(self::HAS_MANY, 'ProjectSkill', 'skill_id'),
    'promises' => array(self::HAS_MANY, 'Promise', 'skill_id'),
    'parentSkill' => array(self::BELONGS_TO, 'Skill', 'parent_skill_id'),
    'skills' => array(self::HAS_MANY, 'Skill', 'parent_skill_id'),
    'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
    'bank' => array(self::BELONGS_TO, 'Bank', 'bank_id'),
    'type' => array(self::BELONGS_TO, 'SkillType', 'type_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'skillAnnouncements' => array(self::HAS_MANY, 'SkillAnnouncement', 'skill_id'),
    'skillComments' => array(self::HAS_MANY, 'SkillComment', 'skill_id'),
    'skillContributors' => array(self::HAS_MANY, 'SkillContributor', 'skill_id'),
    'skillDiscussions' => array(self::HAS_MANY, 'SkillDiscussion', 'skill_id'),
    'skillNotes' => array(self::HAS_MANY, 'SkillNote', 'skill_id'),
    'skillQuestions' => array(self::HAS_MANY, 'SkillQuestion', 'skill_id'),
    'skillTags' => array(self::HAS_MANY, 'SkillTag', 'skill_id'),
    'skillTimelines' => array(self::HAS_MANY, 'SkillTimeline', 'skill_id'),
    'skillTodos' => array(self::HAS_MANY, 'SkillTodo', 'skill_id'),
    'skillWeblinks' => array(self::HAS_MANY, 'SkillWeblink', 'skill_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_skill_id' => 'Parent Skill',
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
  $criteria->compare('parent_skill_id', $this->parent_skill_id);
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
