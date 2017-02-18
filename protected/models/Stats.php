<?php

/**
 * This is the model class for table "Stats".
 *
 * The followings are the available columns in table 'Stats':
 * @property string $id
 * @property string $type
 * @property integer $logins
 * @property integer $games
 * @property integer $wins
 * @property string $record
 * @property string $start
 * @property string $end
 */
class Stats extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'Stats';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, record, start', 'required'),
			array('logins, games, wins', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>7),
			array('record', 'length', 'max'=>10),
			array('end', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, logins, games, wins, record, start, end', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'logins' => 'Logins',
			'games' => 'Games',
			'wins' => 'Wins',
			'record' => 'Record',
			'start' => 'Start',
			'end' => 'End',
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
        $criteria->compare('type',$this->type,true);
        $criteria->compare('logins',$this->logins);
        $criteria->compare('games',$this->games);
        $criteria->compare('wins',$this->wins);
        $criteria->compare('record',$this->record,true);
        $criteria->compare('start',$this->start,true);
        $criteria->compare('end',$this->end,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Stats the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
