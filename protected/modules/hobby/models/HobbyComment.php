<?php

/**
 * This is the model class for table "{{hobby_comment}}".
 *
 * The followings are the available columns in table '{{hobby_comment}}':
 * @property integer $id
 * @property integer $comment_id
 * @property integer $hobby_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Comment $comment
 */
class HobbyComment extends CActiveRecord {

 public static function getHobbyParentComment($childCommentId, $hobbyId) {
  $hobbyCommentCriteria = new CDbCriteria;
  $hobbyCommentCriteria->addCondition("comment_id=" . $childCommentId);
  $hobbyCommentCriteria->addCondition("hobby_id = " . $hobbyId);

  return HobbyComment::Model()->find($hobbyCommentCriteria);
 }

 public static function getHobbyParentComments($hobbyId, $limit = null, $offset = null) {
  $hobbyCommentCriteria = new CDbCriteria;
  if ($limit) {
   $hobbyCommentCriteria->limit = $limit;
  }
  if ($offset) {
   $hobbyCommentCriteria->offset = $offset;
  }
  $hobbyCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $hobbyCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $hobbyCommentCriteria->addCondition("hobby_id = " . $hobbyId);
  $hobbyCommentCriteria->order = "td.id desc";
  return HobbyComment::Model()->findAll($hobbyCommentCriteria);
 }

 public static function getHobbyParentCommentsCount($hobbyId) {
  $hobbyCommentCriteria = new CDbCriteria;
  $hobbyCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $hobbyCommentCriteria->addCondition("td.parent_comment_id is NULL");
  $hobbyCommentCriteria->addCondition("hobby_id = " . $hobbyId);
  return HobbyComment::Model()->count($hobbyCommentCriteria);
 }

 public static function getHobbyChildrenComments($commentParentId) {
  $hobbyCommentCriteria = new CDbCriteria;
  $hobbyCommentCriteria->with = array("comment" => array("alias" => 'td'));
  $hobbyCommentCriteria->addCondition("td.parent_comment_id=" . $commentParentId);
  $hobbyCommentCriteria->order = "td.id desc";
  return HobbyComment::Model()->findAll($hobbyCommentCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return HobbyComment the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{hobby_comment}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('comment_id, hobby_id', 'required'),
    array('comment_id, hobby_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, comment_id, hobby_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'hobby' => array(self::BELONGS_TO, 'Hobby', 'hobby_id'),
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
    'hobby_id' => 'Hobby',
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
  $criteria->compare('hobby_id', $this->hobby_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
