<?php

/**
 * This is the model class for table "{{goal_web_link}}".
 *
 * The followings are the available columns in table '{{goal_web_link}}':
 * @property integer $id
 * @property string $link
 * @property string $title
 * @property integer $creator_id
 * @property integer $goal_id
 * @property string $description
 * @property integer $importance
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Goal $goal
 * @property User $creator
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
     array('link, title, creator_id, goal_id', 'required'),
     array('creator_id, goal_id, importance, status', 'numerical', 'integerOnly' => true),
     array('link', 'length', 'max' => 1000),
     array('title', 'length', 'max' => 250),
     array('description', 'length', 'max' => 500),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, link, title, creator_id, goal_id, description, importance, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'goal' => array(self::BELONGS_TO, 'Goal', 'goal_id'),
     'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'link' => 'Link',
     'title' => 'Title',
     'creator_id' => 'Creator',
     'goal_id' => 'Goal',
     'description' => 'Description',
     'importance' => 'Importance',
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
    $criteria->compare('link', $this->link, true);
    $criteria->compare('title', $this->title, true);
    $criteria->compare('creator_id', $this->creator_id);
    $criteria->compare('goal_id', $this->goal_id);
    $criteria->compare('description', $this->description, true);
    $criteria->compare('importance', $this->importance);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
