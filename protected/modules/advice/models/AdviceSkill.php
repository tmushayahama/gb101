<?php

/**
 * This is the model class for table "{{advice_skill}}".
 *
 * The followings are the available columns in table '{{advice_skill}}':
 * @property integer $id
 * @property integer $skill_id
 * @property integer $advice_id
 * @property integer $creator_id
 * @property string $created_date
 * @property integer $type
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property User $creator
 * @property Advice $advice
 */
class AdviceSkill extends CActiveRecord {

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return AdviceSkill the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 public static function CreateAdviceSkill($adviceParent, $skillId, $requesteeId) {
  $adviceChild = new Advice();
  $adviceChild->parent_advice_id = $adviceParent->id;
  $adviceChild->mentor_id = Yii::app()->user->id;
  $adviceChild->mentee_id = $requesteeId;
  $adviceChild->creator_id = $adviceParent->creator_id;
  $adviceChild->title = $adviceParent->title;
  $adviceChild->description = $adviceParent->description;
  $adviceChild->level_id = $adviceParent->level_id;
  $adviceChild->status = 1;
  if ($adviceChild->save(false)) {
   $adviceSkill = new AdviceSkill();
   $adviceSkill->skill_id = $skillId;
   $adviceSkill->advice_id = $adviceChild->id;
   $adviceSkill->creator_id = Yii::app()->user->id;
   return $adviceSkill->save(false);
  }
  return false;
 }

 public static function getAdviceSkills($skillId, $limit = null, $offset = null) {
  $adviceSkillCriteria = new CDbCriteria;
  if ($limit) {
   $adviceSkillCriteria->limit = $limit;
  }
  if ($offset) {
   $adviceSkillCriteria->offset = $offset;
  }
  //$adviceSkillCriteria->with = array("advice" => array("alias" => 'm'));
  $adviceSkillCriteria->addCondition("skill_id = " . $skillId);
  //$adviceSkillCriteria->order = "m.id desc";
  return AdviceSkill::Model()->findAll($adviceSkillCriteria);
 }

 public static function getAdviceSkillsCount($skillId) {
  $adviceSkillCriteria = new CDbCriteria;
  //$adviceSkillCriteria->with = array("advice" => array("alias" => 'm'));
  $adviceSkillCriteria->addCondition("skill_id = " . $skillId);
  return AdviceSkill::Model()->count($adviceSkillCriteria);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{advice_skill}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('skill_id, advice_id, creator_id, created_date', 'required'),
    array('skill_id, advice_id, creator_id, type, privacy, status', 'numerical', 'integerOnly' => true),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('id, skill_id, advice_id, creator_id, created_date, type, privacy, status', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
    'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    'advice' => array(self::BELONGS_TO, 'Advice', 'advice_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'id' => 'ID',
    'skill_id' => 'Skill',
    'advice_id' => 'Advice',
    'creator_id' => 'Creator',
    'created_date' => 'Created Date',
    'type' => 'Type',
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
  $criteria->compare('advice_id', $this->advice_id);
  $criteria->compare('creator_id', $this->creator_id);
  $criteria->compare('created_date', $this->created_date, true);
  $criteria->compare('type', $this->type);
  $criteria->compare('privacy', $this->privacy);
  $criteria->compare('status', $this->status);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
