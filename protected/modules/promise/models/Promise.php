<?php

/**
 * This is the model class for table "{{promise}}".
 *
 * The followings are the available columns in table '{{promise}}':
 * @property integer $id
 * @property integer $parent_promise_id
 * @property integer $creator_id
 * @property string $promise_picture_url
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
 * @property AdvicePagePromise[] $advicePagePromises
 * @property Journal[] $journals
 * @property ProjectMentorship[] $projectMentorships
 * @property ProjectPromise[] $projectPromises
 * @property Promise $parentPromise
 * @property Promise[] $promises
 * @property Level $level
 * @property Bank $bank
 * @property User $creator
 * @property PromiseAnnouncement[] $promiseAnnouncements
 * @property PromiseCategory[] $promiseCategories
 * @property PromiseComment[] $promiseComments
 * @property PromiseContributor[] $promiseContributors
 * @property PromiseDiscussion[] $promiseDiscussions
 * @property PromiseNote[] $promiseNotes
 * @property PromiseQuestion[] $promiseQuestions
 * @property PromiseQuestionnaire[] $promiseQuestionnaires
 * @property PromiseTag[] $promiseTags
 * @property PromiseTimeline[] $promiseTimelines
 * @property PromiseTodo[] $promiseTodos
 * @property PromiseWeblink[] $promiseWeblinks
 */
class Promise extends CActiveRecord {

 public static $PROMISES_PER_PAGE = 30;
 public static $PROMISES_PER_PREVIEW_PAGE = 10;
//SType
 public static $TYPE_SKILL = 1;
 public static $TYPE_PROMISE = 2;
 public static $TYPE_GOAL = 3;
 public static $SOURCE_PROMISE = 1;
 public static $SOURCE_ADVICE = 2;
//These are the types of displays for the post
 public static $PROMISE_OWNER_GAINED = 1;
 public static $PROMISE_OWNER_TO_IMPROVE = 2;
 public static $PROMISE_OWNER_TO_LEARN = 3;
 public static $PROMISE_OWNER_OF_INTEREST = 4;
 public static $PROMISE_IS_FRIEND_GAINED = 5;
 public static $PROMISE_IS_FRIEND_TO_IMPROVE = 6;
 public static $PROMISE_IS_FRIEND_TO_LEARN = 7;
 public static $PROMISE_IS_FRIEND_OF_INTEREST = 8;

