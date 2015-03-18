<?php

/**
 * This is the model class for table "patient".
 *
 * The followings are the available columns in table 'patient':
 * @property integer $ref
 * @property string $hn
 * @property string $title
 * @property string $name
 * @property string $middlename
 * @property string $surname
 * @property string $birth
 * @property integer $age_n
 * @property integer $age_type
 * @property string $age
 * @property string $add
 * @property string $address
 * @property string $moo
 * @property string $soi
 * @property string $road
 * @property string $tambol
 * @property string $amp
 * @property string $prov
 * @property string $tambon
 * @property string $amphur
 * @property string $changwat
 * @property string $zip
 * @property string $tel
 * @property string $add2
 * @property string $address2
 * @property string $moo2
 * @property string $zip2
 * @property integer $sex
 * @property string $education
 * @property integer $marry
 * @property integer $nation
 * @property integer $race
 * @property integer $occupa
 * @property string $type_card
 * @property string $card
 * @property string $no_card
 * @property string $pid
 * @property string $date
 * @property string $father
 * @property string $mother
 * @property integer $ethnic
 * @property string $blood
 * @property string $contr
 * @property string $add_con
 * @property string $st_con
 * @property string $teller
 * @property string $tambon2
 * @property string $amphur2
 * @property string $changwat2
 * @property string $soundex
 * @property string $inp_id
 * @property string $sort
 * @property integer $dep
 * @property string $edit_id
 * @property string $drg_al
 * @property integer $spec_pt
 * @property integer $chk
 * @property integer $pttype
 * @property integer $my_pop
 * @property integer $ischeck
 * @property string $isexpire
 * @property string $scaned
 * @property string $lastupdate
 */
