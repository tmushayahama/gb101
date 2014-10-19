<?php

/**
 * This is the model class for table "{{skill_list_judge}}".
 *
 * The followings are the available columns in table '{{skill_list_judge}}':
 * @property integer $id
 * @property integer $judge_id
 * @property integer $skill_list_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SkillList $skillList
 * @property User $judge
 */
class SkillListJudge extends CActiveRecord {

  public static function acceptJudge($notification) {
    if ($notification != null) {
      $skillJudge = new SkillListJudge();
      $skillJudge->skill_list_id = $notification->source_id;
      $skillJudge->judge_id = $notification->recipient_id;
      if ($skillJudge->save(false)) {
        $notification->status = Notification::$STATUS_ACCEPTED;
        if ($notification->save(false)) {
          return $skillJudge->id;
        }
      }
    }
  }
  
  public static function getSkillListJudges($skillListId) {
    $skillListJudgeCriteria = new CDbCriteria();
    $skillListJudgeCriteria->alias = "slj";
    $skillListJudgeCriteria->order = "slj.id desc";
    $skillListJudgeCriteria->addCondition("skill_list_id=".$skillListId);
    return SkillListJudge::model()->findAll($skillListJudgeCriteria);
  }
  public static function getSkillListJudgesCount($skillListId) {
    $skillListJudgeCriteria = new CDbCriteria();
    $skillListJudgeCriteria->alias = "slj";
    $skillListJudgeCriteria->order = "slj.id desc";
    $skillListJudgeCriteria->addCondition("skill_list_id=".$skillListId);
    return SkillListJudge::model()->count($skillListJudgeCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return SkillListJudge the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{skill_list_judge}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('judge_id, skill_list_id', 'required'),
     array('judge_id, skill_list_id, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, judge_id, skill_list_id, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'skillList' => array(self::BELONGS_TO, 'SkillList', 'skill_list_id'),
     'judge' => array(self::BELONGS_TO, 'User', 'judge_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'judge_id' => 'Judge',
     'skill_list_id' => 'Skill List',
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
    $criteria->compare('judge_id', $this->judge_id);
    $criteria->compare('skill_list_id', $this->skill_list_id);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
