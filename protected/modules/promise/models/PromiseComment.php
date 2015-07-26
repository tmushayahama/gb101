<?php

/**
 * This is the model class for table "{{promise_comment}}".
 *
 * The followings are the available columns in table '{{promise_comment}}':
 * @property integer $id
 * @property integer $comment_id
 * @property integer $promise_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Comment $comment
 */
class PromiseComment extends CActiveRecord {

 public static function getPromiseParentComment($childCommentId, $promiseId) {
  $promiseCommentCriteria = new CDbCriteria;
  $promiseCommentCriteria->addCondition("comment_id=" . $childCommentId);
  $promiseCommentCriteria->addCondition("promise_id = " . $promiseId);

  return PromiseComment::Model()->find($promiseCommentCriteria);
 }

 public static function getPromiseParentComments($promiseId, $limit = null, $offset = null) {
  $promiseCommentCriteria = new CDbCriteria;
  if ($limit) {
   $promiseCommentCriteria->limit = $limit;
  }
  if ($offset) {
   $promiseCommentCriteria->offset = $offset;
  }
  $promiseCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $promiseCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $promiseCommentCriteria->addCondition("promise_id = " . $promiseId);
  $promiseCommentCriteria->order = "td.id desc";
  return PromiseComment::Model()->findAll($promiseCommentCriteria);
 }

 public static function getPromiseParentCommentsCount($promiseId) {
  $promiseCommentCriteria = new CDbCriteria;
  $promiseCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $promiseCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $promiseCommentCriteria->addCondition("promise_id = " . $promiseId);
  return PromiseComment::Model()->count($promiseCommentCriteria);
 }

 public static function getPromiseChildrenComments($commentParentId) {
  $promiseCommentCriteria = new CDbCriteria;
  $promiseCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $promiseCommentCriteria->addCondition("td.parent_comment_id=" . $commentParentId);
  $promiseCommentCriteria->order = "td.id desc";
  return PromiseComment::Model()->findAll($promiseCommentCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return PromiseComment the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{promise_comment}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('comment_id, promise_id', 'required'),
    array('comment_id, promise_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, comment_id, promise_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'promise' => array(self::BELONGS_TO, 'Promise', 'promise_id'),
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
    'promise_id' => 'Promise',
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
  $criteria->compare('promise_id', $this->promise_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
