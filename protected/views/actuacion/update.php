<?php
$this->breadcrumbs=array(
    'Listado expedientes'=>array('expediente/admin'),
    'Expediente '. $this->nro_expediente => array('expediente/view', 'id'=>$this->id_expediente),
	'Edición Actuación '. $model->id,
);
$this->menu= array(
    array('label'=>'Abandonar edición', 'url'=>array('actuacion/view','id'=>$model->id, 'id_expediente'=>$this->id_expediente)),    
);
/*
$this->menu=array(
	array('label'=>'List Actuacion', 'url'=>array('index')),
	array('label'=>'Create Actuacion', 'url'=>array('create')),
	array('label'=>'View Actuacion', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage Actuacion', 'url'=>array('admin')),
);
 */
?>

<h1>Editar Actuacion #<?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>