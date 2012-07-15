<?php
$this->breadcrumbs=array(
	'Expedientes'=>array('index'),
	'Crear',
);

$this->menu=array(
	array('label'=>'Maestro Expedientes', 'url'=>array('admin')),
);
?>

<h1>Expediente <?php echo $model->nro_control?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>