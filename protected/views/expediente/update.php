<?php
$this->breadcrumbs=array(
	'Expedientes'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Listado expedientes', 'url'=>array('index')),
	array('label'=>'Crear expediente', 'url'=>array('create','id_empresa'=> Yii::app()->user->master_company_id)),
	array('label'=>'Ver Expediente ', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gestión Expedientes', 'url'=>array('admin')),
);
?>

<h1> Expediente <?php echo $model->nro_control; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>