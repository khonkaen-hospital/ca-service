<?php

/**
 * This is the model class for table "lib_rx_ca".
 *
 * The followings are the available columns in table 'lib_rx_ca':
 * @property string $code_rtx
 * @property string $op_name
 * @property integer $nhso
 * @property integer $price
 * @property string $paytype
 * @property string $group_rtx
 */
class LibRx extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return LibRx the static model class
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
		return 'lib_rx_ca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nhso, price', 'numerical', 'integerOnly'=>true),
			array('code_rtx', 'length', 'max'=>15),
			array('op_name', 'length', 'max'=>46),
			array('paytype, group_rtx', 'length', 'max'=>4),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('code_rtx, op_name, nhso, price, paytype, group_rtx', 'safe', 'on'=>'search'),
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
			'code_rtx' => 'Code Rtx',
			'op_name' => 'Op Name',
			'nhso' => 'Nhso',
			'price' => 'Price',
			'paytype' => 'Paytype',
			'group_rtx' => 'Group Rtx',
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

		$criteria->compare('code_rtx',$this->code_rtx,true);
		$criteria->compare('op_name',$this->op_name,true);
		$criteria->compare('nhso',$this->nhso);
		$criteria->compare('price',$this->price);
		$criteria->compare('paytype',$this->paytype,true);
		$criteria->compare('group_rtx',$this->group_rtx,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}