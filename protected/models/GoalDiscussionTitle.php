<?php

/**
 * This is the model class for table "{{goal_discussion_title}}".
 *
 * The followings are the available columns in table '{{goal_discussion_title}}':
 * @property integer $id
 * @property integer $discussion_title_id
 * @property integer $goal_id
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property DiscussionTitle $discussionTitle
 * @property Goal $goal
 */
class GoalDiscussionTitle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalDiscussionTitle the static model class
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
		return '{{goal_discussion_title}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('discussion_title_id, goal_id', 'required'),
			array('discussion_title_id, goal_id, type, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, discussion_title_id, goal_id, type, status', 'safe', 'on'=>'search'),
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
			'discussionTitle' => array(self::BELONGS_TO, 'DiscussionTitle', 'discussion_title_id'),
			'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'discussion_title_id' => 'Discussion Title',
			'goal_id' => 'Goal',
			'type' => 'Type',
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
		$criteria->compare('discussion_title_id',$this->discussion_title_id);
		$criteria->compare('goal_id',$this->goal_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}