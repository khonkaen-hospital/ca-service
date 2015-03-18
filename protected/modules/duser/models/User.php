<?php

/**
 * This is the model class for table "employee".
 *
 * The followings are the available columns in table 'employee':
 * @property string $code
 * @property string $no
 * @property string $id
 * @property string $title
 * @property string $name
 * @property string $surname
 * @property string $nicname
 * @property string $type
 * @property string $person_id
 * @property string $position_n
 * @property string $pos_type
 * @property string $bank_id
 * @property string $bank_id2
 * @property string $license_no
 * @property string $position
 * @property string $level
 * @property string $officecode
 * @property string $office
 * @property string $dep
 * @property string $department
 * @property string $unit
 * @property string $tax_no
 * @property string $tel
 * @property string $tel_home
 * @property string $tel_mobile
 * @property string $expire
 * @property integer $gpf
 * @property double $gpf_rate
 * @property integer $pfund
 * @property integer $soc
 * @property integer $assur_dd
 * @property integer $assur_no
 * @property string $id2
 * @property string $passwd
 * @property string $password
 * @property string $conf
 * @property double $ot_rate
 * @property double $extra_rate
 * @property string $email
 * @property string $hn
 * @property string $remark
 * @property string $lastupdate
 * @property string $options
 */
class User extends CActiveRecord {

    public $pageSize = 30;
    public $options;
    public $fullname;

