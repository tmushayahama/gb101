<?php

/**
 * This is the model class for table "{{todo}}".
 *
 * The followings are the available columns in table '{{todo}}':
 * @property integer $id
 * @property integer $level_id
 * @property integer $assigner_id
 * @property integer $assignee_id
 * @property string $assigned_date
 * @property string $due_date
 * @property integer $importance
 * @property string $title
 * @property string $description
 *
 * The followings are the available model relations:
 * @property GoalTodo[] $goalTodos
 * @property MentorshipTodo[] $mentorshipTodos
 * @property User $assigner
 * @property User $assignee
 * @property Level $level
 */
class Todo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Todo the static model class
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
		return '{{todo}}';
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
			array('level_id, assigner_id, assignee_id, importance', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('description', 'length', 'max'=>1000),
			array('due_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, level_id, assigner_id, assignee_id, assigned_date, due_date, importance, title, description', 'safe', 'on'=>'search'),
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
			'goalTodos' => array(self::HAS_MANY, 'GoalTodo', 'todo_id'),
			'mentorshipTodos' => array(self::HAS_MANY, 'MentorshipTodo', 'todo_id'),
			'assigner' => array(self::BELONGS_TO, 'User', 'assigner_id'),
			'assignee' => array(self::BELONGS_TO, 'User', 'assignee_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'level_id' => 'Level',
			'assigner_id' => 'Assigner',
			'assignee_id' => 'Assignee',
			'assigned_date' => 'Assigned Date',
			'due_date' => 'Due Date',
			'importance' => 'Importance',
			'title' => 'Title',
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
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('assigner_id',$this->assigner_id);
		$criteria->compare('assignee_id',$this->assignee_id);
		$criteria->compare('assigned_date',$this->assigned_date,true);
		$criteria->compare('due_date',$this->due_date,true);
		$criteria->compare('importance',$this->importance);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}