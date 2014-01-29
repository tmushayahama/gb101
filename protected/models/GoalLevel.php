<?php

/**
 * This is the model class for table "{{goal_level}}".
 *
 * The followings are the available columns in table '{{goal_level}}':
 * @property integer $id
 * @property string $level_category
 * @property string $level_name
 * @property string $description
 *
 * The followings are the available model relations:
 * @property GoalList[] $goalLists
 */
class GoalLevel extends CActiveRecord
{
   public static $NAME_SKILL_GAINED = 1;
   public static $LEVEL_SKILL_GAINED = 1;
   public static $LEVEL_SKILL_TO_LEARN = 2;
   public static $LEVEL_SKILL_ACTION_WORDS = 3;
  /**Get all the skills by type
   * 
   */
  public static function getGoalLevels($goalType) {
    $goalSkillCriteria = new CDbCriteria;
    $goalSkillCriteria->addCondition("level_category='".$goalType."'");
    return GoalLevel::Model()->findAll($goalSkillCriteria);
  }
 
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalLevel the static model class
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
		return '{{goal_level}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('level_category, level_name', 'required'),
			array('level_category, level_name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, level_category, level_name, description', 'safe', 'on'=>'search'),
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
			'goalLists' => array(self::HAS_MANY, 'GoalList', 'skill_level_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'level_category' => 'Level Category',
			'level_name' => 'Level Name',
			'description' => 'Description',
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
		$criteria->compare('level_category',$this->level_category,true);
		$criteria->compare('level_name',$this->level_name,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}