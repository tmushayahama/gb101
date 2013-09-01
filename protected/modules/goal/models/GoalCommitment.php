<?php

/**
 * This is the model class for table "{{goal_commitment}}".
 *
 * The followings are the available columns in table '{{goal_commitment}}':
 * @property integer $id
 * @property integer $owner_id
 * @property integer $goal_commitment_id
 * @property integer $connection_id
 *
 * The followings are the available model relations:
 * @property Connection $connection
 * @property Goal $goalCommitment
 * @property User $owner
 */
class GoalCommitment extends CActiveRecord {

	public static function getAllPost($connectionId) {
		$goalCommitmentCriteria = new CDbCriteria;
		$goalCommitmentCriteria->group = "goal_commitment_id";
		$goalCommitmentCriteria->distinct = true;
		if ($connectionId == 0) {
			return GoalCommitment::Model()->findAll($goalCommitmentCriteria);
		} else {
			$goalCommitmentCriteria->condition = "connection_id=" . $connectionId;
			return GoalCommitment::Model()->findAll($goalCommitmentCriteria);
		}
	}

	public static function saveToAllCrcles($goalCommitmentPostId) {
		$allConnections = UserConnection::Model()->findAll("owner_id=" . Yii::app()->user->id);
		foreach ($allConnections as $userConnection) {
			$goalCommitmentModel = new GoalCommitment;
			$goalCommitmentModel->goal_commitment_id = $goalCommitmentPostId;
			$goalCommitmentModel->connection_id = $userConnection->connection->id;
			$goalCommitmentModel->save();
		}
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalCommitment the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{goal_commitment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('owner_id, goal_commitment_id', 'required'),
				array('owner_id, goal_commitment_id, connection_id', 'numerical', 'integerOnly' => true),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, owner_id, goal_commitment_id, connection_id', 'safe', 'on' => 'search'),
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
				'goalCommitment' => array(self::BELONGS_TO, 'Goal', 'goal_commitment_id'),
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
				'goal_commitment_id' => 'Goal Commitment',
				'connection_id' => 'Connection',
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
		$criteria->compare('goal_commitment_id', $this->goal_commitment_id);
		$criteria->compare('connection_id', $this->connection_id);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}