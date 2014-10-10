<?php

/**
 * This is the model class for table "{{skill}}".
 *
 * The followings are the available columns in table '{{skill}}':
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
 * @property Goal[] $goals
 * @property Hobby[] $hobbies
 * @property Journal[] $journals
 * @property MentorshipAnswer[] $mentorshipAnswers
 * @property ProjectMentorship[] $projectMentorships
 * @property ProjectSkill[] $projectSkills
 * @property Promise[] $promises
 * @property SkillType $type
 * @property SkillAnnouncement[] $skillAnnouncements
 * @property SkillAnswer[] $skillAnswers
 * @property SkillDiscussionTitle[] $skillDiscussionTitles
 * @property SkillList[] $skillLists
 * @property SkillQuestion[] $skillQuestions
 * @property SkillTag[] $skillTags
 * @property SkillTimeline[] $skillTimelines
 * @property SkillTodo[] $skillTodos
 * @property SkillWeblink[] $skillWeblinks
 * @property Subskill[] $subskills
 * @property Subskill[] $subskills1
 * @property Task[] $tasks
 */
class Skill extends CActiveRecord
{
  public static function getSkill($id) {
    //$skillCriteria = new CDbCriteria;
    //$skillCriteria->condition = ""
    return Skill::Model()->findByPk($id);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Skill the static model class
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
		return '{{skill}}';
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
			'goals' => array(self::HAS_MANY, 'Goal', 'skill_id'),
			'hobbies' => array(self::HAS_MANY, 'Hobby', 'skill_id'),
			'journals' => array(self::HAS_MANY, 'Journal', 'skill_id'),
			'mentorshipAnswers' => array(self::HAS_MANY, 'MentorshipAnswer', 'skill_id'),
			'projectMentorships' => array(self::HAS_MANY, 'ProjectMentorship', 'mentorship_id'),
			'projectSkills' => array(self::HAS_MANY, 'ProjectSkill', 'skill_id'),
			'promises' => array(self::HAS_MANY, 'Promise', 'skill_id'),
			'type' => array(self::BELONGS_TO, 'SkillType', 'type_id'),
			'skillAnnouncements' => array(self::HAS_MANY, 'SkillAnnouncement', 'skill_id'),
			'skillAnswers' => array(self::HAS_MANY, 'SkillAnswer', 'skill_id'),
			'skillDiscussionTitles' => array(self::HAS_MANY, 'SkillDiscussionTitle', 'skill_id'),
			'skillLists' => array(self::HAS_MANY, 'SkillList', 'skill_id'),
			'skillQuestions' => array(self::HAS_MANY, 'SkillQuestion', 'skill_id'),
			'skillTags' => array(self::HAS_MANY, 'SkillTag', 'skill_id'),
			'skillTimelines' => array(self::HAS_MANY, 'SkillTimeline', 'skill_id'),
			'skillTodos' => array(self::HAS_MANY, 'SkillTodo', 'skill_id'),
			'skillWeblinks' => array(self::HAS_MANY, 'SkillWeblink', 'skill_id'),
			'subskills' => array(self::HAS_MANY, 'Subskill', 'skill_id'),
			'subskills1' => array(self::HAS_MANY, 'Subskill', 'subskill_id'),
			'tasks' => array(self::HAS_MANY, 'Task', 'skill_id'),
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