<?php

/**
 * This is the model class for table "{{goal_page}}".
 *
 * The followings are the available columns in table '{{goal_page}}':
 * @property integer $id
 * @property integer $page_id
 * @property integer $goal_id
 * @property integer $subgoal_id
 *
 * The followings are the available model relations:
 * @property Goal $subgoal
 * @property Goal $goal
 * @property Page $page
 */
class GoalPage extends CActiveRecord
{
  public static function getSubgoal($pageId) {
    $goalPagesCriteria = new CDbCriteria;
    $goalPagesCriteria->addCondition("page_id=".$pageId);
   // $goalPagesCriteria->group = 'page_id';
    //$goalPagesCriteria->distinct = 'true';
    return GoalPage::Model()->findAll($goalPagesCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalPage the static model class
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
		return '{{goal_page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('page_id, goal_id, subgoal_id', 'required'),
			array('page_id, goal_id, subgoal_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, page_id, goal_id, subgoal_id', 'safe', 'on'=>'search'),
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
			'subgoal' => array(self::BELONGS_TO, 'Goal', 'subgoal_id'),
			'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
			'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'page_id' => 'Page',
			'goal_id' => 'Goal',
			'subgoal_id' => 'Subgoal',
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
		$criteria->compare('page_id',$this->page_id);
		$criteria->compare('goal_id',$this->goal_id);
		$criteria->compare('subgoal_id',$this->subgoal_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}