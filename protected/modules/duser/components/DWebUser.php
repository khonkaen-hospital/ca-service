<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of DWebUser
 *
 * @author Satit Seethaphon <dixonsatit@gmail.com>
 * @link http://www.ikkdev.com
 */
class DWebUser extends CWebUser {

    public function init() {
        parent::init();
        $this->setStateKeyPrefix(md5('Yii.KhonKaen-Hospital-2013'));
    }

    protected function afterLogin($fromCookie) {
        parent::afterLogin($fromCookie);
        $this->updateSession();
    }

    public function updateSession() {
        $user = User::model()->findByPk($this->id);
        $userAttributes = array(
            'fullname' => $user->title.$user->name.$user->surname,
            'position'=>$user->position,
            'hn'=>$user->hn,
            'level'=>$user->level,
            'person_id' => $user->person_id,
            'no'=>$user->no,
            'nicname'=>$user->nicname,
            'type'=>$user->type,
            'bank_id'=>$user->bank_id,
            
        );
        foreach ($userAttributes as $attrName => $attrValue) {
            $this->setState($attrName, $attrValue);
        }
    }

}

?>
