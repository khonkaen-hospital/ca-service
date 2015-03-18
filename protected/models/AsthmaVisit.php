<?php

/**
 * This is the model class for table "asthma_visit".
 *
 * The followings are the available columns in table 'asthma_visit':
 * @property integer $id
 * @property integer $hn
 * @property integer $asthma_no
 * @property string $visitdate
 * @property integer $age
 * @property double $weight
 * @property double $height
 * @property double $ppefr
 * @property integer $q1
 * @property integer $q2
 * @property integer $q3
 * @property integer $q4
 * @property string $q4_detail
 * @property integer $q5
 * @property integer $q5_admid
 * @property string $q5_admid_hosp
 * @property integer $q6
 * @property string $q6_detail
 * @property integer $q7
 * @property string $q7_detail
 * @property double $q7_1_1
 * @property double $q7_1_2
 * @property double $q7_1_3
 * @property double $q7_2_1
 * @property double $q7_2_2
 * @property double $q7_2_3
 * @property double $q7_3_1
 * @property double $q7_3_2
 * @property double $q7_3_3
 * @property double $q7_4_1
 * @property double $q7_5_1
 * @property double $q7_5_2
 * @property double $q7_5_3
 * @property double $q7_6_1
 * @property double $q7_6_2
 * @property double $q7_6_3
 * @property double $q7_7_1
 * @property double $q7_7_2
 * @property double $q7_7_3
 * @property integer $q8
 * @property string $q8_detail
 * @property integer $q9
 * @property string $q9_detail
 * @property string $q10
 * @property integer $q11
 * @property integer $q12
 * @property string $q12_detail
 * @property integer $q13
 * @property double $q14_1
 * @property double $q14_2
 * @property string $q14_3
 * @property integer $q15
 * @property integer $q16
 * @property integer $q17
 * @property integer $q18
 * @property integer $q19
 * @property integer $q20
 * @property string $q20_detail
 * @property string $create_date
 * @property string $update_date
 * @property integer $user_id
 * @property integer $status_id
 */
