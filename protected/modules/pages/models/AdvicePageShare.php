<?php

/**
 * This is the model class for table "{{advice_page_share}}".
 *
 * The followings are the available columns in table '{{advice_page_share}}':
 * @property integer $id
 * @property integer $advice_page_id
 * @property integer $shared_to_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property AdvicePage $advicePage
 * @property User $sharedTo
 */
class AdvicePageShare extends CActiveRecord
{
  public static function shareAdvicePage($userIds, $advicePageId=null) {
    if (is_array($userIds)) {
      foreach ($userIds as $userId) {
        $advicePageShare = new AdvicePageShare();
        $advicePageShare->advice_page_id = $advicePageId;
        $advicePageShare->shared_to_id = $userId;
        $advicePageShare->save(false);
      }
    }
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return AdvicePageShare the static model class
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
		return '{{advice_page_share}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('advice_page_id, shared_to_id', 'required'),
			array('advice_page_id, shared_to_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, advice_page_id, shared_to_id, status', 'safe', 'on'=>'search'),
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
			'advicePage' => array(self::BELONGS_TO, 'AdvicePage', 'advice_page_id'),
			'sharedTo' => array(self::BELONGS_TO, 'User', 'shared_to_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'advice_page_id' => 'Advice Page',
			'shared_to_id' => 'Shared To',
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
		$criteria->compare('advice_page_id',$this->advice_page_id);
		$criteria->compare('shared_to_id',$this->shared_to_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}