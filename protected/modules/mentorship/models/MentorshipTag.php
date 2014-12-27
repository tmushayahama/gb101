<?php

/**
 * This is the model class for table "{{mentorship_tag}}".
 *
 * The followings are the available columns in table '{{mentorship_tag}}':
 * @property integer $id
 * @property integer $mentorship_id
 * @property integer $tag_id
 * @property integer $tagger_id
 *
 * The followings are the available model relations:
 * @property Mentorship $mentorship
 * @property Tag $tag
 * @property User $tagger
 */
class MentorshipTag extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return MentorshipTag the static model class
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
		return '{{mentorship_tag}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('mentorship_id, tag_id, tagger_id', 'required'),
			array('mentorship_id, tag_id, tagger_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, mentorship_id, tag_id, tagger_id', 'safe', 'on'=>'search'),
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
			'mentorship' => array(self::BELONGS_TO, 'Mentorship', 'mentorship_id'),
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
			'mentorship_id' => 'Mentorship',
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
		$criteria->compare('mentorship_id',$this->mentorship_id);
		$criteria->compare('tag_id',$this->tag_id);
		$criteria->compare('tagger_id',$this->tagger_id);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}