class AsthmaVisit extends CActiveRecord {

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return 'asthma_visit';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('hn, asthma_no', 'required'),
            array('hn, asthma_no, age, q1, q2, q3, q4, q5, q5_admid, q6, q7, q8, q9, q11, q12, q13, q15, q16, q17, q18, q19, q20, user_id, status_id', 'numerical', 'integerOnly' => true),
            array('weight, height, ppefr, q7_1_1, q7_1_2, q7_1_3, q7_2_1, q7_2_2, q7_2_3, q7_3_1, q7_3_2, q7_3_3, q7_4_1, q7_5_1, q7_5_2, q7_5_3, q7_6_1, q7_6_2, q7_6_3, q7_7_1, q7_7_2, q7_7_3, q14_1, q14_2', 'numerical'),
            array('q4_detail, q5_admid_hosp, q6_detail, q7_detail, q8_detail, q9_detail, q12_detail, q14_3, q20_detail', 'length', 'max' => 200),
            array('visitdate, q10, create_date, update_date', 'safe'),
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('id, hn, asthma_no, visitdate, age, weight, height, ppefr, q1, q2, q3, q4, q4_detail, q5, q5_admid, q5_admid_hosp, q6, q6_detail, q7, q7_detail, q7_1_1, q7_1_2, q7_1_3, q7_2_1, q7_2_2, q7_2_3, q7_3_1, q7_3_2, q7_3_3, q7_4_1, q7_5_1, q7_5_2, q7_5_3, q7_6_1, q7_6_2, q7_6_3, q7_7_1, q7_7_2, q7_7_3, q8, q8_detail, q9, q9_detail, q10, q11, q12, q12_detail, q13, q14_1, q14_2, q14_3, q15, q16, q17, q18, q19, q20, q20_detail, create_date, update_date, user_id, status_id', 'safe', 'on' => 'search'),
            array('update_date', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'update'),
            array('create_date,update_date,visitdate', 'default', 'value' => new CDbExpression('NOW()'), 'setOnEmpty' => false, 'on' => 'insert'),
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
            'hn' => 'Hn',
            'asthma_no' => 'Asthma No',
            'visitdate' => 'วันที่รับบริการ(ว/ด/ป)',
            'age' => 'ปัจจุบันอายุ(ปี)',
            'weight' => 'น้ำหนัก(กก.)',
            'height' => 'ส่วนสูง(ซม.)',
            'ppefr' => 'Predicted PEFR',
            'q1' => '1. ในช่วง 4 สัปดาห์ที่ผ่านมา คุณมีอาการไอ หายใจไม่อิ่ม หรือหายใจมีเสียงดังวี้ด ในช่วงกลางวัน บ้างหรือไม่',
            'q2' => '2. ในช่วง 4 สัปดาห์ที่ผ่านมา คุณต้องลุกขึ้นมาไอ,หายใจฝืดและแน่นหน้าอก,หายใจมีเสียงวี้ดในช่วงกลางคืนบ้างหรือไม่',
            'q3' => '3. ในช่วง 4 สัปดาห์ที่ผ่านมา คุณใช้ยาบรรเทาอาการหอบ (ยาขยายหลอดลม) บ้างหรือไม่?',
            'q4' => '4. ในช่วง 4 สัปดาห์ที่ผ่านมา คุณเคยหอบมากจนต้องไปรับการรักษาฉุกเฉินที่ห้องฉุกเฉินหรือที่คลินิกบ้างหรือไม่',
            'q4_detail' => 'Q4 Detail',
            'q5' => '5. ในช่วง 4 สัปดาห์ที่ผ่านมา คุณเคยหอบมากจนต้องเข้ารับการรักษาในโรงพยาบาลบ้างหรือไม่',
            'q5_admid' => 'ระยะนอนพักรักษา(วัน)',
            'q5_admid_hosp' => 'โรงพยาบาล',
            'q6' => '6. ในช่วง 4 สัปดาห์ที่ผ่านมา คุณมีผลข้างเคียงจากการใช้ยาหรือไม่',
            'q6_detail' => 'ผลข้างเคียงอื่นๆ',
            'q7' => '7. ผลการตรวจร่างกาย',
            'q7_detail' => '',
            'q7_1_1' => '7.1 PEFR',
            'q7_1_2' => 'L/min',
            'q7_1_3' => 'L/min',
            'q7_2_1' => '7.2 FVC',
            'q7_2_2' => 'L',
            'q7_2_3' => 'L',
            'q7_3_1' => '7.3 FEV1',
            'q7_3_2' => 'L',
            'q7_3_3' => 'L',
            'q7_4_1' => '7.4 PD20',
            'q7_5_1' => '7.5 PEFR',
            'q7_5_2' => 'L/min',
            'q7_5_3' => 'L/min',
            'q7_6_1' => '7.6 FVC',
            'q7_6_2' => 'L',
            'q7_6_3' => 'L',
            'q7_7_1' => '7.7 FEV1',
            'q7_7_2' => 'L',
            'q7_7_3' => 'L',
            'q8' => '8. ยาที่ผู้ป่วยใช้ สำหรับโรคหืดอยู่ในขณะนี้และขนาดที่ใช้',
            'q8_detail' => 'จำนวน(รายการ)',
            'q9' => '9. ยาที่แพทย์สั่งให้ใหม่ [ReMed]',
            'q9_detail' => 'จำนวน(รายการ)',
            'q10' => '10. วันนัดครั้งต่อไป วัน/เดือน/ปี (dd/mm/25yy)',
            'q11' => '11. ปัจจุบันคุณสูบบุหรีหรือไม่',
            'q12' => '12. คุณมีเสมหะเหลืองหลังจากพบแพทย์ครั้งที่แล้ว หรือไม่',
            'q12_detail' => '',
            'q13' => '13. ขณะนี้ อาการเหนื่อยหอบของคุณเป็นอย่างไรบ้าง',
            'q14_1' => '14. SIX minute walk',
            'q14_2' => 'O2 SAT',
            'q14_3' => 'หมายเหตุ',
            'q15' => '15. ได้สอนผู้ป่วยเรื่องความรู้เกี่ยวกับโรคหืด',
            'q16' => '16. ได้สอนการพ่นยาแก่ผู้ป่วย',
            'q17' => '17. ได้ตรวจสอบว่าผู้ป่วยพ่นยาได้ถูกต้อง',
            'q18' => '18. ให้เภสัชกรประเมินดูว่าผู้ป่วยใช้ยาตามแพทย์สั่งกี่เปอร์เซ็น (0-100%)',
            'q19' => '19. ได้สอนผู้ป่วยเรื่องโทษของบุหรี่ และการเลิก',
            'q20' => '20. เลือกสิทธิ์การรักษา',
            'q20_detail' => '',
            'create_date' => 'Create Date',
            'update_date' => 'Update Date',
            'user_id' => 'User',
            'status_id' => 'Status',
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

