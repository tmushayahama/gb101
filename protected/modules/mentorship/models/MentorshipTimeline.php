<?php

/**
 * This is the model class for table "{{mentorship_timeline}}".
 *
 * The followings are the available columns in table '{{mentorship_timeline}}':
 * @property integer $id
 * @property integer $timeline_id
 * @property integer $mentorship_id
 * @property integer $day
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Timeline $timeline
 * @property Mentorship $mentorship
 */
class MentorshipTimeline extends CActiveRecord {

  public static function deleteMentorshipTimeline($mentorshipTimelineId) {
   $mentorshipTimeline = MentorshipTimeline::model()->findByPk($mentorshipTimelineId);
    $mentorshipId = $mentorshipTimeline->mentorship_id;
    $mentorshipTimeline->delete();
    return $mentorshipId;
  }
  public static function getMentorshipTimeline($mentorshipId, $limit = 10) {
    $mentorshipTimelineCriteria = new CDbCriteria;
    $mentorshipTimelineCriteria->addCondition("mentorship_id=" . $mentorshipId);
    $mentorshipTimelineCriteria->order = "day";
    return MentorshipTimeline::model()->findAll($mentorshipTimelineCriteria);
  }

  public static function isNewDay($mentorshipId, $day) {
    $mentorshipTimelineCriteria = new CDbCriteria;
    $mentorshipTimelineCriteria->addCondition("mentorship_id=" . $mentorshipId);
    $mentorshipTimelineCriteria->addCondition("day=" . $day);
    //this is after the item is being added
    return (MentorshipTimeline::model()->count($mentorshipTimelineCriteria)==1);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return MentorshipTimeline the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{mentorship_timeline}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('day', 'required'),
     array('timeline_id, mentorship_id, day, type, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, timeline_id, mentorship_id, day, type, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'timeline' => array(self::BELONGS_TO, 'Timeline', 'timeline_id'),
     'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'timeline_id' => 'Timeline',
     'mentorship_id' => 'Mentorship',
     'day' => 'Day',
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
    $criteria->compare('timeline_id', $this->timeline_id);
    $criteria->compare('mentorship_id', $this->mentorship_id);
    $criteria->compare('day', $this->day);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
