<?php

/**
 * This is the model class for table "{{advice_type}}".
 *
 * The followings are the available columns in table '{{advice_type}}':
 * @property integer $id
 * @property string $category
 * @property string $type
 * @property string $description
 *
 * The followings are the available model relations:
 * @property Advice[] $advices
 * @property Bank[] $banks
 */
class AdviceType extends CActiveRecord {

  public static $CATEGORY_ADVICE = "advice";
  
  public static $FORM_TYPE_ADVICE_HOME = 1;
  public static $FORM_TYPE_ADVICE_HOME = 2;
  public static $FORM_TYPE_ADVICE_ADVICE = 3;
  public static $FORM_TYPE_ADVICE_HOME = 4;
  public static $FORM_TYPE_ADVICE_ADVICE = 5;
   public static $FORM_TYPE_ADVICE_ADVICES = 6;

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return AdviceType the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{advice_type}}';
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
     'advices' => array(self::HAS_MANY, 'Advice', 'type_id'),
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
