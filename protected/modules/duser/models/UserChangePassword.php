<?php

/**
 * UserChangePassword class.
 * UserChangePassword is the data structure for keeping
 * user change password form data. It is used by the 'changepassword' action of 'UserController'.
 */
class UserChangePassword extends CFormModel {

    public $oldPassword;
    public $tempPassword;
    public $oldUsername;
    public $password;
    public $verifyPassword;
    public $username;

    /**
     * Type Rule 0 = general,1 = admin 
     * @var type boolen 
     */
    public $type = 0;

    public function rules() {
        return array(
            array('username,oldPassword,password,verifyPassword', 'required'),
            array('oldPassword', 'verifyOldPassword'),
            array('password, verifyPassword', 'length', 'max' => 128, 'min' => 4, 'message' => "รหัสผ่านสั้นเกินไป (อย่างน้อย 4 ตัวอักษร)."),
            array('verifyPassword', 'compare', 'compareAttribute' => 'password', 'message' => "กรอกยืนยันรหัสผ่านให้ตรงกัน"),
        );
    }

    /**
     * Declares attribute labels.
     */
    public function attributeLabels() {
        return array(
            'username' => "ชื่อผุ้ใช้งาน",
            'oldPassword' => "รหัสผ่านเดิม",
            'password' => "รหัสผ่านใหม่",
            'verifyPassword' => "รหัสผ่านใหม่กรอกยืนยันอีกครั้ง",
        );
    }

    /**
     * Verify Old Password
     */
    public function verifyOldPassword($attribute, $params) {
        if(User::model()->findByPk(Yii::app()->user->id)->passwd !=Yii::app()->getModule('duser')->encrypting($this->oldPassword) )
            $this->addError($attribute, "รหัสผ่านเก่าไม่ถูกต้อง.");
    }

    public function verifyUsername($attribute, $params) {
        $user = User::model()->findByAttributes(array('id' => $this->$attribute));
        if ($user and strtoupper($user->id) != strtoupper($params['oldUsername']))
            $this->addError($attribute, "ชื่อผู้ใช้งาน [<span style='font-weight:bold;color:green;'>" . $user->id . "</span>] มีผุ้ใช้อยู่แล้ว !.");
        //if(User::model()->find('id != :Oldusername and id = :username', array(':Oldusername'=>$params['oldUsername'],':username'=>$this->attributes)))
    }

}