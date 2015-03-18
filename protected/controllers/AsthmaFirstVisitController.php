<?php

class AsthmaFirstVisitController extends Controller {

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
                // 'postOnly + delete', // we only allow deletion via POST request
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
                'actions' => array('index', 'view', 'FiltroCargo', 'FiltroCargoByHN'),
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
    public function beforeSave() {
        if ($this->isNewRecord)
            $this->created = new CDbExpression('NOW()');
        else
            $this->modified = new CDbExpression('NOW()');

        return true;
    }

    public function actionCreate() {
        $model = new AsthmaFirstVisit;

        $model->gender_id = 1;
        $model->tw_month = 0;
        $model->tw_emer = 0;
        $model->curr_b2agonisitinhaler = 0;
        $model->curr_agonisttab = 0;
        $model->curr_theophylline = 0;
        $model->curr_steroidinhaler = 0;
        $model->curr_oralsteroid = 0;
        $model->curr_b2lpratropium = 0;
        $model->curr_b2icsinhaler = 0;
        $model->curr_antilenkotriene = 0;
        $model->curr_icspluslaba = 0;
        $model->curr_tiotropium = 0;
        // Uncomment the following line if AJAX validation is neededd;
        $this->performAjaxValidation($model);

        if (isset($_POST['AsthmaFirstVisit'])) {
            $model->attributes = $_POST['AsthmaFirstVisit'];
            $model->user_id = Yii::app()->user->id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->asthma_no));
        }

        $this->render('create', array(
            'model' => $model,
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
        $this->performAjaxValidation($model);

        if (isset($_POST['AsthmaFirstVisit'])) {
            $model->attributes = $_POST['AsthmaFirstVisit'];
            $model->user_id = Yii::app()->user->id;
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->asthma_no));
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
        // echo $id;
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('AsthmaFirstVisit');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
//		$model=new AsthmaFirstVisit('search');
//		$model->unsetAttributes();  // clear any default values
//		if(isset($_GET['AsthmaFirstVisit']))
//			$model->attributes=$_GET['AsthmaFirstVisit'];
//
//		$this->render('admin',array(
//			'model'=>$model,
//		));
        $records = AsthmaFirstVisit::model()->findAll();
        $this->render('admin', array(
            'records' => $records,
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return AsthmaFirstVisit the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = AsthmaFirstVisit::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param AsthmaFirstVisit $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'asthma-first-visit-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function actionFiltroCargo() {
        if (isset($_GET['q'])) {
            $lista = Patient::model()->findAll(array('condition' => 'hn LIKE :text or name LIKE :text or surname LIKE :text',
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
        $lista = Patient::model()->findByAttributes(array('hn' => Yii::app()->request->getParam('hn')));
        echo CJSON::encode($lista);
    }

}
