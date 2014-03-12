<?php

/**
 * This is the model class for table "{{request_notification}}".
 *
 * The followings are the available columns in table '{{request_notification}}':
 * @property integer $id
 * @property integer $from_id
 * @property integer $to_id
 * @property integer $notification_id
 * @property string $message
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $to
 * @property User $from
 */
class RequestNotification extends CActiveRecord {

  public static $TYPE_CONNECTION = 1;
  public static $TYPE_MENTORSHIP = 2;
  public static $TYPE_MENTORSHIP_ENROLLMENT = 3;
  public static $TYPE_MENTORSHIP_REQUEST = 4;
  public static $TYPE_MONITOR = 5;
  public static $STATUS_PENDING = 0;
  public static $STATUS_ACCEPTED = 1;

  public static function getRequestNotifications($type = null, $limit = null, $isGuest=null) {
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
    return RequestNotification::Model()->findAll($requestNotificationCriteria);
  }

  public static function getRequestNotification($type, $fromId, $notificationId) {
    $requestNotificationCriteria = new CDbCriteria();
    $requestNotificationCriteria->addCondition("type=" . $type);
    $requestNotificationCriteria->addCondition("from_id=" . $fromId);
    $requestNotificationCriteria->addCondition("notification_id=" . $notificationId);
    return RequestNotification::model()->find($requestNotificationCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return RequestNotification the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{request_notification}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('from_id, notification_id, type', 'required'),
     array('from_id, to_id, notification_id, type, status', 'numerical', 'integerOnly' => true),
     array('message', 'length', 'max' => 500),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, from_id, to_id, notification_id, message, type, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'to' => array(self::BELONGS_TO, 'User', 'to_id'),
     'from' => array(self::BELONGS_TO, 'User', 'from_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'from_id' => 'From',
     'to_id' => 'To',
     'notification_id' => 'Notification',
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
    $criteria->compare('from_id', $this->from_id);
    $criteria->compare('to_id', $this->to_id);
    $criteria->compare('notification_id', $this->notification_id);
    $criteria->compare('message', $this->message, true);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
