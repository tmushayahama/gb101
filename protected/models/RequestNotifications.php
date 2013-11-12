<?php

/**
 * This is the model class for table "{{request_notifications}}".
 *
 * The followings are the available columns in table '{{request_notifications}}':
 * @property integer $id
 * @property integer $from_id
 * @property integer $to_id
 * @property integer $notification_id
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $to
 * @property User $from
 */
class RequestNotifications extends CActiveRecord {

  public static $TYPE_MONITOR_REQUEST = 1;

  public static function getRequestsNotifications($limit = null) {
    $requestNotificationsCriteria = new CDbCriteria;
    $requestNotificationsCriteria->alias = "t1";
    $requestNotificationsCriteria->condition = "to_id=" . Yii::app()->user->id;
    $requestNotificationsCriteria->addCondition("status=0");
    $requestNotificationsCriteria->order = "t1.id desc";
    $requestNotificationsCriteria->limit = $limit;
    return RequestNotifications::Model()->findAll($requestNotificationsCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return RequestNotifications the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{request_notifications}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('from_id, to_id, notification_id, type', 'required'),
     array('from_id, to_id, notification_id, type, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, from_id, to_id, notification_id, type, status', 'safe', 'on' => 'search'),
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
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
