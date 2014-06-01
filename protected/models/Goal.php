<?php

/**
 * This is the model class for table "{{goal}}".
 *
 * The followings are the available columns in table '{{goal}}':
 * @property integer $id
 * @property integer $type_id
 * @property string $title
 * @property string $description
 * @property integer $points_pledged
 * @property string $assign_date
 * @property string $begin_date
 * @property string $end_date
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property DiscussionTitle[] $discussionTitles
 * @property GoalType $type
 * @property GoalAssignment[] $goalAssignments
 * @property GoalChallenge[] $goalChallenges
 * @property GoalCommitment[] $goalCommitments
 * @property GoalList[] $goalLists
 * @property AdvicePage[] $advicePages
 * @property AdvicePage[] $advicePages1
 * @property GoalTodo[] $goalTodos
 * @property GoalWebLink[] $goalWebLinks
 * @property Mentorship[] $mentorships
 * @property MessageReceipientGoal[] $messageReceipientGoals
 * @property SkillAcademic[] $skillAcademics
 * @property SkillJob[] $skillJobs
 * @property Subgoal[] $subgoals
 * @property Subgoal[] $subgoals1
 */
class Goal extends CActiveRecord
{
  public static function getGoal($id) {
    //$goalCriteria = new CDbCriteria;
    //$goalCriteria->condition = ""
    return Goal::Model()->findByPk($id);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Goal the static model class
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
		return '{{goal}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description', 'required'),
			array('type_id, points_pledged, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('description', 'length', 'max'=>500),
			array('begin_date, end_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, type_id, title, description, points_pledged, assign_date, begin_date, end_date, status', 'safe', 'on'=>'search'),
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
			'discussionTitles' => array(self::HAS_MANY, 'DiscussionTitle', 'goal_id'),
			'type' => array(self::BELONGS_TO, 'GoalType', 'type_id'),
			'goalAssignments' => array(self::HAS_MANY, 'GoalAssignment', 'goal_id'),
			'goalChallenges' => array(self::HAS_MANY, 'GoalChallenge', 'goal_id'),
			'goalCommitments' => array(self::HAS_MANY, 'GoalCommitment', 'goal_id'),
			'goalLists' => array(self::HAS_MANY, 'GoalList', 'goal_id'),
			'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'subgoal_id'),
			'advicePages1' => array(self::HAS_MANY, 'AdvicePage', 'goal_id'),
			'goalTodos' => array(self::HAS_MANY, 'GoalTodo', 'goal_id'),
			'goalWebLinks' => array(self::HAS_MANY, 'GoalWebLink', 'goal_id'),
			'mentorships' => array(self::HAS_MANY, 'Mentorship', 'goal_id'),
			'messageReceipientGoals' => array(self::HAS_MANY, 'MessageReceipientGoal', 'goal_id'),
			'skillAcademics' => array(self::HAS_MANY, 'SkillAcademic', 'skill_id'),
			'skillJobs' => array(self::HAS_MANY, 'SkillJob', 'skill_id'),
			'subgoals' => array(self::HAS_MANY, 'Subgoal', 'subgoal_id'),
			'subgoals1' => array(self::HAS_MANY, 'Subgoal', 'goal_id'),
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
			'title' => 'Title',
			'description' => 'Description',
			'points_pledged' => 'Points Pledged',
			'assign_date' => 'Assign Date',
			'begin_date' => 'Begin Date',
			'end_date' => 'End Date',
			'status' => 'Status',
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
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('points_pledged',$this->points_pledged);
		$criteria->compare('assign_date',$this->assign_date,true);
		$criteria->compare('begin_date',$this->begin_date,true);
		$criteria->compare('end_date',$this->end_date,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}