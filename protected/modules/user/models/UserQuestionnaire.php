<?php

/**
 * This is the model class for table "{{user_questionnaire}}".
 *
 * The followings are the available columns in table '{{user_questionnaire}}':
 * @property integer $id
 * @property integer $questionnaire_id
 * @property integer $user_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $user
 * @property Questionnaire $questionnaire
 */
class UserQuestionnaire extends CActiveRecord {

 public static $USER_QUESTIONNAIRES_PER_PAGE = 10;

 public static function getUserQuestionnaires($userId, $limit = null, $offset = null) {
  $userQuestionnaireCriteria = new CDbCriteria;
  if ($limit) {
   $userQuestionnaireCriteria->limit = $limit;
  }
  if ($offset) {
   $userQuestionnaireCriteria->offset = $offset;
  }
  //$userQuestionnaireCriteria->with = array("comment" => array("alias" => 'td'));
  //$userQuestionnaireCriteria->addCondition("td.parent_comment_id is NULL");
  $userQuestionnaireCriteria->addCondition("user_id = " . $userId);
  $userQuestionnaireCriteria->order = "td.id desc";
  return UserQuestionnaire::Model()->findAll($userQuestionnaireCriteria);
 }

 public static function getUserQuestionnairesCount($userId, $offset = null) {
  $userQuestionnaireCriteria = new CDbCriteria;
  if ($offset) {
   $userQuestionnaireCriteria->offset = $offset;
  }
  //$userQuestionnaireCriteria->with = array("comment" => array("alias" => 'td'));
  //$userQuestionnaireCriteria->addCondition("td.parent_comment_id is NULL");
  $userQuestionnaireCriteria->addCondition("user_id = " . $userId);
  return UserQuestionnaire::Model()->count($userQuestionnaireCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return UserQuestionnaire the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{user_questionnaire}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('questionnaire_id, user_id', 'required'),
    array('questionnaire_id, user_id, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, questionnaire_id, user_id, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
    'questionnaire' => array(self::BELONGS_TO, 'Questionnaire', 'questionnaire_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'questionnaire_id' => 'Questionnaire',
    'user_id' => 'User',
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
  $criteria->compare('questionnaire_id', $this->questionnaire_id);
  $criteria->compare('user_id', $this->user_id);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
