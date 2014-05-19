<?php

/**
 * This is the model class for table "{{goal_web_link}}".
 *
 * The followings are the available columns in table '{{goal_web_link}}':
 * @property integer $id
 * @property integer $web_link_id
 * @property integer $goal_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property WebLink $webLink
 * @property Goal $goal
 */
class GoalWebLink extends CActiveRecord {

  public static function getGoalWebLinks($goalId) {
    $goalWebLinksCriteria = new CDbCriteria;
    $goalWebLinksCriteria->addCondition("goal_id = " . $goalId);
    $goalWebLinksCriteria->order = "id desc";
    return GoalWebLink::Model()->findAll($goalWebLinksCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return GoalWebLink the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{goal_web_link}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('web_link_id, goal_id', 'required'),
     array('web_link_id, goal_id, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, web_link_id, goal_id, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'webLink' => array(self::BELONGS_TO, 'WebLink', 'web_link_id'),
     'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'web_link_id' => 'Web Link',
     'goal_id' => 'Goal',
     'status' => 'Status',
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
    $criteria->compare('web_link_id', $this->web_link_id);
    $criteria->compare('goal_id', $this->goal_id);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
