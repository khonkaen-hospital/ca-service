<?php

class CanVisitController extends Controller {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
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
                'actions' => array('index', 'view', 'FiltroCargo', 'getPatientByHn', 'FiltroCargoByHN', 'DoChacked', 'delete', 'report', 'listCanRegis', 'error', 'printRn'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update', 'admin', 'deleteRegis', 'createVisit'),
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

    /**
     * Displays a particular model.
     * @param string $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $strSql = 'select a.id,a.rn,a.code_rtx,b.op_name,a.price,a.user_id,a.qty
                    from cancer_lib_rtx a
                    inner join lib_rx_ca b on a.code_rtx = b.code_rtx
                    where a.visit_id = "' . $id . '"';

        $rawData = Yii::app()->dbkkh->createCommand($strSql)->queryAll();

        $gridDataProvider = new CArrayDataProvider($rawData, array('keyField' => 'id', 'pagination' => array(
                'pageSize' => 20)));
        
        
        $model = CanVisit::model()->findByAttributes(array('id' => $id));
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        $this->render('view', array(
            'model' => $model, 'data_rx' => $gridDataProvider
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreateVisit() {

        $model = new CanVisit();

        $date = date('Y') + 543;
        $command = Patient::model()->findAllByPk(0);
        $rn = '';
        $uid = Yii::app()->user->name;

        if (isset($_POST['txtHn']) && isset($_POST['txtRn'])) {

            //สร้าง RN ใหม่
            if ($_POST['txtHn'] != null && $_POST['txtRn'] == null) {
                $regis = CanRegis::model()->findByAttributes(array('hn' => $_POST['txtHn']));
                if (empty($regis->rn)) {
                    $sql = "SELECT COUNT(*) FROM cancer_regis";
                    $rows = Yii::app()->dbkkh->createCommand($sql)->queryScalar();
                    $rows = str_pad($rows + 1, 4, '0', STR_PAD_LEFT); //format number prefix 0001
                    $rn = 'RN' . substr($date, 2, 2) . $rows;

                    $txtsql = "insert into cancer_regis(rn,hn,create_date,user_id)values('" . $rn . "','" . $_POST['txtHn'] . "',now(),'" . $uid . "')";
                    Yii::app()->dbkkh->createCommand($txtsql)->execute();
                    $this->redirect(array('listCanRegis'));
                } else {

                    Yii::app()->user->setFlash('danger', "HN: " . $model->hn . " มีการลงทะเบียน RN แล้ว");
                    $this->redirect(array('createVisit'));
                }
            }

            if ($_POST['txtHn'] != null && $_POST['txtRn'] != null && isset($_POST['ids'])) {

                $vn = CanVisit::model()->findByAttributes(array('vn' => $_POST['txtVn']));

                if (empty($vn)) {

                    $model->rn = $_POST['txtRn'];
                    $model->hn = $_POST['txtHn'];
                    $model->vn = $_POST['txtVn'];
                    $model->date_in = $_POST['txtDateIn'];
                    $model->no_ptt = $_POST['txtNoPtt'];
                    $model->pttype = $_POST['txtPttType'];
                    $model->user_id = $uid;
                    $model->create_date = new CDbExpression('NOW()');
                    $model->status = 1;

                    if ($model->save()) {
                        $sqlcommand = 'insert into cancer_lib_rtx(rn,code_rtx,price,create_date,user_id,visit_id,qty)values';
                        for ($i = 0; $i < count($_POST['ids']); $i++) {
                            list($codertx, $price) = explode(':', $_POST['ids'][$i]);
                            $qty = $_POST['txtQty'][$codertx];
                            $price *= $qty;
                            $sqlcommand .= '("' . $model->rn . '","' . $codertx . '",' . $price . ',now(),"' . $uid . '",' . $model->id . ', ' . $qty . ')';
                            $sqlcommand .= $i == count($_POST['ids']) - 1 ? ';' : ',';
                        }
                        Yii::app()->dbkkh->createCommand($sqlcommand)->execute();
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                } else {

                    Yii::app()->user->setFlash('danger', "HN: " . $model->hn . " มีการทำหัตถการแล้ววันนี้(VN ซ้ำ)");
                    $this->redirect(array('createVisit'));
                }
            }
        }

        $dataProvider = new CArrayDataProvider($command, array(
            'keyField' => 'hn'
        ));

        $sql1 = 'select a.code_rtx,
                b.op_name as gname,
                a.group_rtx,
                a.op_name,
                a.nhso,
                a.price,
                "" as chk
                from lib_rx_ca a 
                inner join lib_rx_ca b on a.group_rtx = b.code_rtx
                where a.group_rtx is not null
                order by a.group_rtx,a.code_rtx asc';
        $rawData = Yii::app()->dbkkh->createCommand($sql1)->queryAll();

        $gridDataProvider = new CArrayDataProvider($rawData, array('keyField' => 'code_rtx', 'pagination' => array(
                'pageSize' => 20)));

        $this->render('create', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
            'gridDataProvider' => $gridDataProvider
        ));
    }

    public function actionCreate() {

        $model = new CanVisit();
        $date = date('Y') + 543;
        $command = Patient::model()->findAllByPk(0);
        $rn = '';
        $uid = Yii::app()->user->name;

        if (isset($_POST['ids'])) {// ตรวจการเลือก check box
            $model->attributes = $_POST['CanVisit'];

            $regis = CanRegis::model()->findByAttributes(array('hn' => $_POST['CanVisit']['hn']));
            if ($_POST['rdRN'] == 0 && empty($regis->rn)) {//มาศูนย์มะเร็งครั้งแรก สร้าง RN ใหม่
                $sql = "SELECT COUNT(*) FROM cancer_regis";
                $rows = Yii::app()->dbkkh->createCommand($sql)->queryScalar();
                $rows = str_pad($rows + 1, 4, '0', STR_PAD_LEFT); //format number prefix 0001
                $rn = 'RN' . substr($date, 2, 2) . $rows;

                $txtsql = "insert into cancer_regis(rn,hn,create_date,user_id)values('" . $rn . "','" . $_POST['CanVisit']['hn'] . "',now(),'" . $uid . "')";
                Yii::app()->dbkkh->createCommand($txtsql)->execute();
            }
            if (empty($_POSTCanVisit['rn'])) {
                $can_regis = CanRegis::model()->findByAttributes(array('hn' => $_POST['CanVisit']['hn']));
                $rn = $can_regis->rn;
            } else {
                $rn = $_POST['CanVisit']['rn'];
            }

            $model->rn = $rn;
            $model->user_id = $uid;
            $model->create_date = new CDbExpression('NOW()');
            $model->status = 1;

            if (count($_POST['ids']) <= 0) {
                throw new CHttpException(444, 'ไม่เลือกหัตถการแล้วจะ มาลงทะเบียนทำซากอะไร');
            } else {
                if ($model->rn != null && $model->date_in != date('Y-m-d')) {

                    if ($model->save()) {
                        $model->getErrors();

                        $sqlcommand = 'insert into cancer_lib_rtx(rn,code_rtx,price,create_date,user_id,visit_id,qty)values';
                        for ($i = 0; $i < count($_POST['ids']); $i++) {
                            list($codertx, $price) = explode(':', $_POST['ids'][$i]);
                            $qty = $_POST['txtQty'][$codertx];
                            $price *= $qty;
                            $sqlcommand .= '("' . $rn . '","' . $codertx . '",' . $price . ',now(),"' . $uid . '",' . $model->id . ', ' . $qty . ')';
                            $sqlcommand .= $i == count($_POST['ids']) - 1 ? ';' : ',';
                        }
                        Yii::app()->dbkkh->createCommand($sqlcommand)->execute();
                        $this->redirect(array('view', 'id' => $model->id));
                    }
                } else {

                    Yii::app()->user->setFlash('danger', "HN: " . $model->hn . " มีการทำหัตถการไปแล้วในวันนี้");
                    $this->redirect(array('create'));
                }
            }
        }
        //ผู้ป่วยใหม่ ลงทะเบียนแต่ยังไม่ทำหัตถการ
        if (isset($_POST['CanVisit']) && !isset($_POST['ids'])) {

            $check_rn = CanRegis::model()->findByAttributes(array('hn' => $_POST['CanVisit']['hn']));

            if (empty($check_rn->hn)) {

                $can_regis = new CanRegis();
                if ($_POST['rdRN'] == 0) {//มาศูนย์มะเร็งครั้งแรก สร้าง RN ใหม่
                    $sql = "SELECT COUNT(*) FROM cancer_regis";
                    $rows = Yii::app()->dbkkh->createCommand($sql)->queryScalar();
                    $rows = str_pad($rows + 1, 4, '0', STR_PAD_LEFT); //format number prefix 0001
                    $rn = 'RN' . substr($date, 2, 2) . $rows;
                } else {
                    $rn = $_POST['CanVisit']['rn'];
                }

                $can_regis->rn = $rn;
                $can_regis->hn = $_POST['CanVisit']['hn'];
                $can_regis->create_date = date('Y-m-d');
                $can_regis->user_id = $uid;
                $model->rn = $rn;

                if ($can_regis->save()) {
                    $can_regis->getErrors();
                    $this->redirect(array('canVisit/listCanRegis'));
                }
            }
//            else if (!empty($check_rn->hn)) {
//
//                Yii::app()->user->setFlash('success','เกิดข้อผิดพลาด!! '. "HN: " . $check_rn->hn . "มีการลงทะเบียนไว้แล้ว หรือ คุณยังไม่เลือกหัตถการ");
//                $this->redirect(array('create'));
//            }
        }

        if (isset($_GET['hn']) && $_GET['hn'] != null) {
            $command = Patient::model()->findAllByAttributes(array('hn' => $_GET['hn']));
        }
        $dataProvider = new CArrayDataProvider($command, array(
            'keyField' => 'hn'
        ));

        $sql1 = 'select a.code_rtx,
                b.op_name as gname,
                a.group_rtx,
                a.op_name,
                a.nhso,
                a.price,
                "" as chk
                from lib_rx_ca a 
                inner join lib_rx_ca b on a.group_rtx = b.code_rtx
                where a.group_rtx is not null
                order by a.group_rtx,a.code_rtx asc';
        $rawData = Yii::app()->dbkkh->createCommand($sql1)->queryAll();

        $gridDataProvider = new CArrayDataProvider($rawData, array('keyField' => 'code_rtx', 'pagination' => array(
                'pageSize' => 20)));

        $this->render('create', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
            'gridDataProvider' => $gridDataProvider
        ));
    }

    public function actionGetPatientByHn() {

        //$lista = array();
        $hn = $_POST['hn'];

        $strSQL = 'select 
            r.rn,
            a.hn,
            a.vn,
            b.an,
            p.title,
            p.name,
            p.surname,
            a.date,
            a.pttype,
            c.text,
            a.no_ptt,
            a.expire
            from opd_visit a
            left join patient p on a.hn = p.hn
            left join ipd_ipd b on a.vn = b.vn
            left join lib_pttype c on a.pttype = c.code
            left join cancer_visit d on a.hn = d.hn
            left join cancer_regis r on a.hn = r.hn
            where a.hn = "' . $hn . '" 
            order by a.date desc limit 1;';

        $result = Yii::app()->dbkkh->createCommand($strSQL)->queryRow();

        echo CJSON::encode(array(
            'success' => TRUE,
            'vn' => $result['vn'],
            'date' => $result['date'],
            'rn' => $result['rn'],
            'an' => $result['an'],
            'no_ptt' => $result['no_ptt'],
            'pttype' => $result['text'],
            'expire' => $result['expire'],
            'fullname' => $result['title'] . " " . $result['name'] . " " . $result['surname'],
                //  'address' => $result['address'] . " หมู่ " . $result['moo'] . " ตำบล " . $result['tambol'] . " อำเภอ " . $result['amp']
        ));

        Yii::app()->end();
    }

//        if (isset($_POST['hn'])) {
//
//            $hn = $_POST['hn'];
//
//            $sql = "SELECT hn,  title, name, address, moo, tambol, amp, surname, address, isexpire FROM patient WHERE hn = :hn AND (isexpire = '0000-00-00' OR ISNULL(isexpire))";
//
////            $sql = "select DISTINCT(i.hn) ,i.an,i.title,i.name,i.surname, i.ward, i.admite, i.room, i.dr, i.time from hospdata.ipd_ipd i
////                WHERE i.hn = :hn AND (i.disc = '0000-00-00' OR ISNULL(i.disc))
////		LIMIT 1";
//
//            $command = Yii::app()->db->createCommand($sql);
//            $command->bindValue(':hn', $hn, PDO::PARAM_STR);
//            $result = $command->queryRow();
//
//            echo CJSON::encode(array(
//                'success' => TRUE,
//                'fullname' => $result['title'] . " " . $result['name'] . " " . $result['surname'],
//                'address' =>  $result['address'] . " หมู่ ". $result['moo'] ." ตำบล " .$result['tambol']. " อำเภอ " . $result['amp']
//            ));
//            Yii::app()->end();
//        }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['CanVisit'])) {
            $model->attributes = $_POST['CanVisit'];
            $model->user_id = Yii::app()->user->name;
            $model->update_date = new CDbExpression('NOW()');
            $uid = Yii::app()->user->name;

            $delrn = 'delete from cancer_lib_rtx where visit_id ="' . $id . '"';
            Yii::app()->dbkkh->createCommand($delrn)->execute();

            $sqlcommand = 'insert into cancer_lib_rtx(visit_id, rn, code_rtx, price, create_date, user_id, qty)values';
            for ($i = 0; $i < count($_POST['ids']); $i++) {
                list($codertx, $price) = explode(':', $_POST['ids'][$i]);
                $qty = $_POST['txtQty'][$codertx];
                $price *= $qty;
                $sqlcommand .= '("' . $id . '","' . $model->rn . '","' . $codertx . '",' . $price . ',now(),"' . $uid . '",' . $qty . ')';
                $sqlcommand .= $i == count($_POST['ids']) - 1 ? ';' : ',';
            }

            if ($model->save()) {
                Yii::app()->dbkkh->createCommand($sqlcommand)->execute();
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $command = Patient::model()->findAllByPk(0);
        $dataProvider = new CArrayDataProvider($command, array(
            'keyField' => 'hn'
        ));

        $sql1 = 'select a.code_rtx,
                b.op_name as gname,
                a.group_rtx,
                a.op_name,
                a.nhso,
                a.price ,
                c.code_rtx as chk
                from lib_rx_ca a 
                inner join lib_rx_ca b on a.group_rtx = b.code_rtx
                left join cancer_lib_rtx c on a.code_rtx = c.code_rtx and c.rn = "' . $id . '"
                where a.group_rtx is not null
                order by a.group_rtx,a.code_rtx asc';
        $rawData = Yii::app()->dbkkh->createCommand($sql1)->queryAll();

        $gridDataProvider = new CArrayDataProvider($rawData, array('keyField' => 'code_rtx', 'pagination' => array(
                'pageSize' => 20)));

        $this->render('update', array(
            'model' => $model,
            'dataProvider' => $dataProvider,
            'gridDataProvider' => $gridDataProvider
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        //$this->loadModel($id)->delete();
        $sqlDel = 'update cancer_visit set status = 0 where rn = "' . $id . '"';
        Yii::app()->dbkkh->createCommand($sqlDel)->execute();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax'])) {
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $model = new CanVisit();
        $criteria = new CDbCriteria();
        $criteria->group('vn');
        $dataProvider = new CActiveDataProvider($model, array(
            'criteria' => $criteria
        ));
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {

        $sql = 'SELECT c.*, p.title, p.name, p.surname, p.age FROM cancer_visit c
                JOIN patient p on c.hn = p.hn
                WHERE c.status = 1
                ORDER BY c.date_in DESC
                ';
        $command = Yii::app()->dbkkh->createCommand($sql);
        $result = $command->queryAll();

//        $criteria = new CDbCriteria();
//        $criteria->condition = 'status = 1';
//        $criteria->order = 'rn DESC';

        $dataProvider = new CArrayDataProvider($result, array(
            'pagination' => array(
                'pageSize' => 100
            ),
            'keyField' => 'id'
        ));
        $this->render('admin', array(
            'dataProvider' => $dataProvider,
        ));
    }

    public function actionListCanRegis() {

        $sql = 'SELECT p.*, r.rn, r.create_date, r.user_id FROM cancer_regis r JOIN patient p on r.hn = p.hn ORDER BY r.rn DESC';

        $command = Yii::app()->dbkkh->createCommand($sql);
        $result = $command->queryAll();

        $dataProvider = new CArrayDataProvider($result, array(
            'pagination' => array(
                'pageSize' => 100
            ),
            'keyField' => 'hn'
        ));
        $this->render('listCanRegis', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return CanVisit the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = CanVisit::model()->findByPk($id);
        if ($model === null) {
            throw new CHttpException(404, 'The requested page does not exist.');
        }
        return $model;
    }

//    
//    public function actionAddData(){
//        if (isset($_POST['hn'])) {
//            
//            $sql = 'SELECT * FROM visit '
//        }
//    }

    /**
     * Performs the AJAX validation.
     * @param CanVisit $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'can-visit-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionFiltroCargo() {
        $reusultados = array();

        if (isset($_GET['q'])) {
            if ($_GET['chk'] == 0) {
                $lista = Patient::model()->findAll(array('condition' => 'hn LIKE :text or name LIKE :text',
                    'params' => array(
                        ':text' => $_GET['q'] . '%'
                    ),
                    'limit' => 11,
                ));
                foreach ($lista as $list) {
                    $reusultados[] = array(
                        'id' => $list->hn,
                        'text' => $list->hn . ' - ' . $list->name . ' ' . $list->surname,
                        'datarow' => $list
                    );
                }
            } else {
                //เคยมาใช้บริการแล้ว มี RN
                $lista = CanRegis::model()->findAll(array('condition' => 'hn LIKE :text or rn LIKE :text',
                    'params' => array(
                        ':text' => '%' . $_GET['q'] . '%'
                    ),
                    'limit' => 11,
                ));

                foreach ($lista as $list) {
                    $reusultados[] = array(
                        'id' => $list->hn,
                        'text' => $list->hn . ' - ' . $list->rn,
                        'datarow' => $list
                    );
                }
            }
        }
        echo CJSON::encode($reusultados);
    }

    public function actionFiltroCargoByHN() {

        //$lista = array();
        $hn = Yii::app()->request->getParam('hn', NULL);
        if ($hn === NULL) {
            $lista = array();
        } else {
            $strSQL = 'select d.rn
            ,a.hn,
            a.vn,
            b.an,
            a.date,
            a.pttype,
            c.text,
            a.no_ptt,
            a.expire
            from opd_visit a
            left join ipd_ipd b on a.vn = b.vn
            left join lib_pttype c on a.pttype = c.code
            left join cancer_visit d on a.hn = d.hn
            where a.hn = "' . $hn . '" 
            order by a.date desc limit 1;';

            $lista = Yii::app()->dbkkh->createCommand($strSQL)->queryAll();
            if (count($lista) <= 0) {
                echo 'Error';
            }
        }

        echo CJSON::encode($lista);
    }

    public function actionDoChacked() {
        //if(Yii::app()->request->isAjaxRequest){
        if (isset($_POST['chk'])) {
            print_r($_POST['chk']);
            foreach ($_POST['chk'] as $val) {
                echo $val . '<br/>';
            }
        }

        //}
    }

    public function actionPrintRn() {

        if (isset($_GET['id'])) {

            $rn = $_GET['id'];

            $sql = 'SELECT c.rn, c.hn, p.title AS new_title, p.name, p.surname, p.age As new_age FROM cancer_regis c 
                JOIN hospdata.patient p ON c.hn = p.hn 
                WHERE c.rn = :rn
                LIMIT 1';

            $command = Yii::app()->dbkkh->createCommand($sql);
            $command->bindValue(':rn', $rn, PDO::PARAM_STR);
            $result = $command->queryRow();

            $dataProvider = new CArrayDataProvider($result, array(
                'keyField' => 'rn'
            ));

            $mPDF = Yii::app()->ePdf->mpdf('UTF-8', array(100, 35), '19'/* fontSize */, 'angsana'/* fontName */, '0'/* margin-l */, '0'/* margin-r */, '0'/* margin-t */, '5'/* margin-b */, ''/* margin-h */, ''/* margin-f */, 'L');
            $mPDF->AddPage('P');
            $mPDF->SetFillColor(255, 255, 0);
            $mPDF->SetAutoPageBreak('margin', '1');
            $mPDF->setAutoFont();
            $mPDF->WriteHTML($this->renderPartial('_printRn', array('dataProvider' => $dataProvider), true));
            $mPDF->SetJS('this.print();');
            $mPDF->Output();
        }
    }

    public function actionReport($id = 0) {

        $this->render('report');
    }

    public function actionDeleteRegis($id) {

        $model = CanRegis::model()->findByAttributes(array('rn' => $id));
        $model->delete();
        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('listCanRegis'));
    }

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

}
