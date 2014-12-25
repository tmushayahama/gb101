<?php

/**
 * This is the model class for table "{{promise_type}}".
 *
 * The followings are the available columns in table '{{promise_type}}':
 * @property integer $id
 * @property string $category
 * @property string $type
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Promise[] $promises
 * @property Bank[] $banks
 */
class PromiseType extends CActiveRecord {

  public static $CATEGORY_PROMISE = "promise";
  
  public static $FORM_TYPE_PROMISE_HOME = 1;
  public static $FORM_TYPE_MENTORSHIP_HOME = 2;
  public static $FORM_TYPE_MENTORSHIP_MENTORSHIP = 3;
  public static $FORM_TYPE_ADVICE_PAGE_HOME = 4;
  public static $FORM_TYPE_ADVICE_PAGE_ADVICE_PAGE = 5;
   public static $FORM_TYPE_ADVICE_PAGE_ADVICE_PAGES = 6;

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return PromiseType the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{promise_type}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('category, type', 'required'),
     array('category, type', 'length', 'max' => 50),
     array('description', 'length', 'max' => 150),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, category, type, description', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'promises' => array(self::HAS_MANY, 'Promise', 'type_id'),
     'banks' => array(self::HAS_MANY, 'Bank', 'type_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'category' => 'Category',
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
    $criteria->compare('category', $this->category, true);
    $criteria->compare('type', $this->type, true);
    $criteria->compare('description', $this->description, true);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
