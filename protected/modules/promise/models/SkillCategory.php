<?php

/**
 * This is the model class for table "{{skill_category}}".
 *
 * The followings are the available columns in table '{{skill_category}}':
 * @property integer $id
 * @property integer $category_id
 * @property integer $skill_id
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Category $category
 * @property Skill $skill
 */
class SkillCategory extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillCategory the static model class
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
		return '{{skill_category}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('category_id, skill_id', 'required'),
			array('category_id, skill_id', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, category_id, skill_id, description', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'Category', 'category_id'),
			'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'category_id' => 'Category',
			'skill_id' => 'Skill',
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
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('description',$this->description,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}