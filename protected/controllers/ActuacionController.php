<?php

class ActuacionController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

    /**
     * @var integer Id del expediente asociado a la actuación 
     */
    public $id_expediente=null;
    
    /**
     * @var integer Nro de control del expediente asociado 
     */
    public $nro_expediente = null;

    /**
    * @var Object objeto empresa al que pertenece este expediente, se carga a
    * traves de filters
    */
    public $_empresa=null;    
    
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
            'expedienteContext + create, update, delete, view'
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{

        $registroActuacionesDataProvider = new CActiveDataProvider('actuacionRegistro', array(
            'criteria' => array(
                'condition' => 'id_actuacion=:id_actuacion',
                'params' =>array(':id_actuacion'=> $id),
                ),
            'pagination' => array(
                'pageSize'=>10,    
                ),
            )
        );

		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'registroActuacionesDataProvider'=> $registroActuacionesDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Actuacion;
        $model->id_expediente = $this->id_expediente;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Actuacion']))
		{
			$model->attributes=$_POST['Actuacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id, 'id_expediente'=>$this->id_expediente));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
        $this->id_expediente = $model->id_expediente;

        // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Actuacion']))
		{
			$model->attributes=$_POST['Actuacion'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id, 'id_expediente'=>$this->id_expediente));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])){
				//$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
                $this->redirect(array('expediente/view','id'=>$this->id_expediente));
            }
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Actuacion');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Actuacion('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Actuacion']))
			$model->attributes=$_GET['Actuacion'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Actuacion::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'El registro buscado no existe');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='actuacion-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
    /**
     * filtro para cargar los datos del expediente asociado
     * @param type $filterChain 
     */
    public function filterExpedienteContext($filterChain){
        if(isset($_GET['id_expediente'])){
            $this->id_expediente= $_GET['id_expediente'];
        }elseif(isset($_POST['id_expediente'])){
            $this->id_expediente= $_POST['id_expediente'];
        }else{
            throw new CHttpException(400, 'No se ha definido el expediente asociado a la actuación');
        }
        $expedienteAux = Expediente::model()->findByPk($this->id_expediente);
        $this->nro_expediente = $expedienteAux->nro_expediente;
        $this->loadEmpresa($expedienteAux->id_empresa);
        
        $filterChain->run();
    }

    /**
    * Protected method to load data of Empresa related
    * @param empresa Id 
    */
    protected function loadEmpresa($id_empresa){
        if ($this->_empresa === null){
            $this->_empresa = Empresa::model()->findbyPk($id_empresa);
            if ($this->_empresa === null){
                throw new CHttpException(404,"Empresa no existe");
            }
        }
    }
    
    
}
