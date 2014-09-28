<?php

/**
 * This is the model class for table "{{project_member}}".
 *
 * The followings are the available columns in table '{{project_member}}':
 * @property integer $id
 * @property integer $member_id
 * @property integer $inviter_id
 * @property integer $acceptee_id
 * @property integer $project_id
 * @property integer $role
 * @property string $description
 * @property integer $status
 *
 * The followings are the available model relations:
 * @property User $member
 * @property User $inviter
 * @property User $acceptee
 * @property Project $project
 */
class ProjectMember extends CActiveRecord {

  public static function getProjectMembers($projectId, $role = null) {
    $projectMemberCriteria = new CDbCriteria();
    $projectMemberCriteria->addCondition("project_id=" . $projectId);

    if ($role) {
      $projectMemberCriteria->addCondition("role=" . $role);
    }
    return ProjectMember::model()->findAll($projectMemberCriteria);
  }

  public static function acceptMember($notification) {
    if ($notification != null) {
      $projectMember = new ProjectMember();
      $projectMember->project_id = $notification->source_id;
      $projectMember->member_id = $notification->recipient_id;
      $projectMember->inviter_id = $notification->sender_id;
      $projectMember->role = 1;
      if ($projectMember->save(false)) {
        $notification->status = Notification::$STATUS_ACCEPTED;
        if ($notification->save(false)) {
          return $projectMember->id;
        }
      }
    }
  }

  /**
   * Returns the static model of the specified AR class.
   * @param string $className active record class name.
   * @return ProjectMember the static model class
   */
  public static function model($className = __CLASS__) {
    return parent::model($className);
  }

  /**
   * @return string the associated database table name
   */
  public function tableName() {
    return '{{project_member}}';
  }

  /**
   * @return array validation rules for model attributes.
   */
  public function rules() {
    // NOTE: you should only define rules for those attributes that
    // will receive user inputs.
    return array(
     array('member_id, project_id, role', 'required'),
     array('member_id, inviter_id, acceptee_id, project_id, role, status', 'numerical', 'integerOnly' => true),
     array('description', 'length', 'max' => 1000),
     // The following rule is used by search().
     // Please remove those attributes that should not be searched.
     array('id, member_id, inviter_id, acceptee_id, project_id, role, description, status', 'safe', 'on' => 'search'),
    );
  }

  /**
   * @return array relational rules.
   */
  public function relations() {
    // NOTE: you may need to adjust the relation name and the related
    // class name for the relations automatically generated below.
    return array(
     'member' => array(self::BELONGS_TO, 'User', 'member_id'),
     'inviter' => array(self::BELONGS_TO, 'User', 'inviter_id'),
     'acceptee' => array(self::BELONGS_TO, 'User', 'acceptee_id'),
     'project' => array(self::BELONGS_TO, 'Project', 'project_id'),
    );
  }

  /**
   * @return array customized attribute labels (name=>label)
   */
  public function attributeLabels() {
    return array(
     'id' => 'ID',
     'member_id' => 'Member',
     'inviter_id' => 'Inviter',
     'acceptee_id' => 'Acceptee',
     'project_id' => 'Project',
     'role' => 'Role',
     'description' => 'Description',
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
    $criteria->compare('member_id', $this->member_id);
    $criteria->compare('inviter_id', $this->inviter_id);
    $criteria->compare('acceptee_id', $this->acceptee_id);
    $criteria->compare('project_id', $this->project_id);
    $criteria->compare('role', $this->role);
    $criteria->compare('description', $this->description, true);
    $criteria->compare('status', $this->status);

    return new CActiveDataProvider($this, array(
     'criteria' => $criteria,
    ));
  }

}
