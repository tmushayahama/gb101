<?php

/**
 * This is the model class for table "{{user_connection}}".
 *
 * The followings are the available columns in table '{{user_connection}}':
 * @property integer $id
 * @property integer $owner_id
 * @property integer $connection_member_id
 * @property integer $connection_id
 * @property string $added_date
 *
 * The followings are the available model relations:
 * @property Connection $connection
 * @property User $connectionMember
 * @property User $owner
 */
class UserConnection extends CActiveRecord {

	public $userIdList;

	public static function getUserConnections() {
		$connectionMembers = new CDbCriteria;
		$connectionMembers->condition = "owner_id=" . Yii::app()->user->id;
		$connectionMembers->addCondition("connection_member_id=" . Yii::app()->user->id);
		return UserConnection::Model()->findAll($connectionMembers);
	}
	
	public static function getNonConnectionMembers($connectionId, $limit) {
		$nonConnectionMembers = new CDbCriteria;
		$nonConnectionMembers->condition = "NOT user_id=" . Yii::app()->user->id;
		if ($connectionId != 0) {
	//		$nonConnectionMembers->addCondition("connection_id=" . $connectionId);
		}
		$nonConnectionMembers->limit = $limit;
		return Profile::Model()->findAll($nonConnectionMembers);
	}

	public static function getConnectionMembers($connectionId, $limit) {
		$connectionMembers = new CDbCriteria;
		$connectionMembers->condition = "owner_id=" . Yii::app()->user->id;
		if ($connectionId != 0) {
			$connectionMembers->addCondition("connection_id=" . $connectionId);
		}
		$connectionMembers->group = "connection_member_id";
		$connectionMembers->distinct = true;
		$connectionMembers->limit = $limit;
		return UserConnection::Model()->findAll($connectionMembers);
	}

	public static function getMemberExistInConnection($newMemberId) {
		$newConnectionMembers = new CDbCriteria;
		$newConnectionMembers->condition = "owner_id=" . Yii::app()->user->id;
		$newConnectionMembers->addCondition("connection_member_id=" . $newMemberId);
		$idArray = array();
		foreach (UserConnection::Model()->findAll($newConnectionMembers) as $member) {
			array_push($idArray, $member->connection->id);
		}
		return $idArray;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return UserConnection the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{user_connection}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('owner_id, connection_member_id, connection_id, added_date', 'required'),
				array('owner_id, connection_member_id, connection_id', 'numerical', 'integerOnly' => true),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, owner_id, connection_member_id, connection_id, added_date', 'safe', 'on' => 'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations() {
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'connection' => array(self::BELONGS_TO, 'Connection', 'connection_id'),
				'connectionMember' => array(self::BELONGS_TO, 'User', 'connection_member_id'),
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
				'connection_member_id' => 'Connection Member',
				'connection_id' => 'Connection',
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
		$criteria->compare('connection_member_id', $this->connection_member_id);
		$criteria->compare('connection_id', $this->connection_id);
		$criteria->compare('added_date', $this->added_date, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}