        $criteria->compare('id', $this->id);
        $criteria->compare('hn', $this->hn);
        $criteria->compare('asthma_no', $this->asthma_no);
        $criteria->compare('visitdate', $this->visitdate, true);
        $criteria->compare('age', $this->age);
        $criteria->compare('weight', $this->weight);
        $criteria->compare('height', $this->height);
        $criteria->compare('ppefr', $this->ppefr);
        $criteria->compare('q1', $this->q1);
        $criteria->compare('q2', $this->q2);
        $criteria->compare('q3', $this->q3);
        $criteria->compare('q4', $this->q4);
        $criteria->compare('q4_detail', $this->q4_detail, true);
        $criteria->compare('q5', $this->q5);
        $criteria->compare('q5_admid', $this->q5_admid);
        $criteria->compare('q5_admid_hosp', $this->q5_admid_hosp, true);
        $criteria->compare('q6', $this->q6);
        $criteria->compare('q6_detail', $this->q6_detail, true);
        $criteria->compare('q7', $this->q7);
        $criteria->compare('q7_detail', $this->q7_detail, true);
        $criteria->compare('q7_1_1', $this->q7_1_1);
        $criteria->compare('q7_1_2', $this->q7_1_2);
        $criteria->compare('q7_1_3', $this->q7_1_3);
        $criteria->compare('q7_2_1', $this->q7_2_1);
        $criteria->compare('q7_2_2', $this->q7_2_2);
        $criteria->compare('q7_2_3', $this->q7_2_3);
        $criteria->compare('q7_3_1', $this->q7_3_1);
        $criteria->compare('q7_3_2', $this->q7_3_2);
        $criteria->compare('q7_3_3', $this->q7_3_3);
        $criteria->compare('q7_4_1', $this->q7_4_1);
        $criteria->compare('q7_5_1', $this->q7_5_1);
        $criteria->compare('q7_5_2', $this->q7_5_2);
        $criteria->compare('q7_5_3', $this->q7_5_3);
        $criteria->compare('q7_6_1', $this->q7_6_1);
        $criteria->compare('q7_6_2', $this->q7_6_2);
        $criteria->compare('q7_6_3', $this->q7_6_3);
        $criteria->compare('q7_7_1', $this->q7_7_1);
        $criteria->compare('q7_7_2', $this->q7_7_2);
        $criteria->compare('q7_7_3', $this->q7_7_3);
        $criteria->compare('q8', $this->q8);
        $criteria->compare('q8_detail', $this->q8_detail, true);
        $criteria->compare('q9', $this->q9);
        $criteria->compare('q9_detail', $this->q9_detail, true);
        $criteria->compare('q10', $this->q10, true);
        $criteria->compare('q11', $this->q11);
        $criteria->compare('q12', $this->q12);
        $criteria->compare('q12_detail', $this->q12_detail, true);
        $criteria->compare('q13', $this->q13);
        $criteria->compare('q14_1', $this->q14_1);
        $criteria->compare('q14_2', $this->q14_2);
        $criteria->compare('q14_3', $this->q14_3, true);
        $criteria->compare('q15', $this->q15);
        $criteria->compare('q16', $this->q16);
        $criteria->compare('q17', $this->q17);
        $criteria->compare('q18', $this->q18);
        $criteria->compare('q19', $this->q19);
        $criteria->compare('q20', $this->q20);
        $criteria->compare('q20_detail', $this->q20_detail, true);
        $criteria->compare('create_date', $this->create_date, true);
        $criteria->compare('update_date', $this->update_date, true);
        $criteria->compare('user_id', $this->user_id);
        $criteria->compare('status_id', $this->status_id);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return AsthmaVisit the static model class
     */
    public static function model($className = __CLASS__) {
        return parent::model($className);
    }

    public function chkAction($cID) {
        if ($cID == 'update')
            return array('style' => 'width:210px;margin-top:15px;', 'readOnly' => 'readOnly');
        else
            return array('style' => 'width:210px;margin-top:15px;');
    }

}
