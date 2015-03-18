<?php

/**
 * This is the model class for table "cancer_regis".
 *
 * The followings are the available columns in table 'cancer_regis':
 * @property string $rn
 * @property string $hn
 * @property string $name
 * @property string $surname
 * @property string $address
 * @property string $moo
 * @property string $tumbol
 * @property string $amp
 * @property string $prov
 * @property string $create_date
 * @property string $update_date
 * @property string $user_id
 */
class CanRegis extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return CanRegis the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return CDbConnection database connection
	 */
	public function getDbConnection()
	{
		return Yii::app()->dbkkh;
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cancer_regis';
	}
        
        public static function setDateTh($date) {
        //$temp = strtr($date, substr($date, -4), (substr($date, -4) + 543));
        $temp = str_replace(substr($date, -4), (substr($date, -4) + 543), $date);
        $temp = str_replace('ค.ศ.', 'พ.ศ.', $temp);
        return $temp;
    }

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('rn', 'required'),
			array('rn, hn, address, moo, tumbol, amp, prov, user_id', 'length', 'max'=>45),
			array('name, surname', 'length', 'max'=>255),
			array('create_date, update_date', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('rn, hn, name, surname, address, moo, tumbol, amp, prov, create_date, update_date, user_id', 'safe', 'on'=>'search'),
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
                    'patient' => array(self::HAS_ONE, 'Patient' , 'hn'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'rn' => 'Rn',
			'hn' => 'Hn',
			'name' => 'ชื่อผู้ป่วย',
			'surname' => 'Surname',
			'address' => 'ที่อยู่',
			'moo' => 'Moo',
			'tumbol' => 'Tumbol',
			'amp' => 'Amp',
			'prov' => 'Prov',
			'create_date' => 'วันที่ลงทะเบียน',
			'update_date' => 'Update Date',
			'user_id' => 'ผู้บันทึก',
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

		$criteria->compare('rn',$this->rn,true);
		$criteria->compare('hn',$this->hn,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('moo',$this->moo,true);
		$criteria->compare('tumbol',$this->tumbol,true);
		$criteria->compare('amp',$this->amp,true);
		$criteria->compare('prov',$this->prov,true);
		$criteria->compare('create_date',$this->create_date,true);
		$criteria->compare('update_date',$this->update_date,true);
		$criteria->compare('user_id',$this->user_id,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function getPatientName($hn) {

        $patient = parent::model()->findByAttributes(array('hn' => $hn));
 
//        if (!empty($patient)) {
            return $patient->title . " " . $patient->name . " " . $patient->surname;
//        } else {
//            return "ยังไม่มีชื่อ";
//        }
    }
}