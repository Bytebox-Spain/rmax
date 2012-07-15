<?php

class ExpedienteController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        
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
            'empresaContext + create ',
            'expedienteContext + update',
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
	 * Muestra un expediente en particular
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
    {
        $modelActuacion=new Actuacion('search');
		$modelActuacion->unsetAttributes();  // clear any default values
		if(isset($_GET['Actuacion']))
			$modelActuacion->attributes=$_GET['Actuacion'];
        
        $eventosExpDataProvider = new CActiveDataProvider('ExpedienteRegistro', array(
            'criteria' => array(
                'condition' => 'id_expediente=:id_expediente',
                'params' =>array(':id_expediente'=> $id),
                ),
            'pagination' => array(
                'pageSize'=>10,    
                ),
            )
        );
        
        $actuacionesDataProvider = new CActiveDataProvider('Actuacion', array(
            'criteria' => array(
                'condition' => 'id_expediente=:id_expediente',
                'params' =>array(':id_expediente'=> $id),
                ),
            'pagination' => array(
                'pageSize'=>10,    
                ),
            )
        );
        
        $tareasDataProvider = new CActiveDataProvider('Tarea', array(
            'criteria' => array(
                'condition' => 'id_expediente=:id_expediente',
                'params' =>array(':id_expediente'=> $id),
                ),
            'pagination' => array(
                'pageSize'=>10,    
                ),
            )
        );

        $documentosDataProvider = new CActiveDataProvider('Documento', array(
            'criteria' => array(
                'condition' => 'id_expediente=:id_expediente',
                'params' =>array(':id_expediente'=> $id),
                ),
            'pagination' => array(
                'pageSize'=>5,    
                ),
            )
        );
        
		$this->render('view',array(
			'model'=>$this->loadModel($id),
            'actuacionesDataProvider' => $actuacionesDataProvider,    
            'tareasDataProvider' => $tareasDataProvider,
            'documentosDataProvider' => $documentosDataProvider,
            'eventosExpDataProvider' => $eventosExpDataProvider,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Expediente;

        $model->id_empresa = $this->_empresa->id;
        $model->nro_control = $this->getNextNroControlExpediente();
		
        // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Expediente']))
		{
			$model->attributes=$_POST['Expediente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Expediente']))
		{
			$model->attributes=$_POST['Expediente'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
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
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Expediente');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Expediente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Expediente']))
			$model->attributes=$_GET['Expediente'];

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
		$model=Expediente::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='expediente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
        /**
         * Filter to validate Empresa context
         *  
         */

        public function filterEmpresaContext($filterChain)
        {
            $id_empresa = null;
            
            if(isset($_GET['id_empresa'])) $id_empresa= $_GET['id_empresa'];
            if(isset($_POST['id_empresa'])) $id_empresa= $_POST['id_empresa'];
            
            $this->loadEmpresa($id_empresa);
            
            $filterChain->run();
        }
        
        
        /**
         * Protected method to charge date os related Empresa
         * @param empresa Id 
         */
        protected function loadEmpresa($id_empresa){
            if ($this->_empresa === null){
                $this->_empresa = Empresa::model()->findbyPk($id_empresa);
                if ($this->_empresa === null){
                    throw new CHttpException(404,"Empresa no existe");
                }
            }
            return $this->_empresa;
        }

        /**
         * Public Filtro para cargar datos de la empresa asociada 
         * cuando se está ejecutando update
         * @param empresa Id 
         */        
        public function filterExpedienteContext($filterChain){
            $id_expediente = null;
            if(isset($_GET['id'])) $id_expediente= $_GET['id'];
            if(isset($_POST['id'])) $id_expediente= $_POST['id'];
            $_expediente = Expediente::model()->findbyPk($id_expediente);
            $this->_empresa = $this->loadEmpresa($_expediente->id_empresa);
            
            $filterChain->run();
        }

        
        /**
         * Protected method to construct next Nro Control for Expediente  
         * @author Kublai Gómez
         */
        protected function getNextNroControlExpediente(){
            $aux = $this->_empresa->nro_control; 
            $estructura =  explode ("/", $aux);
            if (count($estructura)<2){
                $correlativo = 1;
                $año = date('Y');
            }else{
                $correlativo = intval($estructura[0]);
                $año = $estructura[1];
                if (date("Y") != $año){
                    $correlativo = 1;
                }else{
                    $correlativo += 1; 
                }
            }
            $nro_control_utilizado= sprintf("%05d/%04d",$correlativo,$año);
            $this->_empresa->nro_control = $nro_control_utilizado;
            $this->_empresa->save();
            return $nro_control_utilizado;
        }
        
        
        public function getEmpresa(){
            return $this->_empresa;
        }
}
