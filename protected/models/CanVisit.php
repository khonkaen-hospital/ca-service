<?php

/**
 * This is the model class for table "cancer_visit".
 *
 * The followings are the available columns in table 'cancer_visit':
 * @property integer $id
 * @property string $rn
 * @property string $hn
 * @property string $vn
 * @property string $date_in
 * @property string $code_rtx
 * @property string $nhso
 * @property double $price
 * @property string $doc_id
 * @property string $update_date
 * @property string $create_date
 * @property string $user_id
 * @property string $an
 * @property string $pttype
 * @property string $no_ptt
 * @property string $expire
 */
class CanVisit extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return CanVisit the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    /**
     * @return CDbConnection database connection
     */
    public function getDbConnection() {
        return Yii::app()->dbkkh;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'cancer_visit';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
// NOTE: you should only define rules for those attributes that
// will receive user inputs.
        return array(
            array('status', 'numerical', 'integerOnly' => true),
            array('price', 'numerical'),
            array('rn', 'length', 'max' => 9),
            array('hn, vn, code_rtx, nhso, doc_id, an, pttype, no_ptt, expire', 'length', 'max' => 50),
            array('date_in, update_date, create_date', 'safe'),
            // The following rule is used by search().
// Please remove those attributes that should not be searched.
            array('id, rn, hn, vn, date_in, code_rtx, nhso, price, doc_id, update_date, create_date, user_id, status, an, pttype, no_ptt, expire', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
// NOTE: you may need to adjust the relation name and the related
// class name for the relations automatically generated below.
        return array(
            'patient' => array(self::HAS_ONE, 'Patient', 'hn'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'No.',
            'rn' => 'เลขที่ประจำตัวผู้ป่วยมะเร็ง(Rn)',
            'hn' => 'เลขที่ประจำตัวผู้ป่วย(Hn)',
            'vn' => 'เลขที่ส่งตรวจ(vn)',
            'date_in' => 'วันที่เข้ารับบริการ(ล่าสุด)',
            'code_rtx' => 'Code Rtx',
            'nhso' => 'Nhso',
            'price' => 'ราคา',
            'doc_id' => 'Doc',
            'update_date' => 'วันที่แก้ไข',
            'create_date' => 'วันที่บันทึก',
            'user_id' => 'ผู้จัดการข้อมูล',
            'status' => 'สถานะ',
            'an' => 'AN',
            'pttype' => 'ประเภทสิทธิ์',
            'no_ptt' => 'เลขที่สิทธิ์',
            'expire' => 'วันที่หมดอายุสิทธิ์'
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
        $criteria->compare('rn', $this->rn, true);
        $criteria->compare('hn', $this->hn, true);
        $criteria->compare('vn', $this->vn, true);
        $criteria->compare('date_in', $this->date_in, true);
        $criteria->compare('code_rtx', $this->code_rtx, true);
        $criteria->compare('nhso', $this->nhso, true);
        $criteria->compare('price', $this->price);
        $criteria->compare('doc_id', $this->doc_id, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('status', $this->status);
        $criteria->compare('an', $this->an);
        $criteria->compare('pttype', $this->pttype);
        $criteria->compare('no_ptt', $this->no_ptt);
        $criteria->compare('expire', $this->expire);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function getRnNumber() {

        $date = date('Y') + 543;
        $fullRn = substr($date, 2, 2) . "0001";


        $lastRn = CanVisit::model()->find(array(
            'order' => 'id DESC',
        ));

        if (!empty($lastRn->rn)) {
            if (substr_compare(substr($lastRn->rn, 1, 3), substr($date, 2, 2), 0, 2) == 0) {
                $Seq = substr($lastRn->rn, -6, 6) + 1;
                $fullRn = $Seq;
            }
            if (substr_compare(substr($lastRn->rn, 1, 3), substr($date, 2, 2), 0, 2) != 0) {
                $fullRn = substr($date, 2, 2) . "0001";
            }
        }
        if (empty($lastRn->rn)) {
            $Seq = "0001";
            $fullRn = substr($date, 2, 2) . $Seq;
        }

        return 'R' . $fullRn;
    }

    public function chkAction($cID) {
        if ($cID == 'update')
            return array('style' => 'width:210px;margin-top:15px;', 'readOnly' => 'readOnly');
        else
            return array('style' => 'width:210px;margin-top:15px;');
    }

    public function getPatientName($hn) {

        $patient = Patient::model()->findByAttributes(array('hn' => $hn));

        if (!empty($patient)) {
            return $patient->title . " " . $patient->name . " " . $patient->surname;
        } else {
            return "ยังไม่มีชื่อ";
        }
    }

}
