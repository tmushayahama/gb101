<?php

/**
 * This is the model class for table "{{connection}}".
 *
 * The followings are the available columns in table '{{connection}}':
 * @property integer $id
 * @property integer $owner_id
 * @property string $name
 * @property string $description
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property ConnectionMember[] $connectionMembers
 * @property SkillAssignment[] $skillAssignments
 * @property SkillChallenge[] $skillChallenges
 * @property SkillCommitmentShare[] $skillCommitmentShares
 * @property SkillListShare[] $skillListShares
 */
class Connection extends CActiveRecord
{
   public static function getAllConnections() {
     $connectionsCriteria = new CDbCriteria;
     return Connection::Model()->findAll($connectionsCriteria);
   }
    public static function initializeConnections($userId) {
		for ($i = 1; $i<4; $i++) {
			$connectionMember = new ConnectionMember;
			$connectionMember->owner_id = $userId;
			$connectionMember->connection_member_id = $userId;
			$connectionMember->connection_id = $i;
			$connectionMember->added_date = date("Y-m-d");
			$connectionMember->save();
		}
	}
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Connection the static model class
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
		return '{{connection}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('owner_id, name, created_date', 'required'),
			array('owner_id', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>50),
			array('description', 'length', 'max'=>150),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, owner_id, name, description, created_date', 'safe', 'on'=>'search'),
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
			'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
			'connectionMembers' => array(self::HAS_MANY, 'ConnectionMember', 'connection_id'),
			'skillAssignments' => array(self::HAS_MANY, 'SkillAssignment', 'connection_id'),
			'skillChallenges' => array(self::HAS_MANY, 'SkillChallenge', 'connection_id'),
			'skillCommitmentShares' => array(self::HAS_MANY, 'SkillCommitmentShare', 'connection_id'),
			'skillListShares' => array(self::HAS_MANY, 'SkillListShare', 'connection_id'),
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
			'name' => 'Name',
			'description' => 'Description',
			'created_date' => 'Created Date',
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
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('created_date',$this->created_date,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}