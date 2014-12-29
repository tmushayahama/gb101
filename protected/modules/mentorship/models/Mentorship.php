<?php

/**
 * This is the model class for table "{{mentorship}}".
 *
 * The followings are the available columns in table '{{mentorship}}':
 * @property integer $id
 * @property integer $parent_mentorship_id
 * @property integer $creator_id
 * @property integer $mentor_id
 * @property integer $mentee_id
 * @property integer $type_id
 * @property string $mentorship_picture_url
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
 * @property Mentorship $parentMentorship
 * @property Mentorship[] $mentorships
 * @property Level $level
 * @property Bank $bank
 * @property MentorshipType $type
 * @property User $creator
 * @property User $mentor
 * @property User $mentee
 * @property MentorshipAnnouncement[] $mentorshipAnnouncements
 * @property MentorshipComment[] $mentorshipComments
 * @property MentorshipContributor[] $mentorshipContributors
 * @property MentorshipDiscussion[] $mentorshipDiscussions
 * @property MentorshipNote[] $mentorshipNotes
 * @property MentorshipQuestion[] $mentorshipQuestions
 * @property MentorshipQuestionnaire[] $mentorshipQuestionnaires
 * @property MentorshipTag[] $mentorshipTags
 * @property MentorshipTimeline[] $mentorshipTimelines
 * @property MentorshipTodo[] $mentorshipTodos
 * @property MentorshipWeblink[] $mentorshipWeblinks
 */
class Mentorship extends CActiveRecord {

 public static $MENTORSHIPS_PER_PAGE = 30;
 public static $MENTORSHIPS_PER_PREVIEW_PAGE = 10;
//SType
 public static $TYPE_MENTORSHIP = 1;
 public static $TYPE_PROMISE = 2;
 public static $TYPE_GOAL = 3;
 public static $SOURCE_MENTORSHIP = 1;
 public static $SOURCE_ADVICE_PAGE = 2;
//These are the types of displays for the post
 public static $MENTORSHIP_OWNER_GAINED = 1;
 public static $MENTORSHIP_OWNER_TO_IMPROVE = 2;
 public static $MENTORSHIP_OWNER_TO_LEARN = 3;
 public static $MENTORSHIP_OWNER_OF_INTEREST = 4;
 public static $MENTORSHIP_IS_FRIEND_GAINED = 5;
 public static $MENTORSHIP_IS_FRIEND_TO_IMPROVE = 6;
 public static $MENTORSHIP_IS_FRIEND_TO_LEARN = 7;
 public static $MENTORSHIP_IS_FRIEND_OF_INTEREST = 8;

