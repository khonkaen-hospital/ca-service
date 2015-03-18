<?php

class DuserModule extends CWebModule {

    public $defaultController = 'profile';
    public $hash = 'oldpassword';
    public $loginUrl = array("/duser/login");
    public $logoutUrl = array("/duser/logout");
    public $profileUrl = array("/duser/profile");
    public $returnUrl = array("/duser/profile");
    public $returnLogoutUrl = array("/duser/login");
    public $loginNotActiv = false;

    public function init() {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application
        // import the module-level models and components
        $this->setImport(array(
            'duser.models.*',
            'duser.components.*',
        ));
    }

    public static function encrypting($string = "") {
        $hash = Yii::app()->getModule('duser')->hash;
        if ($hash == "md5")
            return md5($string);
        if ($hash == "oldpassword")
            return self::old_password($string);
        if ($hash == "sha1")
            return sha1($string);
        else
            return hash($hash, $string);
    }

    public static function old_password($passStr) {
        if ($passStr == '')
            return '';
        $nr = 0x50305735;
        $nr2 = 0x12345671;
        $add = 7;
        $charArr = preg_split("//", $passStr);

        foreach ($charArr as $char) {
            if (($char == '') || ($char == ' ') || ($char == '\t'))
                continue;
            $charVal = ord($char);
            $nr ^= ((($nr & 63) + $add) * $charVal) + ($nr << 8);
            $nr &= 0x7fffffff;
            $nr2 += ($nr2 << 8) ^ $nr;
            $nr2 &= 0x7fffffff;
            $add += $charVal;
        }

        return sprintf("%08x%08x", $nr, $nr2);
    }

    public function beforeControllerAction($controller, $action) {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        }
        else
            return false;
    }

}
