<?php

/**
 * This is the model class for table "{{skill_weblink}}".
 *
 * The followings are the available columns in table '{{skill_weblink}}':
 * @property integer $id
 * @property integer $weblink_id
 * @property integer $skill_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Weblink $weblink
 * @property Skill $skill
 */
class SkillWeblink extends CActiveRecord {

  public static function getSkillWeblinks($skillId) {
    $skillWeblinksCriteria = new CDbCriteria;
    $skillWeblinksCriteria->addCondition("skill_id = " . $skillId);
    $skillWeblinksCriteria->order = "id desc";
    return SkillWeblink::Model()->findAll($skillWeblinksCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return SkillWeblink the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{skill_weblink}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('weblink_id, skill_id', 'required'),
     array('weblink_id, skill_id, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, weblink_id, skill_id, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'weblink' => array(self::BELONGS_TO, 'Weblink', 'weblink_id'),
     'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'weblink_id' => 'Web Link',
     'skill_id' => 'Skill',
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
    $criteria->compare('weblink_id', $this->weblink_id);
    $criteria->compare('skill_id', $this->skill_id);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
