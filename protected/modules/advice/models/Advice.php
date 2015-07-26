<?php

/**
 * This is the model class for table "{{advice}}".
 *
 * The followings are the available columns in table '{{advice}}':
 * @property integer $id
 * @property integer $parent_advice_id
 * @property integer $creator_id
 * @property integer $mentor_id
 * @property integer $mentee_id
 * @property integer $type_id
 * @property string $advice_picture_url
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
 * @property Advice $parentAdvice
 * @property Advice[] $advices
 * @property Level $level
 * @property Bank $bank
 * @property AdviceType $type
 * @property User $creator
 * @property User $mentor
 * @property User $mentee
 * @property AdviceAnnouncement[] $adviceAnnouncements
 * @property AdviceComment[] $adviceComments
 * @property AdviceContributor[] $adviceContributors
 * @property AdviceDiscussion[] $adviceDiscussions
 * @property AdviceNote[] $adviceNotes
 * @property AdviceQuestion[] $adviceQuestions
 * @property AdviceQuestionnaire[] $adviceQuestionnaires
 * @property AdviceTag[] $adviceTags
 * @property AdviceTimeline[] $adviceTimelines
 * @property AdviceTodo[] $adviceTodos
 * @property AdviceWeblink[] $adviceWeblinks
 */
class Advice extends CActiveRecord {

 public static $ADVICES_PER_PAGE = 30;
 public static $ADVICES_PER_PREVIEW_PAGE = 10;
//SType
 public static $TYPE_ADVICE = 1;
 public static $TYPE_PROMISE = 2;
 public static $TYPE_GOAL = 3;
 public static $SOURCE_ADVICE = 1;
 public static $SOURCE_ADVICE_PAGE = 2;
//These are the types of displays for the post
 public static $ADVICE_OWNER_GAINED = 1;
 public static $ADVICE_OWNER_TO_IMPROVE = 2;
 public static $ADVICE_OWNER_TO_LEARN = 3;
 public static $ADVICE_OWNER_OF_INTEREST = 4;
 public static $ADVICE_IS_FRIEND_GAINED = 5;
 public static $ADVICE_IS_FRIEND_TO_IMPROVE = 6;
 public static $ADVICE_IS_FRIEND_TO_LEARN = 7;
 public static $ADVICE_IS_FRIEND_OF_INTEREST = 8;

