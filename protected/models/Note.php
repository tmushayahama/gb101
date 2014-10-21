<?php

/**
 * This is the model class for table "{{note}}".
 *
 * The followings are the available columns in table '{{note}}':
 * @property integer $id
 * @property integer $parent_note_id
 * @property string $title
 * @property integer $creator_id
 * @property string $description
 * @property string $created_date
 * @property integer $importance
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $creator
 * @property Note $parentNote
 * @property Note[] $notes
 * @property SkillNote[] $skillNotes
 */
class Note extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Note the static model class
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
		return '{{note}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('description', 'required'),
			array('parent_note_id, creator_id, importance, status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>150),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, parent_note_id, title, creator_id, description, created_date, importance, status', 'safe', 'on'=>'search'),
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
			'parentNote' => array(self::BELONGS_TO, 'Note', 'parent_note_id'),
			'notes' => array(self::HAS_MANY, 'Note', 'parent_note_id'),
			'skillNotes' => array(self::HAS_MANY, 'SkillNote', 'note_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'parent_note_id' => 'Parent Note',
			'title' => 'Title',
			'creator_id' => 'Creator',
			'description' => 'Description',
			'created_date' => 'Created Date',
			'importance' => 'Importance',
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
		$criteria->compare('parent_note_id',$this->parent_note_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('importance',$this->importance);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}