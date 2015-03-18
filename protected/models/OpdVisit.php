<?php

/**
 * This is the model class for table "opd_visit".
 *
 * The followings are the available columns in table 'opd_visit':
 * @property string $vn
 * @property integer $ref
 * @property string $hn
 * @property string $date
 * @property string $time
 * @property string $time_in
 * @property string $time_reg
 * @property string $time_opd
 * @property string $time_out
 * @property string $time_dr
 * @property string $time_cln
 * @property string $time_lab
 * @property string $time_drug
 * @property string $time_up
 * @property integer $dep
 * @property string $dx1
 * @property string $dx2
 * @property string $dx3
 * @property string $dx4
 * @property string $dx5
 * @property string $dx6
 * @property string $dx
 * @property integer $type_dx1
 * @property integer $type_dx2
 * @property integer $type_dx3
 * @property integer $type_dx4
 * @property integer $type_dx5
 * @property integer $type_dx6
 * @property string $or1
 * @property string $or2
 * @property string $or3
 * @property integer $dr
 * @property integer $status
 * @property string $an
 * @property string $refer
 * @property integer $pttype
 * @property string $no_ptt
 * @property string $expire
 * @property integer $age
 * @property integer $age_type
 * @property integer $typepaid
 * @property integer $period
 * @property string $fu
 * @property integer $recieve
 * @property string $refer_no
 * @property string $sec_com
 * @property integer $new
 * @property integer $temp
 * @property integer $clinic
 * @property integer $consult
 * @property integer $flow
 * @property string $dn
 * @property integer $emg
 * @property integer $acc
 * @property integer $assur
 * @property string $inp_id
 * @property string $node_id
 * @property string $hospmain
 * @property string $hospsub
 * @property integer $cost
 * @property integer $type_visit
 * @property string $old_refer
 * @property integer $fee
 * @property integer $queue
 * @property string $time_recei
 * @property string $time_n
 * @property string $date_recei
 * @property string $room
 * @property string $date_inp
 * @property string $lastupdate
 * @property string $remark
 *
 * The followings are the available model relations:
 * @property OpdAnc $opdAnc
 * @property OpdDx[] $opdDxes
 * @property OpdOp[] $opdOps
 * @property OpdPed $opdPed
 * @property OpdPostnatal $opdPostnatal
 * @property OpdTempOpdcard $opdTempOpdcard
 */
class OpdVisit extends CActiveRecord {

