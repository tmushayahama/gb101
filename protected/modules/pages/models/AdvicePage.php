<?php

/**
 * This is the model class for table "{{advice_page}}".
 *
 * The followings are the available columns in table '{{advice_page}}':
 * @property integer $id
 * @property integer $subgoals
 * @property integer $page_id
 * @property integer $goal_id
 * @property integer $level_id
 *
 * The followings are the available model relations:
 * @property Page $page
 * @property Goal $goal
 * @property Level $level
 * @property AdvicePageSubgoal[] $advicePageSubgoals
 */
class AdvicePage extends CActiveRecord
{
  

  public static function getAdvicePages($goalId = null, $keyword = null, $limit = null) {
    $goalPagesCriteria = new CDbCriteria;
    // $goalPagesCriteria->group = 'page_id';
    //$goalPagesCriteria->distinct = 'true';
    $goalPagesCriteria->alias = "aD";
    $goalPagesCriteria->group = "goal_id";
    $goalPagesCriteria->order = "aD.id";
    if ($limit != null) {
      $goalPagesCriteria->limit = $limit;
    }
    if ($goalId != null) {
      //$goalPagesCriteria->with = array("goalPages" => array("alias" => "gP"));
      $goalPagesCriteria->addCondition("goal_id=" . $goalId);
    }
    if ($keyword != null) {
      //$goalPagesCriteria->compare("g.title", $keyword, true, "OR");
      // $goalPagesCriteria->compare("g.description", $keyword, true, "OR");
    }
    $goalPagesCriteria->distinct = true;
    return AdvicePage::Model()->findAll($goalPagesCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdvicePage the static model class
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
		return '{{advice_page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('subgoals, level_id', 'required'),
			array('subgoals, page_id, goal_id, level_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, subgoals, page_id, goal_id, level_id', 'safe', 'on'=>'search'),
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
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
			'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'advicePageSubgoals' => array(self::HAS_MANY, 'AdvicePageSubgoal', 'advice_page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'subgoals' => 'Subgoals',
			'page_id' => 'Page',
			'goal_id' => 'Goal',
			'level_id' => 'Level',
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
		$criteria->compare('subgoals',$this->subgoals);
		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('goal_id',$this->goal_id);
		$criteria->compare('level_id',$this->level_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}