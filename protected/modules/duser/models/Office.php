<?php

/**
 * This is the model class for table "Office".
 *
 * The followings are the available columns in table 'Office':
 * @property string $ref
 * @property string $sector
 * @property string $department
 * @property string $seq
 * @property string $name
 * @property string $head_id
 * @property string $tel
 * @property string $url
 * @property integer $isactive
 * @property string $inp_id
 * @property string $lastupdate
 */
class Office extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return LibOffice the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function getDbConnection() {
        return Yii::app()->intranet;
    }

    public function tableName() {
        return 'lib_office';
    }

    public function primaryKey() {
        return 'ref';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('isactive', 'numerical', 'integerOnly' => true),
            array('ref, head_id, inp_id', 'length', 'max' => 10),
            array('sector, department', 'length', 'max' => 4),
            array('seq', 'length', 'max' => 2),
            array('name', 'length', 'max' => 125),
            array('tel', 'length', 'max' => 12),
            array('url', 'length', 'max' => 80),
            array('lastupdate', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('ref, sector, department, seq, name, head_id, tel, url, isactive, inp_id, lastupdate', 'safe', 'on' => 'search'),
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
            'ref' => 'Ref',
            'sector' => 'Sector',
            'department' => 'Department',
            'seq' => 'Seq',
            'name' => 'Name',
            'head_id' => 'Head',
            'tel' => 'Tel',
            'url' => 'Url',
            'isactive' => 'Isactive',
            'inp_id' => 'Inp',
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

        $criteria->compare('ref', $this->ref, true);
        $criteria->compare('sector', $this->sector, true);
        $criteria->compare('department', $this->department, true);
        $criteria->compare('seq', $this->seq, true);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('head_id', $this->head_id, true);
        $criteria->compare('tel', $this->tel, true);
        $criteria->compare('url', $this->url, true);
        $criteria->compare('isactive', $this->isactive);
        $criteria->compare('inp_id', $this->inp_id, true);
        $criteria->compare('lastupdate', $this->lastupdate, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

}