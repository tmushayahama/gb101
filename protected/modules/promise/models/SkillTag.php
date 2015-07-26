<?php

/**
 * This is the model class for table "{{skill_tag}}".
 *
 * The followings are the available columns in table '{{skill_tag}}':
 * @property integer $id
 * @property integer $skill_id
 * @property integer $tag_id
 * @property integer $tagger_id
 *
 * The followings are the available model relations:
 * @property Skill $skill
 * @property Tag $tag
 * @property User $tagger
 */
class SkillTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return SkillTag the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{skill_tag}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('skill_id, tag_id, tagger_id', 'required'),
			array('skill_id, tag_id, tagger_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, skill_id, tag_id, tagger_id', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'skill' => array(self::BELONGS_TO, 'Skill', 'skill_id'),
			'tag' => array(self::BELONGS_TO, 'Tag', 'tag_id'),
			'tagger' => array(self::BELONGS_TO, 'User', 'tagger_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'skill_id' => 'Skill',
			'tag_id' => 'Tag',
			'tagger_id' => 'Tagger',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('skill_id',$this->skill_id);
		$criteria->compare('tag_id',$this->tag_id);
		$criteria->compare('tagger_id',$this->tagger_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}