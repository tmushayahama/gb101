<?php

/**
 * This is the model class for table "{{promise_list}}".
 *
 * The followings are the available columns in table '{{promise_list}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $promise_id
 * @property integer $level_id
 * @property integer $bank_parent_id
 * @property integer $status
 * @property integer $privacy
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property Promise $promise
 * @property Level $level
 * @property Bank $bankParent
 * @property User $user
 * @property PromiseListShare[] $promiseListShares
 */
class PromiseList extends CActiveRecord
{
  
    public static function getPromiseList($levelCategory = null, $userId = null, $levelIds = null, $limit = null) {
    $promiseListCriteria = new CDbCriteria;
    $promiseListCriteria->alias = "gList";
    $promiseListCriteria->with = array("level" => array("alias" => 'level'));
    if ($userId != null) {
      $promiseListCriteria->addCondition("user_id=" . $userId);
    }
    if ($levelCategory != null) {
     // $promiseListCriteria->addCondition("level.category=" . $levelCategory);
    }
    if ($levelIds != null) {
      $levelIdArray = [];
      foreach ($levelIds as $levelId) {
        array_push($levelIdArray, $levelId);
      }
      $promiseListCriteria->addInCondition("level_id", $levelIdArray);
    }
    $promiseListCriteria->order = "gList.id desc";
    if ($limit != null) {
      $promiseListCriteria->limit = $limit;
    }
    return PromiseList::Model()->findAll($promiseListCriteria);
  }
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
			array('level_id', 'required'),
			array('user_id, promise_id, level_id, bank_parent_id, status, privacy, order', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, user_id, promise_id, level_id, bank_parent_id, status, privacy, order', 'safe', 'on'=>'search'),
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
			'bankParent' => array(self::BELONGS_TO, 'Bank', 'bank_parent_id'),
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
			'bank_parent_id' => 'List Bank Parent',
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
		$criteria->compare('bank_parent_id',$this->bank_parent_id);
		$criteria->compare('status',$this->status);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('order',$this->order);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}