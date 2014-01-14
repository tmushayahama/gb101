<?php

/**
 * This is the model class for table "{{discussion_title}}".
 *
 * The followings are the available columns in table '{{discussion_title}}':
 * @property integer $id
 * @property integer $title_id
 * @property integer $creator_id
 * @property integer $goal_id
 *
 * The followings are the available model relations:
 * @property Discussion[] $discussions
 * @property User $creator
 * @property Goal $goal
 */
class DiscussionTitle extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return DiscussionTitle the static model class
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
		return '{{discussion_title}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title_id, creator_id, goal_id', 'required'),
			array('title_id, creator_id, goal_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title_id, creator_id, goal_id', 'safe', 'on'=>'search'),
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
			'discussions' => array(self::HAS_MANY, 'Discussion', 'title_id'),
			'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
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
			'title_id' => 'Title',
			'creator_id' => 'Creator',
			'goal_id' => 'Goal',
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
		$criteria->compare('title_id',$this->title_id);
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('goal_id',$this->goal_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}