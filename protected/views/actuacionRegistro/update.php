<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente '. $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Actuación '. $model->id_actuacion => array('actuacion/view', 'id'=>$model->id_actuacion, 'id_expediente'=> $this->id_expediente), 
    'Editar Registro ' . $model->id,
);

$this->menu=array(
	array('label'=>'Abandonar edición', 'url'=>array('actuacion/view', 'id'=>$model->id_actuacion, 'id_expediente'=> $this->id_expediente)),

);
?>

<h1>Actualizar registro de actuación #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>