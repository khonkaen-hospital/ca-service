<?php

/**
 * Description of ProfileController
 *
 * @author Satit Seethaphon <dixonsatit@gmail.com>
 * @link http://www.ikkdev.com
 */
class ProfileController extends Controller {

    public function filters() {
        return array(
            'accessControl',
        );
    }

    public function accessRules() {
        return array(
            array('allow',
                'actions' => array('index', 'Changepassword'),
                'users' => array('@'),
            ),
            array('deny',
                'users' => array('*'),
            ),
        );
    }

    public function actionIndex() {

        $model = User::model()->findByPk(Yii::app()->user->id);
        $this->render('index', array('model' => $model));
    }

    public function actionChangepassword() {
        $model = new UserChangePassword;

        if (Yii::app()->user->id) {

            $user = User::model()->findByPk(Yii::app()->user->id);
            $model->tempPassword = $user->passwd;
            $model->username = $user->id;
            
            // ajax validator
            if (isset($_POST['ajax']) && $_POST['ajax'] === 'changepassword-form') {
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            if (isset($_POST['UserChangePassword'])) {
                $model->attributes = $_POST['UserChangePassword'];
                if ($model->validate()) {

                    $new_password = User::model()->findbyPk(Yii::app()->user->id);
                    $new_password->passwd = DuserModule::encrypting($model->password);
                     $new_password->save();
                    // change password in kkh_radius.radcheck table
                    $Radcheck = Radcheck::model()->getUser(Yii::app()->user->id)->find();
                    $Radcheck->value = md5($model->password);
                    $Radcheck->save();
                    Yii::app()->user->setFlash('success', "รหัสผ่านใหม่บันทึกเสร็จเรียบร้อย..");
                    $this->redirect(array("profile/index"));
                }
            }
            $this->render('changepassword', array('model' => $model));
        }
    }

}

?>
