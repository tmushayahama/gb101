<?php

/**
 * This is the model class for table "{{journal}}".
 *
 * The followings are the available columns in table '{{journal}}':
 * @property integer $id
 * @property integer $creator_id
 * @property integer $skill_id
 * @property integer $level_id
 * @property string $title
 * @property string $description
 * @property string $created_date
 * @property integer $status
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Level $level
 * @property Skill $skill
 * @property JournalShare[] $journalShares
 */
class Journal extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Journal the static model class
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
		return '{{journal}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('creator_id, title, description, created_date', 'required'),
			array('creator_id, skill_id, level_id, status, order', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>100),
			array('description', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, creator_id, skill_id, level_id, title, description, created_date, status, order', 'safe', 'on'=>'search'),
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
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
			'journalShares' => array(self::HAS_MANY, 'JournalShare', 'journal_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'creator_id' => 'Creator',
			'skill_id' => 'Skill',
			'level_id' => 'Level',
			'title' => 'Title',
			'description' => 'Description',
			'created_date' => 'Created Date',
			'status' => 'Status',
			'order' => 'Order',
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
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}