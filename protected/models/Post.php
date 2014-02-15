<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property integer $owner_id
 * @property integer $source_id
 * @property integer $type
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $owner
 */
class Post extends CActiveRecord {

  public static $TYPE_GOAL_LIST = 1;
  public static $TYPE_MENTORSHIP = 2;
  public static $TYPE_MENTORSHIP_REQUEST = 3;
  public static $TYPE_ADVICE_PAGE = 4;

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Post the static model class
   */
  public static function getPosts() {
    $postCriteria = new CDbCriteria();
    $postCriteria->alias ="p";
    $postCriteria->order = "p.id desc";
    return Post::model()->findAll($postCriteria);
  }

  public static function addPost($sourceId, $type) {
    $post = new Post();
    $post->owner_id = Yii::app()->user->id;
    $post->source_id = $sourceId;
    $post->type = $type;
    $post->save(false);
  }

  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{post}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('owner_id, source_id, type', 'required'),
     array('owner_id, source_id, type, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, owner_id, source_id, type, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'owner' => array(self::BELONGS_TO, 'User', 'owner_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'owner_id' => 'Owner',
     'source_id' => 'Source',
     'type' => 'Type',
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
    $criteria->compare('owner_id', $this->owner_id);
    $criteria->compare('source_id', $this->source_id);
    $criteria->compare('type', $this->type);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
