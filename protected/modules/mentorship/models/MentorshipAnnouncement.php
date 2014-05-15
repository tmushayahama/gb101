<?php

/**
 * This is the model class for table "{{mentorship_announcement}}".
 *
 * The followings are the available columns in table '{{mentorship_announcement}}':
 * @property integer $id
 * @property integer $announcement_id
 * @property integer $mentorship_id
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Announcement $announcement
 * @property Mentorship $mentorship
 */
class MentorshipAnnouncement extends CActiveRecord
{
   public static function getMentorshipAnnouncements($mentorshipId, $isMentor) {
    $mentorshipAnouncementCriteria = new CDbCriteria;
    $mentorshipAnouncementCriteria->addCondition("mentorship_id=" . $mentorshipId);
    return MentorshipAnnouncement::model()->findAll($mentorshipAnouncementCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MentorshipAnnouncement the static model class
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
		return '{{mentorship_announcement}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('announcement_id, mentorship_id', 'required'),
			array('announcement_id, mentorship_id, type, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, announcement_id, mentorship_id, type, status', 'safe', 'on'=>'search'),
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
			'announcement' => array(self::BELONGS_TO, 'Announcement', 'announcement_id'),
			'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'announcement_id' => 'Announcement',
			'mentorship_id' => 'Mentorship',
			'type' => 'Type',
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
		$criteria->compare('announcement_id',$this->announcement_id);
		$criteria->compare('mentorship_id',$this->mentorship_id);
		$criteria->compare('type',$this->type);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}