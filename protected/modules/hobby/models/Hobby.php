<?php

/**
 * This is the model class for table "{{hobby}}".
 *
 * The followings are the available columns in table '{{hobby}}':
 * @property integer $id
 * @property integer $parent_hobby_id
 * @property integer $creator_id
 * @property string $hobby_picture_url
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
 * @property AdvicePageHobby[] $advicePageHobbys
 * @property Journal[] $journals
 * @property ProjectMentorship[] $projectMentorships
 * @property ProjectHobby[] $projectHobbys
 * @property Hobby $parentHobby
 * @property Hobby[] $hobbys
 * @property Level $level
 * @property Bank $bank
 * @property User $creator
 * @property HobbyAnnouncement[] $hobbyAnnouncements
 * @property HobbyCategory[] $hobbyCategories
 * @property HobbyComment[] $hobbyComments
 * @property HobbyContributor[] $hobbyContributors
 * @property HobbyDiscussion[] $hobbyDiscussions
 * @property HobbyNote[] $hobbyNotes
 * @property HobbyQuestion[] $hobbyQuestions
 * @property HobbyQuestionnaire[] $hobbyQuestionnaires
 * @property HobbyTag[] $hobbyTags
 * @property HobbyTimeline[] $hobbyTimelines
 * @property HobbyTodo[] $hobbyTodos
 * @property HobbyWeblink[] $hobbyWeblinks
 */
class Hobby extends CActiveRecord {

 public static $HOBBYS_PER_PAGE = 30;
 public static $HOBBYS_PER_PREVIEW_PAGE = 10;
//SType
 public static $TYPE_HOBBY = 1;
 public static $TYPE_PROMISE = 2;
 public static $TYPE_GOAL = 3;
 public static $SOURCE_HOBBY = 1;
 public static $SOURCE_ADVICE = 2;
//These are the types of displays for the post
 public static $HOBBY_OWNER_GAINED = 1;
 public static $HOBBY_OWNER_TO_IMPROVE = 2;
 public static $HOBBY_OWNER_TO_LEARN = 3;
 public static $HOBBY_OWNER_OF_INTEREST = 4;
 public static $HOBBY_IS_FRIEND_GAINED = 5;
 public static $HOBBY_IS_FRIEND_TO_IMPROVE = 6;
 public static $HOBBY_IS_FRIEND_TO_LEARN = 7;
 public static $HOBBY_IS_FRIEND_OF_INTEREST = 8;

 public static function getRandomHobby($userId = null) {

  $hobbyCriteria = new CDbCriteria;

  //$userQuestionAnswerCriteria->with = array("comment" => array("alias" => 'td'));
  //$userQuestionAnswerCriteria->addCondition("td.parent_comment_id is NULL");
  //$hobbyCriteria->addCondition("user_id = " . $userId);
  //$answeredQuestions = UserQuestionAnswer::Model()->findAll($hobbyCriteria);
  //$answeredQuestionIds = array();
  //foreach ($answeredQuestions as $answeredQuestion) {
  // array_push($answeredQuestionIds, $answeredQuestion->question_id);
  //}
  //$userQuestionAnswerCriteria->order = "td.id desc";
  //$questionCriteria = new CDbCriteria;
  //$questionCriteria->addNotInCondition('id', $answeredQuestionIds);
  $hobbyCriteria->order = 'RAND()';
  return Hobby::Model()->find($hobbyCriteria);
 }