 public static function deletePromise($promiseId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_PROMISE);
  $postsCriteria->addCondition("source_id=" . $promiseId);
  Post::model()->deleteAll($postsCriteria);
  Promise::model()->deleteByPk($promiseId);
 }

 public static function getPromises($levelId = null, $limit = null, $offset = null, $userId = null) {
  $promiseCriteria = new CDbCriteria;
  if ($levelId || $levelId != 0) {
   $promiseCriteria->addCondition("level_id=" . $levelId);
  }
  if ($limit) {
   $promiseCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseCriteria->offset = $offset;
  }
  if ($userId) {
   $promiseCriteria->addCondition("creator_id=" . $userId);
  }
  $promiseCriteria->alias = 's';
  $promiseCriteria->order = "s.id desc";
  return Promise::Model()->findAll($promiseCriteria);
 }

 public static function getPromisesCount($levelId = null, $offset = null, $userId = null) {
  $promiseCriteria = new CDbCriteria;
  if ($levelId) {
   $promiseCriteria->addCondition("level_id=" . $levelId);
  }
  if ($offset) {
   $promiseCriteria->offset = $offset;
  }
  if ($userId) {
   $promiseCriteria->addCondition("creator_id=" . $userId);
  }
  return Promise::Model()->count($promiseCriteria);
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
  * one's promise level and privilege
  * @param type $promise the promise list entry
  */
 public static function getPromiseViewType($promise) {
  switch ($promise->level->code) {
   case Level::$LEVEL_PROMISE_GAINED:
    if ($promise->creator_id == Yii::app()->user->id) {
     return Promise::$PROMISE_OWNER_GAINED;
    } else {
     return Promise::$PROMISE_IS_FRIEND_GAINED;
    }
    break;
   case Level::$LEVEL_PROMISE_TO_IMPROVE:
    if ($promise->creator_id == Yii::app()->user->id) {
     return Promise::$PROMISE_OWNER_TO_IMPROVE;
    } else {
     return Promise::$PROMISE_IS_FRIEND_TO_IMPROVE;
    }
    break;
   case Level::$LEVEL_PROMISE_TO_LEARN:
    if ($promise->creator_id == Yii::app()->user->id) {
     return Promise::$PROMISE_OWNER_TO_LEARN;
    } else {
     return Promise::$PROMISE_IS_FRIEND_TO_LEARN;
    }
    break;
  }
 }

 public static function getPromise($levelCategory = null, $creatorId = null, $connectionId = null, $levelIds = null, $limit = null) {
  $promiseCriteria = new CDbCriteria;
  $promiseCriteria->alias = "gList";
  $promiseCriteria->with = array("level" => array("alias" => 'level'));
  if ($creatorId != null) {
   //$promiseCriteria->addCondition("creator_id=" . $creatorId);
  }
  if ($levelCategory != null) {
   //$promiseCriteria->addCondition("level.category=" . $levelCategory);
  }
  if ($levelIds != null) {
   $levelIdArray = [];
   foreach ($levelIds as $levelId) {
    array_push($levelIdArray, $levelId);
   }
   //$promiseCriteria->addInCondition("level_id", $levelIdArray);
  }
  $promiseCriteria->order = "gList.id desc";
  if ($connectionId != null) {
//$promiseCriteria->addCondition("connection_id=" . $connectionId);
  }
  if ($limit != null) {
   $promiseCriteria->limit = $limit;
  }
  return Promise::Model()->findAll($promiseCriteria);
 }

 public static function getPromiseCount($levelCategory, $levelId, $creatorId) {
  $promiseCriteria = new CDbCriteria;
  $promiseCriteria->with = array("level" => array("alias" => 'level'));
  $promiseCriteria->addCondition("level.category=" . $levelCategory);
  if ($levelId) {
   $promiseCriteria->addCondition("level_id=" . $levelId);
  }
  if ($creatorId) {
   $promiseCriteria->addCondition("creator_id=" . $creatorId);
  }
  return Promise::Model()->count($promiseCriteria);
 }

 public function getPromiseParentComments($limit = null) {
  return PromiseComment::getPromiseParentComments($this->id, $limit);
 }

 public function getPromiseParentCommentsCount() {
  return PromiseComment::getPromiseParentCommentsCount($this->id);
 }

 public function getPromiseParentContributors($limit = null) {
  return PromiseContributor::getPromiseParentContributors($this->id, $limit);
 }

 public function getPromiseParentContributorsCount() {
  return PromiseContributor::getPromiseParentContributorsCount($this->id);
 }

 public function getPromiseParentTodos($limit = null) {
  return PromiseTodo::getPromiseParentTodos($this->id, $limit);
 }

 public function getPromiseParentTodosCount() {
  return PromiseTodo::getPromiseParentTodosCount($this->id);
 }

 public function getPromiseParentTimelines($limit = null) {
  return PromiseTimeline::getPromiseTimelineDays($this->id, $limit);
 }

 public function getPromiseParentTimelinesCount() {
  return PromiseTimeline::getPromiseTimelineDaysCount($this->id);
 }

 public function getMentorshipPromises($limit = null) {
  return MentorshipPromise::getMentorshipPromises($this->id, $limit);
 }

 public function getMentorshipPromisesCount() {
  return MentorshipPromise::getMentorshipPromisesCount($this->id);
 }

 public function getPromiseParentNotes($limit = null) {
  return PromiseNote::getPromiseParentNotes($this->id, $limit);
 }

 public function getPromiseParentNotesCount() {
  return PromiseNote::getPromiseParentNotesCount($this->id);
 }

 public function getPromiseParentDiscussions($limit = null) {
  return PromiseDiscussion::getPromiseParentDiscussions($this->id, $limit);
 }

 public function getPromiseParentDiscussionsCount() {
  return PromiseDiscussion::getPromiseParentDiscussionsCount($this->id);
 }

 public function getPromiseParentQuestionnaires($limit = null) {
  return PromiseQuestionnaire::getPromiseParentQuestionnaires($this->id, $limit);
 }

 public function getPromiseParentQuestionnairesCount() {
  return PromiseQuestionnaire::getPromiseParentQuestionnairesCount($this->id);
 }

 public function getPromiseParentWeblinks($limit = null) {
  return PromiseWeblink::getPromiseParentWeblinks($this->id, $limit);
 }

 public function getPromiseParentWeblinksCount() {
  return PromiseWeblink::getPromiseParentWeblinksCount($this->id);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Promise the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('title, level_id', 'required'),
    array('parent_promise_id, creator_id, level_id, bank_id, privacy, order, status', 'numerical', 'integerOnly' => true),
    array('promise_picture_url', 'length', 'max' => 250),
    array('title', 'length', 'max' => 100),
    array('description', 'length', 'max' => 500),
    array('created_date', 'safe'),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_promise_id, creator_id, promise_picture_url, title, description, created_date, level_id, bank_id, privacy, order, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'promise_id'),
    'advicePagePromises' => array(self::HAS_MANY, 'AdvicePagePromise', 'promise_id'),
    'journals' => array(self::HAS_MANY, 'Journal', 'promise_id'),
    'projectMentorships' => array(self::HAS_MANY, 'ProjectMentorship', 'mentorship_id'),
    'projectPromises' => array(self::HAS_MANY, 'ProjectPromise', 'promise_id'),
    'parentPromise' => array(self::BELONGS_TO, 'Promise', 'parent_promise_id'),
    'promises' => array(self::HAS_MANY, 'Promise', 'parent_promise_id'),
    'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
    'bank' => array(self::BELONGS_TO, 'Bank', 'bank_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'promiseAnnouncements' => array(self::HAS_MANY, 'PromiseAnnouncement', 'promise_id'),
    'promiseCategories' => array(self::HAS_MANY, 'PromiseCategory', 'promise_id'),
    'promiseComments' => array(self::HAS_MANY, 'PromiseComment', 'promise_id'),
    'promiseContributors' => array(self::HAS_MANY, 'PromiseContributor', 'promise_id'),
    'promiseDiscussions' => array(self::HAS_MANY, 'PromiseDiscussion', 'promise_id'),
    'promiseNotes' => array(self::HAS_MANY, 'PromiseNote', 'promise_id'),
    'promiseQuestions' => array(self::HAS_MANY, 'PromiseQuestion', 'promise_id'),
    'promiseQuestionnaires' => array(self::HAS_MANY, 'PromiseQuestionnaire', 'promise_id'),
    'promiseTags' => array(self::HAS_MANY, 'PromiseTag', 'promise_id'),
    'promiseTimelines' => array(self::HAS_MANY, 'PromiseTimeline', 'promise_id'),
    'promiseTodos' => array(self::HAS_MANY, 'PromiseTodo', 'promise_id'),
    'promiseWeblinks' => array(self::HAS_MANY, 'PromiseWeblink', 'promise_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_promise_id' => 'Parent Promise',
    'creator_id' => 'Creator',
    'promise_picture_url' => 'Promise Picture Url',
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
  $criteria->compare('parent_promise_id', $this->parent_promise_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('promise_picture_url', $this->promise_picture_url, true);
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
