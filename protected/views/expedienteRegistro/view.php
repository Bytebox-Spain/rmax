<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente ' . $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Evento #' . $model->id,
);

$this->menu=array(
	array('label'=>'Volver al expediente', 'url'=>array('expediente/view', 'id'=>$this->id_expediente)),
	array('label'=>'Editar evento', 'url'=>array('expedienteRegistro/update', 'id' => $model->id, 'id_expediente'=>$this->id_expediente)),
	array('label'=>'Eliminar Evento', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id, 'id_expediente'=>$this->id_expediente),'confirm'=>'Por favor, confirmar eliminiación')),
);
?>

<h1>Evento de expediente #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_expediente',
		'fecha',
		'registro',
        array('name'=>'Creado por','value'=>$model->idUsuarioCreacion->nombre_usuario),
		array('name'=>'fecha de creacion','value'=>$model->fecha_creacion),
        array('name'=>'Modificado por', 'value'=>$model->idUsuarioUltmodif->nombre_usuario),
        array('name'=>'Ultima modificación','value'=>$model->fecha_ultmodif),
	),
)); ?>
