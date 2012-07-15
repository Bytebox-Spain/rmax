<?php
$this->breadcrumbs=array(
	'Expediente Registros',
);

$this->menu=array(
	array('label'=>'Create ExpedienteRegistro', 'url'=>array('create')),
	array('label'=>'Manage ExpedienteRegistro', 'url'=>array('admin')),
);
?>

<h1>Expediente Registros</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
