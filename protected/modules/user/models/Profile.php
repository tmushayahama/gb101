<?php

/**
 * This is the model class for table "{{profile}}".
 *
 * The followings are the available columns in table '{{profile}}':
 * @property integer $user_id
 * @property string $lastname
 * @property string $firstname
 * @property string $welcome_message
 * @property string $summary
 * @property string $experience
 * @property string $interests
 * @property string $favorite_quote
 * @property string $avatar_url
 * @property string $gender
 * @property string $birthdate
 * @property string $phone_number
 * @property string $address
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Profile extends CActiveRecord {

 public static function getProfile($userId) {
  $peopleCriteria = new CDbCriteria();
  $peopleCriteria->addCondition("user_id=" . $userId);
  return Profile::model()->find($peopleCriteria);
 }

 public function getGenderOptions() {
  return array(
    1 => 'Male',
    2 => 'Female',
    3 => 'Other',
  );
 }

 public static function getFirstName() {
  return Profile::model()->find("user_id=" . Yii::app()->user->id)->firstname;
 }

 public static function getAvatarUrl() {
  return Profile::model()->find("user_id=" . Yii::app()->user->id)->avatar_url;
 }

 public static function getPeople($exceptMe) {
  $peopleCriteria = new CDbCriteria();
  $peopleCriteria->addCondition("not user_id=1");
  if ($exceptMe) {
   $peopleCriteria->addCondition("not user_id=" . Yii::app()->user->id);
  }
  return Profile::model()->findAll($peopleCriteria);
 }

 /**
  * Returns the static model of the specified AR class.
  * @param string $className active record class name.
  * @return Profile the static model class
  */
 public static function model($className = __CLASS__) {
  return parent::model($className);
 }

 /**
  * @return string the associated database table name
  */
 public function tableName() {
  return '{{profile}}';
 }

 /**
  * @return array validation rules for model attributes.
  */
 public function rules() {
  // NOTE: you should only define rules for those attributes that
  // will receive user inputs.
  return array(
    array('lastname, firstname', 'length', 'max' => 50),
    array('welcome_message, summary, experience, interests, favorite_quote', 'length', 'max' => 1000),
    array('avatar_url', 'length', 'max' => 200),
    array('gender', 'length', 'max' => 3),
    array('phone_number', 'length', 'max' => 20),
    array('address', 'length', 'max' => 255),
    array('birthdate', 'safe'),
    // The following rule is used by search().
    // Please remove those attributes that should not be searched.
    array('user_id, lastname, firstname, welcome_message, summary, experience, interests, favorite_quote, avatar_url, gender, birthdate, phone_number, address', 'safe', 'on' => 'search'),
  );
 }

 /**
  * @return array relational rules.
  */
 public function relations() {
  // NOTE: you may need to adjust the relation name and the related
  // class name for the relations automatically generated below.
  return array(
    'user' => array(self::BELONGS_TO, 'User', 'user_id'),
  );
 }

 /**
  * @return array customized attribute labels (name=>label)
  */
 public function attributeLabels() {
  return array(
    'user_id' => 'User',
    'lastname' => 'Lastname',
    'firstname' => 'Firstname',
    'welcome_message' => 'Welcome Message',
    'summary' => 'Summary',
    'experience' => 'Experience',
    'interests' => 'Interests',
    'favorite_quote' => 'Favorite Quote',
    'avatar_url' => 'Avatar Url',
    'gender' => 'Gender',
    'birthdate' => 'Birthdate',
    'phone_number' => 'Phone Number',
    'address' => 'Address',
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

  $criteria->compare('user_id', $this->user_id);
  $criteria->compare('lastname', $this->lastname, true);
  $criteria->compare('firstname', $this->firstname, true);
  $criteria->compare('welcome_message', $this->welcome_message, true);
  $criteria->compare('summary', $this->summary, true);
  $criteria->compare('experience', $this->experience, true);
  $criteria->compare('interests', $this->interests, true);
  $criteria->compare('favorite_quote', $this->favorite_quote, true);
  $criteria->compare('avatar_url', $this->avatar_url, true);
  $criteria->compare('gender', $this->gender, true);
  $criteria->compare('birthdate', $this->birthdate, true);
  $criteria->compare('phone_number', $this->phone_number, true);
  $criteria->compare('address', $this->address, true);

  return new CActiveDataProvider($this, array(
    'criteria' => $criteria,
  ));
 }

}