 public static function deleteHobby($hobbyId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_HOBBY);
  $postsCriteria->addCondition("source_id=" . $hobbyId);
  Post::model()->deleteAll($postsCriteria);
  Hobby::model()->deleteByPk($hobbyId);
 }

 public static function getHobbys($levelId = null, $limit = null, $offset = null, $userId = null) {
  $hobbyCriteria = new CDbCriteria;
  if ($levelId || $levelId != 0) {
   $hobbyCriteria->addCondition("level_id=" . $levelId);
  }
  if ($limit) {
   $hobbyCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyCriteria->offset = $offset;
  }
  if ($userId) {
   $hobbyCriteria->addCondition("creator_id=" . $userId);
  }
  $hobbyCriteria->alias = 's';
  $hobbyCriteria->order = "s.id desc";
  return Hobby::Model()->findAll($hobbyCriteria);
 }

 public static function getHobbysCount($levelId = null, $offset = null, $userId = null) {
  $hobbyCriteria = new CDbCriteria;
  if ($levelId) {
   $hobbyCriteria->addCondition("level_id=" . $levelId);
  }
  if ($offset) {
   $hobbyCriteria->offset = $offset;
  }
  if ($userId) {
   $hobbyCriteria->addCondition("creator_id=" . $userId);
  }
  return Hobby::Model()->count($hobbyCriteria);
 }

 public static function keywordSearch($keyword, $title, $description, $limit) {
  $keywordSearchCriteria->limit = $limit;
  $keywordSearchCriteria = self::keywordSearchCriteria($keyword, $title, $description);
  return QuestionBank::Model()->findAll($keywordSearchCriteria);
 }

 public static function keywordSearchCriteria($keyword, $title, $description) {
  $keywordSearchCriteria = new CDbCriteria;
  $keywordSearchCriteria->compare("title", $keyword, true, "OR");
  $keywordSearchCriteria->compare("description", $keyword, true, "OR");
  if ($title != null) {
   $keywordSearchCriteria->addCondition("title='" . $title . "'");
  }
  if ($description != null) {
   $keywordSearchCriteria->addCondition("description='" . $description . "'");
  }
  return $keywordSearchCriteria;
 }

 /**
  * This is the function to get the preview to display according to
  * one's hobby level and privilege
  * @param type $hobby the hobby list entry
  */
 public static function getHobbyViewType($hobby) {
  switch ($hobby->level->code) {
   case Level::$LEVEL_HOBBY_GAINED:
    if ($hobby->creator_id == Yii::app()->user->id) {
     return Hobby::$HOBBY_OWNER_GAINED;
    } else {
     return Hobby::$HOBBY_IS_FRIEND_GAINED;
    }
    break;
   case Level::$LEVEL_HOBBY_TO_IMPROVE:
    if ($hobby->creator_id == Yii::app()->user->id) {
     return Hobby::$HOBBY_OWNER_TO_IMPROVE;
    } else {
     return Hobby::$HOBBY_IS_FRIEND_TO_IMPROVE;
    }
    break;
   case Level::$LEVEL_HOBBY_TO_LEARN:
    if ($hobby->creator_id == Yii::app()->user->id) {
     return Hobby::$HOBBY_OWNER_TO_LEARN;
    } else {
     return Hobby::$HOBBY_IS_FRIEND_TO_LEARN;
    }
    break;
  }
 }

 public static function getHobby($levelCategory = null, $creatorId = null, $connectionId = null, $levelIds = null, $limit = null) {
  $hobbyCriteria = new CDbCriteria;
  $hobbyCriteria->alias = "gList";
  $hobbyCriteria->with = array("level" => array("alias" => 'level'));
  if ($creatorId != null) {
   //$hobbyCriteria->addCondition("creator_id=" . $creatorId);
  }
  if ($levelCategory != null) {
   //$hobbyCriteria->addCondition("level.category=" . $levelCategory);
  }
  if ($levelIds != null) {
   $levelIdArray = [];
   foreach ($levelIds as $levelId) {
    array_push($levelIdArray, $levelId);
   }
   //$hobbyCriteria->addInCondition("level_id", $levelIdArray);
  }
  $hobbyCriteria->order = "gList.id desc";
  if ($connectionId != null) {
//$hobbyCriteria->addCondition("connection_id=" . $connectionId);
  }
  if ($limit != null) {
   $hobbyCriteria->limit = $limit;
  }
  return Hobby::Model()->findAll($hobbyCriteria);
 }

 public static function getHobbyCount($levelCategory, $levelId, $creatorId) {
  $hobbyCriteria = new CDbCriteria;
  $hobbyCriteria->with = array("level" => array("alias" => 'level'));
  $hobbyCriteria->addCondition("level.category=" . $levelCategory);
  if ($levelId) {
   $hobbyCriteria->addCondition("level_id=" . $levelId);
  }
  if ($creatorId) {
   $hobbyCriteria->addCondition("creator_id=" . $creatorId);
  }
  return Hobby::Model()->count($hobbyCriteria);
 }

 public function getHobbyParentComments($limit = null) {
  return HobbyComment::getHobbyParentComments($this->id, $limit);
 }

 public function getHobbyParentCommentsCount() {
  return HobbyComment::getHobbyParentCommentsCount($this->id);
 }

 public function getHobbyParentContributors($limit = null) {
  return HobbyContributor::getHobbyParentContributors($this->id, $limit);
 }

 public function getHobbyParentContributorsCount() {
  return HobbyContributor::getHobbyParentContributorsCount($this->id);
 }

 public function getHobbyParentTodos($limit = null) {
  return HobbyTodo::getHobbyParentTodos($this->id, $limit);
 }

 public function getHobbyParentTodosCount() {
  return HobbyTodo::getHobbyParentTodosCount($this->id);
 }

 public function getHobbyParentTimelines($limit = null) {
  return HobbyTimeline::getHobbyTimelineDays($this->id, $limit);
 }

 public function getHobbyParentTimelinesCount() {
  return HobbyTimeline::getHobbyTimelineDaysCount($this->id);
 }

 public function getMentorshipHobbys($limit = null) {
  return MentorshipHobby::getMentorshipHobbys($this->id, $limit);
 }

 public function getMentorshipHobbysCount() {
  return MentorshipHobby::getMentorshipHobbysCount($this->id);
 }

 public function getHobbyParentNotes($limit = null) {
  return HobbyNote::getHobbyParentNotes($this->id, $limit);
 }

 public function getHobbyParentNotesCount() {
  return HobbyNote::getHobbyParentNotesCount($this->id);
 }

 public function getHobbyParentDiscussions($limit = null) {
  return HobbyDiscussion::getHobbyParentDiscussions($this->id, $limit);
 }

 public function getHobbyParentDiscussionsCount() {
  return HobbyDiscussion::getHobbyParentDiscussionsCount($this->id);
 }

 public function getHobbyParentQuestionnaires($limit = null) {
  return HobbyQuestionnaire::getHobbyParentQuestionnaires($this->id, $limit);
 }

 public function getHobbyParentQuestionnairesCount() {
  return HobbyQuestionnaire::getHobbyParentQuestionnairesCount($this->id);
 }

 public function getHobbyParentWeblinks($limit = null) {
  return HobbyWeblink::getHobbyParentWeblinks($this->id, $limit);
 }

 public function getHobbyParentWeblinksCount() {
  return HobbyWeblink::getHobbyParentWeblinksCount($this->id);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Hobby the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('title, level_id', 'required'),
    array('parent_hobby_id, creator_id, level_id, bank_id, privacy, order, status', 'numerical', 'integerOnly' => true),
    array('hobby_picture_url', 'length', 'max' => 250),
    array('title', 'length', 'max' => 100),
    array('description', 'length', 'max' => 500),
    array('created_date', 'safe'),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_hobby_id, creator_id, hobby_picture_url, title, description, created_date, level_id, bank_id, privacy, order, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'hobby_id'),
    'advicePageHobbys' => array(self::HAS_MANY, 'AdvicePageHobby', 'hobby_id'),
    'journals' => array(self::HAS_MANY, 'Journal', 'hobby_id'),
    'projectMentorships' => array(self::HAS_MANY, 'ProjectMentorship', 'mentorship_id'),
    'projectHobbys' => array(self::HAS_MANY, 'ProjectHobby', 'hobby_id'),
    'parentHobby' => array(self::BELONGS_TO, 'Hobby', 'parent_hobby_id'),
    'hobbys' => array(self::HAS_MANY, 'Hobby', 'parent_hobby_id'),
    'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
    'bank' => array(self::BELONGS_TO, 'Bank', 'bank_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'hobbyAnnouncements' => array(self::HAS_MANY, 'HobbyAnnouncement', 'hobby_id'),
    'hobbyCategories' => array(self::HAS_MANY, 'HobbyCategory', 'hobby_id'),
    'hobbyComments' => array(self::HAS_MANY, 'HobbyComment', 'hobby_id'),
    'hobbyContributors' => array(self::HAS_MANY, 'HobbyContributor', 'hobby_id'),
    'hobbyDiscussions' => array(self::HAS_MANY, 'HobbyDiscussion', 'hobby_id'),
    'hobbyNotes' => array(self::HAS_MANY, 'HobbyNote', 'hobby_id'),
    'hobbyQuestions' => array(self::HAS_MANY, 'HobbyQuestion', 'hobby_id'),
    'hobbyQuestionnaires' => array(self::HAS_MANY, 'HobbyQuestionnaire', 'hobby_id'),
    'hobbyTags' => array(self::HAS_MANY, 'HobbyTag', 'hobby_id'),
    'hobbyTimelines' => array(self::HAS_MANY, 'HobbyTimeline', 'hobby_id'),
    'hobbyTodos' => array(self::HAS_MANY, 'HobbyTodo', 'hobby_id'),
    'hobbyWeblinks' => array(self::HAS_MANY, 'HobbyWeblink', 'hobby_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_hobby_id' => 'Parent Hobby',
    'creator_id' => 'Creator',
    'hobby_picture_url' => 'Hobby Picture Url',
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
  $criteria->compare('parent_hobby_id', $this->parent_hobby_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('hobby_picture_url', $this->hobby_picture_url, true);
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
