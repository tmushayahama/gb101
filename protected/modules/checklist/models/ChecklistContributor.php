<?php

/**
 * This is the model class for table "{{checklist_contributor}}".
 *
 * The followings are the available columns in table '{{checklist_contributor}}':
 * @property integer $id
 * @property integer $contributor_id
 * @property integer $checklist_id
 * @property integer $type_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Checklist $checklist
 * @property User $contributor
 */
class ChecklistContributor extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChecklistContributor the static model class
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
		return '{{checklist_contributor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contributor_id, checklist_id', 'required'),
			array('contributor_id, checklist_id, type_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, contributor_id, checklist_id, type_id, status', 'safe', 'on'=>'search'),
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
			'checklist' => array(self::BELONGS_TO, 'Checklist', 'checklist_id'),
			'contributor' => array(self::BELONGS_TO, 'User', 'contributor_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'contributor_id' => 'Contributor',
			'checklist_id' => 'Checklist',
			'type_id' => 'Type',
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
		$criteria->compare('contributor_id',$this->contributor_id);
		$criteria->compare('checklist_id',$this->checklist_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}