<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente ' . $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Editar documento #' . $model->id,
);
$this->menu= array(
    array('label'=>'Volver al Expediente', 'url'=>array('expediente/view','id'=>$this->id_expediente)),    
);
/*
 $this->menu=array(
	array('label'=>'List Documento', 'url'=>array('index')),
	array('label'=>'Create Documento', 'url'=>array('create')),
	array('label'=>'View Documento', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Documento', 'url'=>array('admin')),
);
 
 */
?>

<h1>Actualizar Documento <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>