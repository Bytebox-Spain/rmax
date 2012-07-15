<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente ' . $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Nueva tarea',
);

$this->menu=array(
	array('label'=>'Volver al Expediente', 'url'=>array('expediente/view','id'=>$this->id_expediente)),
);
?>

<h1>Nueva Tarea</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>