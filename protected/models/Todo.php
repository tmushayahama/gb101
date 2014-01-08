<?php

/**
 * This is the model class for table "{{todo}}".
 *
 * The followings are the available columns in table '{{todo}}':
 * @property integer $id
 * @property integer $todo
 * @property integer $category_id
 * @property integer $creator_id
 *
 * The followings are the available model relations:
 * @property TodoCategory $category
 * @property User $creator
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
			array('todo, category_id, creator_id', 'required'),
			array('todo, category_id, creator_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, todo, category_id, creator_id', 'safe', 'on'=>'search'),
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
			'category' => array(self::BELONGS_TO, 'TodoCategory', 'category_id'),
			'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'todo' => 'Todo',
			'category_id' => 'Category',
			'creator_id' => 'Creator',
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
		$criteria->compare('todo',$this->todo);
		$criteria->compare('category_id',$this->category_id);
		$criteria->compare('creator_id',$this->creator_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}