 public static function deleteMentorship($mentorshipId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_MENTORSHIP);
  $postsCriteria->addCondition("source_id=" . $mentorshipId);
  Post::model()->deleteAll($postsCriteria);
  Mentorship::model()->deleteByPk($mentorshipId);
 }

 public static function getMentorships($levelId = null, $parentId = null, $limit = null, $offset = null) {
  $mentorshipCriteria = new CDbCriteria;
  if ($levelId || $levelId != 0) {
   $mentorshipCriteria->addCondition("level_id=" . $levelId);
  }
  if ($parentId) {
   $mentorshipCriteria->addCondition("parent_mentorship_id=" . $parentId);
  } else {
   $mentorshipCriteria->addCondition("parent_mentorship_id IS NULL");
  }
  if ($limit) {
   $mentorshipCriteria->limit = $limit;
  }
  if ($offset) {
   $mentorshipCriteria->offset = $offset;
  }
  $mentorshipCriteria->alias = 's';
  $mentorshipCriteria->order = "s.id desc";
  return Mentorship::Model()->findAll($mentorshipCriteria);
 }

 public static function getMentorshipsCount($levelId = null, $parentId = null, $offset = null) {
  $mentorshipCriteria = new CDbCriteria;
  if ($parentId) {
   $mentorshipCriteria->addCondition("parent_mentorship_id=" . $parentId);
  }
  if ($levelId) {
   $mentorshipCriteria->addCondition("level_id=" . $levelId);
  }
  if ($offset) {
   $mentorshipCriteria->offset = $offset;
  }
  return Mentorship::Model()->count($mentorshipCriteria);
 }

 /**
  * This is the function to get the preview to display according to
  * one's mentorship level and privilege
  * @param type $mentorship the mentorship list entry
  */
 public static function getMentorshipViewType($mentorship) {
  switch ($mentorship->level->code) {
   case Level::$LEVEL_MENTORSHIP_GAINED:
    if ($mentorship->creator_id == Yii::app()->user->id) {
     return Mentorship::$MENTORSHIP_OWNER_GAINED;
    } else {
     return Mentorship::$MENTORSHIP_IS_FRIEND_GAINED;
    }
    break;
   case Level::$LEVEL_MENTORSHIP_TO_IMPROVE:
    if ($mentorship->creator_id == Yii::app()->user->id) {
     return Mentorship::$MENTORSHIP_OWNER_TO_IMPROVE;
    } else {
     return Mentorship::$MENTORSHIP_IS_FRIEND_TO_IMPROVE;
    }
    break;
   case Level::$LEVEL_MENTORSHIP_TO_LEARN:
    if ($mentorship->creator_id == Yii::app()->user->id) {
     return Mentorship::$MENTORSHIP_OWNER_TO_LEARN;
    } else {
     return Mentorship::$MENTORSHIP_IS_FRIEND_TO_LEARN;
    }
    break;
  }
 }

 public static function getMentorship($levelCategory = null, $creatorId = null, $parentId = null, $levelIds = null, $limit = null) {
  $mentorshipCriteria = new CDbCriteria;
  $mentorshipCriteria->alias = "gList";
  $mentorshipCriteria->with = array("level" => array("alias" => 'level'));
  if ($parentId) {
   $mentorshipCriteria->addCondition("parent_mentorship_id=" . $parentId);
  }
  if ($creatorId != null) {
   //$mentorshipCriteria->addCondition("creator_id=" . $creatorId);
  }
  if ($levelCategory != null) {
   //$mentorshipCriteria->addCondition("level.category=" . $levelCategory);
  }
  if ($levelIds) {
   $levelIdArray = [];
   foreach ($levelIds as $levelId) {
    array_push($levelIdArray, $levelId);
   }
   //$mentorshipCriteria->addInCondition("level_id", $levelIdArray);
  }
  $mentorshipCriteria->order = "gList.id desc";

  if ($limit != null) {
   $mentorshipCriteria->limit = $limit;
  }
  return Mentorship::Model()->findAll($mentorshipCriteria);
 }

 public static function getMentorshipCount($levelCategory, $levelId, $creatorId) {
  $mentorshipCriteria = new CDbCriteria;
  $mentorshipCriteria->with = array("level" => array("alias" => 'level'));
  $mentorshipCriteria->addCondition("level.category=" . $levelCategory);
  if ($parentId) {
   $mentorshipCriteria->addCondition("parent_mentorship_id=" . $parentId);
  }
  if ($levelId) {
   $mentorshipCriteria->addCondition("level_id=" . $levelId);
  }
  if ($creatorId) {
   $mentorshipCriteria->addCondition("creator_id=" . $creatorId);
  }
  return Mentorship::Model()->count($mentorshipCriteria);
 }

 public static function acceptMentorship($request) {
  $mentorshipParent = Mentorship::model()->findByPk($request->source_id);
  $mentorship = new Mentorship();
  $mentorship->attributes = $mentorshipParent->attributes;
  $mentorship->parent_mentorship_id = $mentorshipParent->id;
  //$mentorship->creator_id = $mentorshipParent->creator_id;
  //$mentorship->title = $mentorshipParent->title;
  // $mentorship->description = $mentorshipParent->description;
  switch ($request->type_id) {
   case Level::$LEVEL_MENTOR_REQUEST:
    $mentorship->mentor_id = $request->recipient_id;
    $mentorship->mentee_id = $request->sender_id;
    break;
   case Level::$LEVEL_MENTEE_REQUEST:
    $mentorship->mentee_id = $request->recipient_id;
    $mentorship->mentor_id = $request->sender_id;
    break;
  }
  if ($mentorship->save()) {
   $request->status = Notification::$STATUS_ACCEPTED;
   $request->save();
  }
  return $mentorship;
 }

 public function role() {
  if ($this->mentor_id == Yii::app()->user->id) {
   return "Mentee- <a>" . $this->mentee->profile->firstname . " " . $this->mentee->profile->lastname . "</a>";
  } else {
   return "Mentor- <a>" . $this->mentor->profile->firstname . " " . $this->mentor->profile->lastname . "</a>";
  }
 }

 public function getMentorshipParentComments($limit = null) {
  return MentorshipComment::getMentorshipParentComments($this->id, $limit);
 }

 public function getMentorshipParentCommentsCount() {
  return MentorshipComment::getMentorshipParentCommentsCount($this->id);
 }

 public function getMentorshipParentContributors($limit = null) {
  return MentorshipContributor::getMentorshipParentContributors($this->id, $limit);
 }

 public function getMentorshipParentContributorsCount() {
  return MentorshipContributor::getMentorshipParentContributorsCount($this->id);
 }

 public function getMentorshipParentTodos($limit = null) {
  return MentorshipTodo::getMentorshipParentTodos($this->id, $limit);
 }

 public function getMentorshipParentTodosCount() {
  return MentorshipTodo::getMentorshipParentTodosCount($this->id);
 }

 public function getMentorshipParentNotes($limit = null) {
  return MentorshipNote::getMentorshipParentNotes($this->id, $limit);
 }

 public function getMentorshipParentNotesCount() {
  return MentorshipNote::getMentorshipParentNotesCount($this->id);
 }

 public function getMentorshipParentDiscussions($limit = null) {
  return MentorshipDiscussion::getMentorshipParentDiscussions($this->id, $limit);
 }

 public function getMentorshipParentDiscussionsCount() {
  return MentorshipDiscussion::getMentorshipParentDiscussionsCount($this->id);
 }

 public function getMentorshipParentQuestionnaires($limit = null) {
  return MentorshipQuestionnaire::getMentorshipParentQuestionnaires($this->id, $limit);
 }

 public function getMentorshipParentQuestionnairesCount() {
  return MentorshipQuestionnaire::getMentorshipParentQuestionnairesCount($this->id);
 }

 public function getMentorshipParentWeblinks($limit = null) {
  return MentorshipWeblink::getMentorshipParentWeblinks($this->id, $limit);
 }

 public function getMentorshipParentWeblinksCount() {
  return MentorshipWeblink::getMentorshipParentWeblinksCount($this->id);
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
    array('title, level_id', 'required'),
    array('parent_mentorship_id, creator_id, mentor_id, mentee_id, type_id, level_id, bank_id, privacy, order, status', 'numerical', 'integerOnly' => true),
    array('mentorship_picture_url', 'length', 'max' => 250),
    array('title', 'length', 'max' => 100),
    array('description', 'length', 'max' => 500),
    array('created_date', 'safe'),
// The following rule is used by search().
// Please remove those attributes that should not be searched.
    array('id, parent_mentorship_id, creator_id, mentor_id, mentee_id, type_id, mentorship_picture_url, title, description, created_date, level_id, bank_id, privacy, order, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
  return array(
    'parentMentorship' => array(self::BELONGS_TO, 'Mentorship', 'parent_mentorship_id'),
    'mentorships' => array(self::HAS_MANY, 'Mentorship', 'parent_mentorship_id'),
    'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
    'bank' => array(self::BELONGS_TO, 'Bank', 'bank_id'),
    'type' => array(self::BELONGS_TO, 'MentorshipType', 'type_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'mentor' => array(self::BELONGS_TO, 'User', 'mentor_id'),
    'mentee' => array(self::BELONGS_TO, 'User', 'mentee_id'),
    'mentorshipAnnouncements' => array(self::HAS_MANY, 'MentorshipAnnouncement', 'mentorship_id'),
    'mentorshipComments' => array(self::HAS_MANY, 'MentorshipComment', 'mentorship_id'),
    'mentorshipContributors' => array(self::HAS_MANY, 'MentorshipContributor', 'mentorship_id'),
    'mentorshipDiscussions' => array(self::HAS_MANY, 'MentorshipDiscussion', 'mentorship_id'),
    'mentorshipNotes' => array(self::HAS_MANY, 'MentorshipNote', 'mentorship_id'),
    'mentorshipQuestions' => array(self::HAS_MANY, 'MentorshipQuestion', 'mentorship_id'),
    'mentorshipQuestionnaires' => array(self::HAS_MANY, 'MentorshipQuestionnaire', 'mentorship_id'),
    'mentorshipTags' => array(self::HAS_MANY, 'MentorshipTag', 'mentorship_id'),
    'mentorshipTimelines' => array(self::HAS_MANY, 'MentorshipTimeline', 'mentorship_id'),
    'mentorshipTodos' => array(self::HAS_MANY, 'MentorshipTodo', 'mentorship_id'),
    'mentorshipWeblinks' => array(self::HAS_MANY, 'MentorshipWeblink', 'mentorship_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_mentorship_id' => 'Parent Mentorship',
    'creator_id' => 'Creator',
    'mentor_id' => 'Mentor',
    'mentee_id' => 'Mentee',
    'type_id' => 'Type',
    'mentorship_picture_url' => 'Mentorship Picture Url',
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
  $criteria->compare('parent_mentorship_id', $this->parent_mentorship_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('mentor_id', $this->mentor_id);
  $criteria->compare('mentee_id', $this->mentee_id);
  $criteria->compare('type_id', $this->type_id);
  $criteria->compare('mentorship_picture_url', $this->mentorship_picture_url, true);
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
