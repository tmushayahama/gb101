<?php

/**
 * This is the model class for table "{{profile}}".
 *
 * The followings are the available columns in table '{{profile}}':
 * @property integer $user_id
 * @property string $gender
 * @property string $birthdate
 * @property string $phone_number
 * @property string $address
 * @property string $lastname
 * @property string $firstname
 *
 * The followings are the available model relations:
 * @property User $user
 */
class Profile extends CActiveRecord {

	public function getGenderOptions() {
		return array(
				1 => 'Male',
				2 => 'Female',
				3 => 'Other',
		);
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
				array('gender, birthdate', 'required'),
				array('gender', 'length', 'max' => 3),
				array('phone_number', 'length', 'max' => 20),
				array('address', 'length', 'max' => 255),
				array('lastname, firstname', 'length', 'max' => 50),
				// The following rule is used by search().
				// Please remove those attributes that should not be searched.
				array('user_id, gender, birthdate, phone_number, address, lastname, firstname', 'safe', 'on' => 'search'),
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
				'gender' => 'Gender',
				'birthdate' => 'Birthdate',
				'phone_number' => 'Phone Number',
				'address' => 'Address',
				'lastname' => 'Lastname',
				'firstname' => 'Firstname',
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
		$criteria->compare('gender', $this->gender, true);
		$criteria->compare('birthdate', $this->birthdate, true);
		$criteria->compare('phone_number', $this->phone_number, true);
		$criteria->compare('address', $this->address, true);
		$criteria->compare('lastname', $this->lastname, true);
		$criteria->compare('firstname', $this->firstname, true);

		return new CActiveDataProvider($this, array(
				'criteria' => $criteria,
		));
	}

}