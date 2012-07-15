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
    array('label'=>'List Tarea', 'url'=>array('index')),
	array('label'=>'Create Tarea', 'url'=>array('create')),
	array('label'=>'Update Tarea', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete Tarea', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tarea', 'url'=>array('admin')),
 */
?>

<h1> Tarea #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idExpediente.nro_expediente',
		'idTipoTarea.tarea',
		'idUsuarioAsignado.nombre_usuario',
		'descripcion',
		'inicio',
		'final',
		'idUsuarioCreacion.nombre_usuario',
		'fecha_creacion',
		'idUsuarioUltmodif.nombre_usuario',
		'fecha_ultmodif',
	),
)); ?>
