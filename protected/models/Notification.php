<?php

/**
 * This is the model class for table "{{notification}}".
 *
 * The followings are the available columns in table '{{notification}}':
 * @property integer $id
 * @property integer $sender_id
 * @property integer $recipient_id
 * @property integer $source_id
 * @property string $message
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $sender
 * @property User $recipient
 */
class Notification extends CActiveRecord {

  public static $TYPE_GENERAL = 1;
  public static $TYPE_REQUEST = 1;

  /*     notification type    */
  public static $NOTIFICATION_MENTOR_REQUEST = 1;
  public static $NOTIFICATION_MENTEE_REQUEST = 2;


  /*    status type    */
  public static $STATUS_PENDING = 0;
  public static $STATUS_ACCEPTED = 1;

  public static function setNotifcation($message, $source_id, $sender_id, $recipient_ids, $type, $status) {
    foreach ($recipient_ids as $recipient_id) {
      $notification = new Notification();
      $notification->message = $message;
      $notification->source_id = $source_id;
      $notification->sender_id = $sender_id;
      $notification->recipient_id = $recipient_id;
      $notification->type = $type;
      $notification->status = $status;
      $notification->save(false);
    }
  }

  public static function getNotifications($type = null, $limit = null, $isGuest = null) {
    $requestNotificationCriteria = new CDbCriteria;
    $requestNotificationCriteria->alias = "t1";
    if (!$isGuest) {
      //$requestNotificationCriteria->condition = "to_id=" . Yii::app()->user->id;
    }
    $requestNotificationCriteria->addCondition("status=0");
    if ($type != null) {
      $requestNotificationCriteria->addCondition("type=" . $type);
    }
    $requestNotificationCriteria->order = "t1.id desc";
    $requestNotificationCriteria->limit = $limit;
    return Notification::Model()->findAll($requestNotificationCriteria);
  }

  public static function getNotification($type, $fromId, $notificationId) {
    $requestNotificationCriteria = new CDbCriteria();
    $requestNotificationCriteria->addCondition("type=" . $type);
    $requestNotificationCriteria->addCondition("from_id=" . $fromId);
    $requestNotificationCriteria->addCondition("notification_id=" . $notificationId);
    return Notification::model()->find($requestNotificationCriteria);
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
     array('sender_id, source_id', 'required'),
     array('sender_id, recipient_id, source_id, type, status', 'numerical', 'integerOnly' => true),
     array('message', 'length', 'max' => 500),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, sender_id, recipient_id, source_id, message, type, status', 'safe', 'on' => 'search'),
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
     'message' => 'Message',
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
    $criteria->compare('sender_id', $this->sender_id);
    $criteria->compare('recipient_id', $this->recipient_id);
    $criteria->compare('source_id', $this->source_id);
    $criteria->compare('message', $this->message, true);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
