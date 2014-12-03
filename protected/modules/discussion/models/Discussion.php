<?php

/**
 * This is the model class for table "{{discussion}}".
 *
 * The followings are the available columns in table '{{discussion}}':
 * @property integer $id
 * @property integer $parent_discussion_id
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $importance
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Discussion $parentDiscussion
 * @property Discussion[] $discussions
 * @property SkillDiscussion[] $skillDiscussions
 * @property TodoDiscussion[] $todoDiscussions
 */
class Discussion extends CActiveRecord {

 public static $DISCUSSIONS_PER_OVERVIEW_PAGE = 3;
 public static $DISCUSSIONS_PER_PAGE = 20;

 public static function deleteDiscussion($discussionId) {
  $postsCriteria = new CDbCriteria;
  $postsCriteria->addCondition("type=" . Type::$SOURCE_DISCUSSION);
  $postsCriteria->addCondition("source_id=" . $discussionId);
  Post::model()->deleteAll($postsCriteria);
  Discussion::model()->deleteByPk($discussionId);
 }

 public static function getChildrenDiscussions($discussionParentId, $limit = null) {
  $discussionCriteria = new CDbCriteria;
  if ($limit) {
   $discussionCriteria->limit = $limit;
  }
  $discussionCriteria->alias = "td";
  $discussionCriteria->addCondition("parent_discussion_id=" . $discussionParentId);
  $discussionCriteria->order = "td.id desc";
  return Discussion::Model()->findAll($discussionCriteria);
 }

 public static function getChildrenDiscussionsCount($discussionParentId) {
  $discussionCriteria = new CDbCriteria;
  $discussionCriteria->addCondition("parent_discussion_id=" . $discussionParentId);
  return Discussion::Model()->count($discussionCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Discussion the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{discussion}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // DISCUSSION: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('description', 'required'),
    array('parent_discussion_id, creator_id, importance, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, parent_discussion_id, creator_id, description, created_date, importance, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // DISCUSSION: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'parentDiscussion' => array(self::BELONGS_TO, 'Discussion', 'parent_discussion_id'),
    'discussions' => array(self::HAS_MANY, 'Discussion', 'parent_discussion_id'),
    'skillDiscussions' => array(self::HAS_MANY, 'SkillDiscussion', 'discussion_id'),
    'todoDiscussions' => array(self::HAS_MANY, 'TodoDiscussion', 'discussion_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'parent_discussion_id' => 'Parent Discussion',
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
  $criteria->compare('parent_discussion_id', $this->parent_discussion_id);
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
