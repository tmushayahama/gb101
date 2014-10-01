<?php

/**
 * This is the model class for table "{{promise_list}}".
 *
 * The followings are the available columns in table '{{promise_list}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $promise_id
 * @property integer $level_id
 * @property integer $list_bank_parent_id
 * @property integer $status
 * @property integer $privacy
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Level $level
 * @property ListBank $listBankParent
 * @property User $user
 * @property PromiseListShare[] $promiseListShares
 */
class PromiseList extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return PromiseList the static model class
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
		return '{{promise_list}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('user_id, promise_id, level_id', 'required'),
			array('user_id, promise_id, level_id, list_bank_parent_id, status, privacy, order', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, promise_id, level_id, list_bank_parent_id, status, privacy, order', 'safe', 'on'=>'search'),
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
			'promise' => array(self::BELONGS_TO, 'Promise', 'promise_id'),
			'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
			'listBankParent' => array(self::BELONGS_TO, 'ListBank', 'list_bank_parent_id'),
			'user' => array(self::BELONGS_TO, 'User', 'user_id'),
			'promiseListShares' => array(self::HAS_MANY, 'PromiseListShare', 'promise_list_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'user_id' => 'User',
			'promise_id' => 'Promise',
			'level_id' => 'Level',
			'list_bank_parent_id' => 'List Bank Parent',
			'status' => 'Status',
			'privacy' => 'Privacy',
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
		$criteria->compare('user_id',$this->user_id);
		$criteria->compare('promise_id',$this->promise_id);
		$criteria->compare('level_id',$this->level_id);
		$criteria->compare('list_bank_parent_id',$this->list_bank_parent_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}