<?php

/**
 * This is the model class for table "radcheck".
 *
 * The followings are the available columns in table 'radcheck':
 * @property string $id
 * @property string $username
 * @property string $attribute
 * @property string $op
 * @property string $value
 * @property string $kkh_id
 * @property string $isactive
 * @property string $expire
 * @property string $remark
 * @property string $lastupdate
 */
class Radcheck extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Radcheck the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function getDbConnection() {
        return Yii::app()->kkh_radius;
    }

    public function tableName() {
        return 'radcheck';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('username', 'length', 'max' => 64),
            array('attribute', 'length', 'max' => 32),
            array('op', 'length', 'max' => 2),
            array('value', 'length', 'max' => 253),
            array('kkh_id', 'length', 'max' => 15),
            array('isactive', 'length', 'max' => 1),
            array('expire, remark, lastupdate', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, username, attribute, op, value, kkh_id, isactive, expire, remark, lastupdate', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'username' => 'Username',
            'attribute' => 'Attribute',
            'op' => 'Op',
            'value' => 'Value',
            'kkh_id' => 'Kkh',
            'isactive' => 'Isactive',
            'expire' => 'Expire',
            'remark' => 'Remark',
            'lastupdate' => 'Lastupdate',
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

        $criteria->compare('id', $this->id, true);
        $criteria->compare('username', $this->username, true);
        $criteria->compare('attribute', $this->attribute, true);
        $criteria->compare('op', $this->op, true);
        $criteria->compare('value', $this->value, true);
        $criteria->compare('kkh_id', $this->kkh_id, true);
        $criteria->compare('isactive', $this->isactive, true);
        $criteria->compare('expire', $this->expire, true);
        $criteria->compare('remark', $this->remark, true);
        $criteria->compare('lastupdate', $this->lastupdate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getUser($id) {
        $this->getDbCriteria()->mergeWith(array(
            'condition' => ' kkh_id = :kkhid',
            'params' => array(
                ':kkhid' => $id
            )
        ));
        return $this;
    }

}