<?php

class SiteController extends Controller {

    public $layout = '//layouts/column2';

    /**
     * Declares class-based actions.
     */
    public function actions() {
        return array(
            // captcha action renders the CAPTCHA image displayed on the contact page
            'captcha' => array(
                'class' => 'CCaptchaAction',
                'backColor' => 0xFFFFFF,
            ),
            // page action renders "static" pages stored under 'protected/views/site/pages'
            // They can be accessed via: index.php?r=site/page&view=FileName
            'page' => array(
                'class' => 'CViewAction',
            ),
        );
    }

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex() {
        // renders the view file 'protected/views/site/index.php'
        // using the default layout 'protected/views/layouts/main.php'
        $sql = 'select * from cancer_visit GROUP BY vn ORDER BY create_date DESC';
        $sql2 = 'select b.op_name,a.code_rtx,count(a.code_rtx) as counts
                from cancer_lib_rtx a
                left join lib_rx_ca b on a.code_rtx = b.code_rtx
                group by a.code_rtx,b.op_name 
                
                ';

        $sql3 = 'SELECT count(code_rtx) AS crx FROM cancer_lib_rtx WHERE date(create_date) = CURDATE()';
        $sql4 = 'SELECT count(code_rtx) AS crx  FROM cancer_lib_rtx WHERE  MONTH(create_date) = MONTH(NOW())';
        $sql5 = 'SELECT count(code_rtx) AS crx  FROM cancer_lib_rtx WHERE  YEAR(create_date) = YEAR(NOW())';

        $sql6 = 'SELECT count(*) AS crx  FROM cancer_regis ';


        $rawData = Yii::app()->dbkkh->createCommand($sql)->queryAll();
        $rawData2 = Yii::app()->dbkkh->createCommand($sql2)->queryAll();
        $rawData3 = Yii::app()->dbkkh->createCommand($sql3)->queryAll();
        $rawData4 = Yii::app()->dbkkh->createCommand($sql4)->queryAll();
        $rawData5 = Yii::app()->dbkkh->createCommand($sql5)->queryAll();
        $rawData6 = Yii::app()->dbkkh->createCommand($sql6)->queryAll();




        //print_r($rawData3[0]['crx']);
        //CVarDumper::dump($rawData, 10, TRUE);
        $dataProvider = new CArrayDataProvider($rawData);
        $dataProvider2 = new CArrayDataProvider($rawData2, array('keyField' => 'code_rtx'));


        $this->render('index', array('dataprovider' => $dataProvider,
            'dataprovider2' => $dataProvider2,
            'countRTX' => $rawData3[0]['crx'],
            'monthRTX' => $rawData4[0]['crx'],
            'yearRTX' => $rawData5[0]['crx'],
            'customerRTX' => $rawData6[0]['crx']
        ));
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        $error = Yii::app()->errorHandler->error;
        switch ($error['code']) {
            case 404:
                $this->render('error404', array('error' => $error));
                break;
            case 500:
                $this->render('error500', array('error' => $error));
                break;
            default :
                $this->render('error', array('error' => $error));
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-Type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
        $model = new LoginForm;

        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

        // collect user input data
        if (isset($_POST['LoginForm'])) {
            $model->attributes = $_POST['LoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login())
                $this->redirect(Yii::app()->user->returnUrl);
        }
        // display the login form
        $this->render('login', array('model' => $model));
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

}
