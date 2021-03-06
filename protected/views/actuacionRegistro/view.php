<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente '. $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Actuación '. $model->id_actuacion => array('actuacion/view', 'id'=>$model->id_actuacion, 'id_expediente'=> $this->id_expediente), 
    'Registro ' . $model->id,
);


$this->menu=array(
	array('label'=>'Volver a la actuación', 'url'=>array('actuacion/view','id'=>$model->id_actuacion, 'id_expediente'=> $this->id_expediente)),
	array('label'=>'Volver al expediente', 'url'=>array('expediente/view','id'=>$this->id_expediente)),
	array('label'=>'Editar registro ', 'url'=>array('update', 'id'=>$model->id,'id_actuacion'=>$model->id_actuacion, 'id_expediente'=> $this->id_expediente)),
	array('label'=>'Eliminar registro', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id,
                                                                                         'id_actuacion'=>$model->id_actuacion, 
                                                                                         'id_expediente'=> $this->id_expediente,
                                                                                         'returnUrl' =>'actuacion/view'),
                                                                                    'confirm'=>'Está seguro?')),

);
?>

<h1>Registro de actuación #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_actuacion',
		'fecha',
		'registro',
        array('name'=>'Creado por','value'=>$model->idUsuarioCreacion->nombre_usuario),
		array('name'=>'fecha de creacion','value'=>$model->fecha_creacion),
        array('name'=>'Modificado por', 'value'=>$model->idUsuarioUltmodif->nombre_usuario),
        array('name'=>'Ultima modificación','value'=>$model->fecha_ultmodif),
	),
)); ?>
