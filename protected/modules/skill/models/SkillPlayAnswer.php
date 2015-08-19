<?php

/**
 * This is the model class for table "{{skill_play_answer}}".
 *
 * The followings are the available columns in table '{{skill_play_answer}}':
 * @property integer $id
 * @property integer $skill_id
 * @property integer $creator_id
 * @property integer $skill_modified_id
 * @property integer $skill_level_id
 * @property string $description
 * @property string $created_date
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Skill $skill
 * @property Level $skillLevel
 * @property Skill $skillModified
 */
class SkillPlayAnswer extends CActiveRecord {

 public static function getPlayAnswers($limit = null, $offset = null) {
  $skillPlayAnswerCriteria = new CDbCriteria;
  $skillPlayAnswerCriteria->addCondition("creator_id=" . Yii::app()->user->id);

  if ($limit) {
   $skillPlayAnswerCriteria->limit = $limit;
  }
  if ($offset) {
   $skillPlayAnswerCriteria->offset = $offset;
  }
  $skillPlayAnswerCriteria->alias = 's';
  $skillPlayAnswerCriteria->order = "s.id desc";
  return SkillPlayAnswer::Model()->findAll($skillPlayAnswerCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return SkillPlayAnswer the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{skill_play_answer}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('skill_id', 'required'),
    array('skill_id, creator_id, skill_modified_id, skill_level_id, privacy, status', 'numerical', 'integerOnly' => true),
    array('description', 'length', 'max' => 1000),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, skill_id, creator_id, skill_modified_id, skill_level_id, description, created_date, privacy, status', 'safe', 'on' => 'search'),
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
    'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
    'skillLevel' => array(self::BELONGS_TO, 'Level', 'skill_level_id'),
    'skillModified' => array(self::BELONGS_TO, 'Skill', 'skill_modified_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'skill_id' => 'Skill',
    'creator_id' => 'Creator',
    'skill_modified_id' => 'Skill Modified',
    'skill_level_id' => 'Skill Level',
    'description' => 'Description',
    'created_date' => 'Created Date',
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
  $criteria->compare('skill_id', $this->skill_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('skill_modified_id', $this->skill_modified_id);
  $criteria->compare('skill_level_id', $this->skill_level_id);
  $criteria->compare('description', $this->description, true);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
