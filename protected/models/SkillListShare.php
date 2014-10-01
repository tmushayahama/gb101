<?php

/**
 * This is the model class for table "{{skill_list_share}}".
 *
 * The followings are the available columns in table '{{skill_list_share}}':
 * @property integer $id
 * @property integer $skill_list_id
 * @property integer $shared_to_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property SkillList $skillList
 * @property User $sharedTo
 */
class SkillListShare extends CActiveRecord {

  public static function shareSkillList($skillListId, $userIds = null) {
    if (is_array($userIds)) {
      foreach ($userIds as $userId) {
        $skillListShare = new SkillListShare();
        $skillListShare->skill_list_id = $skillListId;
        $skillListShare->shared_to_id = $userId;
        $skillListShare->save(false);
      }
    }
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return SkillListShare the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{skill_list_share}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('skill_list_id, shared_to_id', 'required'),
     array('skill_list_id, shared_to_id, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, skill_list_id, shared_to_id, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'skillList' => array(self::BELONGS_TO, 'SkillList', 'skill_list_id'),
     'sharedTo' => array(self::BELONGS_TO, 'User', 'shared_to_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'skill_list_id' => 'Skill List',
     'shared_to_id' => 'Shared To',
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
    $criteria->compare('skill_list_id', $this->skill_list_id);
    $criteria->compare('shared_to_id', $this->shared_to_id);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
