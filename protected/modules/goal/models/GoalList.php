<?php

/**
 * This is the model class for table "{{goal_list}}".
 *
 * The followings are the available columns in table '{{goal_list}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $goal_id
 * @property integer $connection_id
 *
 * The followings are the available model relations:
 * @property Connection $connection
 * @property Goal $goal
 * @property User $user
 */
class GoalList extends CActiveRecord {

  public static $TYPE_SKILL = 1;
  public static $TYPE_PROMISE = 2;
  public static $TYPE_GOAL = 3;
	public $description;

	public static function getGoalList($connectionId, $goalType, $limit=null) {
		$goalListCriteria = new CDbCriteria;
    $goalListCriteria->condition = "user_id=" . Yii::app()->user->id;
		$goalListCriteria->addCondition("type=".$goalType);
    $goalListCriteria->order = "id desc";
    if ($connectionId != 0) {
			//$goalListCriteria->addCondition("connection_id=" . $connectionId);
		}
    if ($limit!=null) {
      $goalListCriteria->limit = $limit;
    }
    return GoalList::Model()->findAll($goalListCriteria);
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return GoalList the static model class
	 */
	public static function model($className = __CLASS__) {
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName() {
		return '{{goal_list}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules() {
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
				array('user_id, goal_id', 'required'),
				array('user_id, goal_id, connection_id', 'numerical', 'integerOnly' => true),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('id, user_id, goal_id, connection_id', 'safe', 'on' => 'search'),
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
				'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
				'user' => array(self::BELONGS_TO, 'User', 'user_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels() {
		return array(
				'id' => 'ID',
				'user_id' => 'User',
				'goal_id' => 'Goal',
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
		$criteria->compare('user_id', $this->user_id);
		$criteria->compare('goal_id', $this->goal_id);
		$criteria->compare('connection_id', $this->connection_id);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}