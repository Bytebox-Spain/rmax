<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente ' . $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Nueva Evento',
);

$this->menu=array(
	array('label'=>'Volver al expediente', 'url'=>array('expediente/view', 'id'=>$this->id_expediente)),
);
?>

<h1>Crear nuevo evento de expediente</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>