 public static function deleteAdvice($adviceId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_ADVICE);
  $postsCriteria->addCondition("source_id=" . $adviceId);
  Post::model()->deleteAll($postsCriteria);
  Advice::model()->deleteByPk($adviceId);
 }

 public static function getAdvices($levelId = null, $parentId = null, $limit = null, $offset = null, $userId = null) {
  $adviceCriteria = new CDbCriteria;
  if ($levelId || $levelId != 0) {
   $adviceCriteria->addCondition("level_id=" . $levelId);
  }
  if ($parentId) {
   $adviceCriteria->addCondition("parent_advice_id=" . $parentId);
  } else {
   $adviceCriteria->addCondition("parent_advice_id IS NULL");
  }
  if ($userId) {
   $adviceCriteria->addCondition("creator_id=" . $userId);
  }
  if ($limit) {
   $adviceCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceCriteria->offset = $offset;
  }
  $adviceCriteria->alias = 's';
  $adviceCriteria->order = "s.id desc";
  return Advice::Model()->findAll($adviceCriteria);
 }

 public static function getAdvicesCount($levelId = null, $parentId = null, $offset = null, $userId = null) {
  $adviceCriteria = new CDbCriteria;
  if ($parentId) {
   $adviceCriteria->addCondition("parent_advice_id=" . $parentId);
  }
  if ($userId) {
   $adviceCriteria->addCondition("creator_id=" . $userId);
  }
  if ($levelId) {
   $adviceCriteria->addCondition("level_id=" . $levelId);
  }
  if ($offset) {
   $adviceCriteria->offset = $offset;
  }
  return Advice::Model()->count($adviceCriteria);
 }

 /**
  * This is the function to get the preview to display according to
  * one's advice level and privilege
  * @param type $advice the advice list entry
  */
 public static function getAdviceViewType($advice) {
  switch ($advice->level->code) {
   case Level::$LEVEL_ADVICE_GAINED:
    if ($advice->creator_id == Yii::app()->user->id) {
     return Advice::$ADVICE_OWNER_GAINED;
    } else {
     return Advice::$ADVICE_IS_FRIEND_GAINED;
    }
    break;
   case Level::$LEVEL_ADVICE_TO_IMPROVE:
    if ($advice->creator_id == Yii::app()->user->id) {
     return Advice::$ADVICE_OWNER_TO_IMPROVE;
    } else {
     return Advice::$ADVICE_IS_FRIEND_TO_IMPROVE;
    }
    break;
   case Level::$LEVEL_ADVICE_TO_LEARN:
    if ($advice->creator_id == Yii::app()->user->id) {
     return Advice::$ADVICE_OWNER_TO_LEARN;
    } else {
     return Advice::$ADVICE_IS_FRIEND_TO_LEARN;
    }
    break;
  }
 }

 public static function getAdvice($levelCategory = null, $creatorId = null, $parentId = null, $levelIds = null, $limit = null) {
  $adviceCriteria = new CDbCriteria;
  $adviceCriteria->alias = "gList";
  $adviceCriteria->with = array("level" => array("alias" => 'level'));
  if ($parentId) {
   $adviceCriteria->addCondition("parent_advice_id=" . $parentId);
  }
  if ($creatorId != null) {
   //$adviceCriteria->addCondition("creator_id=" . $creatorId);
  }
  if ($levelCategory != null) {
   //$adviceCriteria->addCondition("level.category=" . $levelCategory);
  }
  if ($levelIds) {
   $levelIdArray = [];
   foreach ($levelIds as $levelId) {
    array_push($levelIdArray, $levelId);
   }
   //$adviceCriteria->addInCondition("level_id", $levelIdArray);
  }
  $adviceCriteria->order = "gList.id desc";

  if ($limit != null) {
   $adviceCriteria->limit = $limit;
  }
  return Advice::Model()->findAll($adviceCriteria);
 }

 public static function getAdviceCount($levelCategory, $levelId, $creatorId) {
  $adviceCriteria = new CDbCriteria;
  $adviceCriteria->with = array("level" => array("alias" => 'level'));
  $adviceCriteria->addCondition("level.category=" . $levelCategory);
  if ($parentId) {
   $adviceCriteria->addCondition("parent_advice_id=" . $parentId);
  }
  if ($levelId) {
   $adviceCriteria->addCondition("level_id=" . $levelId);
  }
  if ($creatorId) {
   $adviceCriteria->addCondition("creator_id=" . $creatorId);
  }
  return Advice::Model()->count($adviceCriteria);
 }

 public static function acceptAdvice($request) {
  $adviceParent = Advice::model()->findByPk($request->source_id);
  $advice = new Advice();
  $advice->attributes = $adviceParent->attributes;
  $advice->parent_advice_id = $adviceParent->id;
  //$advice->creator_id = $adviceParent->creator_id;
  //$advice->title = $adviceParent->title;
  // $advice->description = $adviceParent->description;
  switch ($request->type_id) {
   case Level::$LEVEL_MENTOR_REQUEST:
    $advice->mentor_id = $request->recipient_id;
    $advice->mentee_id = $request->sender_id;
    break;
   case Level::$LEVEL_MENTEE_REQUEST:
    $advice->mentee_id = $request->recipient_id;
    $advice->mentor_id = $request->sender_id;
    break;
  }
  if ($advice->save()) {
   $request->status = Notification::$STATUS_ACCEPTED;
   $request->save();
  }
  return $advice;
 }

 public function role() {
  if ($this->mentor_id == Yii::app()->user->id) {
   return "Mentee- <a>" . $this->mentee->profile->firstname . " " . $this->mentee->profile->lastname . "</a>";
  } else {
   return "Mentor- <a>" . $this->mentor->profile->firstname . " " . $this->mentor->profile->lastname . "</a>";
  }
 }

 public function getAdviceParentComments($limit = null) {
  return AdviceComment::getAdviceParentComments($this->id, $limit);
 }

 public function getAdviceParentCommentsCount() {
  return AdviceComment::getAdviceParentCommentsCount($this->id);
 }

 public function getAdviceParentContributors($limit = null) {
  return AdviceContributor::getAdviceParentContributors($this->id, $limit);
 }

 public function getAdviceParentContributorsCount() {
  return AdviceContributor::getAdviceParentContributorsCount($this->id);
 }

 public function getAdviceParentTodos($limit = null) {
  return AdviceTodo::getAdviceParentTodos($this->id, $limit);
 }

 public function getAdviceParentTodosCount() {
  return AdviceTodo::getAdviceParentTodosCount($this->id);
 }

 public function getAdviceParentTimelines($limit = null) {
  return AdviceTimeline::getAdviceTimelineDays($this->id, $limit);
 }

 public function getAdviceParentTimelinesCount() {
  return AdviceTimeline::getAdviceTimelineDaysCount($this->id);
 }

 public function getAdviceParentNotes($limit = null) {
  return AdviceNote::getAdviceParentNotes($this->id, $limit);
 }

 public function getAdviceParentNotesCount() {
  return AdviceNote::getAdviceParentNotesCount($this->id);
 }

 public function getAdviceParentDiscussions($limit = null) {
  return AdviceDiscussion::getAdviceParentDiscussions($this->id, $limit);
 }

 public function getAdviceParentDiscussionsCount() {
  return AdviceDiscussion::getAdviceParentDiscussionsCount($this->id);
 }

 public function getAdviceParentQuestionnaires($limit = null) {
  return AdviceQuestionnaire::getAdviceParentQuestionnaires($this->id, $limit);
 }

 public function getAdviceParentQuestionnairesCount() {
  return AdviceQuestionnaire::getAdviceParentQuestionnairesCount($this->id);
 }

 public function getAdviceParentWeblinks($limit = null) {
  return AdviceWeblink::getAdviceParentWeblinks($this->id, $limit);
 }

 public function getAdviceParentWeblinksCount() {
  return AdviceWeblink::getAdviceParentWeblinksCount($this->id);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Advice the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
  return array(
    array('title, level_id', 'required'),
    array('parent_advice_id, creator_id, mentor_id, mentee_id, type_id, level_id, bank_id, privacy, order, status', 'numerical', 'integerOnly' => true),
    array('advice_picture_url', 'length', 'max' => 250),
    array('title', 'length', 'max' => 100),
    array('description', 'length', 'max' => 500),
    array('created_date', 'safe'),
// The following rule is used by search().
// Please remove those attributes that should not be searched.
    array('id, parent_advice_id, creator_id, mentor_id, mentee_id, type_id, advice_picture_url, title, description, created_date, level_id, bank_id, privacy, order, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
  return array(
    'parentAdvice' => array(self::BELONGS_TO, 'Advice', 'parent_advice_id'),
    'advices' => array(self::HAS_MANY, 'Advice', 'parent_advice_id'),
    'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
    'bank' => array(self::BELONGS_TO, 'Bank', 'bank_id'),
    'type' => array(self::BELONGS_TO, 'AdviceType', 'type_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'mentor' => array(self::BELONGS_TO, 'User', 'mentor_id'),
    'mentee' => array(self::BELONGS_TO, 'User', 'mentee_id'),
    'adviceAnnouncements' => array(self::HAS_MANY, 'AdviceAnnouncement', 'advice_id'),
    'adviceComments' => array(self::HAS_MANY, 'AdviceComment', 'advice_id'),
    'adviceContributors' => array(self::HAS_MANY, 'AdviceContributor', 'advice_id'),
    'adviceDiscussions' => array(self::HAS_MANY, 'AdviceDiscussion', 'advice_id'),
    'adviceNotes' => array(self::HAS_MANY, 'AdviceNote', 'advice_id'),
    'adviceQuestions' => array(self::HAS_MANY, 'AdviceQuestion', 'advice_id'),
    'adviceQuestionnaires' => array(self::HAS_MANY, 'AdviceQuestionnaire', 'advice_id'),
    'adviceTags' => array(self::HAS_MANY, 'AdviceTag', 'advice_id'),
    'adviceTimelines' => array(self::HAS_MANY, 'AdviceTimeline', 'advice_id'),
    'adviceTodos' => array(self::HAS_MANY, 'AdviceTodo', 'advice_id'),
    'adviceWeblinks' => array(self::HAS_MANY, 'AdviceWeblink', 'advice_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_advice_id' => 'Parent Advice',
    'creator_id' => 'Creator',
    'mentor_id' => 'Mentor',
    'mentee_id' => 'Mentee',
    'type_id' => 'Type',
    'advice_picture_url' => 'Advice Picture Url',
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
  $criteria->compare('parent_advice_id', $this->parent_advice_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('mentor_id', $this->mentor_id);
  $criteria->compare('mentee_id', $this->mentee_id);
  $criteria->compare('type_id', $this->type_id);
  $criteria->compare('advice_picture_url', $this->advice_picture_url, true);
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
