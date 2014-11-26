<?php

/**
 * This is the model class for table "{{bank}}".
 *
 * The followings are the available columns in table '{{bank}}':
 * @property integer $id
 * @property integer $type_id
 * @property string $name
 * @property string $skill
 * @property string $description
 * @property integer $creator_id
 * @property integer $times_used
 * @property integer $times_gained
 * @property integer $times_learning
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property SkillType $type
 * @property GoalList[] $goalLists
 * @property HobbyList[] $hobbyLists
 * @property PromiseList[] $promiseLists
 * @property Skill[] $skills
 */
class Bank extends CActiveRecord
{
   public static $TYPE_SKILL_ACADEMIC = 1;
  public static $TYPE_SKILL_SELF_MANGEMENT = 2;
  public static $TYPE_SKILL_TRANSFERABLE = 3;
  public static $TYPE_SKILL_MISCELLANEOUS = 4;

  public static function getBank($typeCategory, $keyword = null, $type = null, $limit = null, $offset=null) {
    $bankCriteria = new CDbCriteria;
    $bankCriteria->alias = "lB";
    $bankCriteria->order = "name asc";
    $bankCriteria->group = "name";
    $bankCriteria->with = array("type" => array("alias" => 't2'));
    $bankCriteria->distinct = true;
    if ($type != null) {
      $bankCriteria->addCondition("type_id=" . $type);
    }
    if ($keyword != null) {
      $bankCriteria->compare("lB.name", $keyword, true, "OR");
      $bankCriteria->compare("lB.description", $keyword, true, "OR");
    } else {
      $bankCriteria->addCondition("t2.category='" . $typeCategory . "'");
    }
    if ($limit != null) {
      $bankCriteria->limit = $limit;
    }
     if ($offset != null) {
      $bankCriteria->offset = $offset;
    }
    return Bank::Model()->findAll($bankCriteria);
  }

  public static function getBankSearchCriteria($typeCategory, $type = null, $limit = null, $offset=null) {
    $bankCriteria = new CDbCriteria;
    $bankCriteria->order = "name asc";
    $bankCriteria->group = "name";
    $bankCriteria->with = array("type" => array("alias" => 't2'));
    $bankCriteria->distinct = true;
    $bankCriteria->addCondition("t2.category='" . $typeCategory . "'");
    if ($type != null) {
      $bankCriteria->addCondition("type_id=" . $type);
    }
    if ($limit != null) {
      $bankCriteria->limit = $limit;
    }
     if ($offset != null) {
      $bankCriteria->offset = $offset;
    }
    return $bankCriteria;
  }

  public static function getBankCount($typeCategory) {
    $bankCriteria = new CDbCriteria;
    $bankCriteria->with = array("type" => array("alias" => 't2'));
    $bankCriteria->distinct = true;
    $bankCriteria->addCondition("t2.category='" . $typeCategory . "'");

    return Bank::Model()->Count($bankCriteria);
  }

  public static function GetSublist($name) {
    $bankCriteria = new CDbCriteria;
    $bankCriteria->addCondition('name="' . $name . '"');
    $bankCriteria->addCondition('skill is not null');
    return Bank::Model()->findAll($bankCriteria);
  }

  public static function getBankKeywordSearchCriteria($keyword, $limit = null) {
    $bankCriteria = new CDbCriteria;
    $bankCriteria->order = "name asc";
    $bankCriteria->group = "name";
    $bankCriteria->with = array("type" => array("alias" => 't2'));
    $bankCriteria->distinct = true;
    $bankCriteria->compare("name", $keyword, true, "OR");
    $bankCriteria->compare("description", $keyword, true, "OR");
    $bankCriteria->compare("t2.category", $keyword, true, "OR");
    $bankCriteria->compare("t2.type", $keyword, true, "OR");
    $bankCriteria->compare("t2.description", $keyword, true, "OR");
    $bankCriteria->addCondition("not t2.type='" . SkillType::$TYPE_ACTION_WORDS . "'");

    if ($limit != null) {
      $bankCriteria->limit = $limit;
    }
    return $bankCriteria;
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Bank the static model class
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
		return '{{bank}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name', 'required'),
			array('type_id, creator_id, times_used, times_gained, times_learning', 'numerical', 'integerOnly'=>true),
			array('name, skill', 'length', 'max'=>200),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, name, skill, description, creator_id, times_used, times_gained, times_learning', 'safe', 'on'=>'search'),
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
			'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
			'type' => array(self::BELONGS_TO, 'SkillType', 'type_id'),
			'goalLists' => array(self::HAS_MANY, 'GoalList', 'bank_parent_id'),
			'hobbyLists' => array(self::HAS_MANY, 'HobbyList', 'bank_parent_id'),
			'promiseLists' => array(self::HAS_MANY, 'PromiseList', 'bank_parent_id'),
			'skills' => array(self::HAS_MANY, 'Skill', 'bank_id'),
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
			'name' => 'Name',
			'skill' => 'Skill',
			'description' => 'Description',
			'creator_id' => 'Owner',
			'times_used' => 'Times Used',
			'times_gained' => 'Times Gained',
			'times_learning' => 'Times Learning',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('skill',$this->skill,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('times_used',$this->times_used);
		$criteria->compare('times_gained',$this->times_gained);
		$criteria->compare('times_learning',$this->times_learning);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}