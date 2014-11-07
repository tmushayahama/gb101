<?php

/**
 * This is the model class for table "{{todo_weblink}}".
 *
 * The followings are the available columns in table '{{todo_weblink}}':
 * @property integer $id
 * @property integer $weblink_id
 * @property integer $todo_id
 * @property integer $privacy
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property Weblink $weblink
 * @property Todo $todo
 */
class TodoWeblink extends CActiveRecord
{
   public static function getTodoParentWeblink($childWeblinkId, $todoId) {
    $todoWeblinkCriteria = new CDbCriteria;
    $todoWeblinkCriteria->addCondition("weblink_id=" . $childWeblinkId);
    $todoWeblinkCriteria->addCondition("todo_id = " . $todoId);

    return TodoWeblink::Model()->find($todoWeblinkCriteria);
  }

  public static function getTodoParentWeblinks($todoId, $limit = null) {
    $todoWeblinkCriteria = new CDbCriteria;
    if ($limit) {
      $todoWeblinkCriteria->limit = $limit;
    }
    $todoWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
    $todoWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
    $todoWeblinkCriteria->addCondition("todo_id = " . $todoId);
    $todoWeblinkCriteria->order = "td.id desc";
    return TodoWeblink::Model()->findAll($todoWeblinkCriteria);
  }

  public static function getTodoParentWeblinksCount($todoId) {
    $todoWeblinkCriteria = new CDbCriteria;
    $todoWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
    $todoWeblinkCriteria->addCondition("td.parent_weblink_id is NULL");
    $todoWeblinkCriteria->addCondition("todo_id = " . $todoId);
    return TodoWeblink::Model()->count($todoWeblinkCriteria);
  }

  public static function getTodoChildrenWeblinks($weblinkParentId, $limit = null) {
    $todoWeblinkCriteria = new CDbCriteria;
    if ($limit) {
      $todoWeblinkCriteria->limit = $limit;
    }
    $todoWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
    $todoWeblinkCriteria->addCondition("td.parent_weblink_id=" . $weblinkParentId);
    $todoWeblinkCriteria->order = "td.id desc";
    return TodoWeblink::Model()->findAll($todoWeblinkCriteria);
  }

  public static function getTodoChildrenWeblinksCount($weblinkParentId, $limit = null) {
    $todoWeblinkCriteria = new CDbCriteria;
    $todoWeblinkCriteria->with = array("weblink" => array("alias" => 'td'));
    $todoWeblinkCriteria->addCondition("td.parent_weblink_id=" . $weblinkParentId);
    return TodoWeblink::Model()->count($todoWeblinkCriteria);
  }
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return TodoWeblink the static model class
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
		return '{{todo_weblink}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('weblink_id, todo_id', 'required'),
			array('weblink_id, todo_id, privacy, status', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, weblink_id, todo_id, privacy, status', 'safe', 'on'=>'search'),
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
			'weblink' => array(self::BELONGS_TO, 'Weblink', 'weblink_id'),
			'todo' => array(self::BELONGS_TO, 'Todo', 'todo_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'weblink_id' => 'Weblink',
			'todo_id' => 'Todo',
			'privacy' => 'Privacy',
			'status' => 'Status',
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
		$criteria->compare('weblink_id',$this->weblink_id);
		$criteria->compare('todo_id',$this->todo_id);
		$criteria->compare('privacy',$this->privacy);
		$criteria->compare('status',$this->status);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}