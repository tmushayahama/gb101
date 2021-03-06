<?php

/**
 * This is the model class for table "{{project_advice_page}}".
 *
 * The followings are the available columns in table '{{project_advice_page}}':
 * @property integer $id
 * @property integer $advice_page_id
 * @property integer $project_id
 * @property integer $role
 * @property string $description
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property AdvicePage $advicePage
 * @property Project $project
 */
class ProjectAdvicePage extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ProjectAdvicePage the static model class
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
		return '{{project_advice_page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('advice_page_id, project_id, role', 'required'),
			array('advice_page_id, project_id, role, status', 'numerical', 'integerOnly'=>true),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, advice_page_id, project_id, role, description, status', 'safe', 'on'=>'search'),
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
			'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
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
			'project_id' => 'Project',
			'role' => 'Role',
			'description' => 'Description',
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
		$criteria->compare('project_id',$this->project_id);
		$criteria->compare('role',$this->role);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}