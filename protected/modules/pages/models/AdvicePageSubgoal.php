<?php

/**
 * This is the model class for table "{{advice_page_subskill}}".
 *
 * The followings are the available columns in table '{{advice_page_subskill}}':
 * @property integer $id
 * @property integer $advice_page_id
 * @property integer $subskill_list_id
 *
 * The followings are the available model relations:
 * @property AdvicePage $advicePage
 * @property SkillList $subskillList
 */
class AdvicePageSubskill extends CActiveRecord {

  public static function getSubskill($advicePageId) {
    $advicePagesSubskillCriteria = new CDbCriteria;
    $advicePagesSubskillCriteria->addCondition("advice_page_id=" . $advicePageId);
    // $advicePagesCriteria->group = 'page_id';
    //$advicePagesCriteria->distinct = 'true';
    return AdvicePageSubskill::Model()->findAll($advicePagesSubskillCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return AdvicePageSubskill the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{advice_page_subskill}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('advice_page_id, subskill_list_id', 'required'),
     array('advice_page_id, subskill_list_id', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, advice_page_id, subskill_list_id', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'advicePage' => array(self::BELONGS_TO, 'AdvicePage', 'advice_page_id'),
     'subskillList' => array(self::BELONGS_TO, 'SkillList', 'subskill_list_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'advice_page_id' => 'Advice Page',
     'subskill_list_id' => 'Subskill List',
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
    $criteria->compare('advice_page_id', $this->advice_page_id);
    $criteria->compare('subskill_list_id', $this->subskill_list_id);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