class Patient extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'patient';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('hn', 'required'),
			array('age_n, age_type, sex, marry, nation, race, occupa, ethnic, dep, spec_pt, chk, pttype, my_pop, ischeck', 'numerical', 'integerOnly'=>true),
			array('hn', 'length', 'max'=>8),
			array('title, soi, tambol, card, no_card', 'length', 'max'=>15),
			array('name, middlename, surname, add_con', 'length', 'max'=>30),
			array('age, prov, tambon, amphur, changwat, blood, tambon2, amphur2, changwat2', 'length', 'max'=>2),
			array('add, add2', 'length', 'max'=>6),
			array('address, teller, drg_al', 'length', 'max'=>25),
			array('moo, moo2, education, type_card', 'length', 'max'=>4),
			array('road, amp, pid, father, mother', 'length', 'max'=>20),
			array('zip', 'length', 'max'=>5),
			array('tel', 'length', 'max'=>14),
			array('address2', 'length', 'max'=>35),
			array('zip2, st_con, soundex, inp_id, edit_id', 'length', 'max'=>10),
			array('contr', 'length', 'max'=>28),
			array('sort', 'length', 'max'=>1),
			array('birth, date, isexpire, scaned, lastupdate', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('ref, hn, title, name, middlename, surname, birth, age_n, age_type, age, add, address, moo, soi, road, tambol, amp, prov, tambon, amphur, changwat, zip, tel, add2, address2, moo2, zip2, sex, education, marry, nation, race, occupa, type_card, card, no_card, pid, date, father, mother, ethnic, blood, contr, add_con, st_con, teller, tambon2, amphur2, changwat2, soundex, inp_id, sort, dep, edit_id, drg_al, spec_pt, chk, pttype, my_pop, ischeck, isexpire, scaned, lastupdate', 'safe', 'on'=>'search'),
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
                'canvisit' => array(self::HAS_ONE, 'CanVisit', 'hn'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'ref' => 'Ref',
			'hn' => 'Hn',
			'title' => 'Title',
			'name' => 'Name',
			'middlename' => 'Middlename',
			'surname' => 'Surname',
			'birth' => 'Birth',
			'age_n' => 'Age N',
			'age_type' => 'Age Type',
			'age' => 'Age',
			'add' => 'เลขที่บ้าน',
			'address' => 'Address',
			'moo' => 'Moo',
			'soi' => 'Soi',
			'road' => 'Road',
			'tambol' => 'Tambol',
			'amp' => 'Amp',
			'prov' => 'Prov',
			'tambon' => 'Tambon',
			'amphur' => 'Amphur',
			'changwat' => 'Changwat',
			'zip' => 'Zip',
			'tel' => 'Tel',
			'add2' => 'Add2',
			'address2' => 'Address2',
			'moo2' => 'Moo2',
			'zip2' => 'Zip2',
			'sex' => 'Sex',
			'education' => 'Education',
			'marry' => 'Marry',
			'nation' => 'Nation',
			'race' => 'Race',
			'occupa' => 'อาชีพ',
			'type_card' => 'Type Card',
			'card' => 'Card',
			'no_card' => 'No Card',
			'pid' => 'Pid',
			'date' => 'Date',
			'father' => 'Father',
			'mother' => 'Mother',
			'ethnic' => 'Ethnic',
			'blood' => 'Blood',
			'contr' => 'Contr',
			'add_con' => 'Add Con',
			'st_con' => 'St Con',
			'teller' => 'Teller',
			'tambon2' => 'Tambon2',
			'amphur2' => 'Amphur2',
			'changwat2' => 'Changwat2',
			'soundex' => 'Soundex',
			'inp_id' => 'Inp',
			'sort' => 'Sort',
			'dep' => 'Dep',
			'edit_id' => 'Edit',
			'drg_al' => 'Drg Al',
			'spec_pt' => 'Spec Pt',
			'chk' => 'Chk',
			'pttype' => 'Pttype',
			'my_pop' => 'My Pop',
			'ischeck' => 'Ischeck',
			'isexpire' => 'Isexpire',
			'scaned' => 'Scaned',
			'lastupdate' => 'Lastupdate',
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

		$criteria->compare('ref',$this->ref);
		$criteria->compare('hn',$this->hn,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('middlename',$this->middlename,true);
		$criteria->compare('surname',$this->surname,true);
		$criteria->compare('birth',$this->birth,true);
		$criteria->compare('age_n',$this->age_n);
		$criteria->compare('age_type',$this->age_type);
		$criteria->compare('age',$this->age,true);
		$criteria->compare('add',$this->add,true);
		$criteria->compare('address',$this->address,true);
		$criteria->compare('moo',$this->moo,true);
		$criteria->compare('soi',$this->soi,true);
		$criteria->compare('road',$this->road,true);
		$criteria->compare('tambol',$this->tambol,true);
		$criteria->compare('amp',$this->amp,true);
		$criteria->compare('prov',$this->prov,true);
		$criteria->compare('tambon',$this->tambon,true);
		$criteria->compare('amphur',$this->amphur,true);
		$criteria->compare('changwat',$this->changwat,true);
		$criteria->compare('zip',$this->zip,true);
		$criteria->compare('tel',$this->tel,true);
		$criteria->compare('add2',$this->add2,true);
		$criteria->compare('address2',$this->address2,true);
		$criteria->compare('moo2',$this->moo2,true);
		$criteria->compare('zip2',$this->zip2,true);
		$criteria->compare('sex',$this->sex);
		$criteria->compare('education',$this->education,true);
		$criteria->compare('marry',$this->marry);
		$criteria->compare('nation',$this->nation);
		$criteria->compare('race',$this->race);
		$criteria->compare('occupa',$this->occupa);
		$criteria->compare('type_card',$this->type_card,true);
		$criteria->compare('card',$this->card,true);
		$criteria->compare('no_card',$this->no_card,true);
		$criteria->compare('pid',$this->pid,true);
		$criteria->compare('date',$this->date,true);
		$criteria->compare('father',$this->father,true);
		$criteria->compare('mother',$this->mother,true);
		$criteria->compare('ethnic',$this->ethnic);
		$criteria->compare('blood',$this->blood,true);
		$criteria->compare('contr',$this->contr,true);
		$criteria->compare('add_con',$this->add_con,true);
		$criteria->compare('st_con',$this->st_con,true);
		$criteria->compare('teller',$this->teller,true);
		$criteria->compare('tambon2',$this->tambon2,true);
		$criteria->compare('amphur2',$this->amphur2,true);
		$criteria->compare('changwat2',$this->changwat2,true);
		$criteria->compare('soundex',$this->soundex,true);
		$criteria->compare('inp_id',$this->inp_id,true);
		$criteria->compare('sort',$this->sort,true);
		$criteria->compare('dep',$this->dep);
		$criteria->compare('edit_id',$this->edit_id,true);
		$criteria->compare('drg_al',$this->drg_al,true);
		$criteria->compare('spec_pt',$this->spec_pt);
		$criteria->compare('chk',$this->chk);
		$criteria->compare('pttype',$this->pttype);
		$criteria->compare('my_pop',$this->my_pop);
		$criteria->compare('ischeck',$this->ischeck);
		$criteria->compare('isexpire',$this->isexpire,true);
		$criteria->compare('scaned',$this->scaned,true);
		$criteria->compare('lastupdate',$this->lastupdate,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * @return CDbConnection the database connection used for this class
	 */
	public function getDbConnection()
	{
		return Yii::app()->dbkkh;
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Patient the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
