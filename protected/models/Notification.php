<?php

/**
 * This is the model class for table "{{notification}}".
 *
 * The followings are the available columns in table '{{notification}}':
 * @property integer $id
 * @property integer $sender_id
 * @property integer $recipient_id
 * @property integer $source_id
 * @property string $title
 * @property string $message
 * @property integer $type_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $sender
 * @property User $recipient
 * @property Level $type
 */
class Notification extends CActiveRecord {

 public static $NOTIFICATIONS_PER_PAGE = 5;
 public static $TYPE_GENERAL = 0;
 public static $TYPE_REQUEST = 1;

 /*     notification type    */
 public static $NOTIFICATION_SKILL_JUDGE = 27;

 /*     notification type    */
 public static $REQUEST_FROM_OWNER = 1;
 public static $REQUEST_FROM_FRIEND = 2;
 public static $NOTIFICATION_MENTOR_REQUEST_OWNER = 1;
 public static $NOTIFICATION_MENTEE_REQUEST_OWNER = 2;
 public static $NOTIFICATION_MENTOR_REQUEST_FRIEND = 3;
 public static $NOTIFICATION_MENTEE_REQUEST_FRIEND = 4;
 public static $NOTIFICATION_MENTOR_ASSIGN_OWNER = 5;
 public static $NOTIFICATION_MENTOR_ASSIGN_FRIEND = 6;
 public static $NOTIFICATION_MENTEE_ASSIGN_OWNER = 7;
 public static $NOTIFICATION_MENTEE_ASSIGN_FRIEND = 8;
 public static $NOTIFICATION_PROJECT_MEMBER_OWNER = 9;
 public static $NOTIFICATION_PROJECT_MEMBER_FRIEND = 10;


 /*    status type    */
 public static $STATUS_PENDING = 0;
 public static $STATUS_ACCEPTED = 1;

 public static function deleteNotification($notificationId) {
  Notification::model()->deleteByPk($notificationId);
 }

 public static function setNotification($message, $source_id, $type, $sender_id, $recipient_ids) {
  foreach ($recipient_ids as $recipient_id) {
   $notification = new Notification();
   $notification->message = $message;
   $notification->source_id = $source_id;
   $notification->type_id = $type;
   $notification->sender_id = $sender_id;
   $notification->recipient_id = $recipient_id;
   $notification->save(false);
  }
 }

 public static function getNotifications($type = null, $sourceId = null, $limit = null, $offset = null) {
  $notificationCriteria = new CDbCriteria;
  $notificationCriteria->alias = "t1";
  //$notificationCriteria->addCondition("recipient_id=" . Yii::app()->user->id);
  $notificationCriteria->addCondition("status=" . Notification::$STATUS_PENDING);
  if ($type) {
   $notificationCriteria->addCondition("type_id=" . $type);
  }
  if ($sourceId) {
   $notificationCriteria->addCondition("source_id=" . $sourceId);
  }
  if ($limit) {
   $notificationCriteria->limit = $limit;
  }
  if ($offset) {
   $notificationCriteria->offset = $offset;
  }
  $notificationCriteria->order = "t1.id desc";
  return Notification::Model()->findAll($notificationCriteria);
 }

 public static function getNotificationsCount($type = null, $sourceId = null, $offset = null) {
  $notificationCriteria = new CDbCriteria;
  $notificationCriteria->addCondition("recipient_id=" . Yii::app()->user->id);
  $notificationCriteria->addCondition("status=" . Notification::$STATUS_PENDING);
  if ($type) {
   $notificationCriteria->addCondition("type_id=" . $type);
  }
  if ($sourceId) {
   $notificationCriteria->addCondition("source_id=" . $sourceId);
  }
  if ($offset) {
   $notificationCriteria->offset = $offset;
  }
  return Notification::Model()->count($notificationCriteria);
 }

 public static function getPendingRequest($type, $source_id) {
  if (!Yii::app()->user->isGuest) {
   $notificationCriteria = new CDbCriteria;
   $notificationCriteria->addCondition("recipient_id=" . Yii::app()->user->id);
   $notificationCriteria->addCondition("status=" . Notification::$STATUS_PENDING);
   $notificationCriteria->addCondition("type", $type);
   $notificationCriteria->addCondition("source_id=" . $source_id);
   return Notification::Model()->find($notificationCriteria);
  }
 }

 public static function getRequestStatus($source_id, $recipientId = null, $pendingOnly = null) {
  $notificationCriteria = new CDbCriteria;
  if ($pendingOnly) {
   $notificationCriteria->addCondition("status=" . Notification::$STATUS_PENDING);
  }
  if (!Yii::app()->user->isGuest) {
   $notificationCriteria->addCondition("sender_id=" . Yii::app()->user->id);
  }
  $notificationCriteria->addCondition("source_id=" . $source_id);
  if ($recipientId) {
   $notificationCriteria->addCondition("recipient_id=" . $recipientId);
   return Notification::Model()->find($notificationCriteria);
  }
  return Notification::Model()->findAll($notificationCriteria);
 }

 public static function getRequestTypeName($type) {
  switch ($type) {
   case Type::$SOURCE_MENTOR_REQUESTS:
    return "Mentor";
   case Type::$SOURCE_MENTEE_REQUESTS:
    return "Mentee";
   case Notification::$NOTIFICATION_MENTOR_ASSIGN_OWNER:
    return "Mentor Assign";
  }
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Notification the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{notification}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('', 'required'),
    array('sender_id, recipient_id, source_id, type_id, status', 'numerical', 'integerOnly' => true),
    array('title, message', 'length', 'max' => 500),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, sender_id, recipient_id, source_id, title, message, type_id, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'sender' => array(self::BELONGS_TO, 'User', 'sender_id'),
    'recipient' => array(self::BELONGS_TO, 'User', 'recipient_id'),
    'type' => array(self::BELONGS_TO, 'Level', 'type_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'sender_id' => 'Sender',
    'recipient_id' => 'Recipient',
    'source_id' => 'Source',
    'title' => 'Title',
    'message' => 'Message',
    'type_id' => 'Type',
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
  $criteria->compare('sender_id', $this->sender_id);
  $criteria->compare('recipient_id', $this->recipient_id);
  $criteria->compare('source_id', $this->source_id);
  $criteria->compare('title', $this->title, true);
  $criteria->compare('message', $this->message, true);
  $criteria->compare('type_id', $this->type_id);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
