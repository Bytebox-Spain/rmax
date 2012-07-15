<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente ' . $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Editar tarea',
);
$this->menu=array(
	array('label'=>'Volver al Expediente', 'url'=>array('expediente/view','id'=>$this->id_expediente)),    
	
);
/*
$this->menu=array(
	array('label'=>'List Tarea', 'url'=>array('index')),
	array('label'=>'Create Tarea', 'url'=>array('create')),
	array('label'=>'View Tarea', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Tarea', 'url'=>array('admin')),
);
*/
?>

<h1>Editar tarea #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>