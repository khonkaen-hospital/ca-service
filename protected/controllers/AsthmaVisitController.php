<?php

class AsthmaVisitController extends Controller {

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
                'actions' => array('index', 'view', 'FirstAsthmaVisit',
                    'FiltroCargoByHN', 'GetAllVisit', 'VisitDetail'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('create', 'update'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new AsthmaVisit;
        $model->visitdate = date("d/m/Y");
        $model->q1 = 1;
        $model->q2 = 1;
        $model->q3 = 0;
        $model->q4 = 0;
        $model->q5 = 0;
        $model->q6 = 0;
        $model->q7 = 0;
        $model->q8 = 0;
        $model->q9 = 0;
        $model->q11 = 0;
        $model->q12 = 0;
        $model->q13 = 0;
        $model->q15 = 0;
        $model->q16 = 0;
        $model->q17 = 0;
        $model->q19 = 0;
        $model->q20 = 0;

        // Uncomment the following line if AJAX validation is needed
        $this->performAjaxValidation($model);

        if (isset($_POST['AsthmaVisit'])) {
            $model->attributes = $_POST['AsthmaVisit'];
            $model->user_id = Yii::app()->user->id;
            if ($model->save()) {
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        if (isset($_GET['AllVisit'])) {
            $HN = $_GET['AllVisit'];
        } else {
            $HN = '0';
        }

        $Sql = "select a.*,c.name as drname,d.clinic as clinicname,
            e.text as pttypename,f.text as resulttext,g.name as hospname
	    from opd_visit a 
            left join lib_dr c on a.dr=c.code 
            left join lib_clinic d on a.dep=d.code 
            left join lib_pttype e on a.pttype=e.code
	    left join lib_opd_result f on a.status=f.code 
            left join lib_hospcode g on a.hospmain=g.off_id
            where a.hn=:HN   order by a.date desc";

        $command = Yii::app()->dbkkh->createCommand($Sql);
        $command->bindValue(':HN', $HN);
        $result = $command->queryAll();
        $AllVisit = new CArrayDataProvider($result, array('keyField' => 'hn'));

        $this->render('create', array(
            'model' => $model,
            'AllVisit' => $AllVisit
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if (isset($_POST['AsthmaVisit'])) {
            $model->attributes = $_POST['AsthmaVisit'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('AsthmaVisit');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
//        $model = new AsthmaVisit('search');
//        $model->unsetAttributes();  // clear any default values
//        if (isset($_GET['AsthmaVisit']))
//            $model->attributes = $_GET['AsthmaVisit'];

        $records = AsthmaVisit::model()->findAll();
        $this->render('admin', array(
            'model' => $records,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return AsthmaVisit the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = AsthmaVisit::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param AsthmaVisit $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'asthma-visit-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionFirstAsthmaVisit() {
        if (isset($_GET['q'])) {
            $lista = AsthmaFirstVisit::model()->findAll(array('condition' => 'hn LIKE :text',
                'params' => array(
                    ':text' => '%' . $_GET['q'] . '%'
                ),
                'limit' => 10,
            ));
        }
        $reusultados = array();
        foreach ($lista as $list) {
            $reusultados[] = array(
                'id' => $list->hn,
                'text' => $list->hn . ' - ' . $list->name . ' ' . $list->surname,
                'datarow' => $list
            );
        }

        echo CJSON::encode($reusultados);
    }

    public function actionFiltroCargoByHN() {
        $lista = array();
        $lista = AsthmaFirstVisit::model()->findByAttributes(array('hn' => Yii::app()->request->getParam('hn')));
        echo CJSON::encode($lista);
    }

    public function actionGetAllVisit($hn) {
        $Sql = "select a.*,c.name as drname,d.clinic as clinicname,e.text as pttypename,
		f.text as resulttext,g.name as hospname
		from opd_visit a left join lib_dr c on a.dr=c.code 
		left join lib_clinic d on a.dep=d.code left join lib_pttype e on a.pttype=e.code
		left join lib_opd_result f on a.status=f.code left join lib_hospcode g on a.hospmain=g.off_id
		where a.hn=:HN   order by a.date desc";
        // $Sql = str_replace(':HN', $hn, $Sql);
        $command = Yii::app()->dbkkh->createCommand($Sql);
        $command->bindValue(':HN', $hn);
        $result = $command->queryAll();
        echo CJSON::encode($result);
    }

    public function actionVisitDetail() {
        $vn = $_GET['vn'];
        $Sql = "select a.*,c.name as drname,d.clinic as clinicname,e.text as pttypename,
	f.text as resulttext,g.name as hospname ,h.desc as txtdiag,i.desc as txtdiag2,j.desc as txtdiag3
	from opd_visit a left join lib_dr c on a.dr=c.code 
	left join lib_clinic d on a.dep=d.code left join lib_pttype e on a.pttype=e.code
	left join lib_opd_result f on a.status=f.code left join lib_hospcode g on a.hospmain=g.off_id
	left join lib_icd10 h on a.dx1=h.code left join lib_icd10 i on a.dx2=i.code left join lib_icd10 j on a.dx3=j.code
	where a.vn=:VN ";

        $command = Yii::app()->dbkkh->createCommand($Sql);
        $command->bindValue(':VN', $vn);
        $result = $command->queryAll();

        echo CJSON::encode($result);
    }

}
