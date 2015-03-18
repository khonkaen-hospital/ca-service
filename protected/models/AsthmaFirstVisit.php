<?php

/**
 * This is the model class for table "asthma_first_visit".
 *
 * The followings are the available columns in table 'asthma_first_visit':
 * @property string $hn
 * @property string $citizen_id
 * @property integer $asthma_no
 * @property string $name
 * @property string $surname
 * @property integer $gender_id
 * @property string $address
 * @property string $phone
 * @property string $birthdate
 * @property double $weight
 * @property double $height
 * @property integer $asthma_start
 * @property integer $asthma_duration
 * @property integer $asthma_cure
 * @property integer $tw_month
 * @property integer $tw_month_number
 * @property integer $tw_month_night
 * @property integer $tw_emer
 * @property integer $tw_emer_number
 * @property integer $curr_b2agonisitinhaler
 * @property string $curr_b2agonisitinhaler_detail
 * @property integer $curr_agonisttab
 * @property string $curr_agonisttab_detail
 * @property integer $curr_theophylline
 * @property string $curr_theophylline_detail
 * @property integer $curr_steroidinhaler
 * @property string $curr_steroidinhaler_detail
 * @property integer $curr_oralsteroid
 * @property string $curr_oralsteroid_detail
 * @property integer $curr_b2lpratropium
 * @property string $curr_b2lpratropium_detail
 * @property integer $curr_b2icsinhaler
 * @property string $curr_b2icsinhaler_detail
 * @property integer $curr_antilenkotriene
 * @property string $curr_antilenkotriene_detail
 * @property integer $curr_icspluslaba
 * @property string $curr_icspluslaba_detail
 * @property integer $curr_tiotropium
 * @property string $curr_tiotropium_detail
 * @property integer $lung_test
 * @property integer $smoke
 * @property integer $smoke_curr
 * @property integer $smoke_start
 * @property integer $smoke_stop
 * @property integer $smoking
 * @property string $lastyear_lungtest
 * @property string $create_date
 * @property string $update_date
 * @property integer $user_id
 */
