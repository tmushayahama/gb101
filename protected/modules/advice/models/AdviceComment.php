<?php

/**
 * This is the model class for table "{{advice_comment}}".
 *
 * The followings are the available columns in table '{{advice_comment}}':
 * @property integer $id
 * @property integer $comment_id
 * @property integer $advice_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Advice $advice
 * @property Comment $comment
 */
class AdviceComment extends CActiveRecord {

 public static function getAdviceParentComment($childCommentId, $adviceId) {
  $adviceCommentCriteria = new CDbCriteria;
  $adviceCommentCriteria->addCondition("comment_id=" . $childCommentId);
  $adviceCommentCriteria->addCondition("advice_id = " . $adviceId);

  return AdviceComment::Model()->find($adviceCommentCriteria);
 }

 public static function getAdviceParentComments($adviceId, $limit = null, $offset = null) {
  $adviceCommentCriteria = new CDbCriteria;
  if ($limit) {
   $adviceCommentCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceCommentCriteria->offset = $offset;
  }
  $adviceCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $adviceCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $adviceCommentCriteria->addCondition("advice_id = " . $adviceId);
  $adviceCommentCriteria->order = "td.id desc";
  return AdviceComment::Model()->findAll($adviceCommentCriteria);
 }

 public static function getAdviceParentCommentsCount($adviceId) {
  $adviceCommentCriteria = new CDbCriteria;
  $adviceCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $adviceCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $adviceCommentCriteria->addCondition("advice_id = " . $adviceId);
  return AdviceComment::Model()->count($adviceCommentCriteria);
 }

 public static function getAdviceChildrenComments($commentParentId) {
  $adviceCommentCriteria = new CDbCriteria;
  $adviceCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $adviceCommentCriteria->addCondition("td.parent_comment_id=" . $commentParentId);
  $adviceCommentCriteria->order = "td.id desc";
  return AdviceComment::Model()->findAll($adviceCommentCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceComment the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_comment}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('comment_id, advice_id', 'required'),
    array('comment_id, advice_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, comment_id, advice_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'advice' => array(self::BELONGS_TO, 'Advice', 'advice_id'),
    'comment' => array(self::BELONGS_TO, 'Comment', 'comment_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'comment_id' => 'Comment',
    'advice_id' => 'Advice',
    'privacy' => 'Privacy',
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
  $criteria->compare('comment_id', $this->comment_id);
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
