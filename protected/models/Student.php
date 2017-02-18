<?php

/**
 * This is the model class for table "Student".
 *
 * The followings are the available columns in table 'Student':
 * @property string $id
 * @property string $display_id
 * @property string $school
 * @property integer $grade
 * @property string $avatar
 *
 * The followings are the available model relations:
 * @property Avatar $avatar0
 * @property School $school0
 * @property User[] $users
 */
class Student extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Student';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('display_id, school, avatar', 'required'),
			array('grade', 'numerical', 'integerOnly'=>true),
			array('display_id, school, avatar', 'length', 'max'=>10),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, display_id, school, grade, avatar', 'safe', 'on'=>'search'),
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
			'avatar0' => array(self::BELONGS_TO, 'Avatar', 'avatar'),
			'school0' => array(self::BELONGS_TO, 'School', 'school'),
			'users' => array(self::HAS_MANY, 'User', 'student'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'display_id' => 'Display',
			'school' => 'School',
			'grade' => 'Grade',
			'avatar' => 'Avatar',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

        $criteria->compare('id',$this->id,true);
        $criteria->compare('display_id',$this->display_id,true);
        $criteria->compare('school',$this->school,true);
        $criteria->compare('grade',$this->grade);
        $criteria->compare('avatar',$this->avatar,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Student the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
