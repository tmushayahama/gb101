<?php

/**
 * This is the model class for table "{{weblink}}".
 *
 * The followings are the available columns in table '{{weblink}}':
 * @property integer $id
 * @property string $link
 * @property string $title
 * @property integer $creator_id
 * @property string $created_date
 * @property string $description
 * @property integer $importance
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SkillWeblink[] $skillWeblinks
 * @property MentorshipWeblink[] $mentorshipWeblinks
 * @property User $creator
 */
class Weblink extends CActiveRecord
{
  public static function deleteWeblink($weblinkId) {
    Weblink::model()->deleteByPk($weblinkId);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Weblink the static model class
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
		return '{{weblink}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('link, title', 'required'),
			array('creator_id, importance, status', 'numerical', 'integerOnly'=>true),
			array('link', 'length', 'max'=>1000),
			array('title', 'length', 'max'=>250),
			array('description', 'length', 'max'=>500),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, link, title, creator_id, created_date, description, importance, status', 'safe', 'on'=>'search'),
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
			'skillWeblinks' => array(self::HAS_MANY, 'SkillWeblink', 'weblink_id'),
			'mentorshipWeblinks' => array(self::HAS_MANY, 'MentorshipWeblink', 'weblink_id'),
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
			'link' => 'Link',
			'title' => 'Title',
			'creator_id' => 'Creator',
			'created_date' => 'Created Date',
			'description' => 'Description',
			'importance' => 'Importance',
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
		$criteria->compare('link',$this->link,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('creator_id',$this->creator_id);
		$criteria->compare('created_date',$this->created_date,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('importance',$this->importance);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}