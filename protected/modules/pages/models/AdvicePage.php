<?php

/**
 * This is the model class for table "{{advice_page}}".
 *
 * The followings are the available columns in table '{{advice_page}}':
 * @property integer $id
 * @property integer $skills
 * @property integer $page_id
 * @property integer $skill_id
 * @property integer $level_id
 * @property integer $privacy
 *
 * The followings are the available model relations:
 * @property Page $page
 * @property Skill $skill
 * @property Level $level
 * @property AdvicePageShare[] $advicePageShares
 * @property AdvicePageSubskill[] $advicePageSubskills
 */
class AdvicePage extends CActiveRecord {

  public static function deleteAdvicePage($advicePageId) {
    $postsCriteria = new CDbCriteria;
    $postsCriteria->addCondition("type=" . Type::$SOURCE_PAGE);
    $postsCriteria->addCondition("source_id=" . $advicePageId);
    Post::model()->deleteAll($postsCriteria);
    AdvicePage::model()->deleteByPk($advicePageId);
  }

  public static function getAdvicePages($skillId = null, $keyword = null, $limit = null, $creatorId = null, $exceptId = null) {
    $advicePagesCriteria = new CDbCriteria;
    // $advicePagesCriteria->group = 'page_id';
    //$advicePagesCriteria->distinct = 'true';
    if (Yii::app()->user->isGuest) {
      $advicePagesCriteria->addCondition("privacy=" . Type::$SHARE_PUBLIC);
    }
    $advicePagesCriteria->alias = "aD";
    $advicePagesCriteria->group = "skill_List_id";
    $advicePagesCriteria->order = "aD.id";
    if ($limit != null) {
      $advicePagesCriteria->limit = $limit;
    }
    if ($skillId != null) {
      //$advicePagesCriteria->with = array("advicePages" => array("alias" => "gP"));
      $advicePagesCriteria->addCondition("skill_id=" . $skillId);
    }
    if ($creatorId) {
      $advicePagesCriteria->with = array("page" => array("alias" => "p"));
      $advicePagesCriteria->addCondition("p.creator_id=" . $creatorId);
    }
    if ($creatorId) {
      $advicePagesCriteria->addCondition("NOT aD.id=" . $exceptId);
    }
    if ($keyword != null) {
      //$advicePagesCriteria->compare("g.title", $keyword, true, "OR");
      // $advicePagesCriteria->compare("g.description", $keyword, true, "OR");
    }
    $advicePagesCriteria->distinct = true;
    return AdvicePage::Model()->findAll($advicePagesCriteria);
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return AdvicePage the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{advice_page}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('skills, level_id', 'required'),
     array('skills, page_id, skill_id, level_id, privacy', 'numerical', 'integerOnly' => true),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, skills, page_id, skill_id, level_id, privacy', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'page' => array(self::BELONGS_TO, 'Page', 'page_id'),
     'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
     'level' => array(self::BELONGS_TO, 'Level', 'level_id'),
     'advicePageShares' => array(self::HAS_MANY, 'AdvicePageShare', 'advice_page_id'),
     'advicePageSubskills' => array(self::HAS_MANY, 'AdvicePageSubskill', 'advice_page_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'skills' => 'Subskills',
     'page_id' => 'Page',
     'skill_id' => 'Skill List',
     'level_id' => 'Level',
     'privacy' => 'Sharing Type',
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
    $criteria->compare('skills', $this->skills);
    $criteria->compare('page_id', $this->page_id);
    $criteria->compare('skill_id', $this->skill_id);
    $criteria->compare('level_id', $this->level_id);
    $criteria->compare('privacy', $this->privacy);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
