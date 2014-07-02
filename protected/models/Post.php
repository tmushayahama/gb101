<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property integer $id
 * @property integer $owner_id
 * @property integer $source_id
 * @property integer $type
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $owner
 * @property PostShare[] $postShares
 */
class Post extends CActiveRecord {

  public static $TYPE_GOAL_LIST = 0;
  public static $TYPE_MENTORSHIP = 1;
  public static $TYPE_ADVICE_PAGE = 2;
  public static $TYPE_MENTORSHIP_REQUEST = 3;
  public static $TYPE_LIST_BANK = 4;
  public static $TYPE_PEOPLE = 5;

  public static function addPost($sourceId, $type, $privacy, $userIds = null) {
    $post = new Post();
    $post->owner_id = Yii::app()->user->id;
    $post->source_id = $sourceId;
    $post->privacy = $privacy;
    $post->type = $type;
    
    if ($post->save(false)) {
      if ($privacy == Type::$SHARE_PUBLIC) {
        $postShare = new PostShare();
        $postShare->post_id = $post->id;
        $postShare->owner_id = Yii::app()->user->id;
        $postShare->shared_to_id = 1;
        $postShare->save(false);
      } else if ($privacy == Type::$SHARE_PRVATE) {
        $postShare = new PostShare();
        $postShare->post_id = $post->id;
        $postShare->owner_id = Yii::app()->user->id;
        $postShare->shared_to_id = Yii::app()->user->id;
        $postShare->save(false);
      } else if ($privacy == Type::$SHARE_CUSTOMIZE) {
        if (!$userIds) {
          $post->privacy = Type::$SHARE_PRVATE;
          if ($post->save(false)) {
            $postShare = new PostShare();
            $postShare->post_id = $post->id;
            $postShare->owner_id = Yii::app()->user->id;
            $postShare->shared_to_id = Yii::app()->user->id;
            $postShare->save(false);
          }
        } else {
          if (is_array($userIds)) {
            foreach ($userIds as $userId) {
              $postShare = new PostShare();
              $postShare->post_id = $post->id;
              $postShare->owner_id = Yii::app()->user->id;
              $postShare->shared_to_id = $userId;
              $postShare->save(false);
            }
          }
        }
      }
    }
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Post the static model class
   */
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
     array('owner_id, source_id, type, privacy, status', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, owner_id, source_id, type, privacy, status', 'safe', 'on' => 'search'),
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
     'postShares' => array(self::HAS_MANY, 'PostShare', 'post_id'),
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
     'privacy' => 'Sharing Type',
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
    $criteria->compare('privacy', $this->privacy);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
