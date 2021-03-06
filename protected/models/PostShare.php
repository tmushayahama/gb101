<?php

/**
 * This is the model class for table "{{post_share}}".
 *
 * The followings are the available columns in table '{{post_share}}':
 * @property integer $id
 * @property integer $post_id
 * @property integer $creator_id
 * @property integer $shared_to_id
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Post $post
 * @property User $creator
 * @property User $sharedTo
 */
class PostShare extends CActiveRecord {

  public static function getPostShare($type = null, $creatorId = null) {
    $postCriteria = new CDbCriteria();
    $postCriteria->group = "p.id";
    $postCriteria->distinct = true;
    $postCriteria->with = array("post" => array("alias" => "p"));
    $postCriteria->alias = "pS";
    $postCriteria->order = "p.id desc";
    if ($type) {
      $postCriteria->addCondition('p.type=' . $type);
    }
    if ($creatorId) {
      $postCriteria->addCondition("shared_to_id=1");
      $postCriteria->addCondition('pS.creator_id=' . $creatorId . " OR pS.shared_to_id=" . $creatorId);
    } else {
      if (Yii::app()->user->isGuest) {
        $postCriteria->addCondition("shared_to_id=1");
      } else {
        $postCriteria->addCondition("shared_to_id=1 OR shared_to_id=" . Yii::app()->user->id . " OR " . "pS.creator_id=" . Yii::app()->user->id);
      }
    }
    return PostShare::model()->findAll($postCriteria);
  }

  public static function checkIfShared($type, $creatorId, $userId) {
    $postCriteria = new CDbCriteria();
    $postCriteria->with = array("post" => array("alias" => "p"));
    $postCriteria->alias = "pS";
    $postCriteria->addCondition('p.type=' . $type);
    $postCriteria->addCondition("shared_to_id=" . $userId);
    $postCriteria->addCondition('pS.creator_id=' . $creatorId . " OR pS.shared_to_id=" . $creatorId);
    return (PostShare::model()->find($postCriteria) != null);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return PostShare the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{post_share}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('post_id, creator_id, shared_to_id', 'required'),
     array('post_id, creator_id, shared_to_id, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, post_id, creator_id, shared_to_id, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'post' => array(self::BELONGS_TO, 'Post', 'post_id'),
     'creator' => array(self::BELONGS_TO, 'User', 'creator_id'),
     'sharedTo' => array(self::BELONGS_TO, 'User', 'shared_to_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'post_id' => 'Post',
     'creator_id' => 'Owner',
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
    $criteria->compare('post_id', $this->post_id);
    $criteria->compare('creator_id', $this->creator_id);
    $criteria->compare('shared_to_id', $this->shared_to_id);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
