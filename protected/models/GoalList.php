<?php

/**
 * This is the model class for table "{{goal_list}}".
 *
 * The followings are the available columns in table '{{goal_list}}':
 * @property integer $id
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $goal_id
 * @property integer $goal_level_id
 * @property integer $list_bank_parent_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property GoalType $type
 * @property Goal $goal
 * @property GoalLevel $goalLevel
 * @property ListBank $listBankParent
 * @property User $user
 * @property GoalListMentor[] $goalListMentors
 * @property GoalListShare[] $goalListShares
 */
class GoalList extends CActiveRecord {

  public static $TYPE_SKILL = 1;
  public static $TYPE_PROMISE = 2;
  public static $TYPE_GOAL = 3;
//These are the types of displays for the post
  public static $SKILL_OWNER_GAINED = 1;
  public static $SKILL_OWNER_TO_LEARN = 2;
  public static $SKILL_IS_FRIEND_GAINED = 3;
  public static $SKILL_IS_FRIEND_TO_LEARN = 4;
  public $title;
  public $description;

  /**
   * This is the function to get the preview to display according to 
   * one's skill level and privilege
   * @param type $skillListItem the goalList list entry
   */
  public static function getSkillViewType($skillListItem) {
    switch ($skillListItem->goal_level_id) {
      case GoalLevel::$LEVEL_SKILL_GAINED:
        if ($skillListItem->user_id == Yii::app()->user->id) {
          return GoalList::$SKILL_OWNER_GAINED;
        } else {
          return Goallist::$SKILL_IS_FRIEND_GAINED;
        }
        break;
      case GoalLevel::$LEVEL_SKILL_TO_LEARN:
        if ($skillListItem->user_id == Yii::app()->user->id) {
          return GoalList::$SKILL_OWNER_TO_LEARN;
        } else {
          return Goallist::$SKILL_IS_FRIEND_TO_LEARN;
        }
        break;
    }
  }

  public static function getGoalList($typeCategory, $connectionId, $goalLevelId=null, $limit = null) {
    $goalListCriteria = new CDbCriteria;
    $goalListCriteria->alias = "gList";
    $goalListCriteria->with = array("goalLevel" => array("alias" => 'goalLevel'));
    $goalListCriteria->addCondition("user_id=" . Yii::app()->user->id);
    $goalListCriteria->addCondition("goalLevel.level_category='" . $typeCategory . "'");
    if ($goalLevelId != null) {
      $goalListCriteria->addCondition("goal_level_id=" . $goalLevelId);
    }
    $goalListCriteria->order = "gList.id desc";
    if ($connectionId != 0) {
//$goalListCriteria->addCondition("connection_id=" . $connectionId);
    }
    if ($limit != null) {
      $goalListCriteria->limit = $limit;
    }
    return GoalList::Model()->findAll($goalListCriteria);
  }

  public static function getGoalListCount($typeCategory, $connectionId, $goalLevelId) {
    $goalListCriteria = new CDbCriteria;
    $goalListCriteria->with = array("goalLevel" => array("alias" => 'goalLevel'));
    $goalListCriteria->addCondition("user_id=" . Yii::app()->user->id);
    $goalListCriteria->addCondition("goalLevel.level_category='" . $typeCategory . "'");
    if ($goalLevelId != 0) {
      $goalListCriteria->addCondition("goal_level_id=" . $goalLevelId);
    }
    if ($connectionId != 0) {
//$goalListCriteria->addCondition("connection_id=" . $connectionId);
    }
    return GoalList::Model()->count($goalListCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return GoalList the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{goal_list}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
    return array(
     array('type_id, title, user_id, goal_id', 'required'),
     array('type_id, user_id, goal_id, goal_level_id, list_bank_parent_id, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
// Please remove those attributes that should not be searched.
     array('id, type_id, user_id, goal_id, goal_level_id, list_bank_parent_id, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
    return array(
     'type' => array(self::BELONGS_TO, 'GoalType', 'type_id'),
     'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
     'goalLevel' => array(self::BELONGS_TO, 'GoalLevel', 'goal_level_id'),
     'listBankParent' => array(self::BELONGS_TO, 'ListBank', 'list_bank_parent_id'),
     'user' => array(self::BELONGS_TO, 'User', 'user_id'),
     'goalListMentors' => array(self::HAS_MANY, 'GoalListMentor', 'goal_list_id'),
     'goalListShares' => array(self::HAS_MANY, 'GoalListShare', 'goal_list_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'type_id' => 'Type',
     'user_id' => 'User',
     'goal_id' => 'Goal',
     'goal_level_id' => 'Goal Level',
     'list_bank_parent_id' => 'List Bank Parent',
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
    $criteria->compare('type_id', $this->type_id);
    $criteria->compare('user_id', $this->user_id);
    $criteria->compare('goal_id', $this->goal_id);
    $criteria->compare('goal_level_id', $this->goal_level_id);
    $criteria->compare('list_bank_parent_id', $this->list_bank_parent_id);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
