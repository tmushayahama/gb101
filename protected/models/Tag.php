<?php

/**
 * This is the model class for table "{{tag}}".
 *
 * The followings are the available columns in table '{{tag}}':
 * @property integer $id
 * @property string $tag
 * @property integer $type
 * @property string $description
 *
 * The followings are the available model relations:
 * @property GoalTag[] $goalTags
 */
class Tag extends CActiveRecord {

  public static function getAllTags() {
    $tagCriteria = new CDbCriteria();
    return Tag::model()->findAll($tagCriteria);
  }

  public static function submitTag($tagName) {
  //  $tagCriteria = new CDbCriteria();
   // $tagCriteria->addCondition("tag=" . $tagName);
   // $tag = Tag::model()->find($tagCriteria);
  //  if(!tag){
      $tag  = new Tag();
      $tag->tag = $tagName;
      $tag->type = 1;
      $tag->save(false);
  //  }
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return Tag the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{tag}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
    return array(
     array('tag, description', 'required'),
     array('type', 'numerical', 'integerOnly' => true),
     array('tag, description', 'length', 'max' => 1000),
     // The following rule is used by search().
// Please remove those attributes that should not be searched.
     array('id, tag, type, description', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
    return array(
     'goalTags' => array(self::HAS_MANY, 'GoalTag', 'tag_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'tag' => 'Tag',
     'type' => 'Type',
     'description' => 'Description',
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
    $criteria->compare('tag', $this->tag, true);
    $criteria->compare('type', $this->type);
    $criteria->compare('description', $this->description, true);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
