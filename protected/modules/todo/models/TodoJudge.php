<?php

/**
 * This is the model class for table "{{todo_judge}}".
 *
 * The followings are the available columns in table '{{todo_judge}}':
 * @property integer $id
 * @property integer $judge_id
 * @property integer $todo_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Todo $todo
 * @property User $judge
 */
class TodoJudge extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TodoJudge the static model class
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
		return '{{todo_judge}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('judge_id, todo_id', 'required'),
			array('judge_id, todo_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, judge_id, todo_id, status', 'safe', 'on'=>'search'),
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
			'todo' => array(self::BELONGS_TO, 'Todo', 'todo_id'),
			'judge' => array(self::BELONGS_TO, 'User', 'judge_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'judge_id' => 'Judge',
			'todo_id' => 'Todo',
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
		$criteria->compare('judge_id',$this->judge_id);
		$criteria->compare('todo_id',$this->todo_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}