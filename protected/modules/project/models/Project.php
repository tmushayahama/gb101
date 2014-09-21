<?php

/**
 * This is the model class for table "{{project}}".
 *
 * The followings are the available columns in table '{{project}}':
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property integer $creator_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property ProjectAdvicePage[] $projectAdvicePages
 * @property ProjectMember[] $projectMembers
 * @property ProjectMentorship[] $projectMentorships
 * @property ProjectSkill[] $projectSkills
 * @property ProjectTask[] $projectTasks
 */
class Project extends CActiveRecord
{
   public static function getProjects() {
    $projectCriteria = new CDbCriteria();
    $projectCriteria->addCondition("creator_id=" . Yii::app()->user->id);
    return Project::model()->findAll($projectCriteria);
  }
  
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Project the static model class
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
		return '{{project}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('name, creator_id', 'required'),
			array('creator_id, status', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, name, description, creator_id, status', 'safe', 'on'=>'search'),
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
			'projectAdvicePages' => array(self::HAS_MANY, 'ProjectAdvicePage', 'project_id'),
			'projectMembers' => array(self::HAS_MANY, 'ProjectMember', 'project_id'),
			'projectMentorships' => array(self::HAS_MANY, 'ProjectMentorship', 'project_id'),
			'projectSkills' => array(self::HAS_MANY, 'ProjectSkill', 'project_id'),
			'projectTasks' => array(self::HAS_MANY, 'ProjectTask', 'project_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'description' => 'Description',
			'creator_id' => 'Creator',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}