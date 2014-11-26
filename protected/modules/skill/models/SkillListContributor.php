<?php

/**
 * This is the model class for table "{{skill_contributor}}".
 *
 * The followings are the available columns in table '{{skill_contributor}}':
 * @property integer $id
 * @property integer $contributor_id
 * @property integer $skill_id
 * @property integer $type_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property User $contributor
 */
class SkillContributor extends CActiveRecord
{
  public static function acceptContributor($notification) {
    if ($notification != null) {
      $skillContributor = new SkillContributor();
      $skillContributor->skill_id = $notification->source_id;
      $skillContributor->observer_id = $notification->recipient_id;
      if ($skillContributor->save(false)) {
        $notification->status = Notification::$STATUS_ACCEPTED;
        if ($notification->save(false)) {
          return $skillContributor->id;
        }
      }
    }
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillContributor the static model class
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
		return '{{skill_contributor}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('contributor_id, skill_id', 'required'),
			array('contributor_id, skill_id, type_id, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, contributor_id, skill_id, type_id, status', 'safe', 'on'=>'search'),
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
			'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
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
			'skill_id' => 'Skill List',
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
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('type_id',$this->type_id);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}