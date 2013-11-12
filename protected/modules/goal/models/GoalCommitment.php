<?php

/**
 * This is the model class for table "{{goal_commitment}}".
 *
 * The followings are the available columns in table '{{goal_commitment}}':
 * @property integer $id
 * @property integer $owner_id
 * @property integer $goal_id
 *
 * The followings are the available model relations:
 * @property GoalAssist[] $goalAssists
 * @property Goal $goal
 * @property User $owner
 * @property GoalCommitmentShare[] $goalCommitmentShares
 * @property GoalFollow[] $goalFollows
 * @property GoalMonitor[] $goalMonitors
 * @property GoalReferee[] $goalReferees
 */
class GoalCommitment extends CActiveRecord
{
  
  public static function getGoalCommitment($id) {
    //$goalCriteria = new CDbCriteria;
    //$goalCriteria->condition = ""
    return GoalCommitment::Model()->findByPk($id);
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
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{goal_commitment}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner_id, goal_id', 'required'),
			array('owner_id, goal_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, owner_id, goal_id', 'safe', 'on'=>'search'),
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
			'goalAssists' => array(self::HAS_MANY, 'GoalAssist', 'goal_commitment_id'),
			'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
			'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
			'goalCommitmentShares' => array(self::HAS_MANY, 'GoalCommitmentShare', 'goal_commitment_id'),
			'goalFollows' => array(self::HAS_MANY, 'GoalFollow', 'goal_commitment_id'),
			'goalMonitors' => array(self::HAS_MANY, 'GoalMonitor', 'goal_commitment_id'),
			'goalReferees' => array(self::HAS_MANY, 'GoalReferee', 'goal_commitment_id'),
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
			'goal_id' => 'Goal',
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
		$criteria->compare('goal_id',$this->goal_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}