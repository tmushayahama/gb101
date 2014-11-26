<?php

/**
 * This is the model class for table "{{hobby_list}}".
 *
 * The followings are the available columns in table '{{hobby_list}}':
 * @property integer $id
 * @property integer $user_id
 * @property integer $hobby_id
 * @property integer $level_id
 * @property integer $bank_parent_id
 * @property integer $status
 * @property integer $privacy
 * @property integer $order
 *
 * The followings are the available model relations:
 * @property Hobby $hobby
 * @property Level $level
 * @property Bank $bankParent
 * @property User $user
 * @property HobbyListShare[] $hobbyListShares
 */
class HobbyList extends CActiveRecord {

  public static function getHobbyList($levelCategory = null, $userId = null, $levelIds = null, $limit = null) {
    $hobbyListCriteria = new CDbCriteria;
    $hobbyListCriteria->alias = "gList";
    $hobbyListCriteria->with = array("level" => array("alias" => 'level'));
    if ($userId != null) {
      $hobbyListCriteria->addCondition("user_id=" . $userId);
    }
    if ($levelCategory != null) {
      // $hobbyListCriteria->addCondition("level.category=" . $levelCategory);
    }
    if ($levelIds != null) {
      $levelIdArray = [];
      foreach ($levelIds as $levelId) {
        array_push($levelIdArray, $levelId);
      }
      $hobbyListCriteria->addInCondition("level_id", $levelIdArray);
    }
    $hobbyListCriteria->order = "gList.id desc";
    if ($limit != null) {
      $hobbyListCriteria->limit = $limit;
    }
    return HobbyList::Model()->findAll($hobbyListCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return HobbyList the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{hobby_list}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('level_id', 'required'),
     array('user_id, hobby_id, level_id, bank_parent_id, status, privacy, order', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, user_id, hobby_id, level_id, bank_parent_id, status, privacy, order', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'hobby' => array(self::BELONGS_TO, 'Hobby', 'hobby_id'),
     'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
     'bankParent' => array(self::BELONGS_TO, 'Bank', 'bank_parent_id'),
     'user' => array(self::BELONGS_TO, 'User', 'user_id'),
     'hobbyListShares' => array(self::HAS_MANY, 'HobbyListShare', 'hobby_list_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'user_id' => 'User',
     'hobby_id' => 'Hobby',
     'level_id' => 'Level',
     'bank_parent_id' => 'List Bank Parent',
     'status' => 'Status',
     'privacy' => 'Privacy',
     'order' => 'Order',
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
    $criteria->compare('hobby_id', $this->hobby_id);
    $criteria->compare('level_id', $this->level_id);
    $criteria->compare('bank_parent_id', $this->bank_parent_id);
    $criteria->compare('status', $this->status);
    $criteria->compare('privacy', $this->privacy);
    $criteria->compare('order', $this->order);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
