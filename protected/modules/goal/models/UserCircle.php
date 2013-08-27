<?php

/**
 * This is the model class for table "{{user_circle}}".
 *
 * The followings are the available columns in table '{{user_circle}}':
 * @property integer $id
 * @property integer $owner_id
 * @property integer $circle_member_id
 * @property integer $circle_id
 * @property string $added_date
 *
 * The followings are the available model relations:
 * @property Circle $circle
 * @property User $circleMember
 * @property User $owner
 */
class UserCircle extends CActiveRecord {

	public $userIdList;

	public static function getUserCircles() {
		$circleMembers = new CDbCriteria;
		$circleMembers->condition = "owner_id=" . Yii::app()->user->id;
		$circleMembers->addCondition("circle_member_id=" . Yii::app()->user->id);
		return UserCircle::Model()->findAll($circleMembers);
	}
	
	public static function getNonCircleMembers($circleId, $limit) {
		$nonCircleMembers = new CDbCriteria;
		$nonCircleMembers->condition = "NOT user_id=" . Yii::app()->user->id;
		if ($circleId != 0) {
	//		$nonCircleMembers->addCondition("circle_id=" . $circleId);
		}
		$nonCircleMembers->limit = $limit;
		return Profile::Model()->findAll($nonCircleMembers);
	}

	public static function getCircleMembers($circleId, $limit) {
		$circleMembers = new CDbCriteria;
		$circleMembers->condition = "owner_id=" . Yii::app()->user->id;
		if ($circleId != 0) {
			$circleMembers->addCondition("circle_id=" . $circleId);
		}
		$circleMembers->limit = $limit;
		return UserCircle::Model()->findAll($circleMembers);
	}

	public static function getMemberExistInCircle($newMemberId) {
		$newCircleMembers = new CDbCriteria;
		$newCircleMembers->condition = "owner_id=" . Yii::app()->user->id;
		$newCircleMembers->addCondition("circle_member_id=" . $newMemberId);
		$idArray = array();
		foreach (UserCircle::Model()->findAll($newCircleMembers) as $member) {
			array_push($idArray, $member->circle->id);
		}
		return $idArray;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserCircle the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{user_circle}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('owner_id, circle_member_id, circle_id, added_date', 'required'),
				array('owner_id, circle_member_id, circle_id', 'numerical', 'integerOnly' => true),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, owner_id, circle_member_id, circle_id, added_date', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'circle' => array(self::BELONGS_TO, 'Circle', 'circle_id'),
				'circleMember' => array(self::BELONGS_TO, 'User', 'circle_member_id'),
				'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'ID',
				'owner_id' => 'Owner',
				'circle_member_id' => 'Circle Member',
				'circle_id' => 'Circle',
				'added_date' => 'Added Date',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search() {
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria = new CDbCriteria;

		$criteria->compare('id', $this->id);
		$criteria->compare('owner_id', $this->owner_id);
		$criteria->compare('circle_member_id', $this->circle_member_id);
		$criteria->compare('circle_id', $this->circle_id);
		$criteria->compare('added_date', $this->added_date, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}