<?php

class DocumentoController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

    /** 
     * @var integer Identificador del expediente al que se asocia el documento
     */
    public $id_expediente=null;

    /** 
     * @var integer Identificador del expediente al que se asocia el documento
     */
    public $nro_expediente=null;
    
    /**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
            'DocumentoContext',
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
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Documento;
        $model->id_expediente = $this->id_expediente;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Documento']))
		{
			$model->attributes=$_POST['Documento'];
            $model->archivo=CUploadedFile::getInstance($model,'archivo');
			if($model->save()){
                $this->saveAttachedFile($model);
				$this->redirect(array('documento/view','id'=>$model->id, 'id_expediente'=>$this->id_expediente));
            }   
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

		if(isset($_POST['Documento']))
		{
			$model->attributes=$_POST['Documento'];
            $model->archivo=CUploadedFile::getInstance($model,'archivo');
            
			if($model->save()){
                $this->saveAttachedFile($model);
				$this->redirect(array('documento/view','id'=>$model->id, 'id_expediente'=>$this->id_expediente));
            }
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

    /**
     * Guarda el documento en el sistema de archivos
     * @param Object Modelo 
     */
    protected function saveAttachedFile($model)
    {
        $workPath = 'docs/' . $this->id_expediente;
        if (!file_exists($workPath)) {
            if (!mkdir($workPath))
                throw new CHttpException(400,"No ha sido posible crear el directorio para almacenar documentos asociados");
        }
        if (file_exists($workPath ."/". $model->archivo))
            throw new CHttpException(400,"Oppss! El archivo que intentas adjuntar ya está registrado. Cambia el nombre del documento y vuelve a intentarlo");
        $model->archivo->saveAs($workPath ."/". $model->archivo);
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
            $model=$this->loadModel($id);
			// we only allow deletion via POST request
			
            // eliminar el archivo físico del disco
            $archivo = Yii::app()->getBasePath() . "/../docs/" . $this->id_expediente . "/" . $model->archivo;
            if (file_exists($archivo)) unlink($archivo);
            //eliminar el registro de la base de datos
            $this->loadModel($id)->delete();
            
            

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('expediente/view', 'id'=>$this->id_expediente));
		}
		else
			throw new CHttpException(400,'Página inválida');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('Documento');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Documento('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Documento']))
			$model->attributes=$_GET['Documento'];

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
		$model=Documento::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'La página requerida no existe.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='documento-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

    /*
     * filtro para establecer el id del expediente al que pertenece el documento
     * 
     */
    public function filterDocumentoContext($filterChain){
        if(isset($_GET['id_expediente'])){
            $this->id_expediente= $_GET['id_expediente'];
        }elseif(isset($_POST['id_expediente'])){
            $this->id_expediente= $_POST['id_expediente'];
        }else{
            throw new CHttpException(400, 'No se ha definido el expediente asociado al documento');
        }
        $expedienteAux = Expediente::model()->findByPk($this->id_expediente);
        $this->nro_expediente = $expedienteAux->nro_expediente;
        $filterChain->run();
    }
    
}
