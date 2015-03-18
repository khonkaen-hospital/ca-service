<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of CanVisitControll
 *
 * @author pil2ate
 */
class CanRegisControll extends Controller {

    //put your code here

    public $layout = '//layouts/column2';

    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('listCanRegis'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'printRn'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin', 'toonoo'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    public function actionPrintRn() {

        echo 4555;
        die();
        
        if (isset($_GET['id'])) {
            
            $rn = $_GET['id'];


            $sql = 'SELECT * FROM cancer_regis c 
                JOIN hospdata.patient p ON c.hn = p.hn 
                WHERE c.rn = :rn
                LIMIT 1';

            $command = Yii::app()->db->createCommand($sql);
            $command->bindValue(':rn', $rn, PDO::PARAM_STR);
            $result = $command->queryRow();

            $dataProvider = new CArrayDataProvider($result, array(
                'keyField' => 'rn'
            ));

            $mPDF = Yii::app()->ePdf->mpdf('UTF-8', 'A4', '9'/* fontSize */, 'angsana'/* fontName */, ''/* margin-l */, ''/* margin-r */, '10'/* margin-t */, ''/* margin-b */, ''/* margin-h */, ''/* margin-f */, 'P');
            $mPDF->AddPage('P');
            $mPDF->SetFillColor(255, 255, 0);
            $mPDF->SetAutoPageBreak('margin', '1');
            $mPDF->setAutoFont();
            $mPDF->WriteHTML($this->renderPartial('_printRn', array('dataProvider' => $dataProvider), true));
            $mPDF->SetJS('this.print();');
            $mPDF->Output();
        }
    }

    public function actionListCanRegis() {
        $model = new CanRegis();

        $dataProvider = new CActiveDataProvider($model, array(
        ));
        $this->render('listCanRegis', array(
            'dataProvider' => $dataProvider,
        ));
    }

}
