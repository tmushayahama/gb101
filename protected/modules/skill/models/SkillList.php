<?php

/**
 * This is the model class for table "{{skill_list}}".
 *
 * The followings are the available columns in table '{{skill_list}}':
 * @property integer $id
 * @property integer $type_id
 * @property integer $owner_id
 * @property integer $skill_id
 * @property integer $level_id
 * @property integer $list_bank_parent_id
 * @property integer $status
 * @property integer $privacy
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property AdvicePage[] $advicePages
 * @property AdvicePageSubskill[] $advicePageSubskills
 * @property Mentorship[] $mentorships
 * @property Skill $skill
 * @property Level $level
 * @property ListBank $listBankParent
 * @property SkillType $type
 * @property User $owner
 * @property SkillListJudge[] $skillListJudges
 * @property SkillListObserver[] $skillListObservers
 * @property SkillListShare[] $skillListShares
 */
class SkillList extends CActiveRecord
{
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

  public static function deleteSkillList($skillListId) {
    $postsCriteria = new CDbCriteria;
    $postsCriteria->addCondition("type=" . Type::$SOURCE_SKILL);
    $postsCriteria->addCondition("source_id=" . $skillListId);
    Post::model()->deleteAll($postsCriteria);
    SkillList::model()->deleteByPk($skillListId);
  }

  /**
   * This is the function to get the preview to display according to 
   * one's skill level and privilege
   * @param type $skillListItem the skillList list entry
   */
  public static function getSkillViewType($skillListItem) {
   switch ($skillListItem->level->code) {
      case Level::$LEVEL_SKILL_GAINED:
        if ($skillListItem->owner_id == Yii::app()->user->id) {
          return SkillList::$SKILL_OWNER_GAINED;
        } else {
          return Skilllist::$SKILL_IS_FRIEND_GAINED;
        }
        break;
      case Level::$LEVEL_SKILL_TO_IMPROVE:
        if ($skillListItem->owner_id == Yii::app()->user->id) {
          return SkillList::$SKILL_OWNER_TO_IMPROVE;
        } else {
          return Skilllist::$SKILL_IS_FRIEND_TO_IMPROVE;
        }
        break;
      case Level::$LEVEL_SKILL_TO_LEARN:
        if ($skillListItem->owner_id == Yii::app()->user->id) {
          return SkillList::$SKILL_OWNER_TO_LEARN;
        } else {
          return Skilllist::$SKILL_IS_FRIEND_TO_LEARN;
        }
        break;
      case Level::$LEVEL_SKILL_OF_INTEREST:
      case Level::$LEVEL_SKILL_OTHER:
        if ($skillListItem->owner_id == Yii::app()->user->id) {
          return SkillList::$SKILL_OWNER_OF_INTEREST;
        } else {
          return Skilllist::$SKILL_IS_FRIEND_OF_INTEREST;
        }
        break;
    }
  }

  public static function getSkillList($levelCategory = null, $ownerId = null, $connectionId = null, $levelIds = null, $limit = null) {
    $skillListCriteria = new CDbCriteria;
    $skillListCriteria->alias = "gList";
    $skillListCriteria->with = array("level" => array("alias" => 'level'));
    if ($ownerId != null) {
      //$skillListCriteria->addCondition("owner_id=" . $ownerId);
    }
    if ($levelCategory != null) {
      //$skillListCriteria->addCondition("level.category=" . $levelCategory);
    }
    if ($levelIds != null) {
      $levelIdArray = [];
      foreach ($levelIds as $levelId) {
        array_push($levelIdArray, $levelId);
      }
      //$skillListCriteria->addInCondition("level_id", $levelIdArray);
    }
    $skillListCriteria->order = "gList.id desc";
    if ($connectionId != null) {
//$skillListCriteria->addCondition("connection_id=" . $connectionId);
    }
    if ($limit != null) {
      $skillListCriteria->limit = $limit;
    }
    return SkillList::Model()->findAll($skillListCriteria);
  }

  public static function getSkillListCount($levelCategory, $levelId, $ownerId) {
    $skillListCriteria = new CDbCriteria;
    $skillListCriteria->with = array("level" => array("alias" => 'level'));
    $skillListCriteria->addCondition("level.category=" . $levelCategory);
    if ($levelId) {
      $skillListCriteria->addCondition("level_id=" . $levelId);
    }
    if ($ownerId) {
      $skillListCriteria->addCondition("owner_id=" . $ownerId);
    }
    return SkillList::Model()->count($skillListCriteria);
  }

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillList the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{skill_list}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive owner inputs.
		return array(
			array('level_id', 'required'),
			array('type_id, owner_id, skill_id, level_id, list_bank_parent_id, status, privacy, order', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, owner_id, skill_id, level_id, list_bank_parent_id, status, privacy, order', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'skill_list_id'),
			'advicePageSubskills' => array(self::HAS_MANY, 'AdvicePageSubskill', 'subskill_list_id'),
			'mentorships' => array(self::HAS_MANY, 'Mentorship', 'skill_list_id'),
			'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'listBankParent' => array(self::BELONGS_TO, 'ListBank', 'list_bank_parent_id'),
			'type' => array(self::BELONGS_TO, 'SkillType', 'type_id'),
			'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
			'skillListJudges' => array(self::HAS_MANY, 'SkillListJudge', 'skill_list_id'),
			'skillListObservers' => array(self::HAS_MANY, 'SkillListObserver', 'skill_list_id'),
			'skillListShares' => array(self::HAS_MANY, 'SkillListShare', 'skill_list_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type_id' => 'Type',
			'owner_id' => 'Owner',
			'skill_id' => 'Skill',
			'level_id' => 'Level',
			'list_bank_parent_id' => 'List Bank Parent',
			'status' => 'Status',
			'privacy' => 'Privacy',
			'order' => 'Order',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('list_bank_parent_id',$this->list_bank_parent_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}