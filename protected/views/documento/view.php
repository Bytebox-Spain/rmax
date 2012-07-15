<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente ' . $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Documento #' . $model->id,
);

$this->menu=array(
	array('label'=>'Volver al expediente', 'url'=>array('expediente/view', 'id'=>$this->id_expediente)),
	array('label'=>'Editar Documento', 'url'=>array('update', 'id'=>$model->id, 'id_expediente'=>$this->id_expediente)),
	array('label'=>'Eliminar Documento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'id_expediente'=>$this->id_expediente),'confirm'=>'Por favor, confirmar eliminación')),
);
?>

<h1> Documento #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'descripcion',
		'archivo',
		'id_expediente',
		'id_usuario_creacion',
		'fecha_creacion',
		'id_usuario_ultmodif',
		'fecha_ultmodif',
	),
)); ?>
