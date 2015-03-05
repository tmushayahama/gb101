<?php

/**
 * This is the model class for table "{{timeline}}".
 *
 * The followings are the available columns in table '{{timeline}}':
 * @property integer $id
 * @property integer $parent_timeline_id
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $importance
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Timeline $parentTimeline
 * @property Timeline[] $timelines
 * @property SkillTimeline[] $skillTimelines
 * @property TodoTimeline[] $todoTimelines
 */
class Timeline extends CActiveRecord {

 public static $TIMELINES_PER_OVERVIEW_PAGE = 3;
 public static $TIMELINES_PER_PAGE = 20;

 public static function deleteTimeline($timelineId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_TIMELINE);
  $postsCriteria->addCondition("source_id=" . $timelineId);
  Post::model()->deleteAll($postsCriteria);
  Timeline::model()->deleteByPk($timelineId);
 }

 public static function getChildrenTimelines($timelineParentId, $limit = null) {
  $timelineCriteria = new CDbCriteria;
  if ($limit) {
   $timelineCriteria->limit = $limit;
  }
  $timelineCriteria->alias = "td";
  $timelineCriteria->addCondition("parent_timeline_id=" . $timelineParentId);
  $timelineCriteria->order = "td.id desc";
  return Timeline::Model()->findAll($timelineCriteria);
 }

 public static function getChildrenTimelinesCount($timelineParentId) {
  $timelineCriteria = new CDbCriteria;
  $timelineCriteria->addCondition("parent_timeline_id=" . $timelineParentId);
  return Timeline::Model()->count($timelineCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Timeline the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{timeline}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('description', 'required'),
    array('parent_timeline_id, creator_id, importance, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_timeline_id, creator_id, description, created_date, importance, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'parentTimeline' => array(self::BELONGS_TO, 'Timeline', 'parent_timeline_id'),
    'timelines' => array(self::HAS_MANY, 'Timeline', 'parent_timeline_id'),
    'skillTimelines' => array(self::HAS_MANY, 'SkillTimeline', 'timeline_id'),
    'todoTimelines' => array(self::HAS_MANY, 'TodoTimeline', 'timeline_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_timeline_id' => 'Parent Timeline',
    'creator_id' => 'Creator',
    'description' => 'Description',
    'created_date' => 'Created Date',
    'importance' => 'Importance',
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
  $criteria->compare('parent_timeline_id', $this->parent_timeline_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('importance', $this->importance);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
