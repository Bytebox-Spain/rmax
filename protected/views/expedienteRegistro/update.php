<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente ' . $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Editar Evento #' . $model->id,
);


$this->menu=array(
	array('label'=>'Abandonar edición', 'url'=>array('expediente/view', 'id'=>$this->id_expediente)),
);
?>

<h1>Editar evento de expediente #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>