    const STATUS_ACTIVE = '0000-00-00';

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return Employee the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function getDbConnection() {
        return Yii::app()->intranet;
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'employee';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('no,id,title,name,surname, tel_mobile,person_id,position,bank_id', 'required'),
            array('gpf, pfund, soc, assur_dd, assur_no', 'numerical', 'integerOnly' => true),
            array('gpf_rate, ot_rate, extra_rate', 'numerical'),
            array('no, pos_type', 'length', 'max' => 5),
            array('id, position_n, department, id2, hn', 'length', 'max' => 10),
            array('title', 'length', 'max' => 4),
            array('name, surname', 'length', 'max' => 35),
            array('nicname, dep, tax_no, tel_home, tel_mobile', 'length', 'max' => 20),
            array('type, office', 'length', 'max' => 3),
            array('person_id', 'length', 'max' => 13),
            array('bank_id, bank_id2', 'length', 'max' => 15),
            array('license_no', 'length', 'max' => 30),
            array('position', 'length', 'max' => 50),
            array('level', 'length', 'max' => 25),
            array('officecode, unit', 'length', 'max' => 8),
            array('tel', 'length', 'max' => 9),
            array('passwd', 'length', 'max' => 32),
            array('password', 'length', 'max' => 128),
            array('expire, conf, email, remark', 'safe'),
            array('email', 'email'),
            array('lastupdate', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'update'),
            array('lastupdate', 'default',
                'value' => new CDbExpression('NOW()'),
                'setOnEmpty' => false, 'on' => 'insert'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('code, no, id, title, name, surname, nicname, type, person_id, position_n, pos_type, bank_id, bank_id2, license_no, position, level, officecode, office, dep, department, unit, tax_no, tel, tel_home, tel_mobile, expire, gpf, gpf_rate, pfund, soc, assur_dd, assur_no, id2, passwd, password, conf, ot_rate, extra_rate, email, hn, remark, lastupdate', 'safe', 'on' => 'search'),
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
            'code' => 'รหัสอ้างอิง',
            'no' => 'เลขที่เงินเดือน',
            'id' => 'ชื่อผุ้ใช้งาน',
            'title' => 'คำนำหน้า',
            'name' => 'ชื่อ',
            'surname' => 'นามสกุล',
            'nicname' => 'ชื่อเล่น',
            'type' => 'ประเภทตำแหน่ง',
            'person_id' => 'รหัสบัตรประชาชน',
            'position_n' => 'เลขที่ตำแหน่ง',
            'pos_type' => 'Pos Type',
            'bank_id' => 'หมายเลขบัญชีธนาคาร',
            'bank_id2' => 'หมายเลขบัญชีธนาคาร',
            'license_no' => 'License No',
            'position' => 'ตำแหน่ง',
            'level' => 'ระดับ',
            'officecode' => 'หน่วยงาน',
            'office' => 'หน่วยงาน',
            'dep' => 'ชื่อหน่วยงาน',
            'department' => 'แผนก',
            'unit' => 'Unit',
            'tax_no' => 'Tax No',
            'tel' => 'เบอร์โทรหน่วยงาน',
            'tel_home' => 'เบอร์โทรบ้าน',
            'tel_mobile' => 'เบอร์มือถือ',
            'expire' => 'วันสิ้นสุดการทำงาน',
            'gpf' => 'Gpf',
            'gpf_rate' => 'Gpf Rate',
            'pfund' => 'Pfund',
            'soc' => 'Soc',
            'assur_dd' => 'Assur Dd',
            'assur_no' => 'Assur No',
            'id2' => 'Id2',
            'passwd' => 'รหัสผ่าน',
            'password' => 'Password',
            'conf' => 'Conf',
            'ot_rate' => 'Ot Rate',
            'extra_rate' => 'Extra Rate',
            'email' => 'อีเมล์',
            'hn' => 'HN',
            'remark' => 'หมายเหตุ',
            'lastupdate' => 'วันที่ปรับปรุงข้อมูลล่าสุด',
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

        if ($this->options == 'fullname') {
            @list($name, $surname) = explode(' ', $this->id);
            if ($name)
                $criteria->compare('name', $name, true);
            if ($surname)
                $criteria->compare('surname', $surname, true);
        } else if ($this->options == 'code')
            $criteria->compare('code', $this->id, true);
        else if ($this->options == 'no')
            $criteria->compare('no', $this->id, true);
        else if ($this->options == 'id')
            $criteria->compare('id', $this->id, true);
        else if ($this->options == 'position')
            $criteria->compare('position', $this->id, true);
        else {
            $criteria->addSearchCondition('name', $this->id);
            $criteria->addSearchCondition('surname', $this->id);
        }


        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
            'pagination' => array(
                'pageSize' => $this->pageSize
            )
        ));
    }

    /*
     * get full name
     */

    public function getFullName() {
        return $this->title . $this->name . ' ' . $this->surname;
    }

    public function scopes() {
        return array(
            'active' => array(
                'condition' => 'expire =' . self::STATUS_ACTIVE,
                'order' => 'code desc'
            ),
            'notactive' => array(
                'condition' => 'expire !=' . self::STATUS_ACTIVE,
                'order' => 'code desc'
            ),
            'admin' => array(
                'condition' => 'superuser=1',
            ),
        );
    }

    public static function getPhotopath($id) {
        if (empty($id)) {
            $path = Yii::app()->baseUrl . '/images/none.png';
        } else {
            $path = Yii::app()->params['photopath'] . $id . '.jpg';
        }
        return $path;
    }

    public function itemsAlies($type = 'position', $key = NULL) {
        $data = array();
        if ($type == 'position') {
            $data = array(
                "ข" => "ข้าราชการ",
                "บ" => "ข้าราชการบำนาญ",
                "ป" => "ลูกจ้างประจำ",
                "ช" => "ลูกจ้างชั่วคราว",
                "ค" => "ลูกจ้างรายคาบ",
                "ศ" => "ลูกจ้างศูนย์แพทยศาสตร์",
                "พ" => "พนักงานของรัฐ",
                "ร" => "พนักงานราชการ");
        }

        if ($key === NULL)
            return $data;
        else
            return $data[$key];
    }

    public function getPositionType() {
        if ($this->type)
            return $this->itemsAlies('position', $this->type) . "({$this->type})";
        else
            return '';
    }

}