class AsthmaFirstVisit extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'asthma_first_visit';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('asthma_no', 'unique'),
            array('hn, citizen_id', 'required'),
            array('asthma_no, gender_id, asthma_start, asthma_duration, asthma_cure, tw_month, tw_month_number, tw_month_night, tw_emer, tw_emer_number, curr_b2agonisitinhaler, curr_agonisttab, curr_theophylline, curr_steroidinhaler, curr_oralsteroid, curr_b2lpratropium, curr_b2icsinhaler, curr_antilenkotriene, curr_icspluslaba, curr_tiotropium, lung_test, smoke, smoke_curr, smoke_start, smoke_stop, smoking, user_id', 'numerical', 'integerOnly' => true),
            array('weight, height', 'numerical', 'integerOnly' => true, 'min' => 1, 'max' => 200),
            array('hn, citizen_id, asthma_no', 'length', 'max' => 200),
            array('name, surname, address, phone, birthdate, curr_b2agonisitinhaler_detail, curr_agonisttab_detail, curr_theophylline_detail, curr_steroidinhaler_detail, curr_oralsteroid_detail, curr_b2lpratropium_detail, curr_b2icsinhaler_detail, curr_antilenkotriene_detail, curr_icspluslaba_detail, curr_tiotropium_detail, lastyear_lungtest, create_date, update_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('hn, citizen_id, asthma_no, name, surname, gender_id, address, phone, birthdate, weight, height, asthma_start, asthma_duration, asthma_cure, tw_month, tw_month_number, tw_month_night, tw_emer, tw_emer_number, curr_b2agonisitinhaler, curr_b2agonisitinhaler_detail, curr_agonisttab, curr_agonisttab_detail, curr_theophylline, curr_theophylline_detail, curr_steroidinhaler, curr_steroidinhaler_detail, curr_oralsteroid, curr_oralsteroid_detail, curr_b2lpratropium, curr_b2lpratropium_detail, curr_b2icsinhaler, curr_b2icsinhaler_detail, curr_antilenkotriene, curr_antilenkotriene_detail, curr_icspluslaba, curr_icspluslaba_detail, curr_tiotropium, curr_tiotropium_detail, lung_test, smoke, smoke_curr, smoke_start, smoke_stop, smoking, create_date, update_date, user_id', 'safe', 'on' => 'search'),
            array('update_date', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'update'),
            array('create_date,update_date', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'insert'),
            array('tw_month', 'default', 'value' => 0, 'on' => 'create')
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
            'hn' => 'HN : ',
            'citizen_id' => 'เลขที่บัตรประชาชน',
            'asthma_no' => 'Asthma No',
            'name' => 'ชื่อ',
            'surname' => 'นามสกุล',
            'gender_id' => 'เพศ',
            'address' => 'ที่อยู่',
            'phone' => 'เบอร์โทรศัพท์',
            'birthdate' => 'วันเกิด(วัน/เดือน/ปี)',
            'weight' => 'น้ำหนัก(กก.)',
            'height' => 'ส่วนสูง(ซ.ม.)',
            'asthma_start' => 'เริ่มหอบอายุ(ปี)',
            'asthma_duration' => 'หอบมานาน(ปี)',
            'asthma_cure' => 'รักษาหอบหืดที่โรงพยาบาลมาแล้ว(ปี)',
            'tw_month' => 'เคยนอนรักษาด้วยอาการหอบหืดมากหรือไม่',
            'tw_month_number' => 'นอนโรงพยาบาลกี่ครั้ง',
            'tw_month_night' => 'ทั้งหมดกี่คืน',
            'tw_emer' => 'หอบมากจนต้องพ่นยาหรือไม่',
            'tw_emer_number' => 'พ่นยากี่ครั้ง',
            'curr_b2agonisitinhaler' => '*B2 agonisitinhaler',
            'curr_b2agonisitinhaler_detail' => 'Curr B2agonisitinhaler Detail',
            'curr_agonisttab' => '*B2 AgonistTab',
            'curr_agonisttab_detail' => 'Curr Agonisttab Detail',
            'curr_theophylline' => '*Theophylline',
            'curr_theophylline_detail' => 'Curr Theophylline Detail',
            'curr_steroidinhaler' => '*Steroid inhaler',
            'curr_steroidinhaler_detail' => 'Curr Steroidinhaler Detail',
            'curr_oralsteroid' => '*Oral steroid',
            'curr_oralsteroid_detail' => 'Curr Oralsteroid Detail',
            'curr_b2lpratropium' => '*B2+lpratropium inhaler',
            'curr_b2lpratropium_detail' => 'Curr B2lpratropium Detail',
            'curr_b2icsinhaler' => '*B2+ICS inhaler',
            'curr_b2icsinhaler_detail' => 'Curr B2icsinhaler Detail',
            'curr_antilenkotriene' => '*Anti-Lenkotriene',
            'curr_antilenkotriene_detail' => 'Curr Antilenkotriene Detail',
            'curr_icspluslaba' => '*ICSPlus LABA',
            'curr_icspluslaba_detail' => 'Curr Icspluslaba Detail',
            'curr_tiotropium' => '*Tiotropium',
            'curr_tiotropium_detail' => 'Curr Tiotropium Detail',
            'lung_test' => 'เคยตรวจสอบสมรรถภาพปอดหรือไม่',
            'smoke' => 'เคยสูบบุรี่หรือไม่',
            'smoke_curr' => 'ถ้าเคยปัจจุบันยังสูบอยู่หรือไม่',
            'smoke_start' => 'เริ่มสูบเมื่ออายุเท่าไร(ปี)',
            'smoke_stop' => 'หยุดสูบเมื่ออายุ(ปี)',
            'smoking' => 'โดยเฉลี่ยสูบบุรี่(มวน/วัน)',
            'lastyear_lungtest' => 'ช่วง 1 ปีที่ผ่านมาเคยรักษาโรคหอบหืดที่โรงพยาบาลใดบ้าง',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'user_id' => 'User',
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
    public function search() {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('hn', $this->hn, true);
        $criteria->compare('citizen_id', $this->citizen_id, true);
        $criteria->compare('asthma_no', $this->asthma_no);
        $criteria->compare('name', $this->name, true);
        $criteria->compare('surname', $this->surname, true);
        $criteria->compare('gender_id', $this->gender_id);
        $criteria->compare('address', $this->address, true);
        $criteria->compare('phone', $this->phone, true);
        $criteria->compare('birthdate', $this->birthdate, true);
        $criteria->compare('weight', $this->weight);
        $criteria->compare('height', $this->height);
        $criteria->compare('asthma_start', $this->asthma_start);
        $criteria->compare('asthma_duration', $this->asthma_duration);
        $criteria->compare('asthma_cure', $this->asthma_cure);
        $criteria->compare('tw_month', $this->tw_month);
        $criteria->compare('tw_month_number', $this->tw_month_number);
        $criteria->compare('tw_month_night', $this->tw_month_night);
        $criteria->compare('tw_emer', $this->tw_emer);
        $criteria->compare('tw_emer_number', $this->tw_emer_number);
        $criteria->compare('curr_b2agonisitinhaler', $this->curr_b2agonisitinhaler);
        $criteria->compare('curr_b2agonisitinhaler_detail', $this->curr_b2agonisitinhaler_detail, true);
        $criteria->compare('curr_agonisttab', $this->curr_agonisttab);
        $criteria->compare('curr_agonisttab_detail', $this->curr_agonisttab_detail, true);
        $criteria->compare('curr_theophylline', $this->curr_theophylline);
        $criteria->compare('curr_theophylline_detail', $this->curr_theophylline_detail, true);
        $criteria->compare('curr_steroidinhaler', $this->curr_steroidinhaler);
        $criteria->compare('curr_steroidinhaler_detail', $this->curr_steroidinhaler_detail, true);
        $criteria->compare('curr_oralsteroid', $this->curr_oralsteroid);
        $criteria->compare('curr_oralsteroid_detail', $this->curr_oralsteroid_detail, true);
        $criteria->compare('curr_b2lpratropium', $this->curr_b2lpratropium);
        $criteria->compare('curr_b2lpratropium_detail', $this->curr_b2lpratropium_detail, true);
        $criteria->compare('curr_b2icsinhaler', $this->curr_b2icsinhaler);
        $criteria->compare('curr_b2icsinhaler_detail', $this->curr_b2icsinhaler_detail, true);
        $criteria->compare('curr_antilenkotriene', $this->curr_antilenkotriene);
        $criteria->compare('curr_antilenkotriene_detail', $this->curr_antilenkotriene_detail, true);
        $criteria->compare('curr_icspluslaba', $this->curr_icspluslaba);
        $criteria->compare('curr_icspluslaba_detail', $this->curr_icspluslaba_detail, true);
        $criteria->compare('curr_tiotropium', $this->curr_tiotropium);
        $criteria->compare('curr_tiotropium_detail', $this->curr_tiotropium_detail, true);
        $criteria->compare('lung_test', $this->lung_test);
        $criteria->compare('smoke', $this->smoke);
        $criteria->compare('smoke_curr', $this->smoke_curr);
        $criteria->compare('smoke_start', $this->smoke_start);
        $criteria->compare('smoke_stop', $this->smoke_stop);
        $criteria->compare('smoking', $this->smoking);
        $criteria->compare('lastyear_lungtest', $this->lastyear_lungtest);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('user_id', $this->user_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AsthmaFirstVisit the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function chk($cID) {
        if ($this->{$cID} == 0)
            return array('style' => 'width: 100px;', 'readOnly' => 'readOnly');
        else
            return array('style' => 'width: 100px;');
    }

    public function chkAction($cID) {
        if ($cID == 'update')
            return array('style' => 'width:210px;margin-top:15px;','readOnly' => 'readOnly');
        else
            return array('style' => 'width:210px;margin-top:15px;');
    }

}
