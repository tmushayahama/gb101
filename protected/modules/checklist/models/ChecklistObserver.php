<?php

/**
 * This is the model class for table "{{checklist_observer}}".
 *
 * The followings are the available columns in table '{{checklist_observer}}':
 * @property integer $id
 * @property integer $observer_id
 * @property integer $checklist_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Checklist $checklist
 * @property User $observer
 */
class ChecklistObserver extends CActiveRecord
{
   public static function getChecklistParentObserver($childObserverId, $checklistItemId) {
    $checklistObserverCriteria = new CDbCriteria;
    $checklistObserverCriteria->addCondition("observer_id=" . $childObserverId);
    $checklistObserverCriteria->addCondition("checklist_id = " . $checklistItemId);

    return ChecklistObserver::Model()->find($checklistObserverCriteria);
  }

  public static function getChecklistParentObservers($checklistItemId, $limit = null) {
    $checklistObserverCriteria = new CDbCriteria;
    if ($limit) {
      $checklistObserverCriteria->limit = $limit;
    }
    $checklistObserverCriteria->with = array("observer" => array("alias" => 'td'));
    $checklistObserverCriteria->addCondition("td.parent_observer_id is NULL");
    $checklistObserverCriteria->addCondition("checklist_id = " . $checklistItemId);
    $checklistObserverCriteria->order = "td.id desc";
    return ChecklistObserver::Model()->findAll($checklistObserverCriteria);
  }

  public static function getChecklistParentObserversCount($checklistItemId) {
    $checklistObserverCriteria = new CDbCriteria;
    $checklistObserverCriteria->with = array("observer" => array("alias" => 'td'));
    $checklistObserverCriteria->addCondition("td.parent_observer_id is NULL");
    $checklistObserverCriteria->addCondition("checklist_id = " . $checklistItemId);
    return ChecklistObserver::Model()->count($checklistObserverCriteria);
  }

  public static function getChecklistChildrenObservers($observerParentId, $limit = null) {
    $checklistObserverCriteria = new CDbCriteria;
    if ($limit) {
      $checklistObserverCriteria->limit = $limit;
    }
    $checklistObserverCriteria->with = array("observer" => array("alias" => 'td'));
    $checklistObserverCriteria->addCondition("td.parent_observer_id=" . $observerParentId);
    $checklistObserverCriteria->order = "td.id desc";
    return ChecklistObserver::Model()->findAll($checklistObserverCriteria);
  }

  public static function getChecklistChildrenObserversCount($observerParentId, $limit = null) {
    $checklistObserverCriteria = new CDbCriteria;
    $checklistObserverCriteria->with = array("observer" => array("alias" => 'td'));
    $checklistObserverCriteria->addCondition("td.parent_observer_id=" . $observerParentId);
    return ChecklistObserver::Model()->count($checklistObserverCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return ChecklistObserver the static model class
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
		return '{{checklist_observer}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('', 'required'),
			array('observer_id, checklist_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, observer_id, checklist_id, status', 'safe', 'on'=>'search'),
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
			'observer' => array(self::BELONGS_TO, 'User', 'observer_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'observer_id' => 'Observer',
			'checklist_id' => 'Checklist',
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
		$criteria->compare('observer_id',$this->observer_id);
		$criteria->compare('checklist_id',$this->checklist_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}