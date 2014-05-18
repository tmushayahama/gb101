<?php

/**
 * This is the model class for table "{{discussion_title}}".
 *
 * The followings are the available columns in table '{{discussion_title}}':
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property integer $creator_id
 * @property string $created_date
 *
 * The followings are the available model relations:
 * @property Discussion[] $discussions
 * @property User $creator
 * @property MentorshipDiscussionTitle[] $mentorshipDiscussionTitles
 */
class DiscussionTitle extends CActiveRecord {

  public static function getDiscussionTitle($goalId, $limit = null) {
    $discussionTitleCriteria = new CDbCriteria();
    $discussionTitleCriteria->alias = "dT";
    $discussionTitleCriteria->addCondition("goal_id=" . $goalId);
    $discussionTitleCriteria->order = "dT.id desc";
    return DiscussionTitle::Model()->findAll($discussionTitleCriteria);
  }

  public static function getDiscussionTitleCount($goalId, $limit = null) {
    $discussionTitleCriteria = new CDbCriteria();
    $discussionTitleCriteria->addCondition("goal_id=" . $goalId);
    return DiscussionTitle::Model()->count($discussionTitleCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return DiscussionTitle the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{discussion_title}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('creator_id, created_date', 'required'),
     array('creator_id', 'numerical', 'integerOnly' => true),
     array('title', 'length', 'max' => 150),
     array('description', 'length', 'max' => 1000),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, title, description, creator_id, created_date', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'discussions' => array(self::HAS_MANY, 'Discussion', 'title_id'),
     'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
     'mentorshipDiscussionTitles' => array(self::HAS_MANY, 'MentorshipDiscussionTitle', 'discussion_title_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'title' => 'Title',
     'description' => 'Description',
     'creator_id' => 'Creator',
     'created_date' => 'Created Date',
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
    $criteria->compare('title', $this->title, true);
    $criteria->compare('description', $this->description, true);
    $criteria->compare('creator_id', $this->creator_id);
    $criteria->compare('created_date', $this->created_date, true);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
