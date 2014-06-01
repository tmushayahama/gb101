<?php

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property integer $id
 * @property integer $owner_id
 * @property string $title
 * @property string $description
 * @property integer $type
 *
 * The followings are the available model relations:
 * @property AdvicePage[] $advicePages
 * @property User $owner
 */
class Page extends CActiveRecord
{
   public static function getPages($goalId = null, $keyword = null, $limit = null) {
    $advicePagesCriteria = new CDbCriteria;
    // $advicePagesCriteria->group = 'page_id';
    //$advicePagesCriteria->distinct = 'true';
    $advicePagesCriteria->alias = "g";
    $advicePagesCriteria->order = "g.id";
    if ($limit != null) {
      $advicePagesCriteria->limit = $limit;
    }
    if ($keyword != null) {
      $advicePagesCriteria->compare("g.title", $keyword, true, "OR");
      $advicePagesCriteria->compare("g.description", $keyword, true, "OR");
    }
    return Page::Model()->findAll($advicePagesCriteria);
  }

  public static function getUserPages($userId) {
    $advicePagesCriteria = new CDbCriteria;
    $advicePagesCriteria->addCondition("owner_id=" . $userId);
    //$advicePagesCriteria->distinct = 'true';
    return Page::Model()->findAll($advicePagesCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Page the static model class
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
		return '{{page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, description', 'required'),
			array('owner_id, type', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>200),
			array('description', 'length', 'max'=>1000),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, owner_id, title, description, type', 'safe', 'on'=>'search'),
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
			'advicePages' => array(self::HAS_MANY, 'AdvicePage', 'page_id'),
			'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'owner_id' => 'Owner',
			'title' => 'Title',
			'description' => 'Description',
			'type' => 'Type',
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
		$criteria->compare('owner_id',$this->owner_id);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('type',$this->type);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}