    /**
     * Returns the static model of the specified AR class.
     * @param string $className active record class name.
     * @return OpdVisit the static model class
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
        return 'opd_visit';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('vn', 'required'),
            array('dep, type_dx1, type_dx2, type_dx3, type_dx4, type_dx5, type_dx6, dr, status, pttype, age, age_type, typepaid, period, recieve, new, temp, clinic, consult, flow, emg, acc, assur, cost, type_visit, fee, queue', 'numerical', 'integerOnly' => true),
            array('vn, hn, dn', 'length', 'max' => 8),
            array('time, time_in, time_reg, time_opd, time_out, time_dr, time_cln, time_lab, time_drug, time_up, hospmain, hospsub, time_recei, time_n, room', 'length', 'max' => 5),
            array('dx1, dx2, dx3, dx4, dx5, dx6, an, old_refer', 'length', 'max' => 7),
            array('dx', 'length', 'max' => 40),
            array('or1, or2', 'length', 'max' => 6),
            array('or3', 'length', 'max' => 20),
            array('refer, node_id', 'length', 'max' => 15),
            array('no_ptt', 'length', 'max' => 18),
            array('refer_no, inp_id', 'length', 'max' => 10),
            array('sec_com', 'length', 'max' => 30),
            array('date, expire, fu, date_recei, date_inp, lastupdate, remark', 'safe'),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('vn, ref, hn, date, time, time_in, time_reg, time_opd, time_out, time_dr, time_cln, time_lab, time_drug, time_up, dep, dx1, dx2, dx3, dx4, dx5, dx6, dx, type_dx1, type_dx2, type_dx3, type_dx4, type_dx5, type_dx6, or1, or2, or3, dr, status, an, refer, pttype, no_ptt, expire, age, age_type, typepaid, period, fu, recieve, refer_no, sec_com, new, temp, clinic, consult, flow, dn, emg, acc, assur, inp_id, node_id, hospmain, hospsub, cost, type_visit, old_refer, fee, queue, time_recei, time_n, date_recei, room, date_inp, lastupdate, remark', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
            'opdAnc' => array(self::HAS_ONE, 'OpdAnc', 'vn'),
            'opdDxes' => array(self::HAS_MANY, 'OpdDx', 'vn'),
            'opdOps' => array(self::HAS_MANY, 'OpdOp', 'vn'),
            'opdPed' => array(self::HAS_ONE, 'OpdPed', 'vn'),
            'opdPostnatal' => array(self::HAS_ONE, 'OpdPostnatal', 'vn'),
            'opdTempOpdcard' => array(self::HAS_ONE, 'OpdTempOpdcard', 'vn'),
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'vn' => 'Vn',
            'ref' => 'Ref',
            'hn' => 'Hn',
            'date' => 'Date',
            'time' => 'Time',
            'time_in' => 'Time In',
            'time_reg' => 'Time Reg',
            'time_opd' => 'Time Opd',
            'time_out' => 'Time Out',
            'time_dr' => 'Time Dr',
            'time_cln' => 'Time Cln',
            'time_lab' => 'Time Lab',
            'time_drug' => 'Time Drug',
            'time_up' => 'Time Up',
            'dep' => 'Dep',
            'dx1' => 'Dx1',
            'dx2' => 'Dx2',
            'dx3' => 'Dx3',
            'dx4' => 'Dx4',
            'dx5' => 'Dx5',
            'dx6' => 'Dx6',
            'dx' => 'Dx',
            'type_dx1' => 'Type Dx1',
            'type_dx2' => 'Type Dx2',
            'type_dx3' => 'Type Dx3',
            'type_dx4' => 'Type Dx4',
            'type_dx5' => 'Type Dx5',
            'type_dx6' => 'Type Dx6',
            'or1' => 'Or1',
            'or2' => 'Or2',
            'or3' => 'Or3',
            'dr' => 'Dr',
            'status' => 'Status',
            'an' => 'An',
            'refer' => 'Refer',
            'pttype' => 'Pttype',
            'no_ptt' => 'No Ptt',
            'expire' => 'Expire',
            'age' => 'Age',
            'age_type' => 'Age Type',
            'typepaid' => 'Typepaid',
            'period' => 'Period',
            'fu' => 'Fu',
            'recieve' => 'Recieve',
            'refer_no' => 'Refer No',
            'sec_com' => 'Sec Com',
            'new' => 'New',
            'temp' => 'Temp',
            'clinic' => 'Clinic',
            'consult' => 'Consult',
            'flow' => 'Flow',
            'dn' => 'Dn',
            'emg' => 'Emg',
            'acc' => 'Acc',
            'assur' => 'Assur',
            'inp_id' => 'Inp',
            'node_id' => 'Node',
            'hospmain' => 'Hospmain',
            'hospsub' => 'Hospsub',
            'cost' => 'Cost',
            'type_visit' => 'Type Visit',
            'old_refer' => 'Old Refer',
            'fee' => 'Fee',
            'queue' => 'Queue',
            'time_recei' => 'Time Recei',
            'time_n' => 'Time N',
            'date_recei' => 'Date Recei',
            'room' => 'Room',
            'date_inp' => 'Date Inp',
            'lastupdate' => 'Lastupdate',
            'remark' => 'Remark',
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

        $criteria->compare('vn', $this->vn, true);
        $criteria->compare('ref', $this->ref);
        $criteria->compare('hn', $this->hn, true);
        $criteria->compare('date', $this->date, true);
        $criteria->compare('time', $this->time, true);
        $criteria->compare('time_in', $this->time_in, true);
        $criteria->compare('time_reg', $this->time_reg, true);
        $criteria->compare('time_opd', $this->time_opd, true);
        $criteria->compare('time_out', $this->time_out, true);
        $criteria->compare('time_dr', $this->time_dr, true);
        $criteria->compare('time_cln', $this->time_cln, true);
        $criteria->compare('time_lab', $this->time_lab, true);
        $criteria->compare('time_drug', $this->time_drug, true);
        $criteria->compare('time_up', $this->time_up, true);
        $criteria->compare('dep', $this->dep);
        $criteria->compare('dx1', $this->dx1, true);
        $criteria->compare('dx2', $this->dx2, true);
        $criteria->compare('dx3', $this->dx3, true);
        $criteria->compare('dx4', $this->dx4, true);
        $criteria->compare('dx5', $this->dx5, true);
        $criteria->compare('dx6', $this->dx6, true);
        $criteria->compare('dx', $this->dx, true);
        $criteria->compare('type_dx1', $this->type_dx1);
        $criteria->compare('type_dx2', $this->type_dx2);
        $criteria->compare('type_dx3', $this->type_dx3);
        $criteria->compare('type_dx4', $this->type_dx4);
        $criteria->compare('type_dx5', $this->type_dx5);
        $criteria->compare('type_dx6', $this->type_dx6);
        $criteria->compare('or1', $this->or1, true);
        $criteria->compare('or2', $this->or2, true);
        $criteria->compare('or3', $this->or3, true);
        $criteria->compare('dr', $this->dr);
        $criteria->compare('status', $this->status);
        $criteria->compare('an', $this->an, true);
        $criteria->compare('refer', $this->refer, true);
        $criteria->compare('pttype', $this->pttype);
        $criteria->compare('no_ptt', $this->no_ptt, true);
        $criteria->compare('expire', $this->expire, true);
        $criteria->compare('age', $this->age);
        $criteria->compare('age_type', $this->age_type);
        $criteria->compare('typepaid', $this->typepaid);
        $criteria->compare('period', $this->period);
        $criteria->compare('fu', $this->fu, true);
        $criteria->compare('recieve', $this->recieve);
        $criteria->compare('refer_no', $this->refer_no, true);
        $criteria->compare('sec_com', $this->sec_com, true);
        $criteria->compare('new', $this->new);
        $criteria->compare('temp', $this->temp);
        $criteria->compare('clinic', $this->clinic);
        $criteria->compare('consult', $this->consult);
        $criteria->compare('flow', $this->flow);
        $criteria->compare('dn', $this->dn, true);
        $criteria->compare('emg', $this->emg);
        $criteria->compare('acc', $this->acc);
        $criteria->compare('assur', $this->assur);
        $criteria->compare('inp_id', $this->inp_id, true);
        $criteria->compare('node_id', $this->node_id, true);
        $criteria->compare('hospmain', $this->hospmain, true);
        $criteria->compare('hospsub', $this->hospsub, true);
        $criteria->compare('cost', $this->cost);
        $criteria->compare('type_visit', $this->type_visit);
        $criteria->compare('old_refer', $this->old_refer, true);
        $criteria->compare('fee', $this->fee);
        $criteria->compare('queue', $this->queue);
        $criteria->compare('time_recei', $this->time_recei, true);
        $criteria->compare('time_n', $this->time_n, true);
        $criteria->compare('date_recei', $this->date_recei, true);
        $criteria->compare('room', $this->room, true);
        $criteria->compare('date_inp', $this->date_inp, true);
        $criteria->compare('lastupdate', $this->lastupdate, true);
        $criteria->compare('remark', $this->remark, true);

        return new CActiveDataProvider($this, array(
            'criteria' => $criteria,
        ));
    }

    public function chkAction($cID) {
        if ($cID == 'update')
            return array('style' => 'width:210px;margin-top:15px;', 'readOnly' => 'readOnly');
        else
            return array('style' => 'width:210px;margin-top:15px;');
    }

}
