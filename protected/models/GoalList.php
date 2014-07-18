<?php

/**
 * This is the model class for table "{{goal_list}}".
 *
 * The followings are the available columns in table '{{goal_list}}':
 * @property integer $id
 * @property integer $type_id
 * @property integer $user_id
 * @property integer $goal_id
 * @property integer $level_id
 * @property integer $list_bank_parent_id
 * @property integer $status
 * @property integer $privacy
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property AdvicePage[] $advicePages
 * @property AdvicePageSubgoal[] $advicePageSubgoals
 * @property Goal $goal
 * @property Level $level
 * @property ListBank $listBankParent
 * @property GoalType $type
 * @property User $user
 * @property GoalListShare[] $goalListShares
 * @property Mentorship[] $mentorships
 */
class GoalList extends CActiveRecord {

  public static $TYPE_SKILL = 1;
  public static $TYPE_PROMISE = 2;
  public static $TYPE_GOAL = 3;
  public static $SOURCE_SKILL = 1;
  public static $SOURCE_ADVICE_PAGE = 2;
//These are the types of displays for the post
  public static $SKILL_OWNER_GAINED = 1;
  public static $SKILL_OWNER_TO_IMPROVE = 2;
  public static $SKILL_OWNER_TO_LEARN = 3;
  public static $SKILL_OWNER_OF_INTEREST = 4;
  public static $SKILL_IS_FRIEND_GAINED = 5;
  public static $SKILL_IS_FRIEND_TO_IMPROVE = 6;
  public static $SKILL_IS_FRIEND_TO_LEARN = 7;
  public static $SKILL_IS_FRIEND_OF_INTEREST = 8;

  public static function deleteGoalList($goalListId) {
    $postsCriteria = new CDbCriteria;
    $postsCriteria->addCondition("type=" . Type::$SOURCE_SKILL);
    $postsCriteria->addCondition("source_id=" . $goalListId);
    Post::model()->deleteAll($postsCriteria);
    GoalList::model()->deleteByPk($goalListId);
  }

  /**
   * This is the function to get the preview to display according to 
   * one's skill level and privilege
   * @param type $skillListItem the goalList list entry
   */
  public static function getSkillViewType($skillListItem) {
    switch ($skillListItem->level_id) {
      case Level::$LEVEL_SKILL_GAINED:
        if ($skillListItem->user_id == Yii::app()->user->id) {
          return GoalList::$SKILL_OWNER_GAINED;
        } else {
          return Goallist::$SKILL_IS_FRIEND_GAINED;
        }
        break;
      case Level::$LEVEL_SKILL_TO_IMPROVE:
        if ($skillListItem->user_id == Yii::app()->user->id) {
          return GoalList::$SKILL_OWNER_TO_IMPROVE;
        } else {
          return Goallist::$SKILL_IS_FRIEND_TO_IMPROVE;
        }
        break;
      case Level::$LEVEL_SKILL_TO_LEARN:
        if ($skillListItem->user_id == Yii::app()->user->id) {
          return GoalList::$SKILL_OWNER_TO_LEARN;
        } else {
          return Goallist::$SKILL_IS_FRIEND_TO_LEARN;
        }
        break;
      case Level::$LEVEL_SKILL_OF_INTEREST:
      case Level::$LEVEL_SKILL_OTHER:
        if ($skillListItem->user_id == Yii::app()->user->id) {
          return GoalList::$SKILL_OWNER_OF_INTEREST;
        } else {
          return Goallist::$SKILL_IS_FRIEND_OF_INTEREST;
        }
        break;
    }
  }

  public static function getGoalList($levelCategory = null, $userId = null, $connectionId = null, $levelIds = null, $limit = null) {
    $goalListCriteria = new CDbCriteria;
    $goalListCriteria->alias = "gList";
    $goalListCriteria->with = array("level" => array("alias" => 'level'));
    if ($userId != null) {
      $goalListCriteria->addCondition("user_id=" . $userId);
    }
    if ($levelCategory != null) {
      $goalListCriteria->addCondition("level.level_category=" . $levelCategory);
    }
    if ($levelIds != null) {
      $levelIdArray = [];
      foreach ($levelIds as $levelId) {
        array_push($levelIdArray, $levelId);
      }
      $goalListCriteria->addInCondition("level_id", $levelIdArray);
    }
    $goalListCriteria->order = "gList.id desc";
    if ($connectionId != null) {
//$goalListCriteria->addCondition("connection_id=" . $connectionId);
    }
    if ($limit != null) {
      $goalListCriteria->limit = $limit;
    }
    return GoalList::Model()->findAll($goalListCriteria);
  }

  public static function getGoalListCount($levelCategory, $levelId, $ownerId) {
    $goalListCriteria = new CDbCriteria;
    $goalListCriteria->with = array("level" => array("alias" => 'level'));
    $goalListCriteria->addCondition("level.level_category=" . $levelCategory);
    if ($levelId) {
      $goalListCriteria->addCondition("level_id=" . $levelId);
    }
    if ($ownerId) {
      $goalListCriteria->addCondition("user_id=" . $ownerId);
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
     array('level_id', 'required'),
     array('type_id, user_id, goal_id, level_id, list_bank_parent_id, status, privacy, order', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, type_id, user_id, goal_id, level_id, list_bank_parent_id, status, privacy, order', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'goal_list_id'),
     'advicePageSubgoals' => array(self::HAS_MANY, 'AdvicePageSubgoal', 'subgoal_list_id'),
     'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
     'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
     'listBankParent' => array(self::BELONGS_TO, 'ListBank', 'list_bank_parent_id'),
     'type' => array(self::BELONGS_TO, 'GoalType', 'type_id'),
     'user' => array(self::BELONGS_TO, 'User', 'user_id'),
     'goalListShares' => array(self::HAS_MANY, 'GoalListShare', 'goal_list_id'),
     'mentorships' => array(self::HAS_MANY, 'Mentorship', 'goal_list_id'),
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
     'level_id' => 'Level',
     'list_bank_parent_id' => 'List Bank Parent',
     'status' => 'Status',
     'privacy' => 'Sharing Type',
     'order' => 'Order',
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
    $criteria->compare('level_id', $this->level_id);
    $criteria->compare('list_bank_parent_id', $this->list_bank_parent_id);
    $criteria->compare('status', $this->status);
    $criteria->compare('privacy', $this->privacy);
    $criteria->compare('order', $this->order);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
