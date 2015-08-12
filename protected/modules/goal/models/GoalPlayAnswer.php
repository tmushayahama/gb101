<?php

/**
 * This is the model class for table "{{goal_play_answer}}".
 *
 * The followings are the available columns in table '{{goal_play_answer}}':
 * @property integer $id
 * @property integer $goal_id
 * @property integer $creator_id
 * @property integer $goal_modified_id
 * @property integer $goal_play_answer
 * @property string $description
 * @property string $created_date
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Goal $goal
 * @property Goal $goalModified
 */
class GoalPlayAnswer extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalPlayAnswer the static model class
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
		return '{{goal_play_answer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('goal_id, creator_id, goal_play_answer, created_date', 'required'),
			array('goal_id, creator_id, goal_modified_id, goal_play_answer, privacy, status', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, goal_id, creator_id, goal_modified_id, goal_play_answer, description, created_date, privacy, status', 'safe', 'on'=>'search'),
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
			'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
			'goalModified' => array(self::BELONGS_TO, 'Goal', 'goal_modified_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'goal_id' => 'Goal',
			'creator_id' => 'Creator',
			'goal_modified_id' => 'Goal Modified',
			'goal_play_answer' => 'Goal Play Answer',
			'description' => 'Description',
			'created_date' => 'Created Date',
			'privacy' => 'Privacy',
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
		$criteria->compare('goal_id',$this->goal_id);
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('goal_modified_id',$this->goal_modified_id);
		$criteria->compare('goal_play_answer',$this->goal_play_answer);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}